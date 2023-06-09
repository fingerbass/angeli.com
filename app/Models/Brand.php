<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relación 1:*
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Relación *:*
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
