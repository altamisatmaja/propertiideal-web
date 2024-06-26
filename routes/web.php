<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Layout\AboutUsLayout;
use App\Http\Controllers\Layout\BuyLayout;
use App\Http\Controllers\Layout\LandingLayout;
use App\Http\Controllers\Layout\PartnerLayout;
use App\Http\Controllers\Layout\RentLayout;
use App\Http\Controllers\Layout\SellLayout;
use App\Http\Controllers\Layout\ServicesLayout;
use App\Http\Controllers\Layout\SolutionsLayout;
use Illuminate\Support\Facades\Route;

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


/*
|--------------------------------------------------------------------------
| Routes for User
|--------------------------------------------------------------------------
|
| Landing pages
|
*/

Route::get('/', [LandingLayout::class, 'index'])->name('home.landing.page');
Route::get('/layanan', [ServicesLayout::class, 'index'])->name('home.services.page');
Route::get('/jual', [SellLayout::class, 'index'])->name('home.sell.page');
Route::get('/beli', [BuyLayout::class, 'index'])->name('home.buy.page');
Route::get('/sewa', [RentLayout::class, 'index'])->name('home.rent.page');
Route::get('/partner', [PartnerLayout::class, 'index'])->name('home.partner.page');
Route::get('/solusi', [SolutionsLayout::class, 'index'])->name('home.solution.page');
Route::get('/tentang', [AboutUsLayout::class, 'index'])->name('home.about.page');

/*
|--------------------------------------------------------------------------
| Routes for User
|--------------------------------------------------------------------------
|
| Details services components
|
*/

/*
|--------------------------------------------------------------------------
| Routes for User
|--------------------------------------------------------------------------
|
| Details markets
|
*/

/*
|--------------------------------------------------------------------------
| Routes for User
|--------------------------------------------------------------------------
|
| Details solutions
|
*/


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Routes for Auth
|--------------------------------------------------------------------------
|
*/

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
                ->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});

/*
|--------------------------------------------------------------------------
| Routes for Admin
|--------------------------------------------------------------------------
|
*/