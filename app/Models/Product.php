<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
            ->width(300)
            ->height(300);

        $this->addMediaConversion('medium')
            ->width(600)
            ->height(600);

        $this->addMediaConversion('large')
            ->width(1000)
            ->height(1000);
    }

    public static function applyDiscount($product_id, $price)
    {
        $product = Product::with('category')->where('id', $product_id)->first();
        $category = $product->category;

        $data['original_price'] = $price;
        $data['final_price']    = $price;
        $data['discount']       = 0;
        if (!$product->created_at->diffInMonths() < 1) {

            if ($product->discount > 0) {
                $data['final_price'] = self::calculateDiscount($price, $product->discount);
                $data['discount'] = $product->discount;
            } elseif ($category->discount > 0) {
                $data['final_price'] = self::calculateDiscount($price, $category->discount);
                $data['discount'] = $category->discount;
            }
        }
        return $data;
    }

    public static function calculateDiscount($price, $discount)
    {
        if (!is_numeric($discount))
            throw new \InvalidArgumentException(__('validation.numeric', ['attribute' => __('product.discount')]));

        return $price - ($price * $discount / 100);
    }

    public function scopeActive($query)
    {
        return $query->where(['is_active' => 1]);
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

    public function attributes(): HasMany
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function filters(): HasMany
    {
        return $this->hasMany(ProductFilter::class)->with('filter', 'filter_value');
    }
}
