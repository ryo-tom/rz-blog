<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get(config('myconf.login_route'), [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post(config('myconf.login_route'), [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| ※※開発用テストログイン※※
|--------------------------------------------------------------------------
|
*/
Route::middleware('guest')->group(function () {
    if (app()->environment('local')) {
        Route::get('login-test/{id}', function ($id) {
            $user = App\Models\User::find($id);
            if (!$user) {
                return "パラメータが間違っています。";
            }
            Auth::loginUsingId($id);
            return redirect('admin');
        });
    }
});
