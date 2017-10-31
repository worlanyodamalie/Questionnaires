@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Name of Questionnaire</div>

                <div class="panel-body">
                    

                <div class="card">
      <div class="card-content">
      <span class="card-title"> {{ $questionnaire->content }}</span>
     
    
      <a href='view/{{$questionnaire->id}}'>Take Survey</a> | <a href="/questionnaire/answers/{{$questionnaire->id}}">View Answers</a> 
      <div class="divider" style="margin:20px 0px;"></div>
      <p class="flow-text center-align">Questions</p>
      <ul class="collapsible" data-collapsible="expandable">
          @forelse ($questionnaire->questions as $question)
          <li style="box-shadow:none;">
            <div class="collapsible-header">{{ $question->content }} </div>
            <div class="collapsible-body">
              <div style="margin:5px; padding:10px;">
                  {!! Form::open() !!}
                    @if($question->question_type === 'text')
                      {{ Form::text('title')}}
                    @elseif($question->question_type === 'textarea')
                    <div class="row">
                      <div class="form-group">
                        <textarea id="textarea1" class="form-control"></textarea>
                        <label for="textarea1" class="control-label">Provide answer</label>
                      </div>
                    </div>
                    @elseif($question->question_type === 'radio')
                      @foreach($question->option as $key=>$value)
                        <p style="margin:0px; padding:0px;">
                          <input type="radio" id="{{ $key }}" />
                          <label for="{{ $key }}">{{ $value }}</label>
                        </p>
                      @endforeach
                    @elseif($question->question_type === 'checkbox')
                      @foreach($question->option as $key=>$value)
                      <p style="margin:0px; padding:0px;">
                        <input type="checkbox" id="{{ $key }}" />
                        <label for="{{$key}}">{{ $value }}</label>
                      </p>
                      @endforeach
                    @endif 
                  {!! Form::close() !!}
              </div>
            </div>
          </li>
          @empty
            <span style="padding:10px;">Nothing to show. Add questions below.</span>
          @endforelse
      </ul>
     <center>     <h2 class="flow-text">Add Question</h2> </center>
      <form method="POST"   action="{{ $questionnaire->id }}/questions" id="boolean">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
          <div class="form-group  ">
            <select class="browser-default" name="question_type" id="question_type">
              <option value="" disabled selected>Choose your option</option>
              <option value="text">Text</option>
              <!-- <option value="textarea">Textarea</option> -->
              <option value="checkbox">Multiple Choice Question</option>
              <option value="radio">Single Choice Question</option>
            </select>
          </div>                
          <div class="col-md-6">
         
          <input name="content" placeholder="Add question" class="form-control "  id="content" type="text">
          </label>
            
            
          </div>  
         
          <span class="form-g"></span>

          <div class=" form-group">
          <button class="btn btn-primary">Submit</button>
          </div>
        </div>
        </form>
    </div>
  </div>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection
