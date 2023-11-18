<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Favorities extends Model
{
    use HasFactory;
    protected $table = 'favorities';
    protected $fillable = ['user_id', 'product_id'];
    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function user():HasOne
    {
        return $this->hasOne(User::class, 'user_id');
    }
}
