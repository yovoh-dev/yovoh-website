<?php

use App\Http\Controllers\Admin\BudgetItemController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ImplementationPhaseController;
use App\Http\Controllers\Admin\PillarController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\StakeholderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Web Routes - Young Voices of Hope (YoVoH) Marsabit
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/programs', [PageController::class, 'programs'])->name('programs');
Route::get('/impact', [PageController::class, 'impact'])->name('impact');
Route::get('/partners', [PageController::class, 'partners'])->name('partners');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.submit');

/*
|--------------------------------------------------------------------------
| Authentication (staff login only — no public self-registration)
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

/*
|--------------------------------------------------------------------------
| Admin area — requires an authenticated admin or super admin
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('pillars', PillarController::class)->except(['show']);
    Route::resource('budget-items', BudgetItemController::class)->except(['show']);
    Route::resource('stakeholders', StakeholderController::class)->except(['show']);
    Route::resource('phases', ImplementationPhaseController::class)->except(['show']);

    Route::get('messages', [ContactMessageController::class, 'index'])->name('messages.index');
    Route::get('messages/{message}', [ContactMessageController::class, 'show'])->name('messages.show');
    Route::delete('messages/{message}', [ContactMessageController::class, 'destroy'])->name('messages.destroy');

    Route::get('settings', [SettingController::class, 'edit'])->name('settings.edit');
    Route::put('settings', [SettingController::class, 'update'])->name('settings.update');

    // Super-admin only: managing admin accounts themselves
    Route::middleware('super_admin')->group(function () {
        Route::resource('users', UserController::class)->except(['show']);
    });
});
