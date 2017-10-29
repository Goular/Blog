@extends("backend.layout.main")

@section("page-title","后台管理系统--首页")

@section('page-content')
    <div class="row">
        <div class="col-lg-6">
            <!-- Horizontal Form -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">友情链接添加</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{url('admin/friend_links')}}" class="form-horizontal" method="post">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">链接名称<label
                                        class="text-red">(必填)</label></label>
                            <div class="col-sm-10">
                                <input name="name" type="text" class="form-control" id="name" placeholder="请输入链接名称" value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">链接标题<label
                                        class="text-red">(必填)</label></label>
                            <div class="col-sm-10">
                                <input name="title" type="text" class="form-control" id="title" placeholder="请输入链接标题" value="{{old('title')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keywords" class="col-sm-2 control-label">URL<label
                                        class="text-red">(必填)</label></label>
                            <div class="col-sm-10">
                                <input name="url" type="text" class="form-control" id="title" placeholder="请输入URL" value="{{old('url')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="order" class="col-sm-2 control-label">排序</label>
                            <div class="col-sm-10">
                                <input name="order" type="number" class="form-control" id="order" placeholder="请输入排序" value="{{old('order')}}">
                            </div>
                        </div>
                        @include("backend.layout.errorMsg")
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success">创建</button>
                        <button type="submit" class="btn btn-default pull-right">重置</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>

@endsection

@section('page-js')

@endsection

@section('page-css')

@endsection

@section('page-nav-content')
    <h1>
        友情链接管理
        <small>链接添加</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="glyphicon glyphicon-home"></i>首页</a></li>
        <li class="">友情链接管理</li>
        <li class="active">链接添加</li>
    </ol>
@endsection