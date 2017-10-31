<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    //
    protected $fillable = ['content', 'user_id', ];

    public function questions(){
        return $this->hasMany(Question::class);

    }

    

    public function answers(){
        return $this->hasMany(Answer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
