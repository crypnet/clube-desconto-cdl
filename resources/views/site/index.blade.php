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
<style>
    *  {
        margin:0;
        padding:0;
    }

    html, body {height:100%;}

    .corp{
        display: flex;
        align-items: center;
        align-content: center;
        justify-items: center;
        justify-content: center;
    }

    .jumbotron{
        background: none;
        width: 100%;
        height: 50px;
    }
    .logo{
    float: left;
    }
</style>
<body class="app sidebar-mini rtl">
<div class="jumbotron text-center">
<div class="logo"><img src="{{asset('logo-cdl.png')}}" width="150px" height="50px"/></div>
</div>
<div class="flex-row d-flex p-2 corp">
    <div id='form_add' class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center" style="pointer-events: block; ">
        <h1 class="title">Clube de Descontos</h1>
        <p class="title" id="cont_add">Conforme regulamento você concederá desconto ao associado
                e aos seus funcionários apenas se ele for um associado ativo.</p>
        <br>

        <div class="form-group">
            <label for="codigo">Validar CNPJ</label>
            <input type="text" class="form-control" id="codigo_add" placeholder="Digite o CNPJ">
        </div>
        <button type="button" class="btn btn-primary" onclick="add_product()">Validar</button>
    </div>

</div>

<footer class="page-footer font-small" style="background-color: #344f8a;color:#ffffff; position:absolute;
        bottom:0;
        width:100%;">
    <div class="footer-copyright text-center py-3" >{{"© ".date('Y')." Copyright: "}}
        <a onclick="window.open('https://www.linkedin.com/in/andre-luis-61b963190')"style="color:#ffffff ;:hover
        color: #000000;
   };">Andre Soares</a>
    </div>
</footer>
<!-- Footer -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{asset("js/jquery-3.2.1.min.js")}} "></script>
<script src="{{asset("js/popper.min.js")}}"></script>
<script src="{{asset("js/bootstrap.min.js")}}"></script>
<script src="{{asset("js/main.js")}}"></script>
<script src="{{asset("js/plugins/pace.min.js")}}"></script>
<script src="{{ asset('js/plugins/sweetalert.min.js') }}"></script>

</body>
</html>

