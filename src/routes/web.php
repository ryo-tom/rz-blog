<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Visitor\PostController as VisitorPostController;
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

Route::get('/', [VisitorPostController::class, 'index'])->name('home');
Route::get('filter', [VisitorPostController::class, 'filter'])->name('home.filter');
Route::get('posts/{slug}', [VisitorPostController::class, 'show'])->name('post.show');

Route::middleware('auth')->group(function () {
    Route::get('admin', function () {
        return view('admin.dashboard');
    });

    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('admin/categories', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('admin/categories/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('admin/categories', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::patch('admin/categories/{category}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('admin/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');

    Route::get('admin/posts', [PostController::class, 'index'])->name('admin.post.index');
    Route::get('admin/posts/create', [PostController::class, 'create'])->name('admin.post.create');
    Route::post('admin/posts', [PostController::class, 'store'])->name('admin.post.store');
    Route::get('admin/posts/{post}/edit', [PostController::class, 'edit'])->name('admin.post.edit');
    Route::patch('admin/posts/{post}', [PostController::class, 'update'])->name('admin.post.update');
    Route::delete('admin/posts/{post}', [PostController::class, 'destroy'])->name('admin.post.destroy');

    Route::get('admin/tags', [TagController::class, 'index'])->name('admin.tag.index');
    Route::get('admin/tags/create', [TagController::class, 'create'])->name('admin.tag.create');
    Route::post('admin/tags', [TagController::class, 'store'])->name('admin.tag.store');
    Route::get('admin/tags/{tag}/edit', [TagController::class, 'edit'])->name('admin.tag.edit');
    Route::patch('admin/tags/{tag}', [TagController::class, 'update'])->name('admin.tag.update');
    Route::delete('admin/tags/{tag}', [TagController::class, 'destroy'])->name('admin.tag.destroy');
});

require __DIR__.'/auth.php';
