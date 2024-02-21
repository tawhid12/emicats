<?php

namespace App\Models;

use Illuminate\Console\Concerns\InteractsWithIO;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Offer extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    public const PLACEHOLDER_IMAGE_PATH = "images/placeholder.webp";
    protected $fillable = [
        'title',
        'price',
        'description',
        'author_id',
        'status'
    ];
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function locations()
    {
        return $this->belongsToMany(Location::class);
    }
    public function getImageUrlAttribute()
    {
        return $this->hasMedia() ?
            $this->getFirstMediaUrl() : self::PLACEHOLDER_IMAGE_PATH;
    }
}
