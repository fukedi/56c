<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>@yield('title')</title>
    @section('css')
    <!-- Bootstrap -->
    <link href="{{asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="{{asset('static/css/custom.min.css')}}" rel="stylesheet">
        @show
</head>

<body class="nav-md">
<div id="app" class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            @include('admin.common.left')
        </div>
    <!-- top navigation -->
       @include('admin.common.header')
        <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">
            @yield('content')
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer>
            <div class="pull-right">
                @section('footer')

                @show
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>
@section('script')
<!-- jQuery -->
<script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
{{--<!-- Bootstrap -->--}}
<script src="{{asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('static/js/custom.min.js')}}"></script>
@show
</body>
</html>
