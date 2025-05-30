<div>
    <div class="p-8 max-w-2xl mx-auto">
        <h2 class="text-2xl font-bold mb-4">Checkout</h2>
    
        <form wire:submit.prevent="submitOrder" class="space-y-4">
            <div>
                <label>Full Address</label>
                <input type="text" wire:model="full_address" class="w-full border p-2 rounded" />
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['full_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
    
            <div>
                <label>Mobile Number</label>
                <input type="text" wire:model="mobile_number" class="w-full border p-2 rounded" />
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['mobile_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
    
            <div>
                <label>Payment Mode</label>
                <select wire:model="payment_mode" class="w-full border p-2 rounded">
                    <option value="">-- Select Payment --</option>
                    <option value="Cash on Delivery">Cash on Delivery</option>
                    <option value="Credit Card">Credit Card</option>
                </select>
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['payment_mode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
    
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Place Order</button>
        </form>
    </div>    
</div><?php /**PATH C:\Users\Rabikk\Desktop\SampleApp\resources\views/livewire/checkout.blade.php ENDPATH**/ ?>