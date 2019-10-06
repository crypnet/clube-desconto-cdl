@extends('panel.common.master')

@section('menu')
    <li><a class="app-menu__item" href="{{route("home")}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
@endsection
@section('content-title')
    @yield('content-title')
@endsection
@section('content')
    @yield('content')
@endsection

