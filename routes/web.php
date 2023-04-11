<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ReplayController;
use App\Http\Controllers\Settings\UserController;
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

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/auth', [AuthController::class, 'login'])->name('auth');

Route::middleware(['auth', 'auth.session'])->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.dashboard.index');
    })->name('dashboard');

    Route::resource('tracking', PositionController::class);
    Route::get('/replay', [ReplayController::class, 'index'])->name('replay');
    Route::resource('devices', DeviceController::class);
    Route::resource('messages', MessageController::class);

    //Settings Route
    Route::prefix('settings')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('settings.index');
        Route::resource('accounts', UserController::class);

        //List Data
        Route::get('/list/users', [UserController::class, 'userLists'])->name('user-list');
    });

    //User Account
    Route::get('/account/{user}/edit', [AccountController::class, 'edit'])->name('account.edit');
    Route::put('/account/{user}', [AccountController::class, 'update'])->name('account.update');

    //List Data
    Route::get('/list/devices', [DeviceController::class, 'deviceLists'])->name('device-list');
    Route::get('/list/messages', [MessageController::class, 'messageLists'])->name('message-list');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    //TESTING ROUTE
    Route::get('/deviceInfo', [PositionController::class, 'deviceInfo'])->name('deviceInfo');
});
