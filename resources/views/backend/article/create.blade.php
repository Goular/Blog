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
                                        <option value="{{$category->id}}">{{str_repeat("|--",$category->level).$category->name}}</option>
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
                                <input name="editor" type="text" class="form-control" id="title"
                                       placeholder="请输入编辑者名称"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keywords" class="col-sm-1 control-label">缩略图</label>
                            <div class="col-sm-11">
                                <input type="text" class="form-control" name="thumb">
                                <input id="file_upload" class="" name="file_upload" type="file" multiple="true">
                                <img src="" alt="" id="art_thumb_img" style="max-width: 350px; max-height:100px;">
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
                                <script type="text/javascript" charset="utf-8"
                                        src="{{asset('ueditor/ueditor.config.js')}}"></script>
                                <script type="text/javascript" charset="utf-8"
                                        src="{{asset('ueditor/ueditor.all.min.js')}}"></script>
                                <script type="text/javascript" charset="utf-8"
                                        src="{{asset('ueditor/lang/zh-cn/zh-cn.js')}}"></script>
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
    <script src="{{asset('uploadify/jquery.uploadify.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        <?php $timestamp = time();?>
        $(function () {
            $('#file_upload').uploadify({
                'buttonText': '图片上传',
                'formData': {
                    'timestamp': '<?php echo $timestamp;?>',
                    '_token': "{{csrf_token()}}"
                },
                'swf': "{{asset('uploadify/uploadify.swf')}}",
                'uploader': "{{url('admin/upload_article_thumb')}}",
                'onUploadSuccess': function (file, data, response) {
                    var obj = JSON.parse(data);
                    $('input[name=thumb]').val(obj.data.filePath);
                    $('#art_thumb_img').attr('src', obj.data.fileDomain + obj.data.filePath);
                }
            });
        });
    </script>
    <script type="text/javascript">
        var ue = UE.getEditor('editor');
    </script>
@endsection

@section('page-css')
    <style>
        .edui-default {
            line-height: 28px;
        }

        div.edui-combox-body, div.edui-button-body, div.edui-splitbutton-body {
            overflow: hidden;
            height: 20px;
        }

        div.edui-box {
            overflow: hidden;
            height: 22px;
        }
    </style>

    <link rel="stylesheet" type="text/css" href="{{asset('uploadify/uploadify.css')}}">
    <style>
        .uploadify {
            display: inline-block;
        }

        .uploadify-button {
            border: none;
            border-radius: 5px;
            margin-top: 8px;
        }

        table.add_tab tr td span.uploadify-button-text {
            color: #FFF;
            margin: 0;
        }
    </style>
@endsection