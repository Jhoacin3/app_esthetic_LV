<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthClient\LoginClientController;
use App\Http\Controllers\AuthClient\AuthClientRegisteredUserController;
use App\Http\Controllers\AuthClient\AuthClientAuthenticatedSessionController;
use App\Http\Controllers\AuthClient\RegisterClientController;
use App\Http\Controllers\AuthClient\AuthClientPasswordResetLinkController;
use App\Http\Controllers\AuthClient\AuthClientConfirmablePasswordController;
use App\Http\Controllers\AuthClient\AuthClientEmailVerificationNotificationController;
use App\Http\Controllers\AuthClient\AuthClientEmailVerificationPromptController;
use App\Http\Controllers\AuthClient\AuthClientNewPasswordController;
use App\Http\Controllers\AuthClient\AuthClientVerifyEmailController;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});

//////////////////////////////////////////////Cliente

Route::middleware('guest')->group(function () {
    Route::get('register-cliente', [AuthClientRegisteredUserController::class, 'create'])
                ->name('register-cliente');

    Route::post('register-cliente', [AuthClientRegisteredUserController::class, 'store']);

    Route::get('login-cliente', [AuthClientAuthenticatedSessionController::class, 'create'])
                ->name('login-cliente');

    Route::post('login-cliente', [AuthClientAuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password-cliente', [AuthClientPasswordResetLinkController::class, 'create'])
                ->name('password.request.cliente');

    Route::post('forgot-password-cliente', [AuthClientPasswordResetLinkController::class, 'store'])
                ->name('password.email.cliente');

    Route::get('reset-password-cliente/{token}', [AuthClientNewPasswordController::class, 'create'])
                ->name('password.reset.cliente');

    Route::post('reset-password-cliente', [AuthClientNewPasswordController::class, 'store'])
                ->name('password.store.cliente');
});

Route::middleware('auth:cliente')->group(function () {
    Route::get('verify-email-cliente', [AuthClientEmailVerificationPromptController::class, 'show'])
    ->name('verification.notice.cliente');

    Route::get('verify-email-cliente/{id}/{hash}', [AuthClientVerifyEmailController::class, 'verify'])
    ->middleware(['signed', 'throttle:6,1'])
    ->name('verification.verify.cliente');

    Route::post('email/verification-notification-cliente', [AuthClientEmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send.cliente');

    Route::get('confirm-password-cliente', [AuthClientConfirmablePasswordController::class, 'show'])
                ->name('password.confirm.cliente');

    Route::post('confirm-password-cliente', [AuthClientConfirmablePasswordController::class, 'store']);

    Route::put('password-cliente', [AuthClientPasswordController::class, 'update'])->name('password.update.cliente');

    Route::post('logout-cliente', [AuthClientAuthenticatedSessionController::class, 'destroy'])
                ->name('logout.cliente');
});
