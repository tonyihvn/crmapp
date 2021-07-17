<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Charismatic Renewal Ministries | Abundant Life Assembly</title>
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
  <!-- Fonts -->
  <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">CRM | ALA</a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li>
            <a href="{{ url('/') }}">Home</a>
          </li>
          <li>
            <a href="{{ url('/members') }}">Members</a>
          </li>
          <li>
            <a href="{{ url('/mytasks') }}">Tasks</a>
          </li>
          <li>
            <a href="{{ url('/followups') }}">Follow-up</a>
          </li>
          <li>
            <a href="{{ url('/ministers') }}">Ministers</a>
          </li>
          <li>
            <a href="{{ url('/programmes') }}">Programmes</a>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          @if (Auth::guest())
          <li>
            <a href="{{ url('/auth/login') }}">Login</a>
          </li>
          <li>
            <a href="{{ url('/auth/register') }}">Register</a>
          </li>
          @else
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              @if (Auth::user()->can_post())
              <li>
                <a href="{{ url('/new-member')}}">Add New Member</a>
              </li>
              <li>
                <a href="{{ url('/new-followup')}}">Add New Followup</a>
              </li>
              <li>
                <a href="{{ url('/new-post') }}">Add new post</a>
              </li>
              <li>
                <a href="{{ url('/user/'.Auth::id().'/posts') }}">My Posts</a>
              </li>
              @endif
              <li>
                <a href="{{ url('/user/'.Auth::id()) }}">My Profile</a>
              </li>
              <li>
                <a href="{{ url('/logout') }}">Logout</a>
              </li>
            </ul>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    @if (Session::has('message'))
    <div class="flash alert-info">
      <p class="panel-body">
        {{ Session::get('message') }}
      </p>
    </div>
    @endif
    @if ($errors->any())
    <div class='flash alert-danger'>
      <ul class="panel-body">
        @foreach ( $errors->all() as $error )
        <li>
          {{ $error }}
        </li>
        @endforeach
      </ul>
    </div>
    @endif
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3>@yield('title')</h3>
            @yield('title-meta')
          </div>
          <div class="panel-body">
            @yield('content')
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <p>Copyright © {{date("Y")}} | <a href="https://www.flowkl.com">CRM</a></p>
      </div>
    </div>
  </div>
  <!-- Scripts -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>

</html>