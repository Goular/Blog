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
@section('page-content')
    <h3>
        <p>最新<span>文章</span></p>
    </h3>
    <ul class="rank">
        @foreach($new as $n)
            <li><a href="{{url('a/'.$n->id)}}" title="{{$n->title}}" target="_blank">{{$n->title}}</a></li>
        @endforeach
    </ul>
    <h3 class="ph">
        <p>点击<span>排行</span></p>
    </h3>
    <ul class="paih">
        @foreach($hot as $h)
            <li><a href="{{url('a/'.$h->id)}}" title="{{$h->title}}" target="_blank">{{$h->title}}</a></li>
        @endforeach
    </ul>
@show
<footer>
    <p>{!! Config::get('website.copyright') !!} {!! Config::get('website.web_count') !!}</p>
</footer>
<script src="{{asset('blog/js/silder.js')}}"></script>
@yield('page-js')
</body>
</html>
