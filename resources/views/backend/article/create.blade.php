@extends("backend.layout.main")

@section("page-title","后台管理系统--添加文章")

@section('page-content')
    <div class="row">
        <div class="col-lg-12">
            <!-- Horizontal Form -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">文章添加</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{url('admin/article')}}" class="form-horizontal" method="post">
                    {{csrf_field()}}
                    <div class="box-body">
                        @include("backend.layout.errorMsg")
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-1 control-label">文章分类</label>
                            <div class="col-sm-11">
                                <select name="cate_id" class="form-control select2" style="width: 100%;">
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
                                <input name="title" type="text" class="form-control" id="name" placeholder="请输入文章标题"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-1 control-label">编辑者</label>
                            <div class="col-sm-11">
                                <input name="editor" type="text" class="form-control" id="title" placeholder="请输入编辑者名称"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keywords" class="col-sm-1 control-label">缩略图</label>
                            <div class="col-sm-11">
                                <input name="thumb" type="text" class="form-control" id="description" rows="3"
                                       placeholder="请输入缩略"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-1 control-label">关键词</label>
                            <div class="col-sm-11">
                                <input name="tag" type="text" class="form-control" id="description" rows="3"
                                       placeholder="请输入关键词"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keywords" class="col-sm-1 control-label">正文</label>
                            <div class="col-sm-11">
                                <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.config.js')}}"></script>
                                <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.all.min.js')}}"> </script>
                                <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/lang/zh-cn/zh-cn.js')}}"></script>
                                <script id="editor" name="content" type="text/plain" style="height:500px;"></script>
                            </div>
                        </div>
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
    <script type="text/javascript">
        var ue = UE.getEditor('editor');
    </script>
@endsection

@section('page-css')
    <style>
        .edui-default{line-height: 28px;}
        div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
        {overflow: hidden; height:20px;}
        div.edui-box{overflow: hidden; height:22px;}
    </style>
@endsection