<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class weightHistory extends Model
{
    use HasFactory;
    protected $table = 'weightHistory';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id',
        'user_id',
        'dataUser_id',
        'date',
    ];
    
    public function dataUser(){
        return $this->belongsTo(dataUser::class, 'dataUser_id');
    }
    public function User(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
