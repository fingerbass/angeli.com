<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'image', 'icon'];

    // Relación 1:*
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    // Relación *:*
    public function brands()
    {
        return $this->belongsToMany(Brand::class);
    }

    // Relación 1:* a través de
    public function products()
    {
        return $this->hasManyThrough(Product::class, Subcategory::class);
    }
}
