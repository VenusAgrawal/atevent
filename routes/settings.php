<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Settings\SettingsController;
use App\Http\Controllers\Settings\EmailNotifyController;
use App\Http\Controllers\Settings\EmailVerifyController;
use App\Http\Controllers\Settings\DeleteProfileController;
use App\Http\Controllers\Settings\UpdateProfileController;
use App\Http\Controllers\Settings\UpdateAddressController;
use App\Http\Controllers\Settings\UpdateContactController;
use App\Http\Controllers\Settings\UpdatePasswordController;


// user
Route::get('/settings', [SettingsController::class, 'index'])
    ->middleware(['auth'])
    ->name('settings.profile.index');

Route::put('/settings/profile/update', [UpdateProfileController::class, 'update'])
    ->middleware(['auth'])
    ->name('settings.profile.update');

Route::put('/settings/contact/update', [UpdateContactController::class, 'update'])
    ->middleware(['auth'])
    ->name('settings.contact.update');

Route::put('/settings/address/update', [UpdateAddressController::class, 'update'])
    ->middleware(['auth'])
    ->name('settings.address.update');

Route::delete('/settings/account/delete', [DeleteProfileController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('settings.account.delete');

Route::put('/settings/password/update', [UpdatePasswordController::class, 'update'])
    ->middleware(['auth'])
    ->name('settings.password.update');

Route::post('/settings/email-notify', [EmailNotifyController::class, '__invoke'])
    ->middleware(['auth'])
    ->name('settings.email.notify');

Route::get('settings/email-verify/{id}/{email}', [EmailVerifyController::class, 'verify'])
    ->middleware(['auth', 'signed'])
    ->name('settings.email.verify');


// provider
Route::prefix('provider')->name('provider.')->group(function () {
    Route::get('/settings', [SettingsController::class, 'index'])
        ->middleware(['auth:provider'])
        ->name('settings.profile.index');

    Route::put('/settings/profile/update', [UpdateProfileController::class, 'update'])
        ->middleware(['auth:provider'])
        ->name('settings.profile.update');

    Route::put('/settings/contact/update', [UpdateContactController::class, 'update'])
        ->middleware(['auth:provider'])
        ->name('settings.contact.update');

    Route::put('/settings/address/update', [UpdateAddressController::class, 'update'])
        ->middleware(['auth:provider'])
        ->name('settings.address.update');

    Route::delete('/settings/account/delete', [DeleteProfileController::class, 'destroy'])
        ->middleware(['auth:provider'])
        ->name('settings.account.delete');

    Route::put('/settings/password/update', [UpdatePasswordController::class, 'update'])
        ->middleware(['auth:provider'])
        ->name('settings.password.update');

    Route::post('/settings/email-notify', [EmailNotifyController::class, '__invoke'])
        ->middleware(['auth:provider'])
        ->name('settings.email.notify');

    Route::get('settings/email-verify/{id}/{email}', [EmailVerifyController::class, 'verify'])
        ->middleware(['auth:provider', 'signed'])
        ->name('settings.email.verify');
});
