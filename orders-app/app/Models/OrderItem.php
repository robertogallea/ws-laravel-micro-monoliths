<?php

namespace App\Models;

use App\Services\APIProductRepository;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_product';
    protected $guarded = [];
    public $incrementing = false;
    public $timestamps = false;

    protected function product(): Attribute
    {
        return Attribute::get(app(APIProductRepository::class)->fetchByIds([$this->product_id]));
    }
}