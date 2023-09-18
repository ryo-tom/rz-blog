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
Route::get('posts/{slug}', [VisitorPostController::class, 'show'])->name('posts.show');
Route::get('filter', [VisitorPostController::class, 'index'])->name('posts.filter');
Route::get('posts/actions/search', [VisitorPostController::class, 'search'])->name('posts.search'); // Ajax Search

Route::middleware('auth')->group(function () {
    Route::get('admin', function () {
        return view('admin.dashboard');
    });

    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('admin/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::patch('admin/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('admin/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    Route::get('admin/posts', [PostController::class, 'index'])->name('admin.posts.index');
    Route::get('admin/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
    Route::post('admin/posts', [PostController::class, 'store'])->name('admin.posts.store');
    Route::get('admin/posts/{post}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
    Route::patch('admin/posts/{post}', [PostController::class, 'update'])->name('admin.posts.update');
    Route::delete('admin/posts/{post}', [PostController::class, 'destroy'])->name('admin.posts.destroy');

    Route::get('admin/tags', [TagController::class, 'index'])->name('admin.tags.index');
    Route::get('admin/tags/create', [TagController::class, 'create'])->name('admin.tags.create');
    Route::post('admin/tags', [TagController::class, 'store'])->name('admin.tags.store');
    Route::get('admin/tags/{tag}/edit', [TagController::class, 'edit'])->name('admin.tags.edit');
    Route::patch('admin/tags/{tag}', [TagController::class, 'update'])->name('admin.tags.update');
    Route::delete('admin/tags/{tag}', [TagController::class, 'destroy'])->name('admin.tags.destroy');
});

require __DIR__.'/auth.php';
