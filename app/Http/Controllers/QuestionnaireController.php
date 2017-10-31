<?php

namespace App\Http\Controllers;
use App\Questionnaire;
use App\Answer;
use App\Http\Requests;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    
    public function __construct()
    {
      $this->middleware('auth');
    }
    

    public function home(Request $request)
    {   
        $questionnaires = Questionnaire::get(); 
        return view('home',compact('questionnaires'));
    }

     
  public function new() 
  {
    return view('questionnaire.new');
  }
 
  public function create(Request $request, Questionnaire $questionnaire) 
  {
    $reqs = $request->all();
    $reqs['user_id'] = Auth::id();
    $ques = $questionnaire->create($reqs);
    return Redirect::to("/questionnaire/{$ques->id}");
  }
 
  
  public function show(Questionnaire $questionnaire) 
  {
    $questionnaire->load('questions.user');
    return view('questionnaire.show', compact('questionnaire'));
  }
  

 
  public function view(Questionnaire $questionnaire) 
  { 
    $questionnaire->options = unserialize($questionnaire->options);
    return view('questionnaire.view', compact('questionnaire'));
  }
 
    public function view_answers(Questionnaire $questionnaire) 
  {
    $questionnaire->load('user.questions.answers');
    return view('answer.view', compact('questionnaire'));
  }
}
