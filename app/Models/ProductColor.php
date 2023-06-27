<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'colors',
    ];

    const COLORS = [
        1       => 'red',
        2       => 'green',
        3       => 'blue',
        4       => 'pink',
        5       => 'yellow',
        6       => 'gray',
        7       => 'black',
        8       => 'white',
        9       => 'orange',
    ];
}
