<?php

namespace App\Http\Controllers;
use App\Questionnaire;
use App\Question;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function store(Request $request, Questionnaire $questionnaire) 
    {
      $reqs = $request->all();
      $reqs['user_id'] = Auth::id();

      $questionnaire->questions()->create($reqs);
      return back();
    }

   
    public function update(Request $request, Question $question) 
    {

      $question->update($request->all());
      return redirect()->action('QuestionnaireController@show', [$question->questionnaire_id]);
    }

}
