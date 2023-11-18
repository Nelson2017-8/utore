<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SoldProductList extends Model
{
    use HasFactory;
    protected $table ='sold_product_lists';
    protected $fillable = [];
    public function sold_products() :BelongsTo
    {
        return $this->belongsTo(SoldProducts::class);
    }
    public function product() :BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
