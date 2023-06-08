<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataUser extends Model
{
    use HasFactory;
    protected $table = 'dataUser';
    protected $fillable = [
        'dataUser_id',
        'age',
        'weight',
        'height',
        'bmr',
        'activity_level',
        'gender',
        'idealCalories',
        'user_id',

    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
