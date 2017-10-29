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
                            <label for="title" class="col-sm-2 control-label">标题<label
                                        class="text-red">(必填)</label></label>
                            <div class="col-sm-10">
                                <input name="title" type="text" class="form-control" id="title" placeholder="请输入标题" value="{{old('title')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">名称<label
                                        class="text-red">(必填)</label></label>
                            <div class="col-sm-10">
                                <input name="name" type="text" class="form-control" id="name" placeholder="请输入变量名" value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keywords" class="col-sm-2 control-label">类型<label
                                        class="text-red">(必填)</label></label>
                            <div class="col-sm-10">
                                <label class="radio-inline">
                                    <input type="radio" name="type" id="inlineRadio1" value="input" checked onclick="showTr()"> input
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="type" id="inlineRadio2" value="textarea" onclick="showTr()"> textarea
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="type" id="inlineRadio3" value="radio" onclick="showTr()"> radio
                                </label>
                            </div>
                        </div>
                        <div class="form-group value">
                            <label for="value" class="col-sm-2 control-label">类型值</label>
                            <div class="col-sm-10">
                                <input name="value" type="number" class="form-control" id="value" placeholder="请输入类型值" value="{{old('value')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="order" class="col-sm-2 control-label">排序</label>
                            <div class="col-sm-10">
                                <input name="order" type="number" class="form-control" id="order" placeholder="请输入排序" value="{{old('order')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="content" class="col-sm-2 control-label">描述</label>
                            <div class="col-sm-10">
                                <textarea name="content" class="form-control" id="description" rows="3" placeholder="请输入说明">{{old('content')}}</textarea>
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
    <script>
        showTr();
        function showTr() {
            var type = $('input[name=type]:checked').val();
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