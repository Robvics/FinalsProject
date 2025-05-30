<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type ="image"/x-icon" href="/image/school.jpg">
        <script src="https://kit.fontawesome.com/8f72ae1d7c.js" crossorigin="anonymous"></script>
        <title>Unibersity</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel ="stylesheet" href="/css/landingpage.css">
        
        
    </head>
    <body class="antialiased">
    
        <div class="landing-banner">

        <div class="banner-left">
            <h1>Unibersity</h1>
            
        </div>
        <div class="banner-right">

            
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('login');

$__html = app('livewire')->mount($__name, $__params, 'lw-3073086627-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        
    </div>
    </div>        

    </body>
</html>
<?php /**PATH C:\Users\Rabikk\Desktop\SampleApp\resources\views/welcome.blade.php ENDPATH**/ ?>