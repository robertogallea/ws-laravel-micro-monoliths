<?php

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect()->route('users');
});

Route::get('/dashboard', fn () => redirect('/'))->name('dashboard');

Route::get('/users', function () {
    $users = User::with(['orders' => function ($q) {
        $q->withSum('products', 'price');
    }, 'orders.products'])->get();

    return view('users.index')->with('users', $users);
})->name('users');

Route::get('/products', function () {
    $products = Product::all();
    return view('products.index')->with('products', $products);
})->name('products');

Route::get('/orders', function () {
    $orders = Order::latest('id')->get();

    return view('orders.index')->with(compact('orders'));
})->name('orders');

Route::get('/orders/create', function (Request $request) {
    $order = Order::create([
        'user_id' => $request->user()->id,
        'amount' => 0,
    ]);

    $products = Product::all();
    $orderProducts = $products->random(rand(2, 5));
    $order->products()->attach($orderProducts->pluck('id'));
    $order->update(['amount' => $orderProducts->sum('price')]);

    return redirect(route('orders'));
})->name('orders.create');

require __DIR__.'/auth.php';
