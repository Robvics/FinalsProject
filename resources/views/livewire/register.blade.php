<div>
<style>
    .body{
    margin: 0;
}

    .landing-banner{
    width: 100%;
    height: 100vh;
    background-image: url('/image/landingpagebg.jpg');
    background-image: cover;
    background-repeat: no-repeat;
    background-position: center;
    display: flex;
}

.landing-banner div{
    width: 50%;
    height: 100%;
}

.banner-left,
.banner-right{
    display: flex;
    justify-content: center;
    align-items: center;

}

.banner-left h1{
    font-size: 50px;
    color: white;
    font-family:Verdana, Geneva, Tahoma, sans-serif;
    font-weight: bold;

}

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
    border: 1px solid black;
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


<div class="landing-banner">

<div class="banner-left">
    <h1>Unibersity</h1>
    
</div>
<div class="banner-right">
    <div class="login-form"><br>
        <p>Register</p>
        
      <form wire:submit.prevent='register' style ="width:100%">
      <div style="width: 100%; height:80px">
      <label for="">Email</label>
      <input type="email" wire:model.live='email'> 
      @error('email')
      <p style="font-size: 14px; color:red">{{ $message }}</p>
      @enderror
      </div>

      <div style="width: 100%; height:80px">
      <label for="">Password</label>
      <input type="password" wire:model.live='password'><br>
      @error('password')
      <p style="font-size: 14px; color:red">{{ $message }}</p>
      @enderror
      </div>

      <div style="width: 100%; height:80px">
      <label for="">Confirm Password</label>
      <input type="password"wire:model.live='cpassword'><br>
      @error('cpassword')
      <p style="font-size: 14px; color:red">{{ $message }}</p>
      @enderror
      </div>

      <button type="submit" class="login-btn">Register</button>
      </form>
      <a href="/">Already have an account?</a>

      
    </div>
</div>
</div>    
</div>

@livewireScripts
