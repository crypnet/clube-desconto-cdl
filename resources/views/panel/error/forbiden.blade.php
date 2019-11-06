@extends('panel.common.panel')

@section('content-title')

@endsection

@section('content')
    <div class="page-error tile">
        <h1><i class="fa fa-exclamation-circle"></i> Error 403: Permissão Negada</h1>
        <p><a class="btn btn-primary" href="{{route('home')}}">Ir para home</a></p>
    </div>
@endsection

@section('extra-script')

@endsection

