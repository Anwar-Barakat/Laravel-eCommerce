<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Setting extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'email',
        'address',
        'mobile',
        'facebook_url',
        'instagram_url',
        'twitter_url',
        'footer'
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('setting')
            ->fit(Manipulations::FIT_CROP, 110, 32)
            ->nonQueued();
    }
}
