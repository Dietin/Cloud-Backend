<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recipe extends Model
{
    use HasFactory;
    protected $fillable = [
        'recipe_id',
        'name',
        'ingredients',
        'steps',
        'calories',
        'carbs',
        'fats',
        'proteins',
        'category',
        'image',
    ];

    function category(){
        return $this->belongsTo(category::class, 'category', 'category_id');
    }
}
