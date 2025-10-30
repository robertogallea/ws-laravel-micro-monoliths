<?php

namespace App\Models;

use App\Services\APIProductRepository;
use App\Services\ProductService;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Redis;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $guarded = [];

    public function products(): Attribute
    {
        return Attribute::get(fn () => app(APIProductRepository::class)->fetchByIds($this->items->map->product_id));
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
