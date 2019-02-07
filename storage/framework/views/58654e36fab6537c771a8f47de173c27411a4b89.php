<?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>        
    
<div class="card mb-4">
    <div class="card-body">
        <h5>
            <a href="/status/<?php echo e($status->id); ?>" class="text-dark">
                <?php echo e($status->body); ?>

            </a>                
        </h5> 

        <?php if($status->image): ?>
            <img src="/images/status/<?php echo e($status->image); ?>" alt="status image" class="img-fluid my-1">
        <?php endif; ?>    
        
        <a href="/user/profile/<?php echo e($status->owner->id); ?>" class="card-link ">
            <?php echo e($status->owner->name); ?>

        </a>
        
        <?php echo $__env->make('partials.likes', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php if($status->owner_id == auth()->user()->id): ?>
            <?php echo $__env->make('partials.deletestatus', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
        
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>