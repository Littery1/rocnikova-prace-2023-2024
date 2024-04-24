<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\EventLocationController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('welcome');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/my-actions', function () {
    return Inertia::render('MyActions');
})->middleware(['auth', 'verified'])->name('my-actions');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('/eventes', EventController::class);
Route::resource('users', ProfileController::class);


Route::post('/eventsLocations', [EventLocationController::class, 'store'])->name('eventsLocations.store');
Route::post('/locations', [LocationController::class, 'store'])->name('locations.store');
Route::post('/events', [EventController::class, 'store'])->name('events.store');

Route::get('/events{id}', [EventController::class, 'show'])->name('events.show');

Route::get('/api/authenticated', function () {
    return response()->json(['authenticated' => Auth::check()]);
});
require __DIR__ . '/auth.php';
