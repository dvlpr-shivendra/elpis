<nav class="navbar navbar-expand-md navbar-light bg-light mb-2">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">        
            <i class="fas fa-circle text-success"></i>
            <i class="fas fa-circle text-success"></i>
            <i class="fas fa-circle text-success"></i>
        </a>

        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                @if (Auth::check())
                <li class="{{ Request::path() == '/' ? 'active' : '' }}">
                    <a class="nav-link" href="/">Feed</a>
                </li>
                <li class="{{ Request::path() == 'home' ? 'active' : '' }}">
                    <a class="nav-link" href="/home">Profile</a>
                </li>
                <li class="{{ Request::path() == 'inbox' ? 'active' : '' }}">
                    <a class="nav-link" href="/inbox">
                        Messages
                        @if (auth()->user()->messagesRecieved->where('read', false)->count())                       
                            <strong>
                                {{ auth()->user()->messagesRecieved->where('read', false)->count()}}
                            </strong>
                        @endif                        
                    </a>
                </li>                
                <li>
                    <a class="nav-link" href="/home#update-status">Update Status</a>
                </li>
                <li>
                    <a class="nav-link" href="/notifications">
                        Notifications
                        @if (auth()->user()->notifications()->count() > 0)
                            <strong>{{ auth()->user()->notifications()->count() }}</strong>
                        @endif                        
                    </a>
                </li>                
                @endif

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                @auth
                    <li class="{{ Request::path() == 'search' ? 'active' : '' }}">
                        <a class="nav-link" href="/search" title="search for a user">
                             <i class="fas fa-search"></i>
                        </a>
                    </li>
                    <li class="{{ Request::path() == 'peoples' ? 'active' : '' }}">
                        <a class="nav-link" href="/peoples" title="discover peoples">
                            <i class="fas fa-users"></i>
                        </a>
                    </li>
                @endauth
                    
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else                                    

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>


                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
