@extends('layout')

@section('content')
  <div class="card">
      <div class="card-content">
      <span class="card-title"> {{ $questionnaire->content }}</span>
      <br/>
      <a href='view/{{$questionnaire->id}}'>Take Survey</a> | <a href="/questionnaire/answers/{{$questionnaire->id}}">View Answers</a> 
      
      <div class="divider" style="margin:20px 0px;"></div>
      <p class="flow-text center-align">Questions</p>
      <ul class="collapsible" data-collapsible="expandable">
          @forelse ($questionnaire->questions as $question)
          <li style="box-shadow:none;">
            <div class="collapsible-header">{{ $question->content }} <a href="/question/{{ $question->id }}/edit" style="float:right;">Edit</a></div>
            <div class="collapsible-body">
              <div style="margin:5px; padding:10px;">
                  {!! Form::open() !!}
                    @if($question->question_type === 'text')
                      {{ Form::text('title')}}
                    @elseif($question->question_type === 'textarea')
                    <div class="row">
                      <div class="input-field col s12">
                        <textarea id="textarea1" class="materialize-textarea"></textarea>
                        <label for="textarea1">Provide answer</label>
                      </div>
                    </div>
                    @elseif($question->question_type === 'radio')
                      @foreach($question->options as $key=>$value)
                        <p style="margin:0px; padding:0px;">
                          <input type="radio" id="{{ $key }}" />
                          <label for="{{ $key }}">{{ $value }}</label>
                        </p>
                      @endforeach
                    @elseif($question->question_type === 'checkbox')
                      @foreach($question->options as $key=>$value)
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
      <h2 class="flow-text">Add Question</h2>
      <form method="POST" action="{{ $questionnaire->id }}/questions" id="boolean">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
          <div class="input-field col s12">
            <select class="browser-default" name="question_type" id="question_type">
              <option value="" disabled selected>Choose your option</option>
              <option value="text">Text</option>
              <option value="textarea">Textarea</option>
              <option value="checkbox">Checkbox</option>
              <option value="radio">Radio Buttons</option>
            </select>
          </div>                
          <div class="input-field col s12">
            <input name="title" id="title" type="text">
            <label for="title">Question</label>
          </div>  
          <!-- this part will be chewed by script in init.js -->
          <span class="form-g"></span>

          <div class="input-field col s12">
          <button class="btn waves-effect waves-light">Submit</button>
          </div>
        </div>
        </form>
    </div>
  </div>
@stop