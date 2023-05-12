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

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('name', 'LIKE', $term);
        });
    }

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

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
