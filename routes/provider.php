<?php

use App\Http\Controllers\Provider\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Provider\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Provider\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Provider\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Provider\Auth\NewPasswordController;
use App\Http\Controllers\Provider\Auth\PasswordResetLinkController;
use App\Http\Controllers\Provider\Auth\RegisteredUserController;
use App\Http\Controllers\Provider\Auth\VerifyEmailController;
use App\Http\Controllers\Provider\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('provider')->name('provider.')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])
        ->middleware(['auth:provider']);

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware(['auth:provider'])
        ->name('dashboard');

    Route::get('/dashboard', [DashboardController::class, 'provtrans'])
        ->middleware(['auth:provider'])
        ->name('dashboard');

    Route::get('/register', [RegisteredUserController::class, 'create'])
        ->middleware('guest:provider')
        ->name('register');

    Route::post('/register', [RegisteredUserController::class, 'store'])
        ->middleware('guest:provider');

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->middleware('guest:provider')
        ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest:provider');

    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
        ->middleware('guest:provider')
        ->name('password.request');

    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->middleware('guest:provider')
        ->name('password.email');

    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
        ->middleware('guest:provider')
        ->name('password.reset');

    Route::post('/reset-password', [NewPasswordController::class, 'store'])
        ->middleware('guest:provider')
        ->name('password.update');

    Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
        ->middleware('auth:provider')
        ->name('verification.notice');

    Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['auth:provider', 'signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware(['auth:provider', 'throttle:6,1'])
        ->name('verification.send');

    Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->middleware('auth:provider')
        ->name('password.confirm');

    Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
        ->middleware('auth:provider');

    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth:provider')
        ->name('logout');
});
