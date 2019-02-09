<?php $__env->startSection('jumbotron'); ?>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-3">404</h1>
            <p class="lead">Sorry, the page you are looking for could not be found.</p>
            <hr class="my-2">
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="/" role="button">Go Home</a>
            </p>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>