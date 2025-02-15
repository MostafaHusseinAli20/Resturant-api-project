<?php

use App\Http\Controllers\Auth\Admin\AuthAdminController;
use App\Http\Controllers\Auth\Customer\AuthCustomerController;
use App\Http\Controllers\Auth\Employee\AuthEmployeeController;
use App\Http\Controllers\System\Categories\CategoryController;
use App\Http\Controllers\System\Departments\DepartmentController;
use App\Http\Controllers\System\EmployeeDashboard\EmployeeController;
use App\Http\Controllers\System\Events\EventController;
use App\Http\Controllers\System\Feedbacks\FeedbdackController;
use App\Http\Controllers\System\Hero\HeroSectionController;
use App\Http\Controllers\System\Menus\MenuItemController;
use App\Http\Controllers\System\Orders\OrderController;
use App\Http\Controllers\System\Orders\OrderItemController;
use App\Http\Controllers\System\Payments\PaymentController;
use App\Http\Controllers\System\Promotions\PromotionController;
use App\Http\Controllers\System\Reservations\ReservationController;
use App\Http\Controllers\System\Roles\RoleController;
use App\Http\Controllers\System\Tables\TableController;
use Illuminate\Support\Facades\Route;

// Auth Routes
Route::prefix('auth')->group(function () {
    // Customer Auth
    Route::prefix('customer')->group(function () {
        Route::post('register', [AuthCustomerController::class, 'register']);
        Route::post('login', [AuthCustomerController::class, 'login']);
        Route::middleware(['auth:customer'])->group(function () {
            Route::get('user', [AuthCustomerController::class, 'getUser']);
            Route::post('logout', [AuthCustomerController::class, 'logout']);
        });
    });

    // Admin Auth
    Route::prefix('admin')->group(function () {
        Route::post('register', [AuthAdminController::class, 'register']);
        Route::post('login', [AuthAdminController::class, 'login']);

        Route::middleware(['auth:admin'])->group(function () {
            Route::get('admin', [AuthAdminController::class, 'getUser']);
            Route::post('logout', [AuthAdminController::class, 'logout']);
        });
    });

    // Employee Auth
    Route::prefix('employee')->group(function () {
        Route::post('register', [AuthEmployeeController::class, 'register']);
        Route::post('login', [AuthEmployeeController::class, 'login']);
    
        Route::middleware(['auth:employee'])->group(function () {
            Route::get('profile', [AuthEmployeeController::class, 'getUser']);
            Route::post('logout', [AuthEmployeeController::class, 'logout']);
        });
    });
});

// System

// Hero Section
Route::get('/home', [HeroSectionController::class, 'index']);

// Categories Routes
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/show/{id}', [CategoryController::class, 'show']);

// Menus Routes
Route::get('/menus', [MenuItemController::class, 'index']);
Route::get('/menu_item/{id}', [MenuItemController::class, 'show']);

// Table Route
Route::get('/tables', [TableController::class, 'index']);

// Feedback Route
Route::get('/feedbacks', [FeedbdackController::class, 'index']);

// Event Routes
Route::get('/events', [EventController::class, 'index']);
Route::get('/event/show/{id}', [EventController::class, 'show']);

