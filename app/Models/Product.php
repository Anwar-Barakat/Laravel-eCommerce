<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTranslations;

    protected $fillable = [
        'section_id',
        'category_id',
        'brand_id',
        'admin_id',
        'name',
        'code',
        'price',
        'discount',
        'gst',
        'weight',
        'description',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'is_featured',
        'is_best_seller',
        'is_active',
    ];

    public $translatable    = ['name'];
    protected $casts        = ['created_at'    => 'date:Y-m-d',];

    public function registerMediaCollections(Media $media = null): void
    {
        $this->addMediaConversion('small')
            ->width(250)
            ->height(250);

        $this->addMediaConversion('midium')
            ->width(500)
            ->height(500);

        $this->addMediaConversion('large')
            ->width(1000)
            ->height(1000);
    }

    public function scopeActive($query)
    {
        return $query->where(['status' => 1]);
    }
}
