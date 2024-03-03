<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    public const PLACEHOLDER_IMAGE_PATH = "images/placeholder.webp";
    protected $fillable = [
        'title',
        'ref',
        'ref1',
        'ref2',
        'description',
        'manufacturer_id ',
        'weight',
        'status'
    ];
    public function brands()
    {
        return $this->belongsToMany(Brand::class);
    }
    public function carmodels()
    {
        return $this->belongsToMany(CarModel::class);
    }
    public function components()
    {
        return $this->belongsToMany(Component::class);
    }
    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }
    public function getImageUrlAttribute()
    {
        return $this->hasMedia() ?
            $this->getFirstMediaUrl() : self::PLACEHOLDER_IMAGE_PATH;
    }
}
