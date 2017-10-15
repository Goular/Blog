<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('page-title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset("adminlte/css/AdminLTE.min.css")}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset("adminlte/css/skins/_all-skins.min.css")}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    @yield('page-css')
</head>
<body class="hold-transition skin-green-light sidebar-mini">
<div class="wrapper">

    <!-- 后台管理头部响应式布局 -->
    @include("backend.layout.header")
    <!-- Left side column. contains the logo and sidebar -->
    @include("backend.layout.leftSideBar")

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="glyphicon glyphicon-home"></i>首页</a></li>
                <li class="">商品管理</li>
                <li class="active">添加商品</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            @yield('page-content')
        </section>
    </div>

    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>版本</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2016-2018 <a href="{{url('')}}">加工屋</a> @</strong> 版权所有   粤ICP备17077628号-1
    </footer>

    <!-- Control Sidebar -->
    @include("backend.layout.controlSidebar")
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://cdn.bootcss.com/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset("adminlte/js/adminlte.min.js")}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--<script src="{{asset('adminlte/js/pages/dashboard.js')}}"></script>--}}
<!-- AdminLTE for demo purposes -->
<script src="{{asset('adminlte/js/demo.js')}}"></script>
{{--自定义js文件--}}
<script src="{{asset('js/goular.js')}}"></script>
@yield('page-js')

</body>
</html>
