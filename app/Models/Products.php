<?php

namespace App\Http\Models;

use App\Models\Images;
use App\Models\ProductDetails;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'code',
        'description',
        'price',
        'category_id',
        'sponsor_id'
    ];

    public function category() :BelongsTo
    {
        return $this->belongsTo(Categories::class);
    }

    public function sponsor() :BelongsTo
    {
        return $this->belongsTo(Sponsors::class);
    }
    public function images() :Images
    {
        return Images::where(['_ref_table' => 'products', '_ref_id' => $this->attributes['id']])->get();
    }
    public function product_details() :HasMany
    {
        return $this->hasMany(ProductDetails::class);
    }

}
