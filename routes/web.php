<?php

use App\Livewire\Dashboard;
use App\Livewire\LoginForm;
use App\Livewire\OrderDetail;
use App\Livewire\OrderForm;
use App\Livewire\OrderList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/', 'login');
Route::middleware('guest')->get('login', LoginForm::class)->name('login');
Route::view('about', 'about')->name('about');
Route::get('logout', function() {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');
Route::middleware('auth')->group(function() {
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('order-form', OrderForm::class)->name('order-form');
    Route::get('order-list', OrderList::class)->name('order-list');
    Route::get('order-detail/{order}', OrderDetail::class)->name('order-detail');
});
