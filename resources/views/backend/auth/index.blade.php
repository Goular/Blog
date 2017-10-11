<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="{{asset('/admins/css/ch-ui.admin.css')}}">
  <link rel="stylesheet" href="{{asset('/admins/font/css/font-awesome.min.css')}}">
</head>
<body style="background:#F3F3F4;">
<div class="login_box">
  <h1>Blog</h1>
  <h2>欢迎使用博客管理平台</h2>
  <div class="form">
    <form action="#" method="post">
      {{csrf_field()}}
      <ul>
        <li>
          <input type="text" name="username" class="text"/>
          <span><i class="fa fa-user"></i></span>
        </li>
        <li>
          <input type="password" name="password" class="text"/>
          <span><i class="fa fa-lock"></i></span>
        </li>
        <li>
          <input type="text" class="code" name="captcha"/>
          <span><i class="fa fa-check-square-o"></i></span>
          <img src="{{url('captcha')}}" alt="" onclick="this.src='{{url('captcha')}}?'+Math.random()">
        </li>
        @include('backend.layout.errorMsg')
        <li>
          <input type="submit" value="立即登陆"/>
        </li>
      </ul>
    </form>
    <p><a href="https://blog.jiagongwu.com">返回首页</a> &copy; 2016 Powered by Goular <a href="https://jiagongwu.com" target="_blank">https://jiagongwu.com</a></p>
  </div>
</div>
</body>
</html>