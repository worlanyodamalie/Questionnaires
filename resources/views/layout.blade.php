<!DOCTYPE html>
<html>
    <head>
        <title>Questionnaire - Polling App</title>
        
        <link rel="stylesheet" href="{{asset('css/app.css')}}">    </head>

    <body>
      <div class="container">
          <div class="row" style="padding-top:10px;">
              <div class="center-align">
                <a class="btn blue waves-effect waves-light lighten-1 white-text" href="/"> Home </a>
                  @if(Auth::check())
                    <a class="btn-flat waves-effect waves-light darken-1 white black-text" href="/logout"> Logout </a>
                    <a class="btn-flat disabled" href="#" style="text-transform:none;">{{ Auth::user()->email }}</a>
                  @else
                    <a class="btn-flat waves-effect waves-light darken-1 white black-text" href="/login"> Login </a>
                    <a class="btn-flat waves-effect waves-light darken-1 white black-text" href="/register"> Register </a>
                  @endif
              </div>
          </div>
          <div class="row">
              <div class="col s12 m10 offset-m1 l8 offset-l2" style="margin-top:10px;">
                @yield('content')
              </div>
          </div>
      </div>
    </body>
    \
</html>
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
    </body>
    

</html>
