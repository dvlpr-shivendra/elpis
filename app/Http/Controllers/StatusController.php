<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use App\Notifications\StatusLiked;
use App\Status;
use App\Like;
use App\Comment;
use App\User;

class StatusController extends Controller
{    

    public function index()
    {
        $following = DB::table('followers')
                    ->where('follower', auth()->user()->id)
                    ->pluck('user_id')
                    ->toArray();

                    // dd($following);
        
        $statuses = Status::whereIn('owner_id', $following)->latest()->simplePaginate(20);

        return view('feed', ['statuses' => $statuses]);
    }

    public function show(Status $status)
    {
        $comments = $status->comments()
                        ->latest()
                        ->get();

        return view('statuses.show',[
            'comments' => $comments,
            'status' => $status
        ]);
    }
    
    public function store()
    {
        request()->validate([
            'body' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:5120|nullable'
        ]);

        $image = null;

        if(request()->has('image')) {
            $resizedImage = Image::make(request()->file('image'))
                ->resize(720, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

            if($resizedImage->mime == "image/png") {
                $resizedImage->extension = "png";
            } else {
                $resizedImage->extension = "jpg";
            }

            $image = time(). '.' .$resizedImage->extension;

            $resizedImage->save('images/status/'. $image, 60);
        }        

        Status::create([
            'body' => request('body'),
            'image' => $image,
            'owner_id' => auth()->user()->id
        ]);
        
        return redirect('home')->with('statusCreated', 'Status updated.');
    }

    public function destroy(Status $status)
    {
        $status->delete();
        return redirect()->back()->with('statusDeleted', 'Status deleted.');
    }

    public function like($id)
    {   
        $status = Status::find($id);
        $alreadyLiked = Like::where('user_id', auth()->user()->id)
            ->where('status_id', $id)            
            ->get();

        if(!$alreadyLiked->isEmpty()) {
            abort('429');
        }

        $like = Like::create([
            'user_id' => auth()->user()->id,
            'status_id' => $id,
            'liked' => true
        ]);        

        if ($status->owner->id != auth()->user()->id)
            $status->owner->notify(new StatusLiked($like->id));

        return redirect()->back();
    }
}
