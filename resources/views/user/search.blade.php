@extends('layouts.app')

@section('content')

    <div class="mb-4">
        <form class="form-inline my-2 my-lg-0" method="POST" action="/process">
            @csrf
            <input class="form-control mr-2" type="search" placeholder="Enter name" aria-label="Search" name="input">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    
    @isset($users)                                
        
        @if ($users->isEmpty())
            <h2>User does not exist.</h2>
        @else
            <h2 class="mb-4">Search result:</h2>
        @endif

            @foreach ($users as $user)
            <div class="row bg-secondry mb-2 px-2 py-2 bg-info ">
                <div class="col-xs-2">
                    @if ($user->profile_picture == null)
                        <img src="/images/profile/nodp.png" alt="no profile picture found" class="img-thumbnail img-fluid image-small ">                           
                    @else
                        <img src="/images/profile/{{ $user->profile_picture }}" alt="profile picture" class="img-thumbnail img-fluid image-small">
                    @endif
                </div>
                <div class="col-xs-8 my-auto ml-4">
                    <a href="/user/profile/{{ $user->id }}" class="text-left text-white">
                        {{ $user->name }}
                    </a>
                </div>
            </div>
            @endforeach
    

    @endisset

@endsection