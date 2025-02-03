<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $fillable = [
        'modelno',
        'size',
        'color',
        'mrp',
        'stock',
        'category',
        'vendor',
    ];
}
