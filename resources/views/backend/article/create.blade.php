@extends("backend.layout.main")

@section("page-title","后台管理系统--添加文章")

@section('page-content')
    <div class="row">
        <div class="col-lg-12">
            <!-- Horizontal Form -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">分类添加</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{url('admin/category')}}" class="form-horizontal" method="post">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-1 control-label">文章分类</label>
                            <div class="col-sm-11">
                                <select name="parent_id" class="form-control select2" style="width: 100%;">
                                    <option value="0">==顶级分类==</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-1 control-label">文章标题<label
                                        class="text-red">(必填)</label></label>
                            <div class="col-sm-11">
                                <input name="name" type="text" class="form-control" id="name" placeholder="请输入文章标题"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-1 control-label">编辑者</label>
                            <div class="col-sm-11">
                                <input name="title" type="text" class="form-control" id="title" placeholder="请输入编辑者名称"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keywords" class="col-sm-1 control-label">缩略图</label>
                            <div class="col-sm-11">
                                <input name="title" type="text" class="form-control" id="description" rows="3"
                                       placeholder="请输入关键词"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-1 control-label">关键词</label>
                            <div class="col-sm-11">
                                <input name="title" type="text" class="form-control" id="description" rows="3"
                                       placeholder="请输入关键词"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keywords" class="col-sm-1 control-label">正文</label>
                            <div class="col-sm-11">
                                <textarea name="keywords" class="form-control" id="keywords" rows="3"
                                          placeholder="请输入正文"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="order" class="col-sm-1 control-label">描述</label>
                            <div class="col-sm-11">
                                <input name="order" type="number" class="form-control" id="order" placeholder="请输入排序数值"
                                       value="0">
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