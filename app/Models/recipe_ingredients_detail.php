<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recipe_ingredients_detail extends Model
{
    use HasFactory;
    protected $table = 'recipe_ingredients_detail';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'nutrition_json',
    ];
    
    protected $hidden = [
        'nutrition_json'
    ];
    public function recipe_ingredients_weights()
    {
        return $this->hasMany(recipe_ingredients_weights::class, 'recipe_ingredient_id');
    }
}
