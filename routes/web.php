<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/', [FrontController::class, 'index'])->name('dashboard');
Route::get('/products', [FrontController::class, 'products'])->name('products');
Route::get('/product/detail/{shoe:slug}', [FrontController::class, 'detail'])->name('product.detail');

Route::post('/shopping-cart/{shoe:slug}', [OrderController::class, 'saveOrder'])->name('cart.save');


Route::middleware(['auth', 'role:USR'])->group(function() {
    Route::get('/pofile-akun', [FrontController::class, 'pofileAkun'])->name('profile.akun');

    Route::get('/shopping/product', [OrderController::class, 'cartView'])->name('cart.view');

    Route::get('/shopping/cart/data-customer', [OrderController::class, 'cartCustomerData'])->name('cart.customer.data');

    Route::post('/save-order-customer', [OrderController::class, 'saveOrderCust'])->name('save.order.cust');

    Route::get('/final-payment/cust', [OrderController::class, 'finalPayment'])->name('final.payment');

    Route::post('/order-confirm', [OrderController::class, 'orderConfirm'])->name('order.confirm');

    Route::get('/succes-payment/{productTrasaction:booking_trx_id}', [OrderController::class, 'successPayment'])->name('success.payment');

});





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
