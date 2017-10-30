<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    @yield('page-header-content')
    <link href="{{asset('blog/css/base.css')}}" rel="stylesheet">
    <link href="{{asset('blog/css/index.css')}}" rel="stylesheet">
    <link href="{{asset('blog/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('blog/css/new.css')}}" rel="stylesheet">
    @yield('page-css')
    <!--[if lt IE 9]>
    <script src="{{asset('blog/js/modernizr.js')}}"></script>
    <![endif]-->
</head>
<body>
<header>
    <div id="logo"><a href="{{url('/')}}"></a></div>
    <nav class="topnav" id="topnav">@foreach($viewNavigations as $key => $nav)<a href="{{$nav->url}}"><span>{{$nav->name}}</span><span class="en">{{$nav->alias}}</span></a>@endforeach</nav>
</header>
@yield('page-content')
<footer>
    <p>{!! Config::get('website.copyright') !!} {!! Config::get('website.web_count') !!}</p>
</footer>
<script src="{{asset('blog/js/silder.js')}}"></script>
@yield('page-js')
</body>
</html>
