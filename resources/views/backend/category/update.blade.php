@extends("backend.layout.main")

@section("page-title","后台管理系统--首页")

@section('page-content')
    <div class="row">
        <div class="col-lg-6">
            <!-- Horizontal Form -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">分类添加</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{url('admin/categories/'.$selectCate->id)}}" class="form-horizontal" method="post">
                    {{csrf_field()}}
                    {{method_field('put')}}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">父级分类</label>
                            <div class="col-sm-10">
                                <select name="parent_id" class="form-control select2" style="width: 100%;">
                                    <option value="0">==顶级分类==</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}" @if($category->id == $selectCate->parent_id) selected @endif>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">分类名称</label>
                            <div class="col-sm-10">
                                <input name="name" type="text" disabled class="form-control" id="name" placeholder="请输入分类名称" value="{{$selectCate->name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">分类标题<label
                                        class="text-red">(必填)</label></label>
                            <div class="col-sm-10">
                                <input name="title" type="text" class="form-control" id="title" placeholder="请输入分类标题" value="{{$selectCate->title}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keywords" class="col-sm-2 control-label">关键词</label>
                            <div class="col-sm-10">
                                <textarea name="keywords" class="form-control" id="keywords" rows="3"
                                          placeholder="请输入关键词">{{$selectCate->keywords}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">描述</label>
                            <div class="col-sm-10">
                                <textarea name="description" class="form-control" id="description" rows="3"
                                          placeholder="请输入描述">{{$selectCate->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="order" class="col-sm-2 control-label">排序</label>
                            <div class="col-sm-10">
                                <input name="order" type="number" class="form-control" id="order" placeholder="请输入排序数值"
                                       value="{{$selectCate->order}}">
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

@endsection

@section('page-css')

@endsection

@section('page-nav-content')
    <h1>
        分类管理
        <small>分类修改</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="glyphicon glyphicon-home"></i>首页</a></li>
        <li class="">分类管理</li>
        <li class="active">分类修改</li>
    </ol>
@endsection