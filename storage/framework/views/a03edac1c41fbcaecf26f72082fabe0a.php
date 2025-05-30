<div class="p-8 w-full">

    <div class="mb-4">
        <label class="block text-lg font-semibold mb-2">Search Student</label>
        <input 
            class="w-full bg-gray-100 py-2 px-4 rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-green-300" 
            type="text" 
            placeholder="Type product name..." 
            wire:model.live='search'>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="rounded-lg border border-gray-300 bg-green-100 drop-shadow-lg overflow-hidden">
                <img src="<?php echo e(asset('uploads/product-images/' . $product->file_path)); ?>" class="w-full h-48 object-cover" alt="<?php echo e($product->name); ?>">

                <div class="p-4">
                    <p class="text-xl font-bold mb-2"><?php echo e($product->name); ?></p>
                    <p class="text-sm text-gray-700 mb-1">School Year: <?php echo e($product->price); ?></p>
                    <p class="text-sm text-gray-700 mb-1">Course: <?php echo e($product->category); ?></p>
                    <p class="text-sm text-gray-700 mb-3">Age: <?php echo e($product->quantity); ?></p>

                    <button 
                        wire:click='addToCart(<?php echo e($product->id); ?>)'
                        class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition duration-200">
                         Export
                    </button>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-span-full text-center text-gray-500">
                No products found.
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
    
</div>
<?php /**PATH C:\Users\Rabikk\Desktop\SampleApp\resources\views/livewire/home.blade.php ENDPATH**/ ?>