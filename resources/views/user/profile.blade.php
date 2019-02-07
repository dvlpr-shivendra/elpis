@extends('layouts.app')

@section('content')            
    <div class="card mb-2">
        <div class="card-header">
            <div class="row">
                <div class="col-md-4 my-auto">
                    @if ($user->profile_picture == null)
                        <img src="/images/profile/nodp.png" alt="no profile picture found" class="img-thumbnail img-fluid rounded-circle ">                           
                    @else
                        <img src="/images/profile/{{ $user->profile_picture }}" alt="profile picture" class="img-thumbnail img-fluid">
                    @endif                    
                </div>
                <div class="col-md-8 my-auto">
                    <h2 class="mt-2">{{ $user->name }}</h2>                    
                    <h6>{!! nl2br(e($user->bio)) !!}</h6>
                    <p class="text-muted">
                        {{ $followers }}
                        {{ $followers <= 1 ? 'follower' : 'followers' }}
                    </p>
                </div>                
            </div>
            
            <hr>
            <a href="/chat/{{ $user->id }}" class="btn btn-primary">Message</a>
            @if ($follows->isEmpty())
                <a href="/follow/{{ $user->id }}" class="btn btn-primary">Follow</a>       
            @else
                <a href="/unfollow/{{ $user->id }}" class="btn btn-secondry">Unfollow</a>
            @endif
            
        </div>
    </div>

    <div class="card mb-2">
        <div class="card-body">
            <h3>Recent posts:</h3>
        </div>
    </div>    
    
    @include('partials.statuses')
@endsection