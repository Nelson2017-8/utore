<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CMSInputs extends Model
{
    use HasFactory;
    protected $table = 'cms_inputs';
    protected $fillable = [];
    public function cms() :BelongsTo
    {
        return $this->belongsTo(CMS::class);
    }
}
