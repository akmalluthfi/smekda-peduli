<?php

use App\Http\Controllers\Admin\CampaignController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PaymentController;
use App\Models\Campaign;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    // test
});

// Route Admim
Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);

    Route::resource('/campaigns', CampaignController::class)->scoped([
        'campaign' => 'slug'
    ]);
    Route::resource('/payments', PaymentController::class);
});
