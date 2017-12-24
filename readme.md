<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# 项目使用须知

### 部署步骤
<pre>
    1.在部署的机子上执行 php artisan key:generate
        原因是本地开发是csrf的秘钥已经泄露
    2.上线时需要将debug模式改为false，即env文件
    3.nginx配置文件需要加上url美化，不然不会运行
        location / {  
            try_files $uri $uri/ /index.php?$query_string;  
        } 
</pre>


### 使用前需要执行的指令
<pre>
    1.「公开磁盘」就是指你的文件将可被公开访问，默认下， public 磁盘使用 local 驱动且将文件存放在 storage/app/public 目录下。为了能通过网络访问，你需要创建 public/storage 到 storage/app/public 的符号链接。
        php artisan storage:link
    2.由于Laravel是外国人开发的，所以时区和默认语言是需要进行修改的
        修改位置:config/app.php
        'timezone'=>'RPC' 时区
        'locale'=>'zh'    当地语言
</pre>

### 项目前端和图片等静态资源构建(gulp.js)
<pre>
    什么是gulp？ 
        gulp是新一代的前端项目构建工具，你可以使用gulp及其插件对你的项目代码（less,sass）进行编译，还可以压缩你的js和css代码，甚至压缩你的图片，gulp仅有少量的API，所以非常容易学习。 gulp 使用 stream 方式处理内容。
    
    gulp和grunt的异同点
        易于使用：采用代码优于配置策略，Gulp让简单的事情继续简单，复杂的任务变得可管理。
        高效：通过利用Node.js强大的流，不需要往磁盘写中间文件，可以更快地完成构建。
        高质量：Gulp严格的插件指导方针，确保插件简单并且按你期望的方式工作。
        易于学习：通过把API降到最少，你能在很短的时间内学会Gulp。构建工作就像你设想的一样：是一系列流管道。

    因为gulp是用node.js写的，所以你需要在你的终端上安装好npm。npm是node.js的包管理器，所以先在你的机子上安装好node.js吧
    
    gulp安装命令 
        sudo npm install -g gulp
    
    在根目录下新建package.json文件
        npm init .    
    
    安装gulp包
        npm install gulp --save-dev  
    
    安装插件
        安装常用插件：
            sass的编译                  （gulp-ruby-sass）
            自动添加css前缀              （gulp-autoprefixer）
            压缩css                    （gulp-minify-css）
            js代码校验                  （gulp-jshint）
            合并js文件                  （gulp-concat）
            压缩js代码                  （gulp-uglify）
            压缩图片                    （gulp-imagemin）
            自动刷新页面                 （gulp-livereload）
            图片缓存，只有图片替换了才压缩  （gulp-cache）
            更改提醒                    （gulp-notify）
            清除文件                    （del）

    安装这些插件需要运行如下命令：
    $ npm install gulp-ruby-sass gulp-autoprefixer gulp-minify-css gulp-jshint gulp-concat gulp-uglify gulp-imagemin gulp-notify gulp-rename gulp-livereload gulp-cache del --save-dev
    
    gulp命令
        你仅仅需要知道的5个gulp命令
            gulp.task(name[, deps], fn) 定义任务  name：任务名称 deps：依赖任务名称 fn：回调函数
            gulp.run(tasks...)：尽可能多的并行运行多个task
            gulp.watch(glob, fn)：当glob内容发生改变时，执行fn
            gulp.src(glob)：置需要处理的文件的路径，可以是多个文件以数组的形式，也可以是正则
            gulp.dest(path[, options])：设置生成文件的路径
            glob：可以是一个直接的文件路径。他的含义是模式匹配。
            gulp将要处理的文件通过管道（pipe()）API导向相关插件。通过插件执行文件的处理任务。
            
            gulp.task('default', function () {...});
            gulp.task这个API用来创建任务，在命令行下可以输入$ gulp [default]，（中括号表示可选）来执行上面的任务。
            gulp官方API文档：https://github.com/gulpjs/gul...
            gulp 插件大全：http://gulpjs.com/plugins/
            
    开始构建项目   
        在项目根目录下新建一个gulpfile.js文件，粘贴如下代码：

        //在项目根目录引入gulp和uglify插件
        var gulp = require('gulp');
        var uglify = require('gulp-uglify');
       
        gulp.task('compress',function(){
            return gulp.src('script/*.js')
            .pipe(uglify())
            .pipe(gulp.dest('dist'));
        });
    
    更详细的Gulp.JS的教程，请查阅:https://segmentfault.com/a/1190000002580846
</pre>


### 注意点
<pre>
    1.在文件夹/resources/views/vendor中的模板是使用了php artisan vendor:publish命令生成出来的，目前作用不明.
    2.PHP内置的Web服务器将把这个文件作为入口。以public/index.php为入口的可以忽略掉该文件
    3.Laravel速度优化:https://laravel-china.org/articles/2020/ten-laravel-5-program-optimization-techniques
    4.这里分模型和实体，模型是会处理逻辑功能的，尽量把逻辑写到实体，让控制器更多的是处理业务分发等与界面或api的交互
    5.后台管理的路由可以使用namespace来进行提取，这样就不用每个路由都写\App\Admin\Controller...那么长的内容了
</pre>

