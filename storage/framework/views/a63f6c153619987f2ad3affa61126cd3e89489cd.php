<?php $__env->startSection('content'); ?>

    <?php if($statuses->isEmpty()): ?>
        <h5 class="card-header">
            No Post found. When you follow somebody you see their recent posts in your feed.            
            <a href="/peoples">Discover peoples.</a>
        </h5>
    <?php endif; ?>

    <?php echo $__env->make('partials.statuses', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo e($statuses->links()); ?>

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>