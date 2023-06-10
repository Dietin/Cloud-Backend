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
        'ingredients_detail_id',
        'amount',
    ];

    public function recipe(){
        return $this->belongsTo(recipe::class, 'recipe_id');
    }
    
    public function recipe_ingredients_detail(){
        return $this->belongsTo(recipe_ingredients_detail::class, 'ingredients_detail_id');
    }
    
    public function recipe_ingredients_weights()
    {
        return $this->hasMany(recipe_ingredients_weights::class, 'recipe_ingredient_id');
    }
}
