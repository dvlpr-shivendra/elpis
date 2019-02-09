<?php $__env->startSection('content'); ?>
    <div class="card">

        <div class="card-header">
            <div class="row">
                <div class="col-md-4 my-auto">
                    <?php if( auth()->user()->profile_picture == null): ?>
                        <img src="/images/profile/nodp.png" alt="no profile picture found" class="img-thumbnail img-fluid rounded-circle">                           
                    <?php else: ?>
                        <img src="/images/profile/<?php echo e(auth()->user()->profile_picture); ?>" alt="profile picture" class="img-thumbnail img-fluid">
                    <?php endif; ?>
                </div>
                <div class="col-md-8 my-auto">
                    <h2 class="my-3"><?php echo e(auth()->user()->name); ?></h2>
                    <h6><?php echo nl2br(e(auth()->user()->bio)); ?></h6>
                    <p class="text-muted">
                        <?php echo e($followers); ?>

                        <?php echo e($followers <= 1 ? 'follower' : 'followers'); ?>

                    </p>                    
                    <hr>
                    <form action="/profile/picture" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="profile_picture">Change profile picture</label>
                            <input type="file" class="form-control-file" name="profile_picture" id="profile_picture" placeholder="" aria-describedby="fileHelpId">
                        </div>
                        <input type="submit"  value="change" class="btn btn-sm btn-info">                        
                    </form>                    
                </div>
            </div>            
        </div>
        <div class="card-body">
            <?php if(session('status')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>

            <form action="/status" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <h3 id="update-status">Update status</h3>
                <div class="form-group">
                    <textarea class="form-control" name="body" id="body" rows="3"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="profile_picture">Image(optional)</label>
                    <input type="file" class="form-control-file" name="image" id="image">
                </div>                    

                <input type="submit" value="Post" class="btn btn-primary btn-block">
            </form>

        </div>

    </div>            
    
    <div class="card my-2">
        <?php if(count($statuses)): ?>
            <h3 class="card-body mt-2">Your recent posts</h3>
        <?php else: ?>
            <h3 class="card-body mt-2">Update your status using above form</h3>
        <?php endif; ?>
    </div>

    <?php echo $__env->make('partials.statuses', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="my-2">
        <?php echo e($statuses->links()); ?>

    </div>    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>