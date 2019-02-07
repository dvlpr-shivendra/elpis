@extends('layouts.app')

@section('content')
    <div class="card">

        <div class="card-header">
            <div class="row">
                <div class="col-md-4 my-auto">
                    @if ( auth()->user()->profile_picture == null)
                        <img src="/images/profile/nodp.png" alt="no profile picture found" class="img-thumbnail img-fluid rounded-circle">                           
                    @else
                        <img src="/images/profile/{{ auth()->user()->profile_picture }}" alt="profile picture" class="img-thumbnail img-fluid">
                    @endif
                </div>
                <div class="col-md-8 my-auto">
                    <h2 class="my-3">{{ auth()->user()->name }}</h2>
                    <h6>{!! nl2br(e(auth()->user()->bio)) !!}</h6>
                    <p class="text-muted">
                        {{ $followers }}
                        {{ $followers <= 1 ? 'follower' : 'followers' }}
                    </p>                    
                    <hr>
                    <form action="/profile/picture" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="profile_picture">Change profile picture</label>
                            <input type="file" class="form-control-file" name="profile_picture" id="profile_picture" placeholder="" aria-describedby="fileHelpId">
                        </div>
                        <input type="submit"  value="change" class="btn btn-sm btn-info">                        
                    </form>                    
                </div>
            </div>            
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form action="/status" method="POST" enctype="multipart/form-data">
                @csrf

                <h3 id="update-status">Update status</h3>
                <div class="form-group">
                    <textarea class="form-control" name="body" id="body" rows="3"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="profile_picture">Image(optional)</label>
                    <input type="file" class="form-control-file" name="image" id="image">
                </div>                    

                <input type="submit" value="Post" class="btn btn-primary btn-block">
            </form>

        </div>

    </div>            
    
    <div class="card my-2">
        @if (count($statuses))
            <h3 class="card-body mt-2">Your recent posts</h3>
        @else
            <h3 class="card-body mt-2">Update your status using above form</h3>
        @endif
    </div>

    @include('partials.statuses')

    <div class="my-2">
        {{ $statuses->links() }}
    </div>    

@endsection
