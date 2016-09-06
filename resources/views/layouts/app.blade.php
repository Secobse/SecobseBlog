<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
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
    <nav class="navbar navbar-default navbar-static-top navbar-fixed-top" style="margin-bottom: 0px; background-color: #040404; border-color: black;">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}" style="color: white; font-weight: bold; font-size: 24px;">
                    Secobse

                </a>
                  <a class="navbar-brand" href="{{ url('/') }}">
                    <img alt="Brand" src="/images/logo.png" style="position: relative; left: 95px; bottom: 13px; width: 50px; height: 50px; ">
                  </a>

            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/articles') }}" style="color: white; font-weight: bold; font-size: 16px;">Articles</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a data-toggle="modal" data-target="#login">Login</a></li>
                        <li><a data-toggle="modal" data-target="#register">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position: relative;  padding-left: 55px; color: white; font-weight: bold;">
                                <img src="/uploads/avatars/{{ Auth::user()->avatar }}" alt="{{ Auth::user()->avatar }}" style="width: 32px; height: 32px; position: absolute; top: 10px; left: 10px; border-radius: 50%;"/>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/profile', Auth::user()->name) }}"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                                <li><a href="{{ url('/home') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
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
    </nav>

    @include('auth.login')
    @include('auth.register')

    @yield('content')

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    @yield('js')
</body>
</html>
