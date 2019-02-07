<nav class="navbar navbar-expand-md navbar-light bg-light mb-2">
    <div class="container">
        <a class="navbar-brand" href="<?php echo e(url('/')); ?>">        
            <i class="fas fa-circle text-success"></i>
            <i class="fas fa-circle text-success"></i>
            <i class="fas fa-circle text-success"></i>
        </a>

        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
            <span class="navbar-toggler-icon"></span>
        </button>
        

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <?php if(Auth::check()): ?>
                <li class="<?php echo e(Request::path() == '/' ? 'active' : ''); ?>">
                    <a class="nav-link" href="/">Feed</a>
                </li>
                <li class="<?php echo e(Request::path() == 'home' ? 'active' : ''); ?>">
                    <a class="nav-link" href="/home">Profile</a>
                </li>
                <li class="<?php echo e(Request::path() == 'inbox' ? 'active' : ''); ?>">
                    <a class="nav-link" href="/inbox">
                        Messages
                        <?php if(auth()->user()->messagesRecieved->where('read', false)->count()): ?>                       
                            <strong>
                                <?php echo e(auth()->user()->messagesRecieved->where('read', false)->count()); ?>

                            </strong>
                        <?php endif; ?>                        
                    </a>
                </li>                
                <li>
                    <a class="nav-link" href="/home#update-status">Update Status</a>
                </li>
                <li>
                    <a class="nav-link" href="/notifications">
                        Notifications
                        <?php if(auth()->user()->notifications()->count() > 0): ?>
                            <strong><?php echo e(auth()->user()->notifications()->count()); ?></strong>
                        <?php endif; ?>                        
                    </a>
                </li>                
                <?php endif; ?>

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <?php if(auth()->guard()->check()): ?>
                    <li class="<?php echo e(Request::path() == 'search' ? 'active' : ''); ?>">
                        <a class="nav-link" href="/search" title="search for a user">
                             <i class="fas fa-search"></i>
                        </a>
                    </li>
                    <li class="<?php echo e(Request::path() == 'peoples' ? 'active' : ''); ?>">
                        <a class="nav-link" href="/peoples" title="discover peoples">
                            <i class="fas fa-users"></i>
                        </a>
                    </li>
                <?php endif; ?>
                    
                <!-- Authentication Links -->
                <?php if(auth()->guard()->guest()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                    </li>
                    <?php if(Route::has('register')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                        </li>
                    <?php endif; ?>
                <?php else: ?>                                    

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                        </a>


                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                <?php echo e(__('Logout')); ?>

                            </a>

                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo csrf_field(); ?>
                            </form>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
