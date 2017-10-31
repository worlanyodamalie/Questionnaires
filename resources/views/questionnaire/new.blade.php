@extends('layout')

@section('content')
  <div class="card">
      <div class="card-content">
      <span class="card-title"> Add Survey</span>
      <form method="POST" action="create" id="boolean">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">    
          <div class="input-field col s12">
            <input name="content" id="content" type="text">
            <label for="content">Questionnaire</label>
          </div>          
          
          <div class="input-field col s12">
          <button class="btn waves-effect waves-light">Submit</button>
          </div>
        </div>
        </form>
    </div>
  </div>
@stop