@extends("backend.layout.main")

@section("page-title","后台管理系统--首页")

@section('page-content')
    <div class="row">
        <div class="col-lg-12">
            <!-- Horizontal Form -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">网站配置添加</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{url('admin/web_configs/'.$selectConfig->id)}}" class="form-horizontal" method="post">
                    {{csrf_field()}}
                    {{method_field("put")}}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">配置标题<label
                                        class="text-red">(必填)</label></label>
                            <div class="col-sm-10">
                                <input name="title" type="text" class="form-control" id="title" placeholder="请输入标题" value="{{$selectConfig->title}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="type" class="col-sm-2 control-label">配置类型</label>
                            <div class="col-sm-10">
                                <label class="radio-inline">
                                    <input type="radio" name="type_name" id="inlineRadio1" value="input" @if($selectConfig->type_name == 'input') checked @endif onclick="showTr()"> input
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="type_name" id="inlineRadio2" value="textarea" @if($selectConfig->type_name == 'textarea') checked @endif onclick="showTr()"> textarea
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="type_name" id="inlineRadio3" value="radio" @if($selectConfig->type_name == 'radio') checked @endif onclick="showTr()"> radio
                                </label>
                            </div>
                        </div>
                        <div class="form-group value">
                            <label for="value" class="col-sm-2 control-label">配置类型值</label>
                            <div class="col-sm-10">
                                <input name="type_value" type="text" class="form-control" id="value" placeholder="格式: 1|开启,0|关闭" value="{{$selectConfig->type_value}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">配置名称[英文]<label
                                        class="text-red">(必填)</label></label>
                            <div class="col-sm-10">
                                <input name="name" type="text" class="form-control" id="name" placeholder="请输入配置名称" value="{{$selectConfig->name}}">
                            </div>
                        </div>
                        <div class="form-group value">
                            <label for="value" class="col-sm-2 control-label">配置值</label>
                            <div class="col-sm-10">
                                <textarea name="value" class="form-control" id="description" rows="3" placeholder="请输入配置值">{{$selectConfig->value}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="order" class="col-sm-2 control-label">排序</label>
                            <div class="col-sm-10">
                                <input name="order" type="number" class="form-control" id="order" placeholder="请输入排序" value="{{$selectConfig->order}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">配置描述</label>
                            <div class="col-sm-10">
                                <textarea name="description" class="form-control" id="description" rows="3" placeholder="请输入配置描述">{{$selectConfig->description}}</textarea>
                            </div>
                        </div>
                        @include("backend.layout.errorMsg")
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success center-block">修改</button>
                        {{--<button type="submit" class="btn btn-default pull-right">重置</button>--}}
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>

@endsection

@section('page-js')
    <script>
        showTr();
        function showTr() {
            var type = $('input[name=type_name]:checked').val();
            if(type=='radio'){
                $('.value').show();
            }else{
                $('.value').hide();
            }
        }
    </script>
@endsection

@section('page-css')

@endsection

@section('page-nav-content')
    <h1>
        网站配置管理
        <small>网站配置修改</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="glyphicon glyphicon-home"></i>首页</a></li>
        <li class="">网站配置管理</li>
        <li class="active">网站配置修改</li>
    </ol>
@endsection