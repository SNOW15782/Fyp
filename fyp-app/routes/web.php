<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomlistController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/roomlist', [RoomlistController::class, 'index'])->name('admindirect.index');
Route::get('/add/roomlist', [RoomlistController::class, 'create'])->name('admindirect.create');
Route::post('/roomlist', [RoomlistController::class, 'store'])->name('admindirect.store');
Route::get('/roomlist/{roomlist}/edit', [RoomlistController::class, 'edit'])->name('admindirect.edit');
Route::put('/roomlist/{roomlist}', [RoomlistController::class, 'update'])->name('admindirect.update');
Route::delete('/roomlist/{roomlist}/destroy', [RoomlistController::class, 'destroy'])->name('admindirect.destroy');



require __DIR__.'/auth.php';
