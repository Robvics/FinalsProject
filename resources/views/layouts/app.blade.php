<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Night Market' }}</title>
        <link rel="stylesheet" href="/css/home.css">
        <link rel="stylesheet" href="/css/cart.css">
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/product.css">
        <script src="https://kit.fontawesome.com/8f72ae1d7c.js" crossorigin="anonymous"></script>

        <link rel ="stylesheet" href="{{ asset('build/assets/app-D4Xn7t89.css') }}">
        @vite('resources/css/app.css')
        @livewireStyles

    </head>
    <body> 
        <div class="main">
           
        <div class="sidebar">
        <div style="display:flex; gap:20px;">
        <img src="/image/school.jpg" alt="Site Logo" width="50">
        <h4>Unibersity</h4>
        </div>
            <ul>
                @if(Auth::user()->user_role === 'customer')
                <li><a href ="{{ route('home') }}">Home</a></li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="button" >Logout</buttontype>
                </form>
                @else
                
                <li><a href ="{{ route('dashboard') }}">Dashboard</a></li>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="button" >Logout</buttontype>
                </form>
                @endif
            </ul>
        </div>
        <div class="main-content">
        {{ $slot }}
        </div>
        </div>
    </body>
</html>
