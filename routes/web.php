<?php

use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\PaymentController;
use App\Http\Controllers\Site\ProgramController;
use App\Http\Controllers\Site\RegistrationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public site routes
|--------------------------------------------------------------------------
| Everything a visitor can reach without logging in: marketing pages,
| the conference program, and the registration/payment flow. Admin
| routes live in routes/admin.php.
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/venue', [HomeController::class, 'venue'])->name('venue');
Route::get('/program', [ProgramController::class, 'index'])->name('program');

Route::get('/register', [RegistrationController::class, 'create'])->name('registration.create');
Route::post('/register', [RegistrationController::class, 'store'])->name('registration.store');
Route::get('/register/{registration}/pay', [PaymentController::class, 'show'])->name('payment.show');
Route::post('/register/{registration}/pay', [PaymentController::class, 'process'])->name('payment.process');
Route::get('/register/{registration}/success', [PaymentController::class, 'success'])->name('registration.success');
