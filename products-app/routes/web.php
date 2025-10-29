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

Route::get('/products/login', function () {
    return redirect(route('saml2_login', 'test'));
})->withoutMiddleware(\LaravelDay2025\SharedPackage\Http\Middleware\CheckSAMLPassive::class)
    ->name('login');

Route::get('/products/logout', function () {
    return redirect(route('saml2_logout', 'test'));
})->name('logout');


Route::get('/products', function () {
    $products = Product::all();
    return view('products.index')->with('products', $products);
})->name('products');
