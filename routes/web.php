<?php

use App\Http\Controllers\Admin\CampaignController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Models\Campaign;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\DB;
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

Route::get('/', [HomeController::class, 'index']);

Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/settings', [UserController::class, 'settings']);
    Route::get('/donations', [UserController::class, 'donations']);
});

Route::get('/test', function () {
    // test
});

// Route Auth
Route::get('registration', [AuthController::class, 'registration']);
Route::post('registration', [AuthController::class, 'store']);
Route::get('login', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'authenticate']);
Route::delete('logout', [AuthController::class, 'logout']);

// Route Admim
Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);

    Route::resource('/campaigns', CampaignController::class)->scoped([
        'campaign' => 'slug'
    ]);
    Route::resource('/payments', PaymentController::class);
});
