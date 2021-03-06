<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $fillable = ['content','question_type','option','user_id'];
    
    protected $casts = [
        'option' => 'array'
    ];

    public function questionnaire(){
        return $this->belongsTo(Questionnaire::class);
    }

    public function answers(){
        return $this->hasMany(Answer::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

   
}
