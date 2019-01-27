@extends('layouts.app')

@section('content')
    <div class="card">
        
        <div class="card-body">

            <h4 class="card-title">{{ $status->body }}</h4>

            @include('partials.likes')
            
            <form action="/comment/{{ $status->id }}" method="post">
                @csrf
                    <div class="form-group">
                        <input type="text" name="body" id="body" class="form-control" placeholder="write here...">
                    </div>
                    <input type="submit" value="comment" class="btn btn-success mb-4">
            </form>            

            <div class="card-text">
                @if (count($comments))
                    <h4>comments: </h4>    
                @else
                    <h4>No comments found </h4>
                @endif
                    
                @foreach ($comments as $comment)
                    <p>
                        <hr>
                        <a href="/user/profile/{{$comment->user->id}}">
                            {{ $comment->user->name}}
                        </a> : {{ $comment->body }}
                        <span class="text-muted float-right">
                            {{ $comment->created_at->diffForHumans() }}
                        </span>
                    </p>
                @endforeach
            </div>
        </div>
        </div>
@endsection