<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RequestedProductList extends Model
{
    use HasFactory;
    protected $table = "request_product_list";
    protected $fillable = [];
    public function product() :BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    public function requestProduct() :HasOne
    {
        return $this->hasOne(RequestedProducts::class);
    }
    protected $casts = [];
}
