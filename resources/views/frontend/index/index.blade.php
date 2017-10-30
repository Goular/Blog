@extends("frontend.layout.master")

@section("page-header-content")
    <title>{{\Config::get("website.web_title")}}-{{\Config::get("website.seo_title")}}</title>
    <meta name="keywords" content="{{\Config::get("website.keywords")}}"/>
    <meta name="description" content="{{\Config::get("website.description")}}"/>
@endsection

@section("page-content")
    <div class="banner">
        <section class="box">
            <ul class="texts">
                <p>&nbsp;&nbsp;互联网菜鸟,四年驾龄老司机</p>
                <p>&nbsp;&nbsp;把玩各种编程技术，爱开车，爱钓鱼</p>
                <p>&nbsp;&nbsp;所以到目前还是一只单身狗,唉....</p>
            </ul>
            <div class="avatar"><a href="https://github.com/Goular"><span>我的GitHub</span></a></div>
        </section>
    </div>
    <div class="template">
        <div class="box">
            <h3>
                <p><span>站长</span>推荐 Recommend</p>
            </h3>
            <ul>
                @foreach($pics as $p)
                    <li><a href="{{url('articles/'.$p->id)}}"  target="_blank"><img src="{{\App\Tools\Qiniu\QiniuHelper::showUrl($p->thumb)}}"></a><span>{{$p->title}}</span></li>
                @endforeach
            </ul>
        </div>
    </div>
    <article>
        <h2 class="title_tj">
            <p>文章<span>推荐</span></p>
        </h2>
        <div class="bloglist left">
            @foreach($data as $d)
                <h3>{{$d->title}}</h3>
                <figure><img src="{{\App\Tools\Qiniu\QiniuHelper::showUrl($p->thumb)}}"></figure>
                <ul>
                    <p>{{str_limit($d->description,120,"...")}}</p>
                    <a title="{{$d->title}}" href="{{url('articles/'.$d->id)}}" target="_blank" class="readmore">阅读全文>></a>
                </ul>
                <p class="dateview"><span>{{$d->updated_at->diffForHumans()}}</span><span>作者：{{$d->editor}}</span></p>
            @endforeach
            <div class="page">
                {{$data->links()}}
            </div>
        </div>
        <aside class="right">
            <!-- Baidu Button BEGIN -->
            <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a
                        class="bds_qzone"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span
                        class="bds_more"></span><a class="shareCount"></a></div>
            <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585"></script>
            <script type="text/javascript" id="bdshell_js"></script>
            <script type="text/javascript">
                document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date() / 3600000)
            </script>
            <!-- Baidu Button END -->
            {{--天气播报--}}
            <div style="float: left">
                {{--<iframe width="250" scrolling="no" height="60" frameborder="0" allowtransparency="true"--}}
                        {{--src="http://i.tianqi.com/index.php?c=code&id=12&icon=1&num=1"></iframe>--}}
            </div>
            <div class="news" style="float: left">
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
                <h3 class="links">
                    <p>友情<span>链接</span></p>
                </h3>
                <ul class="website">
                    @foreach($links as $l)
                        <li><a href="{{$l->url}}" target="_blank">{{$l->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </aside>
    </article>
@endsection

@section('page-js')

@endsection

@section('page-css')

@endsection