<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class searchHistory extends Model
{
    use HasFactory;
    protected $table = 'searchHistory';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id',
        'user_id',
        'recipe_id',
        'searched_at',
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
