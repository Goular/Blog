{{-- 后台系统修改密码 --}}
@extends("backend.layout.main")

@section("page-title","后台管理系统--修改密码")

@section('page-content')
    <div class="row">
        <div class="col-md-4">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">修改密码</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{url('admin/changepwd')}}" role="form" method="post">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">原始密码</label>
                            <input name="old_password" type="password" class="form-control" id="exampleInputPassword1"
                                   placeholder="请输入原始密码">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword2">新密码</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword2"
                                   placeholder="请输入新密码">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword3">确认密码</label>
                            <input name="password_confirmation" type="password" class="form-control"
                                   id="exampleInputPassword3"
                                   placeholder="请输入确认密码">
                        </div>
                        @include('backend.layout.errorMsg')
                        @if(session('status'))
                            @component("component.alert.success")
                                {{session('status')}}
                            @endcomponent
                        @endif
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-default pull-left">提交</button>
                        <button type="reset" class="btn btn-primary pull-right">重置</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('page-js')

@endsection

@section('page-css')

@endsection