<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExhibitorController;
use App\Http\Controllers\Admin\ProgramSessionController;
use App\Http\Controllers\Admin\RegistrationController;
use App\Http\Controllers\Admin\SpeakerController;
use App\Http\Controllers\Admin\SponsorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin panel routes
|--------------------------------------------------------------------------
| Everything behind the admin login: content management for the public
| site plus registration reporting. Public site routes live in
| routes/web.php.
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('speakers', SpeakerController::class)->except('show');
        Route::resource('sponsors', SponsorController::class)->except('show');
        Route::resource('exhibitors', ExhibitorController::class)->except('show');
        Route::resource('program', ProgramSessionController::class)
            ->except('show')
            ->parameters(['program' => 'program_session']);

        Route::get('/registrations/export', [RegistrationController::class, 'export'])->name('registrations.export');
        Route::get('/registrations', [RegistrationController::class, 'index'])->name('registrations.index');
        Route::get('/registrations/{registration}', [RegistrationController::class, 'show'])->name('registrations.show');
    });
});
