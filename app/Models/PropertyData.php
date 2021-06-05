<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyData extends Model
{
    protected $fillable = [
       'name', 'address', 'price', 'bedrooms', 'bathrooms', 'garages', 'frontage', 'image', 'special', 'featured'
    ];

    use HasFactory;
}
