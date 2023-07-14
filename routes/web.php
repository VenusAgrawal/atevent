<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\SearchController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// homepage (all properties)
Route::get('/', [PropertiesController::class, 'index'])->name('homepage');

// single property pages (description)
Route::get('/description/{id}', [PropertiesController::class, 'show'])->name('description');

// upload file
Route::get('/upload-file', [PropertiesController::class, 'upload_file']);
Route::post('/upload-file', [PropertiesController::class, 'upload_file_submit']);

// landing page for provider
Route::get('/provider/connect', function () {
    return view('provider.connect');
})->name('connect');

// about us page
Route::get('/aboutus', function () {
    return view('aboutus');
})->name('aboutus');

// transaction
Route::get('/transaction/{id}', [TransactionController::class, 'create'])->name('transaction');
Route::put('/transaction/{id}', [TransactionController::class, 'store']);

// search
Route::get('/search', [SearchController::class, 'search']);

// contact form pages
Route::prefix('contact')->name('contact.')->group(function () {
    Route::get('/contact-form', [ContactController::class, 'contactForm'])->name('contact');
    Route::post('/contact-form', [ContactController::class, 'storeContactForm'])->name('contact-form.store');
});

// dashboard (user profile pages)
Route::get('/dashboard', [TransactionController::class, 'trans'])->middleware(['auth', 'verified'])->name('dashboard');

// property category pages
Route::get('category/{event}', [PropertiesController::class, 'get_data_categories'])->name('category');

// add property
Route::prefix('provider')->name('provider.')->group(function () {
    Route::get('/register-property', [PropertiesController::class, 'create'])->name('register-property');
    Route::put('/update-property', [PropertiesController::class, 'store']);
});


require __DIR__ . '/auth.php';
require __DIR__ . '/settings.php';
require __DIR__ . '/provider.php';
