{{-- 后台系统登录 --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>后台管理系统--登录</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('adminlte/css/AdminLTE.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{url('adminlte/plugins/iCheck/square/blue.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page"
      style="background:url({{url('images/bg-admin.svg')}}) no-repeat center;background-size: 100%">
<div class="login-box">
    <div class="login-logo">
        <a href="/adminlte/index2.html"><b>博客</b>后台系统</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">登录</p>

        <form action="{{url('admin/login')}}" method="post">
            {{csrf_field()}}
            <div class="form-group has-feedback">
                <input name="username" type="username" class="form-control" placeholder="请输入用户名" value="{{old('username')}}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input name="password" type="password" class="form-control" placeholder="请输入密码">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div style="display: flex;justify-content: space-between;" class="form-group form-inline has-feedback">
                <input name="captcha" type="text" class="form-control" placeholder="请输入验证码">
                <img style="width: 85px;" src="{{url('verify/captcha/img')}}" alt=""
                     onclick="this.src='{{url('verify/captcha/img')}}?'+Math.random()">
            </div>
            <div class="row">
                {{--<div style="visibility:hidden; " class="col-xs-8">--}}
                    {{--<div class="checkbox icheck">--}}
                        {{--<label>--}}
                            {{--<input type="checkbox"> 记住我--}}
                        {{--</label>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <!-- /.col -->
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">登录</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        @include("backend.layout.errorMsg")
    {{--<div class="social-auth-links text-center">--}}
    {{--<p>- 或 -</p>--}}
    {{--<a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in--}}
    {{--using--}}
    {{--Facebook</a>--}}
    {{--<a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in--}}
    {{--using--}}
    {{--Google+</a>--}}
    {{--</div>--}}
    <!-- /.social-auth-links -->
        <div style="display: flex;justify-content: space-between;padding-top: 12px;">
            <a href="#">忘记密码?</a><br>
            <a href="register.html" class="text-center">注册会员</a>
        </div>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="{{url('adminlte/plugins/iCheck/icheck.min.js')}}"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
