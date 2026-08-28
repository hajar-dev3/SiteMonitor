<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\SiteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\RecentChecksController;
use App\Http\Controllers\MonitoringController;

use App\Http\Controllers\Admin\SiteController as AdminSiteController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\StatisticsController as AdminStatisticsController;
use App\Http\Controllers\Admin\MonitoringController as AdminMonitoringController;



// =========================================================
// PUBLIC
// =========================================================

Route::view('/', 'welcome');


// =========================================================
// USER DASHBOARD
// =========================================================

Route::get('dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


// =========================================================
// USER PROFILE
// =========================================================

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


// =========================================================
// AUTHENTICATED USER ROUTES
// =========================================================

Route::middleware(['auth', 'verified'])->group(function () {

    // -----------------------------------------------------
    // Sites Management
    // -----------------------------------------------------

    Route::resource('sites', SiteController::class)
        ->except(['show']);


    // -----------------------------------------------------
    // Check Site Now
    // -----------------------------------------------------

    Route::post('/sites/{site}/check', [SiteController::class, 'check'])
        ->name('sites.check');


    // -----------------------------------------------------
    // Statistics
    // -----------------------------------------------------

    Route::get('/statistics', [StatisticsController::class, 'index'])
        ->name('statistics.index');


    // -----------------------------------------------------
    // Recent Checks
    // -----------------------------------------------------

    Route::get('/checks', [RecentChecksController::class, 'index'])
        ->name('checks.index');


    // -----------------------------------------------------
    // Monitoring
    // USER MONITORING - DON'T CHANGE
    // -----------------------------------------------------

    Route::get('/monitoring', [MonitoringController::class, 'index'])
        ->name('monitoring.index');

});


// =========================================================
// ADMIN ROUTES
// =========================================================

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->group(function () {

        // -----------------------------------------------------
        // Admin Dashboard
        // -----------------------------------------------------

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('admin.dashboard');
        
         // -----------------------------------------------------
            // Admin Profile
            // -----------------------------------------------------

            Route::view('/profile', 'admin.profile')
                ->name('admin.profile');

        // -----------------------------------------------------
        // Admin Statistics
        // -----------------------------------------------------

        Route::get('/statistics', [AdminStatisticsController::class, 'index'])
            ->name('admin.statistics.index');


        // -----------------------------------------------------
        // Admin Monitoring
        // -----------------------------------------------------

        Route::get('/monitoring', [AdminMonitoringController::class, 'index'])
            ->name('admin.monitoring.index');




        // =====================================================
        // USERS MANAGEMENT
        // =====================================================

        // Users List
        Route::get('/users', [AdminUserController::class, 'index'])
            ->name('admin.users.index');


        // Add User Form
        Route::get('/users/create', [AdminUserController::class, 'create'])
            ->name('admin.users.create');


        // Store New User
        Route::post('/users', [AdminUserController::class, 'store'])
            ->name('admin.users.store');


        // Edit User Form
        Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])
            ->name('admin.users.edit');


        // Update User
        Route::put('/users/{user}', [AdminUserController::class, 'update'])
            ->name('admin.users.update');


        // User Details
        Route::get('/users/{user}', [AdminUserController::class, 'show'])
            ->name('admin.users.show');


        // Delete User
        Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])
            ->name('admin.users.destroy');


        // =====================================================
        // SITES MANAGEMENT
        // =====================================================

        // Sites List
        Route::get('/sites', [AdminSiteController::class, 'index'])
            ->name('admin.sites.index');


        // Add Site Form
        Route::get('/sites/create', [AdminSiteController::class, 'create'])
            ->name('admin.sites.create');


        // Store New Site
        Route::post('/sites', [AdminSiteController::class, 'store'])
            ->name('admin.sites.store');


        // =====================================================
        // SITE DETAILS
        // =====================================================

        Route::get('/sites/{site}', [AdminSiteController::class, 'show'])
            ->name('admin.sites.show');


        // =====================================================
        // EDIT SITE
        // =====================================================

        Route::get('/sites/{site}/edit', [AdminSiteController::class, 'edit'])
            ->name('admin.sites.edit');


        // =====================================================
        // UPDATE SITE
        // =====================================================

        Route::put('/sites/{site}', [AdminSiteController::class, 'update'])
            ->name('admin.sites.update');


        // =====================================================
        // DELETE SITE
        // =====================================================

        Route::delete('/sites/{site}', [AdminSiteController::class, 'destroy'])
            ->name('admin.sites.destroy');

    });

        // =========================================================
        // LOGOUT
        // =========================================================

        Route::post('/logout', function (Request $request) {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/');
        })->name('logout');

// =========================================================
// AUTHENTICATION ROUTES
// =========================================================

require __DIR__ . '/auth.php';