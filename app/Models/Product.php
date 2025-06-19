<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'umkm_id'
    ];

    public function umkm()
    {
        return $this->belongsTo(Umkm::class);
    }

    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image);
    }

    public function getPriceFormattedAttribute()
    {
        return number_format($this->price, 0, ',', '.');
    }

    public function getStockStatusAttribute()
    {
        return $this->stock > 0 ? 'Tersedia' : 'Habis';
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    
    public function mainImage()
    {
        return $this->hasOne(ProductImage::class)->where('is_main', true);
    }
}
