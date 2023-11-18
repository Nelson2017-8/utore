<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetails extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $fillable = [
        'order_id' => 'integer',
        'product_id' => 'integer',
    ];

    protected $casts = [
        'order_id' => 'integer',
        'product_id' => 'integer',
    ];

    public function order():BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}