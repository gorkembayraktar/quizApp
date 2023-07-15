<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// test
class Answer extends Model
{
    use HasFactory;

    /** timestamps tabloda geçerli olmadığı belirtildi.  */
    public $timestamps  = false;


    protected $fillable = ['user_id', 'question_id', 'answer'];
}
