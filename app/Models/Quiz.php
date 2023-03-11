<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;


class Quiz extends Model
{
    use Sluggable;

    use HasFactory;

    protected $fillable = ['title' ,'description','finished_at', 'status', 'slug'];

    protected $dates = ['finished_at'];


    protected $appends = ['details'];

    public function getFinishedAtAttribute($date){
        return  $date ? Carbon::parse($date) : null;
    }

    public function questions(){
        return $this->hasMany('App\Models\Question');
    }


    public function my_result(){
        return $this->hasOne('App\Models\Result')->where('user_id', auth()->user()->id);
    }

    public function results(){
        return $this->hasMany('App\Models\Result');
    }

    public function getDetailsAttribute(){
        /** yeni sütun oluşturulması */

        if($this->results()->count() == 0)
            return null;

        return (object)[
            'average' => round($this->results()->avg('point')), 
            'join_count' => $this->results()->count()
        ];
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'onUpdate' => true,
                'source' => 'title'
            ]
        ];
    }
}
