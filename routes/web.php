<?php

use App\Http\Controllers\Admin\CampaignController as AdminCampaignController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group([
    'prefix' => 'user',
    'middleware' => 'auth'
], function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::put('/', [UserController::class, 'update'])->name('user.update');
    Route::get('/donations', [UserController::class, 'donations'])->name('user.donations');
});

// Route Auth
Route::middleware('guest')->group(function () {
    Route::get('registration', [AuthController::class, 'registration'])->name('registration');
    Route::post('registration', [AuthController::class, 'store']);
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticate']);
});
Route::delete('logout', [AuthController::class, 'logout'])->middleware('auth');

// Route Campaign
Route::resource('campaigns', CampaignController::class)->names('user.campaigns')->only([
    'index', 'show'
]);

Route::resource('campaigns.donations', DonationController::class)->only([
    'index', 'store'
]);

Route::get('payment/{donation}', [PaymentController::class, 'index'])->name('payment');

// Route Admim
Route::group([
    'prefix' => 'admin',
    'middleware' => 'auth.admin'
], function () {
    Route::get('/', [DashboardController::class, 'index']);

    Route::resource('/campaigns', AdminCampaignController::class)->scoped([
        'campaign' => 'slug'
    ]);
});
