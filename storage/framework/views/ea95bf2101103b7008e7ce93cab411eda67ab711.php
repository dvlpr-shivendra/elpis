<div id="alerts">
<?php if(count($errors)): ?>
    <div class="container alert alert-danger">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span>
                    <?php echo e($error); ?>

                    <i class="fas fa-times text-white float-right btn-link alert-close"></i>
                </span>                
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>

<?php if(session('statusCreated')): ?>
    <div class="container alert alert-success">
            <span>
                <?php echo e(session('statusCreated')); ?>

                <i class="fas fa-times text-white float-right btn-link alert-close"></i>
            </span>
    </div>
<?php endif; ?>

<?php if(session('statusDeleted')): ?>
    <div class="container alert alert-info">
            <span>
                <?php echo e(session('statusDeleted')); ?>

                <i class="fas fa-times text-white float-right btn-link alert-close"></i>
            </span>
    </div>
<?php endif; ?>

<?php if(session('profilePicUpdated')): ?>
    <div class="container alert alert-success">
            <span>
                <?php echo e(session('profilePicUpdated')); ?>

                <i class="fas fa-times float-right btn-link alert-close"></i>
            </span>
    </div>
<?php endif; ?>
</div>