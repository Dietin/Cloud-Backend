<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recipe_ingredients_weights extends Model
{
    use HasFactory;
    protected $table = 'recipe_ingredients_weights';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'recipe_ingredient_id',
        'amount',
        'description',
        'grams'
    ];

    public function recipe_ingredients_detail(){
        return $this->belongsTo(recipe_ingredients_detail::class, 'recipe_ingredient_id');
    }
}
