<?php
use Phplite\Router\Route;

Route::prefix('admin-panel', function () {
    // Guest Admin routes
    Route::middleware('GuestAdmin', function () {
        // Login page
        Route::get('/', 'Admin\AuthController@index');
        Route::post('/', 'Admin\AuthController@submit');
    });
    // Auth admin routes
    Route::middleware('AuthAdmin', function () {
        // Dashboard page
        Route::get('/dashboard', 'Admin\DashboardController@index');
     
        // Logout page
        Route::post('/logout', 'Admin\AuthController@logout');
    });
});