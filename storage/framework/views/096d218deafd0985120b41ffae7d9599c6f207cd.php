<?php $__env->startSection('content'); ?>

    <?php if($notifications->isEmpty()): ?>
        <h5>No new notification here.</h5>
    <?php else: ?>
        <h3 class="card-header mb-2">
            All notifications will be deleted when you leave this page.
        </h3>
        
        <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                            
            
            <div class="card mb-2">
                <div class="card-body">

                    <?php if($notification->type == "App\Notifications\StatusLiked" ): ?>
                    <?php
                        $like = App\Like::find($notification->data['like_id']);
                        $user = App\User::find($like->user_id);
                    ?>
                        <h5>
                            <a href="/user/profile/<?php echo e($user->id); ?>" target="_blank">
                                <?php echo e($user->name); ?>

                            </a>
                            liked your
                            <a href="/status/<?php echo e($like->status_id); ?>" target="_blank">
                                status
                            </a>
                            .
                        </h5>    
                    <?php else: ?>
                    <?php
                        $comment = App\Comment::find($notification->data['comment_id']);
                        $user = App\User::find($comment->user_id);
                    ?>
                        <h5>
                            <a href="/user/profile/<?php echo e($user->id); ?>" target="_blank">
                                <?php echo e($user->name); ?>

                            </a>
                            commented on your 
                            <a href="/status/<?php echo e($comment->status_id); ?>" target="_blank">
                                status
                            </a>
                            .
                        </h5>
                    <?php endif; ?>
                    
                    <small class="text-muted">
                        <?php echo e($notification->created_at->diffForHumans()); ?>

                    </small>
                    
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php
    auth()->user()->notifications()->delete();
?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>