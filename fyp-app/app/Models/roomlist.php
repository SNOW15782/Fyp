<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roomlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'type',
        'price',
        'bedrooms',
        'bathrooms',
        'area_sqft',
        'location',
        'is_available',
        'image_path'
    ];

}
