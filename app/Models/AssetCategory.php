<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get all of the tools for the AssetCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tools()
    {
        return $this->hasMany(Asset::class, 'category_id', 'id');
    }
}
