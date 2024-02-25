<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('phone-auth', [AuthenticatedSessionController::class, 'login'])->name('phone-auth');
    Route::get('verify-otp', [AuthenticatedSessionController::class, 'otp'])->name('verify-otp');
    Route::post('process', [AuthenticatedSessionController::class, 'storeLogin'])->name('process');

//    khi người dùng chưa đăng nhập mới có thể truy cập nó

});

Route::middleware(['auth'])->group(function () {
    //    khi người dùng  đăng nhập mới có thể truy cập nó
//    Route::get('verify-email', EmailVerificationPromptController::class)
//                ->name('verification.notice');


    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
