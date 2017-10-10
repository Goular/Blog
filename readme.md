<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# 项目使用须知

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

</pre>