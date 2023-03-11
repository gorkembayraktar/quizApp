<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;


    protected $fillable = ['user_id', 'quiz_id', 'point','wrong','correct'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
