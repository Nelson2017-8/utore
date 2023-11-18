<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RequestedProducts extends Model
{
    use HasFactory;
    protected $table ='requested_products';
    protected $fillable = [];
    public function user() :HasOne
    {
        return $this->HasOne(User::class,'id','user_id');
    }
}
