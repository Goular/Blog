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
                <form action="{{url('admin/friend_links/'.$selectLink->id)}}" class="form-horizontal" method="post">
                    {{csrf_field()}}
                    {{method_field("put")}}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">链接名称<label
                                        class="text-red">(必填)</label></label>
                            <div class="col-sm-10">
                                <input name="name" type="text" class="form-control" id="name" placeholder="请输入链接名称" value="{{$selectLink->name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">链接标题<label
                                        class="text-red">(必填)</label></label>
                            <div class="col-sm-10">
                                <input name="title" type="text" class="form-control" id="title" placeholder="请输入链接标题" value="{{$selectLink->title}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keywords" class="col-sm-2 control-label">URL<label
                                        class="text-red">(必填)</label></label>
                            <div class="col-sm-10">
                                <input name="url" type="text" class="form-control" id="title" placeholder="请输入URL" value="{{$selectLink->url}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="order" class="col-sm-2 control-label">排序</label>
                            <div class="col-sm-10">
                                <input name="order" type="number" class="form-control" id="order" placeholder="请输入排序" value="{{$selectLink->order}}">
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