<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    protected $fillable = [ 'answer'];

    public function questionnaire() {
        return $this->belongsTo(Questionnaire::class);
      }
   
      public function question() {
        return $this->belongsTo(Question::class);
      }
}
