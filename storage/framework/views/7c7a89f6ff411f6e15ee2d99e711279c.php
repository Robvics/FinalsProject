<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title><?php echo e($title ?? 'Night Market'); ?></title>
        <link rel="stylesheet" href="/css/home.css">
        <link rel="stylesheet" href="/css/cart.css">
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/product.css">
        <script src="https://kit.fontawesome.com/8f72ae1d7c.js" crossorigin="anonymous"></script>

        <link rel ="stylesheet" href="<?php echo e(asset('build/assets/app-D4Xn7t89.css')); ?>">
        <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
        <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>


    </head>
    <body> 
        <div class="main">
           
        <div class="sidebar">
        <div style="display:flex; gap:20px;">
        <img src="/image/school.jpg" alt="Site Logo" width="50">
        <h4>Unibersity</h4>
        </div>
            <ul>
                <?php if(Auth::user()->user_role === 'customer'): ?>
                <li><a href ="<?php echo e(route('home')); ?>">Home</a></li>
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="button" >Logout</buttontype>
                </form>
                <?php else: ?>
                
                <li><a href ="<?php echo e(route('dashboard')); ?>">Dashboard</a></li>

                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="button" >Logout</buttontype>
                </form>
                <?php endif; ?>
            </ul>
        </div>
        <div class="main-content">
        <?php echo e($slot); ?>

        </div>
        </div>
    </body>
</html>
<?php /**PATH C:\Users\Rabikk\Desktop\SampleApp\resources\views/layouts/app.blade.php ENDPATH**/ ?>