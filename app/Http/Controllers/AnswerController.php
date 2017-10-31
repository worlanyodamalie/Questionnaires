<?php

namespace App\Http\Controllers;
use Auth;

use App\Questionnaire;
use App\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
  
    public function store(Request $request, Questionnaire $questionnaire) 
    {
      
      $arr = $request->except('_token');
      foreach ($arr as $key => $value) {
        $newAnswer = new Answer();
        if (! is_array( $value )) {
          $newValue = $value['answer'];
        } else {
          $newValue = json_encode($value['answer']);
        }
        $newAnswer->answer = $newValue;
        $newAnswer->question_id = $key;
        $newAnswer->user_id = Auth::id();
        $newAnswer->questionnaire_id = $questionnaire->id;
  
        $newAnswer->save();
  
        $answerArray[] = $newAnswer;
      };
      return redirect()->action('QuestionnaireController@view_answers', [$questionnaire->id]);
    }
}
