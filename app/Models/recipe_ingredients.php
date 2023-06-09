<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recipe_ingredients extends Model
{
    use HasFactory;
    protected $table = 'recipe_ingredients';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'recipe_id',
        'amount',
    ];

    function recipe(){
        return $this->belongsTo(recipe::class, 'recipe_id');
    }
    function recipe_ingredients_weights(){
        return $this->hasMany(recipe_ingredients_weights::class, 'recipe_ingredient_id');
    }
}
