@extends('layout')

@section('content')
  <div class="card">
      <div class="card-content">
      <span class="card-title"> Start taking Survey</span>
      <p>
        <span class="flow-text">{{ $questionnaire->content }}</span> <br/>
      </p>
      
      <div class="divider" style="margin:20px 0px;"></div>
          {!! Form::open(array('action'=>array('AnswerController@store', $questionnaire->id))) !!}
          @forelse ($questionnaire->questions as $key=>$question)
            <p class="flow-text">Question {{ $key+1 }} - {{ $question->content }}</p>
                @if($question->question_type === 'text')
                  <div class="input-field col s12">
                    <input id="response" type="text" name="{{ $question->id }}[response]">
                    <label for="response">Answer</label>
                  </div>
                @elseif($question->question_type === 'textarea')
                  <div class="input-field col s12">
                    <textarea id="textarea1" class="materialize-textarea" name="{{ $question->id }}[response]"></textarea>
                    <label for="textarea1">Textarea</label>
                  </div>
                @elseif($question->question_type === 'radio')
                  @foreach($question->option_name as $key=>$value)
                    <p style="margin:0px; padding:0px;">
                      <input name="{{ $question->id }}[response]" type="radio" id="{{ $key }}" />
                      <label for="{{ $key }}">{{ $value }}</label>
                    </p>
                  @endforeach
                @elseif($question->question_type === 'checkbox')
                  @foreach($question->options as $key=>$value)
                  <p style="margin:0px; padding:0px;">
                    <input type="checkbox" id="something{{ $key }}" name="{{ $question->id }}[response]" />
                    <label for="something{{$key}}">{{ $value }}</label>
                  </p>
                  @endforeach
                @endif 
              <div class="divider" style="margin:10px 10px;"></div>
          @empty
            <span class='flow-text center-align'>Nothing to show</span>
          @endforelse
        {{ Form::submit('Submit Questionnaire', array('class'=>'btn waves-effect waves-light')) }}
        {!! Form::close() !!}
    </div>
  </div>
@stop