<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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


Route::group(
    ['middleware' => 'guest'],
    function () {
        Route::get('/login', [AuthController::class, 'login_page'])->name('login');
        Route::post('/login', [AuthController::class, 'check_login'])->name('post.login');
        Route::get('/register', [AuthController::class, 'register_page'])->name('register');
        Route::post('/register', [AuthController::class, 'register_post'])->name('post.register');
    }
);




Route::group(['prefix' => 'software', 'middleware' => ['auth']], function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/add-customer', [CustomerController::class, 'add_customer'])->name('add.customer');
    Route::post('/add-customer', [CustomerController::class, 'add_customer_post'])->name('add.customer.post');
    Route::get('/all-customers', [CustomerController::class, 'all_customer'])->name('all.customers');
    Route::post('/get-customer-details', [CustomerController::class, 'get_customer'])->name('get.customer.details');

    Route::get('/make-invoice', [InvoiceController::class, 'make_invoice'])->name('make.invoice');
    Route::post('/view-invoice-post', [InvoiceController::class, 'make_invoice_post'])->name('make.invoice.post');
    Route::get('/view-invoice/{invoice_id}', [InvoiceController::class, 'view_invoice'])->name('view.invoice');
    Route::get('/lift-of-invoice', [InvoiceController::class, 'invoice_list'])->name('invoice.list');


    Route::get('/wallet', [WalletController::class, 'wallet'])->name('wallet.page');

    Route::get('/make-purchase', [PurchaseController::class, 'make_purchase_page'])->name('make.purchase.page');
    Route::post('/make-purchase-post', [PurchaseController::class, 'make_purchase'])->name('make.purchase.post');
    Route::get('/lift-of-purchase', [PurchaseController::class, 'purchase_list'])->name('purchase.list');

    Route::get('/transactions', [TransactionController::class, 'all_transactions'])->name('all.transactions');

});



Route::get('/', function (Request $request) {
    return view('index');
})->name('main');

