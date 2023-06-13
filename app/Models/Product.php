<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const BORRADOR = 1;
    const PUBLICADO = 2;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Relación 1:*
    public function sizes()
    {
        return $this->hasMany(Size::class);
    }

    // Relación 1:* inversa
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    // Relación *:*
    public function colors()
    {
        return $this->belongsToMany(Color::class)->withPivot('quantity');
    }

    // Relación 1:* polimórfica
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    // URLs amigables
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
