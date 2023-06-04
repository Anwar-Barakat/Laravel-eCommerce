<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'name',
        'notes',
        'is_active',
    ];

    public $translatable    = ['name'];
    protected $casts        = ['created_at' => 'date:Y-m-d',];

    public function scopeActive($query)
    {
        return $query->where(['is_active' => 1]);
    }

    public function categories()
    {
        return $this->hasMany(Category::class)->where('parent_id', 0)->with('subCategories');
    }
}
