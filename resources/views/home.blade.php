@extends('layouts.app')

@section('content')


 <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                               <ul class="collection with-header">
    <li class="collection-header">
        <h2 class="flow-text">Questionnaires
            <span style="float:right;">{{ link_to_route('questionnaire.new', 'Create New Questionnaire') }}
            </span>
        </h2>
    </li>
    @forelse ($questionnaires as $questionnaire)
      <li class="collection-item">
        <div>
            {{ link_to_route('questionnaire.show', $questionnaire->content, ['id'=>$questionnaire->id])}}
            <a href="questionnaire/view/{{ $questionnaire->id }}" title="Take Survey" class="secondary-content">Take Questionnaire </a>
            
            <a href="questionnaire/answers/{{ $questionnaire->id }}" title="View Survey Answers" class="secondary-content">View Responses</a>
        </div>
        </li>
    @empty
        <p class="flow-text center-align">Nothing to show</p>
    @endforelse
    </ul>

                </div>
            </div>
        </div>
    </div>
</div> 


@stop
