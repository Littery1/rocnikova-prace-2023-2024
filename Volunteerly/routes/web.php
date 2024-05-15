<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadImagesController;
use App\Http\Controllers\DeleteTemporaryImagesController;
use App\Http\Controllers\EventLocationController;
use App\Http\Controllers\UploadTemporaryImagesController;

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

Route::get('/upload-images', [UploadImagesController::class, 'index'])->name('uploadImages.index');
Route::post('/upload-images_upload', [UploadImagesController::class, 'upload'])->name('UploadImages.upload');
Route::post('/upload-temp-images', [UploadTemporaryImagesController::class, 'upload'])->name('UploadTemporaryImages.upload');
Route::delete('/revert/{folder}', [DeleteTemporaryImagesController::class, 'delete'])->name('DeleteTemporaryImages.delete');

Route::get('/', [EventController::class, 'index'])->name('welcome');
Route::get('/event{id}', [EventController::class, 'show'])->name('events.show');
Route::get('/api/authenticated', function () {
    return response()->json(['authenticated' => Auth::check()]);
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/my-events', [EventController::class, 'showMyEvents'])->name('my-events');  

    Route::get('/create-event', function () {
        return Inertia::render('Events/CreateEvent');
    })->name('create-event');

    Route::post('/eventsLocations', [EventLocationController::class, 'store'])->name('eventsLocations.index');

});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/users', ProfileController::class);


require __DIR__ . '/auth.php';
