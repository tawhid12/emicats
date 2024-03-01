<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Brand extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    public const PLACEHOLDER_IMAGE_PATH = "images/placeholder.webp";
    protected $fillable = [
        'b_name',
        'status'
    ];
    public function getImageUrlAttribute()
    {
        return $this->hasMedia() ?
            $this->getFirstMediaUrl() : self::PLACEHOLDER_IMAGE_PATH;
    }
}