// Admin Dashboard Routes 
Route::middleware(['auth:admin'])->prefix('admin/dashboard')->group(function () {
    // Hero Section Added
    Route::post('/hero/store', [HeroSectionController::class,'store']);

    // Categories
    Route::post('/category/store', [CategoryController::class, 'store']);
    Route::post('/category/update/{id}', [CategoryController::class, 'update']);
    Route::delete('/category/destroy/{id}', [CategoryController::class, 'destroy']);

    // Role
    Route::get('/role', [RoleController::class, 'index']);
    Route::get('/role/create', [RoleController::class, 'create']);
    Route::post('/role/store', [RoleController::class, 'store']);
    Route::get('/show/{id}', [RoleController::class, 'show']);
    Route::post('/role/update/{id}', [RoleController::class, 'update']);
    Route::delete('/role/destroy/{id}', [RoleController::class, 'destroy']);

    // Departments
    Route::get('/departments', [DepartmentController::class, 'index']);
    Route::get('/department/show/{id}', [DepartmentController::class, 'show']);
    Route::post('/department/store', [DepartmentController::class, 'store']);
    Route::post('/department/update/{id}', [DepartmentController::class, 'update']);
    Route::delete('/department/delete/{id}', [DepartmentController::class, 'destroy']);

    // Menu Items
    Route::post('/menu_item/store', [MenuItemController::class, 'store']);
    Route::post('/menu_item/update/{id}', [MenuItemController::class, 'update']);
    Route::delete('/menu_item/delete/{id}', [MenuItemController::class, 'destroy']);

    // Orders Routes
    Route::get('/orders', [OrderController::class,'index']);
    Route::get('/order/show/{id}', [OrderController::class,'show']);
   

    // Order Item Routes
    Route::get('/order_item/show/{id}', [OrderItemController::class, 'show']);
    Route::post('/order_item/store', [OrderItemController::class,'store']);

    // Tables Route
    Route::get('/table/show/{id}', [TableController::class, 'show']);
    Route::post('/table/store', [TableController::class, 'store']);
    Route::post('/table/update/{id}', [TableController::class, 'update']);
    Route::delete('/table/delete/{id}', [TableController::class, 'destroy']);

    // Reservation Routes
    Route::get('/reservation', [ReservationController::class, 'index']);
    Route::get('/reservation/show/{id}', [ReservationController::class, 'show']);
    Route::post('/reservation/store', [ReservationController::class, 'store']);
    Route::post('/reservation/update/{id}', [ReservationController::class, 'update']);
    Route::delete('/reservation/delete/{id}', [ReservationController::class, 'destroy']);

    // Promotions Routes
    Route::get('/promotions', [PromotionController::class, 'index']);
    Route::get('/promotion/show/{id}', [PromotionController::class, 'show']);
    Route::post('/promotion/store', [PromotionController::class, 'store']);
    Route::post('/promotion/update/{id}', [PromotionController::class, 'update']);
    Route::delete('/promotion/delete/{id}', [PromotionController::class, 'destroy']);

    // Events Routes
    Route::post('/event/store', [EventController::class, 'store']);
    Route::post('/event/update/{id}', [EventController::class, 'update']);
    Route::delete('/event/delete/{id}', [EventController::class, 'destroy']);

    // Payment Admin Show
    Route::get('/payments', [PaymentController::class, 'index']);
});

// Employee Dashboard Routes
Route::middleware(['auth:employee'])->prefix('employee/dashboard')->group(function () {
    Route::get('/employees', [EmployeeController::class, 'index']);
    // Route::get('/employee/user', [EmployeeController::class,'indexEmployee']);
    Route::get('/employee/show/{id}', [EmployeeController::class, 'show']);
    Route::post('/employee/update/{id}', [EmployeeController::class, 'update']);
    Route::delete('/employee/delete/{id}', [EmployeeController::class, 'destroy']);
});

Route::middleware(['auth:customer'])->prefix('/customer')->group(function () {
    // Reservation
    Route::get('/reservation/show', [ReservationController::class, 'showCustomerReservation']);
    Route::delete('/reservation/delete', [ReservationController::class, 'deleteCustomerReservation']);
    
    // Feedback Routes
    Route::post('/feedback/store', [FeedbdackController::class, 'store']);
    Route::post('/feedback/update/{id}', [FeedbdackController::class, 'update']);
    Route::delete('/feedback/delete/{id}', [FeedbdackController::class, 'destroy']);
    
    // Payment Customer Routes
    Route::post('/payment/store', [PaymentController::class, 'store']);
    
    // Orders Customer Routes
    Route::get('/order/show', [OrderController::class, 'showCustomerOrders']);
    Route::post('/order/store', [OrderController::class,'store']);
    Route::post('/order/update/{id}', [OrderController::class,'update']);
    Route::delete('/order/delete/{id}', [OrderController::class,'destroy']);
});
