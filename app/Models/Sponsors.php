<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sponsors extends Model
{
    use HasFactory;
    protected $table ='sponsors';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sponsor_name',
        'sponsor_description'
    ];

    public function products() :HasMany
    {
        return $this->HasMany(Products::class,'sponsor_id', 'id');
    }
}
