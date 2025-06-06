<?php

use App\Livewire\Admin\Dasboard;
use App\Livewire\Admin\Products;
use App\Livewire\Home;
use App\Livewire\Cart;
use App\Livewire\Checkout;
use App\Livewire\OrderManagement;
use App\Http\Controllers\PdfController; // Ensure this use statement is present
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {return view('welcome');})->name('/');

Route::get('/register', function () {
    return view('livewire.reg');
});


    Route::middleware(['auth','checkrole:customer'])->group((function (){
        Route::get('/home',Home::class)->name('home');
        Route::get('/Cart',Cart::class)->name('Cart');
        Route::get('/checkout', Checkout::class)->name('checkout');
        Route::get('/orders', OrderManagement::class)->name('orders');
    }));

    Route::middleware(['auth','checkrole:admin'])->group((function (){
        Route::get('/dashboard',Dasboard::class)->name('dashboard');
        Route::get('/products',Products::class)->name('dashboard');
        // Add the PDF export route here
        Route::get('/export-student-pdf', [PdfController::class, 'exportStudentPdf'])->name('export.student.pdf');
    }));


Route::post('/', function (){
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
}) ->name('logout');