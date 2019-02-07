<?php $__env->startSection('content'); ?>

    <?php $__currentLoopData = $peoples; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card-header mb-2">
                <div class="container">
                    <a href="/user/profile/<?php echo e($user->id); ?>">
                        <?php echo e($user->name); ?>

                    </a>
                </div>                
            </div>                
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php echo e($peoples->links()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>