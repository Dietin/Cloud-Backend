<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recipe extends Model
{
    use HasFactory;
    protected $table = 'recipe';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'number_servings',
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

    function recipe_steps(){
        return $this->hasMany(recipe_steps::class, 'recipe_id');
    }

    function recipe_ingredients(){
        return $this->hasMany(recipe_ingredients::class, 'recipe_id');
    }
}
