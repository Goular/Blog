{{--根据分类ID来显示与其相关连接的内容--}}
@extends("frontend.layout.master")

@section("page-header-content")
    <title>{{\Config::get("website.web_title")}}-{{\Config::get("website.seo_title")}}</title>
    <meta name="keywords" content="{{$field->keywords}}"/>
    <meta name="description" content="{{$field->description}}"/>
@endsection

@section("page-content")
    <article class="blogs">
        <h1 class="t_nav"><span>{{$field->title}}
            </span><a href="{{url('/')}}" class="n1">网站首页</a><a href="{{url('/indexs/category/'.$field->id)}}" class="n2">{{$field->name}}</a>
        </h1>
        <div class="newblog left">
            @foreach($data as $d)
                <h2>{{$d->title}}</h2>
                <p class="dateview">
                    <span>发布时间：{{$d->updated_at->diffForHumans()}}</span><span>作者：{{$d->author}}</span><span>分类：[<a
                                href="{{url('cate/'.$field->id)}}">{{$field->name}}</a>]</span></p>
                <figure><img src="{{\App\Tools\Qiniu\QiniuHelper::showUrl($d->thumb)}}"></figure>
                <ul class="nlist">
                    <p>{{$d->description}}</p>
                    <a title="{{$d->title}}" href="{{url('a/'.$d->id)}}" target="_blank"
                       class="readmore">阅读全文>></a>
                </ul>
                <div class="line"></div>
            @endforeach
            <div class="page">
                {{$data->links()}}
            </div>
        </div>
        <aside class="right">
            @if($submenu->all())
                <div class="rnav">
                    <ul>
                        @foreach($submenu as $k=>$s)
                            <li class="rnav{{$k+1}}"><a href="{{url('categories/'.$s->id)}}"
                                                        target="_blank">{{$s->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endif
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
            <div class="news" style="float:left;">
                <h3>
                    <p>最新<span>文章</span></p>
                </h3>
                <ul class="rank">
                    <li><a href="/" title="Column 三栏布局 个人网站模板" target="_blank">Column 三栏布局 个人网站模板</a></li>
                    <li><a href="/" title="with love for you 个人网站模板" target="_blank">with love for you 个人网站模板</a></li>
                    <li><a href="/" title="免费收录网站搜索引擎登录口大全" target="_blank">免费收录网站搜索引擎登录口大全</a></li>
                    <li><a href="/" title="做网站到底需要什么?" target="_blank">做网站到底需要什么?</a></li>
                    <li><a href="/" title="企业做网站具体流程步骤" target="_blank">企业做网站具体流程步骤</a></li>
                    <li><a href="/" title="建站流程篇——教你如何快速学会做网站" target="_blank">建站流程篇——教你如何快速学会做网站</a></li>
                    <li><a href="/" title="box-shadow 阴影右下脚折边效果" target="_blank">box-shadow 阴影右下脚折边效果</a></li>
                    <li><a href="/" title="打雷时室内、户外应该需要注意什么" target="_blank">打雷时室内、户外应该需要注意什么</a></li>
                </ul>
                <h3 class="ph">
                    <p>点击<span>排行</span></p>
                </h3>
                <ul class="paih">
                    <li><a href="/" title="Column 三栏布局 个人网站模板" target="_blank">Column 三栏布局 个人网站模板</a></li>
                    <li><a href="/" title="withlove for you 个人网站模板" target="_blank">with love for you 个人网站模板</a></li>
                    <li><a href="/" title="免费收录网站搜索引擎登录口大全" target="_blank">免费收录网站搜索引擎登录口大全</a></li>
                    <li><a href="/" title="做网站到底需要什么?" target="_blank">做网站到底需要什么?</a></li>
                    <li><a href="/" title="企业做网站具体流程步骤" target="_blank">企业做网站具体流程步骤</a></li>
                </ul>
            </div>
            <div style="clear: both;"></div>
            <div class="visitors">
                <h3><p>最近<span>访客</span></p></h3>
                <ul>

                </ul>
            </div>
        </aside>
    </article>
@endsection

@section('page-js')

@endsection

@section('page-css')

@endsection