<?php

use App\Http\Controllers\PostController;
// use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
// use Spatie\Permission\Models\Role;

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

Route::middleware(['auth'])->group(function () {
    // Route::get('/dashboard', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');
    
    Route::get('add-post', [PostController::class, 'create'])->name('add-post1');
    Route::post('store-post', [PostController::class, 'store'])->name('store-post1');
    Route::get('edit-post/{id}', [PostController::class, 'edit'])->name('edit-post1');
    Route::put('update-post/{id}', [PostController::class, 'update'])->name('update-post1');
    Route::delete('delete-post/{id}', [PostController::class, 'delete'])->name('delete-post1');
    
    Route::resource('roles', RoleController::class);
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
