@extends('layouts.app')

@section('content')
  <div class="card">
      <div class="card-content">
      <span class="card-title"> Questionnaires</span>
      <p>
        <span class="flow-text">{{ $questionnaire->content }}</span> <br/>
      </p>
      
      <div class="divider" style="margin:20px 0px;"></div>
          {!! Form::open(array('action'=>array('AnswerController@store', $questionnaire->id))) !!}
          @forelse ($questionnaire->questions as $key=>$question)
            <p class="flow-text">Question {{ $key+1 }} - {{ $question->content }}</p>
                @if($question->question_type === 'text')
                  <div class="input-field col s12">
                    <input id="answer" type="text" name="{{ $question->id }}[answer]">
                    <!-- <label for="answer">Answer</label> -->
                  </div>
                
                @elseif($question->question_type === 'radio')
                  @foreach($question->option as $key=>$value)
                    <p style="margin:0px; padding:0px;">
                      <input name="{{ $question->id }}[answer]" type="radio" id="{{ $key }}" />
                      <label for="{{ $key }}">{{ $value }}</label>
                    </p>
                  @endforeach
                @elseif($question->question_type === 'checkbox')
                  @foreach($question->option as $key=>$value)
                  <p style="margin:0px; padding:0px;">
                    <input type="checkbox" id="something{{ $key }}" name="{{ $question->id }}[answer]" />
                    <label for="something{{$key}}">{{ $value }}</label>
                  </p>
                  @endforeach
                @endif 
              <div class="divider" style="margin:10px 10px;"></div>
          @empty
            <span class='flow-text center-align'>Nothing to show</span>
          @endforelse
        {{ Form::submit('Submit Questionnaire', array('class'=>'btn btn-primary')) }}
        {!! Form::close() !!}
    </div>
  </div>
@stop