<?php

use App\Http\Controllers\Panel\AuthorController;
use App\Http\Controllers\Panel\PostController;
use App\Http\Controllers\Panel\RoleController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('posts', [PostController::class, 'index'])->name('posts');
    Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('authors', [AuthorController::class, 'index'])->name('authors');

    Route::get('/roles', [RoleController::class, 'index'])->name('roles');
    Route::get('/roles/edit-add/{role?}', [RoleController::class, 'editAdd'])->name('roles.edit-add');
    Route::delete('/roles/{role}', [RoleController::class, 'delete'])->name('roles.delete');
});
