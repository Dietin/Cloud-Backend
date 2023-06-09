<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recipe_steps extends Model
{
    use HasFactory;
    protected $table = 'recipe_steps';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'recipe_id',
        'step_no',
        'text',
    ];

    function recipe(){
        return $this->belongsTo(Recipe::class, 'recipe_id');
    }
}
