<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [];
    public function users() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function details() :HasMany
    {
        return $this->hasMany(OrderDetails::class);
    }
}
