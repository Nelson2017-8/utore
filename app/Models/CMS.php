<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CMS extends Model
{
    use HasFactory;
    protected $table = 'cms';
    protected $fillable = [];

    public function cmsInputs():HasMany
    {
        return $this->hasMany(CMSInput::class);
    }
}
