<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SecobseBlog</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/welcome.css" rel="stylesheet">
    <link rel="shortcut icon" href="/images/logo.png">
    @yield('css')

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container header-top">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand header-name" href="{{ url('/') }}">
                    Secobse
                </a>
            </div>

            <div class="collapse navbar-collapse header-middle" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @if (Auth::guest())
                    @else
                    <li><a href="{{ url('/home') }}">Home</a></li>
                    @endif
                    <li><a href="{{ url('/articles') }}">Articles</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a data-toggle="modal" data-target="#register">Register</a></li>
                        <li><a data-toggle="modal" data-target="#login"><span class="span">Login</span></a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position: relative;  padding-left: 55px;">
                                <img src="/uploads/avatars/{{ Auth::user()->avatar }}" alt="{{ Auth::user()->avatar }}" style="width: 32px; height: 32px; position: absolute; top: 10px; left: 10px; border-radius: 50%;"/>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/profile', Auth::user()->name) }}"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                       <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="isactive" value="0">
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="header-content">
            <p style="text-align: center;">Show you</p>
            <p>personal thoughting</p>
            <a href="#oneContainer" class="wel-header-finger">
                <p><span class="glyphicon glyphicon-chevron-down"></span></p>
                <p><span class="glyphicon glyphicon-chevron-down"></span></p>
                <p><span class="glyphicon glyphicon-chevron-down"></span></p>
            </a>
        </div>
    </nav>
    <!-- login -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <div class="panel-heading">Login</div>
                </div>

                <div class="modal-body">
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="isactive" value="1">

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Username</label>

                                <div class="col-md-6 input-group">
                                    <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Username" autofocus>

                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6 input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                    <input id="password" type="password" class="form-control" placeholder="Password" name="password">

                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>

                                    <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- register -->
    <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <div class="panel-heading">Register</div>
                </div>

                <div class="modal-body">
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- content -->
    <div class="one-container" id="oneContainer">
        <!-- first block -->
        <div class="container">
            <div class="main-heading">
                <h1>Personalise, Integrate.</h1>
            </div>
        </div>

        <!-- second block -->
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <i class="fa fa-desktop fa-3x" aria-hidden="true"></i>
                    <h4>Online web personalisation</h4>
                    <p>
                        Adapt content to each and every user, based on browsing behaviour, history, campaign leads and more.
                    </p>
                </div>
                <div class="col-md-4 middle">
                    <i class="fa fa-pencil fa-3x" aria-hidden+"true"></i>
                    <h4>eCommerce / CRM</h4>
                    <p>
                        Use your customer data to tailor content. Amount spent, returning customer or any other custom variables from your CRM.
                    </p>
                </div>

                <div class="col-md-4">
                    <i class="fa fa-map-o fa-3x" aria-hidden="true"></i>
                    <h4>Location and Mobile</h4>
                    <p>
                        Deliver content directly to where your customers are. Based on location, time, weather and social grade.
                    </p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="col-md-offset-6">
                <a href="#twoContainer" class="wel-content-finger">
                    <p><span class="glyphicon glyphicon-chevron-down"></span></p>
                    <p><span class="glyphicon glyphicon-chevron-down"></span></p>
                    <p><span class="glyphicon glyphicon-chevron-down"></span></p>
                </a>
            </div>
        </div>
    </div>

    <div class="two-container" id="twoContainer">
        <div class="container">
            <div class="row">
                <h1>Explore SecobseBlog</h1>
                <div class="col-md-8 col-md-offset-2">
                    <a href="http://localhost:8000/articles" style="color: #333;"><i class="fa fa-hand-o-right fa-5x" aria-hidden="true">GO</i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer>
        <!-- footer content -->
        <div class="footer" id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    　　<h3>Find us on github</h3>
                       <ul class="social">
                            <li><a href="https://github.com/G1enY0ung">G1enY0ung</a></li>
                            <li><a href="https://github.com/Gasbylei">Gasbylei</a></li>
                            <li><a href="https://github.com/happylwp">happylwp</a></li>
                            <li><a href="https://github.com/loner11">loner11</a></li>
                            <li><a href="https://github.com/Th0rns">Th0rns</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer bottom -->
        <div class="footer-bottom">
            <div class="container">
                <p class="pull-left"> Copyright © Secobse. 2016  All right reserved. </p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/slide.js"></script>

</body>
</html>
