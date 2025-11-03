<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Http;

class APIProductRepository
{
    public function fetchAllIds()
    {
        return collect(cache()->remember('products', 1,
            fn() => Http::asJson()->get('http://products-app/api/products')->json()
        ))->values();
    }

    public function fetchByIds($ids)
    {
        return collect($ids)->values()->map(function ($id) {
            return cache()->remember('products:' . $id, 3600, function () use ($id) {
                $response = Http::asJson()->get('http://products-app/api/products/' . $id)->json();
                return Product::make($response);
            });
        });

    }
}