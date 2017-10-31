@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Name of Questionnaire</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="create">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="content" type="text" class="form-control" name="content"  required autofocus>
                               
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                  Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection












<!-- @section('content')
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
@stop -->