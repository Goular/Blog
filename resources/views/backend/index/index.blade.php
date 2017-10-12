@extends("backend.layout.main")

@section("page-title","后台管理系统--首页")

@section('page-content')
    {{--系统基本信息--}}
    <div class="row">
        <div class="col-md-4">
            <!-- Box Comment -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <div class="user-block">
                        <span class="h5"><a href="#" class="text-green">系统基本信息</a></span>
                    </div>
                    <!-- /.user-block -->
                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus "></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times "></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <ul class="nav nav-stacked">
                        <li><a href="#">操作系统<span class="pull-right badge bg-green">{{PHP_OS}}</span></a></li>
                        <li><a href="#">运行环境<span class="pull-right badge bg-green"><?PHP echo $_SERVER ['SERVER_SOFTWARE']; ?></span></a></li>
                        <li><a href="#">Zend版本<span class="pull-right badge bg-green"><?PHP echo zend_version();?></span></a></li>
                        <li><a href="#">最大上传限制 <span class="pull-right badge bg-green"><?php echo get_cfg_var ("upload_max_filesize")??"不允许上传附件"; ?></span></a></li>
                        <li><a href="#">脚本运行占用最大内存<span class="pull-right badge bg-green"><?php echo get_cfg_var ("memory_limit")??"无"; ?></span></a></li>
                        <li><a href="#">服务器时间 <span class="pull-right badge bg-green"><?php date_default_timezone_set ('PRC'); echo date("Y-m-d G:i:s");?></span></a></li>
                        <li><a href="#">服务器域名/IP<span class="pull-right badge bg-green"><?php echo $_SERVER['HTTP_HOST'];?></span></a></li>
                        <li><a href="#">当前主机<span class="pull-right badge bg-green"><?php echo $_SERVER["REMOTE_ADDR"];?></span></a></li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
@endsection

@section('page-js')

@endsection

@section('page-css')

@endsection

