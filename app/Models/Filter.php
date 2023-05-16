<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    use HasFactory;

    protected $fillable = [
        'categories',
        'name',
        'field',
        'is_active',
    ];

    protected $casts = ['categories' => 'array'];
}
