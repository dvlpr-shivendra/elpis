<?php $__env->startSection('content'); ?>
    <h1>Inbox</h1>

    <?php if($chats->isEmpty()): ?>
        <p>No chats found.</p>
    <?php endif; ?>

    <?php $__currentLoopData = $chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <?php
            $chatRecipient = auth()->user()::find($chat->recipient_id);
            $chatInitiator = auth()->user()::find($chat->initiator_id);
        ?>

        <?php if($chat->messages->last()->reciever_id == auth()->user()->id && $chat->messages->last()->read != true): ?>
            <div class="card mb-4 bg-primary">
                <div class="card-body"> 
                    <?php if($chatInitiator == auth()->user()): ?>
                        <a href="/messages/<?php echo e($chat->id); ?>" class="text-white">
                            <?php echo e($chatRecipient->name); ?>

                        </a>    
                    <?php else: ?>
                        <a href="/messages/<?php echo e($chat->id); ?>" class="text-white">
                            <?php echo e($chatInitiator->name); ?>

                        </a>
                    <?php endif; ?>
                    <div>
                        <small>
                            <?php echo e($chat->messages->last()->created_at->diffForHumans()); ?>

                        </small>
                    </div>
                </div>
            </div>    
        <?php else: ?>
            <div class="card mb-4">
                <div class="card-body"> 
                    <?php if($chatInitiator == auth()->user()): ?>
                        <a href="/messages/<?php echo e($chat->id); ?>">
                            <?php echo e($chatRecipient->name); ?>

                        </a>    
                    <?php else: ?>
                        <a href="/messages/<?php echo e($chat->id); ?>">
                            <?php echo e($chatInitiator->name); ?>

                        </a>
                    <?php endif; ?>
                    <div>
                        <small>
                            <?php echo e($chat->messages->last()->created_at->diffForHumans()); ?>

                        </small>
                    </div>                
                    
                </div>
            </div>
        <?php endif; ?>
            
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php echo e($chats->links()); ?>

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>