<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    @yield("page-header-content")
    <link href="{{asset('blog/css/base.css')}}" rel="stylesheet">
    <link href="{{asset('blog/css/index.css')}}" rel="stylesheet">
    @yield('page-css')
</head>
<body>
<header>
    <div id="logo"><a href="/"></a></div>
    <nav class="topnav" id="topnav"><a href="index.html"><span>首页</span><span class="en">Protal</span></a><a href="about.html"><span>关于我</span><span class="en">About</span></a><a href="newlist.html"><span>慢生活</span><span class="en">Life</span></a><a href="moodlist.html"><span>碎言碎语</span><span class="en">Doing</span></a><a href="share.html"><span>模板分享</span><span class="en">Share</span></a><a href="knowledge.html"><span>学无止境</span><span class="en">Learn</span></a><a href="book.html"><span>留言版</span><span class="en">Gustbook</span></a></nav></nav>
</header>
@yield('page-content')
<footer>
    <p>Design by 后盾网 <a href="http://www.miitbeian.gov.cn/" target="_blank">http://www.houdunwang.com</a> <a href="/">网站统计</a></p>
</footer>
<!--[if lt IE 9]>
<script src="{{asset('blog/js/modernizr.js')}}"></script>
<![endif]-->
<script src="{{asset('blog/js/silder.js')}}"></script>
@yield('page-js')
</body>
</html>