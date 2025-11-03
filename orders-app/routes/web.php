<?php

use App\Events\OrderCreated;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect()->route('users');
});

Route::get('/dashboard', fn() => redirect('/'))->name('dashboard');

Route::get('/orders/login', function () {
    return redirect(route('saml2_login', 'test'));
})->withoutMiddleware(\LaravelDay2025\SharedPackage\Http\Middleware\CheckSAMLPassive::class)
    ->name('login');

Route::get('/orders/logout', function () {
    return redirect(route('saml2_logout', 'test'));
})->name('logout');

Route::get('/orders', function () {
    $orders = Order::latest('id')->get();

    return view('orders.index')->with(compact('orders'));
})->name('orders');

Route::get('/orders/create', function (Request $request, \App\Services\APIProductRepository $productRepository) {
    $order = Order::create([
        'user_id' => $request->user()->id,
        'amount' => 0,
    ]);

    $products = $productRepository->fetchAllIds();
    $orderProducts = $products->random(rand(2, 5))
    ->map(function ($productId) use ($order) {
        return $order->items()->create(['product_id' => $productId]);
    });

    $order->update(['amount' => $order->products->sum('price')]);

    OrderCreated::dispatch($order);

    return redirect(route('orders'));
})->name('orders.create');

//require __DIR__.'/auth.php';
