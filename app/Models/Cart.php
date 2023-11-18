<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';
    protected $fillable = [];
    public function order() :BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
