<!DOCTYPE html>
<html>
    <head>
        <title> Questionnaire </title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>

    <body>
      <div class="container">
          <div class="row" style="padding-top:10px;">
              <div class="center-align">
                <a class="btn  btn-success" href="/"> Home </a>
                  @if(Auth::check())
                    <a class="btn  btn-success" href="/logout"> Logout </a>
                    <a class="btn  btn-success" href="#" style="text-transform:none;">{{ Auth::user()->email }}</a>
                  @else
                    <a class="btn  btn-success" href="/login"> Login </a>
                    <a class="btn  btn-success" href="/register"> Register </a>
                  @endif
              </div>
          </div>
          <div class="row">
              <div class="btn  btn-success" style="margin-top:10px;">
                @yield('content')
              </div>
          </div>
      </div>
      <script src="{{ URL::asset('jquery.min.js') }}"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> -->
    {!! MaterializeCSS::include_js() !!}

    <script src="{{ URL::asset('init.js') }}"></script>
    </body>
    

</html>
