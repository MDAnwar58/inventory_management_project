<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerificationMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(TokenVerificationMiddleware::class);
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/{id}', [CategoryController::class, 'show']);
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'show']);

// api routes
Route::post('/user-registration', [UserController::class, 'UserRegistration']);
Route::post('/user-login', [UserController::class, 'userLogin']);
Route::post('/send-otp', [UserController::class, 'SendOTPCode']);
Route::post('/verify-otp', [UserController::class, 'VerifyOTP']);
Route::post('/reset-password', [UserController::class, 'ResetPass'])->middleware([TokenVerificationMiddleware::class]);

// user profile and profile update routes
Route::get('/user-profile', [UserController::class, 'UserProfile'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/user-update', [UserController::class, 'UpdateProfile'])->middleware([TokenVerificationMiddleware::class]);
// user logout route
Route::get('/logout', [UserController::class, 'UserLogout']);

// page routes 
Route::get('/userLogin', [UserController::class, 'LoginPage']);
Route::get('/userRegistration', [UserController::class, 'RegistrationPage']);
Route::get('/sendOTP', [UserController::class, 'SendOtpPage']);
Route::get('/verifyOTP', [UserController::class, 'VerifyOtpPage']);
Route::get('/resetPassword', [UserController::class, 'ResetPasswordPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/dashboard', [DashboardController::class, 'Dashboard'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/userProfile', [UserController::class, 'ProfilePage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/categoryPage', [CategoryController::class, 'CategoryPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/customerPage', [CustomerController::class, 'CustomerPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/productPage', [ProductController::class, 'ProductPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/invoicePage', [InvoiceController::class, 'invoicePage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/salePage', [InvoiceController::class, 'salePage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/reportPage', [ReportController::class, 'reportPage'])->middleware([TokenVerificationMiddleware::class]);


// dashboard API
Route::get('/summary', [DashboardController::class, 'Summery'])->middleware([TokenVerificationMiddleware::class]);

// Category API
Route::post('/create-category', [CategoryController::class, 'CategoryCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/list-category', [CategoryController::class, 'CategoryList'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/delete-category', [CategoryController::class, 'CategoryDelete'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/category-by-id', [CategoryController::class, 'CategoryById'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/update-category', [CategoryController::class, 'CategoryUpdate'])->middleware([TokenVerificationMiddleware::class]);


// Customer API
Route::post('/create-customer', [CustomerController::class, 'CustomerCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/list-customer', [CustomerController::class, 'CustomerList'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/delete-customer', [CustomerController::class, 'CustomerDelete'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/customer-by-id', [CustomerController::class, 'CustomerById'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/update-customer', [CustomerController::class, 'CustomerUpdate'])->middleware([TokenVerificationMiddleware::class]);


// Product API
Route::post('/create-product', [ProductController::class, 'CreateProduct'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/list-product', [ProductController::class, 'ProductList'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/delete-product', [ProductController::class, 'DeleteProduct'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/product-by-id', [ProductController::class, 'ProductById'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/update-product', [ProductController::class, 'UpdateProduct'])->middleware([TokenVerificationMiddleware::class]);


// Invoice API
Route::post('/invoice-create', [InvoiceController::class, 'InvoiceCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/invoice-select', [InvoiceController::class, 'InvoiceSelect'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/invoice-details', [InvoiceController::class, 'InvoiceDetails'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/invoice-delete', [InvoiceController::class, 'InvoiceDelete'])->middleware([TokenVerificationMiddleware::class]);


// report api
Route::get('/sales-report/{FormDate}/{ToDate}', [ReportController::class, 'SalesReport'])->middleware([TokenVerificationMiddleware::class]);