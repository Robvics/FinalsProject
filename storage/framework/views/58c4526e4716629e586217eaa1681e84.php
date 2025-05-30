<div class="login-form"><br>
<style>
    .login-form{
    width: 400px !important;
    height: 500px!important;
    background: white;
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 20px;
    gap: 15px;

}

.login-form input{
    width:100%;
    height: 40px;
    border-radius: 10px;
    border: 1px solid lightcoral;
}

.login-btn{
    width: 100%;
    height: 40px;
    border-radius: 10px;
    background: blue;
    color: white;
    border: none;
}

.login-form p{
    font-size: 28px;
    color: black;
    font-weight: bold;
    font-family: Verdana, Geneva, Tahoma, sans-serif;

}

</style>
            <form wire:submit.prevent='login' style="width:100%">
            <p>Login</p>
            <div style="width: 100%; height:80px">
            <label>Email</label>
              <input type="text" wire:model='email'>
              <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <p style="font-size: 14px; color:red"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div> 
            
            <div style="width: 100%; height:80px">
              <label>Password</label>
              <input type="password" wire:model='password'>
              <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <p style="font-size: 14px; color:red"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]--><br>
              </div>

              <button type ="submit" class="login-btn">Login</button>
              <p style="font-size: 14px; color:red;"><?php echo e($loginMessage); ?></p>
              <a href="/register">Don't have an account?</a>
              </form>
            </div>
<?php /**PATH C:\Users\Rabikk\Desktop\SampleApp\resources\views/livewire/login.blade.php ENDPATH**/ ?>