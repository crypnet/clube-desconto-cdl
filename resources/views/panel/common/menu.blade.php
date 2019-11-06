@extends('panel.common.master')

@section('menu')
    <li><a class="app-menu__item" href="{{route("home")}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-cog"></i><span class="app-menu__label">Configurações</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        @permission('permission.index')
        <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{route("permision.index")}}"><i class="icon fa fa-circle-o"></i> Permissões</a></li>
        </ul>
        @endpermission
        @permission('users.index')
        <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{route("users.index")}}"><i class="icon fa fa-circle-o"></i> Usuarios</a></li>
        </ul>
        @endpermission
    </li>
    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Clientes</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{route("customer.index")}}"><i class="icon fa fa-circle-o"></i> Clientes</a></li>
        </ul>
    </li>

@endsection
@section('content-title')
    @yield('content-title')
@endsection
@section('content')

    @yield('content')
@endsection

