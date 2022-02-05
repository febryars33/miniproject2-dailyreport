<?php

use App\Http\Controllers\API\v1\AuthController;
use App\Http\Controllers\API\v1\PositionController;
use App\Http\Controllers\API\v1\SettingsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * APIs v1
 */
Route::group(['prefix' => 'v1'], function () {

    /**
     * Auth Routes
     */
    Route::group(['prefix' => 'auth'], function () {
        Route::post('/login', [AuthController::class, 'login'])->name('login');
        Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot_password');

        Route::group(['middleware' => 'auth:sanctum'], function () {
            Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        });
    });

    /**
     * Middleware
     */
    Route::group(['middleware' => 'auth:sanctum'], function () {

        // Session
        Route::group(['prefix' => 'session'], function () {
            Route::get('/userdata', [AuthController::class, 'userdata'])->name('userdata');
            Route::post('/change-password', [SettingsController::class, 'changePassword'])->name('change_password');
            Route::post('/change-bio', [AuthController::class, 'userdata_edit_bio'])->name('userdata_edit_bio');
        });

        Route::group(['prefix' => 'position'], function () {
            Route::get('/', [PositionController::class, 'index'])->name('position_index');
            Route::post('/', [PositionController::class, 'store'])->name('position_store');
            Route::delete('/', [PositionController::class, 'destroy'])->name('position_destroy');
        });
    });
});

Route::post('/password', [SettingsController::class, 'makeTestPassword'])->name('make_test_password');
