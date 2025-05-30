<div>
    <div class="p-4">
        <h2 class="text-2xl font-bold mb-4">Store</h2>
    
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="flex justify-between items-center bg-gray-100 p-4 mb-2 rounded">
                <div>
                    <p class="font-semibold"><?php echo e($item['name']); ?></p>
                    <p>₱<?php echo e($item['price']); ?></p>
                </div>
                <div class="flex items-center gap-2">
    <button wire:click="updateQuantity(<?php echo e($id); ?>, 'dec')" class="px-2 py-1 border rounded">-</button>
    <span><?php echo e($item['quantity']); ?></span>
    <button wire:click="updateQuantity(<?php echo e($id); ?>, 'inc')" class="px-2 py-1 border rounded">+</button>
</div>
                <button wire:click="removeItem(<?php echo e($id); ?>)" class="text-red-500">Remove</button>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
    
        <a href="<?php echo e(route('checkout')); ?>" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">Proceed to Checkout</a>
    </div>    
</div><?php /**PATH C:\Users\Rabikk\Desktop\SampleApp\resources\views/livewire/cart.blade.php ENDPATH**/ ?>