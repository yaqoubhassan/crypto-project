<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WebController;

Route::get('/', [WebController::class, 'home'])->name('home');
Route::get('features', [WebController::class, 'features'])->name('features');
Route::get('register', [RegisterController::class, 'create'])->name('register');

// Public routes
// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/login', [AuthController::class, 'login']);

// // Currency public routes
// Route::get('/currencies', [CurrencyController::class, 'index']);
// Route::get('/currencies/{id}', [CurrencyController::class, 'show']);
// Route::get('/currencies/crypto/list', [CurrencyController::class, 'getCryptoCurrencies']);
// Route::get('/currencies/fiat/list', [CurrencyController::class, 'getFiatCurrencies']);

// // Trading public routes
// Route::get('/trading/pairs', [TradingController::class, 'getTradingPairs']);
// Route::get('/trading/market-data/{id}', [TradingController::class, 'getMarketData']);
// Route::get('/trading/order-book/{id}', [TradingController::class, 'getOrderBook']);

// // Protected routes
// Route::middleware('auth:sanctum')->group(function () {
//     // Auth routes
//     Route::get('/user', [AuthController::class, 'user']);
//     Route::post('/logout', [AuthController::class, 'logout']);
//     Route::put('/user/profile', [AuthController::class, 'updateProfile']);
//     Route::put('/user/password', [AuthController::class, 'changePassword']);

//     // Wallet routes
//     Route::get('/wallets', [WalletController::class, 'index']);
//     Route::get('/wallets/{id}', [WalletController::class, 'show']);
//     Route::post('/wallets', [WalletController::class, 'store']);
//     Route::get('/wallets/{id}/transactions', [WalletController::class, 'transactions']);
//     Route::post('/wallets/{id}/withdraw', [WalletController::class, 'withdraw']);
//     Route::get('/wallets/{id}/deposit-address', [WalletController::class, 'getDepositAddress']);

//     // Trading routes
//     Route::post('/trading/orders', [TradingController::class, 'placeOrder']);
//     Route::get('/trading/orders/active', [TradingController::class, 'getActiveOrders']);
//     Route::get('/trading/orders/history', [TradingController::class, 'getOrderHistory']);
//     Route::delete('/trading/orders/{id}', [TradingController::class, 'cancelOrder']);

//     // Currency info
//     Route::get('/currencies/{id}/withdrawal-info', [CurrencyController::class, 'getWithdrawalInfo']);

//     // Admin routes
//     Route::prefix('admin')->group(function () {
//         Route::get('/dashboard', [AdminController::class, 'getDashboardStats']);
//         Route::get('/users', [AdminController::class, 'getUsers']);
//         Route::get('/users/{id}', [AdminController::class, 'getUserDetails']);
//         Route::put('/users/{id}/status', [AdminController::class, 'updateUserStatus']);

//         Route::get('/kyc/pending', [AdminController::class, 'getPendingKyc']);
//         Route::put('/kyc/{id}', [AdminController::class, 'processKyc']);

//         Route::get('/withdrawals/pending', [AdminController::class, 'getPendingWithdrawals']);
//         Route::put('/withdrawals/{id}', [AdminController::class, 'processWithdrawal']);

//         Route::get('/currencies', [AdminController::class, 'manageCurrencies']);
//         Route::post('/currencies', [AdminController::class, 'updateCurrency']);
//         Route::put('/currencies/{id}', [AdminController::class, 'updateCurrency']);

//         Route::get('/trading-pairs', [AdminController::class, 'manageTradingPairs']);
//         Route::post('/trading-pairs', [AdminController::class, 'updateTradingPair']);
//         Route::put('/trading-pairs/{id}', [AdminController::class, 'updateTradingPair']);

//         Route::get('/activity-logs', [AdminController::class, 'getActivityLogs']);
//     });
// });

// require __DIR__ . '/auth.php';