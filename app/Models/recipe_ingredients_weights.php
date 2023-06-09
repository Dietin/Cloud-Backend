<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recipe_ingredients_weights extends Model
{
    use HasFactory;
    protected $table = 'recipe_ingredients';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'recipe_ingredient_id',
        'amount',
        'description',
        'grams'
    ];

    function recipe_ingredients(){
        return $this->belongsTo(recipe_ingredients::class, 'recipe_ingredient_id');
    }
}
