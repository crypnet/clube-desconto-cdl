<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="app sidebar-mini rtl">
<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="{{route("home")}}" style="font-family: Lato, -apple-system,Arial, sans-serif">{{ config('app.name', 'Laravel') }}</a>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <ul class="app-nav">
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li>                        <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out fa-lg"></i>Sair</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </li>
    </ul>
</header>
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div>
            <p class="app-sidebar__user-name text-center">{{Auth()->user()->name}}</p>
            <p class="app-sidebar__user-designation text-center">{{Auth()->user()->email}}</p>
        </div>
    </div>
    <ul class="app-menu">
        @yield('menu')
    </ul>
</aside>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>@yield('content-title')</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                @yield('content')
            </div>
        </div>
    </div>
</main>
<footer class="page-footer font-small" style="background-color: #344f8a;color:#ffffff">
    <div class="footer-copyright text-center py-3" >{{"© ".date('Y')." Copyright: "}}

        <a onclick="window.open('https://www.linkedin.com/in/andre-luis-61b963190')"style="color:#ffffff ;:hover
        color: #000000;
   };">Andre Soares</a>
    </div>
</footer>
<!-- Footer -->
<script src="{{asset("js/jquery-3.2.1.min.js")}} "></script>
<script src="{{asset("js/popper.min.js")}}"></script>
<script src="{{asset("js/bootstrap.min.js")}}"></script>
<script src="{{asset("js/main.js")}}"></script>
<script src="{{asset("js/plugins/pace.min.js")}}"></script>
</body>
</html>

