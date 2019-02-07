<?php $__env->startSection('content'); ?>

    <div class="mb-4">
        <?php if($messages->first()->sender_id == auth()->user()->id): ?>
            <h3>
                <?php echo e(App\user::find($messages->first()->reciever_id)->name); ?>

            </h3>
        <?php else: ?>
            <h3>
                <?php echo e(App\user::find($messages->first()->sender_id)->name); ?>

            </h3>
        <?php endif; ?>
        
    </div>

    <div id="messages">
    <?php $__currentLoopData = $messages->reverse(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <?php if(auth()->user()->id == $message->sender_id): ?>
        <div class="card bg-info mb-3 float-right" style="width:90%">            
            <div class="card-body">
                    <h5 class="text-right text-white">
                        <?php echo e($message->body); ?>

                        <br>
                        <small><?php echo e($message->created_at->diffForHumans()); ?></small>
                    </h5>
            </div>
        </div>    
    <?php else: ?>
        <?php if(!$message->read): ?>
            <?php
                $message->update(["read" => true]);
            ?>
        <?php endif; ?>
        <div class="card bg-success mb-3" style="width:90%">            
            <div class="card-body">
                    <h5 class="text-left text-white">
                        <?php echo e($message->body); ?>

                        <br>
                        <small><?php echo e($message->created_at->diffForHumans()); ?></small>
                    </h5>
            </div>
        </div>
    <?php endif; ?>
                
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>


    <form action="/message" method="post">
        <?php echo csrf_field(); ?>
        
        <?php
            $data = $messages->first()
        ?>

        <input type="hidden" name="chat_id" value="<?php echo e($data->chat_id); ?>" >
        <input type="hidden" name="reciever_id" 
            value="<?php echo e(auth()->user()->id == $data->sender_id ? $data->reciever_id : $data->sender_id); ?>">

        <div class="form-group">                
            <label for="text">Write message</label>
            <textarea class="form-control" name="body" id="message" rows="3" style="border: 1px solid" autofocus required></textarea>
        </div>

        <input type="submit" class="btn btn-success btn-block text-center" value="send">
    </form>

    <p><?php echo e($messages->links()); ?></p>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        const chatId = <?php echo e($messages->first()->chat_id); ?>;
        Echo.private('chat.' + chatId)
            .listen('MessageSent', function (event) {
                
                $("#messages").append(`
                    <div class="card bg-success mb-3" style="width:90%">            
                        <div class="card-body">
                            <h5 class="text-left text-white">
                                ${event.body}
                                <br>
                                <small>${event.created_at}</small>
                            </h5>
                        </div>
                    </div>
                `);

            })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>