<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductDetails extends Model
{
    use HasFactory;
    protected $table = 'product_details';
    protected $fillable = ['product_id', 'image', 'description', 'price', 'quantity', 'state'];
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