###
<pre>
    PHP7:可以使用三元运算符 ?? 带省略写下面的内容.
    
    PHP程式版本： <?PHP echo PHP_VERSION; ?>
    ZEND版本： <?PHP echo zend_version(); ?>
    MYSQL支持： <?php echo function_exists (mysql_close)?"是":"否"; ?>
    MySQL数据库持续连接 ： <?php echo @get_cfg_var("mysql.allow_persistent")?"是 ":"否"; ?>
    MySQL最大连接数： <?php echo @get_cfg_var("mysql.max_links")==-1 ? "不限" : @get_cfg_var("mysql.max_links");?>
    服务器操作系统： <?PHP echo PHP_OS; ?>
    服务器端信息： <?PHP echo $_SERVER ['SERVER_SOFTWARE']; ?>
    最大上传限制： <?PHP echo get_cfg_var ("upload_max_filesize")?get_cfg_var ("upload_max_filesize"):"不允许上传附件"; ?>
    最 大执行时间： <?PHP echo get_cfg_var("max_execution_time")."秒 "; ?>
    脚本运行占用最大内存： <?PHP echo get_cfg_var ("memory_limit")?get_cfg_var("memory_limit"):"无" ?>
    查询当前连接的MYSQL数据库的版本 php自带函数 mysql_get_server_info() 
    获得服务器系统时间 date_default_timezone_set (PRC); echo date("Y-m-d G:i:s");
    
    查询当前连接的MYSQL数据库的版本 php自带函数 mysql_get_server_info() 
    获得服务器系统时间 date_default_timezone_set (PRC); echo date("Y-m-d G:i:s");
</pre>

### 如何重写Laravel 的attempt方法呢？因为加密方法是自定义的。 
<pre>
    https://segmentfault.com/q/1010000006071468 
</pre>

### 后台子模板内容
<pre>
    @extends("backend.layout.main")
    
    @section("page-title","后台管理系统--首页")
    
    @section('page-content')
    
    @endsection
    
    @section('page-js')
    
    @endsection
    
    @section('page-css')
    
    @endsection
</pre>


### 前台子模板内容
<pre>
    @extends("frontend.layout.master")
    
    @section("page-header-content")
        <title>后盾个人博客</title>
        <meta name="keywords" content="个人博客模板,博客模板" />
        <meta name="description" content="寻梦主题的个人博客模板，优雅、稳重、大气,低调。" />
    @endsection
    
    @section("page-content")
        
    @endsection
    
    @section('page-js')
    
    @endsection
    
    @section('page-css')
    
    @endsection
</pre>

### old()辅助方法,laravel 提交表单带参数返回,记住上一次输入,return back()->withInput()
<pre>
    old 函数 获取 session 内一次性的历史输入值： 
        $value = old('value');
        $value = old('value', 'default');

    1.我们根据错误原因，返回在控制器里面吊用return banck 函数  
        if(empty($request->usename)) return back()->with('msg','账号不能为空 ！')->withInput();
        好的，这里我们把表单的内容和附带一个msg返回注册表单
    
    2.这里返回的值msg我们可以用session闪存获取
        @if(Session::has('msg'))
           <div>{{ Session::get('msg') }}</div>
        @endif
        这样，你可以一次获取返回的错误
    
    3.我们怎么在文本框中获取原来提交的值？  
        <input type="text" name="usename" placeholder="请输入电话号码" value="{{ old('usename') }}" />
        这里我们运用old 函数返回便可以获取具体上一次提交的值
</pre>

### 组件@component和slot
<pre>
    组件文件内容:
    <div class="alert alert-danger">
        <div class="alert-title">{{ $title }}</div>
        {{ $slot }}
    </div>
    
    使用视图
    @component('view.alert.danger')
        @slot('title')
            abc
        @endslot
    @component
</pre>

### 后台AJax的写法模板
<pre>
    位置:App\Admin\Controllers\changeOrder   

    //变更分类的排序级别
    public function changeOrder()
    {
        $validator = \Validator::make(request()->all(), [
            'id' => 'required|numeric',
            'value' => 'required|numeric'
        ], [
            'id.required' => 'ID字段不能为空',
            'value.required' => '排序值不能为空',
            'id.numeric' => 'ID字段必须是数字',
            'value.numeric' => '排序值必须是数字',
        ]);
        //验证失败返回json数据
        if ($validator->fails())
            return $this->toJson(null, -1, $this->compactAjaxErrorsMsg($validator));
        //进行逻辑操作
        $id = request('id');
        $value = request('value');
        $model = new CategoryModel();
        if ($model->changeOrder($id, $value)) {
            //更新成功
            return $this->ajaxSuccessOperate();
        } else {
            //更新失败
            return $this->ajaxFailOperate();
        }
    }
</pre>


### HTMLPurifier for Laravel 5 使用
<pre>  
    default
        clean(Input::get('inputname'));
          or
        Purifier::clean(Input::get('inputname'));
    
    dynamic config
        clean('This is my H1 title', 'titles');
        clean('This is my H1 title', array('Attr.EnableID' => true));
            or
        Purifier::clean('This is my H1 title', 'titles');
        Purifier::clean('This is my H1 title', array('Attr.EnableID' => true));
<pre>

### Mock数据
<pre>
    使用seeder和factory()方法来产生模拟数据
    
    factory方法使用
    1.
        $factory->define(App\Entities\FriendLink::class,function (Faker $faker){
            return [
                'name' => $faker->name,
                'title' => $faker->title,
                'url' => $faker->url,
                'order' => $faker->numberBetween(0,1000),
            ];
        });
    2.
        php artisan tinker;
        factory(App\Entities\FriendLink::class, 10)->create();
        回车创建内容
</pre>

### Carbon时间处理类
<pre>
    http://blog.csdn.net/lbwo001/article/details/53063867
</pre>