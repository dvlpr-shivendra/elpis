

<?php $__env->startSection('content'); ?>            
    <div class="card mb-2">
        <div class="card-header">
            <div class="row">
                <div class="col-md-4 my-auto">
                    <?php if($user->profile_picture == null): ?>
                        <img src="/images/profile/nodp.png" alt="no profile picture found" class="img-thumbnail img-fluid rounded-circle ">                           
                    <?php else: ?>
                        <img src="/images/profile/<?php echo e($user->profile_picture); ?>" alt="profile picture" class="img-thumbnail img-fluid">
                    <?php endif; ?>                    
                </div>
                <div class="col-md-8 my-auto">
                    <h2 class="mt-2"><?php echo e($user->name); ?></h2>                    
                    <h4><?php echo nl2br(e($user->bio)); ?></h4>
                    <h6 class="text-muted">
                        <?php echo e($followers); ?>

                        <?php echo e($followers <= 1 ? 'follower' : 'followers'); ?>

                    </h6>
                </div>                
            </div>
            
            <hr>
            <a href="/chat/<?php echo e($user->id); ?>" class="btn btn-primary">Message</a>
            <?php if($follows->isEmpty()): ?>
                <a href="/follow/<?php echo e($user->id); ?>" class="btn btn-primary">Follow</a>       
            <?php else: ?>
                <a href="/unfollow/<?php echo e($user->id); ?>" class="btn btn-secondry">Unfollow</a>
            <?php endif; ?>
            
        </div>
    </div>

    <div class="card mb-2">
        <div class="card-body">
            <h3>Recent posts:</h3>
        </div>
    </div>    
    
    <?php echo $__env->make('partials.statuses', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>