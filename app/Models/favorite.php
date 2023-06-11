<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favorite extends Model
{
    use HasFactory;
    protected $table = 'favorite';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id',
        'user_id',
        'recipe_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function recipe()
    {
        return $this->belongsTo(recipe::class, 'recipe_id');
    }
}
