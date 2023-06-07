<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class foodHistory extends Model
{
    use HasFactory;

    protected $table = 'foodHistory';
    protected $fillable = [
        'id',
        'user_id',
        'recipe_id',
        'calories',
        'carbs',
        'fats',
        'proteins',
        'food_time',
        'date',
    ];
}
