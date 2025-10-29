<?php

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect()->route('users');
});

Route::get('/dashboard', fn() => redirect('/'))->name('dashboard');

Route::get('/login', function () {
    return redirect(route('saml2_login', 'test'));
})->withoutMiddleware(\LaravelDay2025\SharedPackage\Http\Middleware\CheckSAMLPassive::class)
    ->name('login');

Route::get('/logout', function () {
    return redirect(route('saml2_logout', 'test'));
})->name('logout');

Route::get('/users', function () {
    $users = User::query()->get();

    return view('users.index')->with('users', $users);
})->name('users');


//require __DIR__.'/auth.php';
