<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Banner extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'link',
        'is_active',
    ];

    public function registerMediaCollections(Media $media = null): void
    {
        $this->addMediaConversion('banners')
            ->width(1920)
            ->height(720);
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('title', 'LIKE', $term);
        });
    }

    public function scopeActive($query)
    {
        return $query->where(['status' => 1]);
    }
}
