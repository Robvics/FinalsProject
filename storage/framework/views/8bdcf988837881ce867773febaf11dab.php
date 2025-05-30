<div>
<div class="p-8">
    <h2 class="text-2xl font-bold mb-4">Completed Orders</h2>

    <div class="mb-4">
        <input type="text" wire:model="search" class="w-full p-2 border rounded" placeholder="Search by address, phone, or payment method...">
    </div>

    <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="bg-white p-4 mb-6 rounded shadow">
            <h3 class="font-semibold mb-2">Order #<?php echo e($order['id']); ?></h3>

            <ul class="mb-2 list-disc pl-5">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $order['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($item['name']); ?> - <?php echo e($item['quantity']); ?> × $<?php echo e($item['price']); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </ul>

            <p><strong>Total:</strong> $<?php echo e($order['total']); ?></p>
            <p><strong>Address:</strong> <?php echo e($order['address']); ?></p>
            <p><strong>Mobile:</strong> <?php echo e($order['mobile']); ?></p>
            <p><strong>Payment:</strong> <?php echo e($order['payment_mode']); ?></p>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p>No orders found.</p>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('orders');

$__html = app('livewire')->mount($__name, $__params, 'lw-3426840472-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
</div>
<?php /**PATH C:\Users\Rabikk\Desktop\SampleApp\resources\views/livewire/orders.blade.php ENDPATH**/ ?>