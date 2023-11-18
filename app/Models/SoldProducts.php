<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SoldProducts extends Model
{
    use HasFactory;
    protected $table ='sold_products';
    protected $fillable = ['user_id', 'quantity', 'total_price', 'status', 'payment_method', 'payment_status'];

    public function user() :HasOne
    {
        return $this->hasOne(User::class);
    }
}
