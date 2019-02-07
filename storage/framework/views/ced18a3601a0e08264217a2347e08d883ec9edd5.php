

<?php $__env->startSection('content'); ?>

    <div class="mb-4">
        <form class="form-inline my-2 my-lg-0" method="POST" action="/process">
            <?php echo csrf_field(); ?>
            <input class="form-control mr-2" type="search" placeholder="Enter name" aria-label="Search" name="input">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    
    <?php if(isset($users)): ?>                                
        
        <?php if($users->isEmpty()): ?>
            <h2>User does not exist.</h2>
        <?php else: ?>
            <h2 class="mb-4">Search result:</h2>
        <?php endif; ?>

            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row bg-secondry mb-2 px-2 py-2 bg-info ">
                <div class="col-xs-2">
                    <?php if($user->profile_picture == null): ?>
                        <img src="/images/profile/nodp.png" alt="no profile picture found" class="img-thumbnail img-fluid image-small ">                           
                    <?php else: ?>
                        <img src="/images/profile/<?php echo e($user->profile_picture); ?>" alt="profile picture" class="img-thumbnail img-fluid image-small">
                    <?php endif; ?>
                </div>
                <div class="col-xs-8 my-auto ml-4">
                    <a href="/user/profile/<?php echo e($user->id); ?>" class="text-left text-white">
                        <?php echo e($user->name); ?>

                    </a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    

    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>