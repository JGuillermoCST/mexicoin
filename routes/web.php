<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PromotionsController;
use App\Http\Controllers\CheckoutController;


// General routes
Route::get('/', [PriceController::class, 'index'])->name('main');
Route::get('/tienda', [ProductController::class, 'store'])->name('store');
Route::get('/contacto', function () {return view('contact');})->name('contact');
Route::get('/politicas', function () {return view('client-help.privacy');})->name('policies');
Route::get('/terminos', function () {  return view('terms');   })->name('terms');
Route::get('/faq', function () {  return view('client-help.faq');   })->name('faq');
Route::get('/devoluciones', function () {  return view('client-help.returns-policy');   })->name('returns-pol');
Route::get('/producto/{id}', [ProductController::class, 'show'])->name('product.detail');
Route::get('/suscripciones', function () { return view('subspricing'); })->name('subs');

// Colecciones
Route::get('/colecciones', [ProductController::class, 'displayCollections'])->name('collections');
Route::get('/colecciones/oro', [ProductController::class, 'displayGold'])->name('collections-gold');
Route::get('/colecciones/plata', [ProductController::class, 'displaySilver'])->name('collections-silver');
Route::get('/colecciones/billetes', [ProductController::class, 'displayBucks'])->name('collections-bucks');
Route::get('/colecciones/numismatica', [ProductController::class, 'displayNumis'])->name('collections-numis');

// Para secciones en construcción
Route::get('/muy-pronto', function () {return view('users.com-soon');})->name('usr-comsoon');

// Proceso de carrito
Route::post('/cart/add', [OrderController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [OrderController::class, 'view'])->name('cart.view');
Route::delete('/cart/{id}', [OrderController::class, 'deleteFromCart'])->name('cart.remove');

Route::get('/tst-checkout-pass', function () {return view('checkout.pass');})->name('checkout-pass');
Route::get('/tst-checkout-fail', function () {return view('checkout.fail');})->name('checkout-fail');

Route::get('paypal-test', function () {
    return view('checkout.paypal');
})->name('paypal-test');

Route::post('/paypal/create-order', [CheckoutController::class, 'createOrder'])->name('paypal.create-order');
Route::post('/paypal/{order_id}/capture-order', [CheckoutController::class, 'captureOrder'])->name('paypal.capture-order');

Route::get('/plus', function () { return view('users.subscriptions.plus'); })->name('details-plus');
Route::get('/pro', function () { return view('users.subscriptions.pro'); })->name('details-pro');


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {

    Route::get('/mis-datos', function () { return view('profile.show'); })->name('profile');
    Route::get('/mi-pagina', [UserController::class, 'index'])->name('dashboard');
    Route::get('/historial-compras', [UserController::class, 'purchases'])->name('purchase-history');
    Route::get('/mis-opiniones', [UserController::class, 'opinions'])->name('opinions');
    Route::get('/mis-tarjetas', [UserController::class, 'cards'])->name('cards');

    Route::get('/administracion/productos', [ProductController::class, 'index'])->name('admin-products');
    Route::post('/administracion/productos', [ProductController::class, 'save'])->name('admin-products.store');
    Route::get('/administracion/productos/editar/{id}', [ProductController::class, 'edit'])->name('admin-products.edit');
    Route::put('/administracion/productos/editar/{id}', [ProductController::class, 'update'])->name('admin-products.update');
    Route::delete('/administracion/productos/{id}', [ProductController::class, 'destroy']);

    Route::get('/administracion/historial-ventas', [UserController::class, 'sales'])->name('admin-sales');
    Route::get('/administracion/reportes', [UserController::class, 'reports'])->name('admin-reports');

    Route::get('/administracion/promocional', [PromotionsController::class, 'index'])->name('admin-promos');
    Route::post('/administracion/promocional', [PromotionsController::class, 'updateBanner'])->name('admin-banner.update');

    Route::get('/checkout/completado/', [CheckoutController::class, 'success'])->defaults('order_id', null)->defaults('total', null)->defaults('cart_data', null)->name('checkout.success');
    Route::get('/checkout/cancelado', [CheckoutController::class, 'cancel'])->name('checkout.cancel');

    // Route::get('/checkout', function () { return view('checkout'); })->name('checkout');

    // Cierre de compra y pedidos
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout.pay');

    Route::get('/mis-pedidos', [OrderController::class, 'index'])->name('orders');
    Route::get('/mis-pedidos/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::post('/mis-pedidos/{order}/doc', [OrderController::class, 'uploadProof'])->name('orders.proof');
});
