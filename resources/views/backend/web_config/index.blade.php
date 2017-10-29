@extends("backend.layout.main")

@section("page-title","后台管理系统--首页")

@section('page-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">博客目录</h3>
                </div>
                @include("backend.layout.warningMsg")
                <!-- /.box-header -->
                <form action="{{url('admin/web_configs/changecontent')}}" method="post">
                    <div class="box-body">
                        {{csrf_field()}}
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">排序</th>
                                <th class="text-center">标题</th>
                                <th class="text-center">变量名</th>
                                <th class="text-center">配置值</th>
                                <th class="text-center">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($webConfigs as $config)
                                <tr>
                                    <td class="text-center"
                                        ondblclick="ShowElement(this,'{{$config->id}}')">{{$config->order}}</td>
                                    <td class="text-center">{{$config->title}}</td>
                                    <td class="text-center text-green">{{$config->name}}</td>
                                    <td class="text-center">
                                        <input type="hidden" name="ids[]" value="{{$config->id}}"/>
                                        {!! $config->_html !!}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{url('admin/web_configs/'.$config->id.'/edit')}}"
                                           class="text-green">修改</a>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="javascript:void(0);"
                                           onclick="delCategory(this,'{{$config->name}}',{{$config->id}})"
                                           class="text-green">删除</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                        <div class="">
                            <button type="submit" class="btn btn-success center-block">提交配置</button>
                            {{--<button type="submit" class="btn btn-default pull-right">重置</button>--}}
                        </div>
                        {{--分页--}}
                        {{--<div class="row">--}}
                        {{--<div class="col-md-4">--}}
                        {{--<div class="dataTables_info" id="" role="status" aria-live="polite">--}}
                        {{--共 {{$webConfigs->total()}}--}}
                        {{--条记录--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-8">--}}
                        {{--<div class="pull-right">--}}
                        {{--{{$webConfigs->links()}}--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                    </div>
                </form>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection

@section('page-js')
    <script>
        /**
         * 双击文字变成输入框效果
         * @param element
         * @constructor
        */
        function ShowElement(element, id) {
            var parent = $(element);
            var oldhtml = parent.html();   //获得元素之前的内容
            var newobj = $('<input type="number" class="form-control text-center">');
            newobj.blur(function () {//设置newobj失去焦点的事件
                var value = $(this).val(); // 获取值
                value = $.trim(value); // 用jQuery的trim方法删除前后空格
                parent.empty();
                if (value == '') {// 判断是否是空字符串，而不是null
                    parent.text(oldhtml)
                } else {
                    parent.text(value);
                    $.ajax({
                        type: 'post',
                        url: '{{url("admin/web_configs/changeorder")}}',
                        data: {
                            "_token": '{{csrf_token()}}',
                            'id': id,
                            'value': value
                        },
                        beforeSend: function (XMLHttpRequest) {
                            //ShowLoading();
                        },
                        success: function (data, textStatus) {
                            if (data.status > 0) {
                                layer.alert(data.message, {icon: 6});
                            } else {
                                layer.alert(data.message, {icon: 5});
                                parent.text(oldhtml)
                            }
                            {{--window.location.href = '{{url("admin/web_configs")}}';--}}
                        },
                        complete: function (XMLHttpRequest, textStatus) {
                            //HideLoading();
                        },
                        error: function () {
                            //请求出错处理
                            parent.text(oldhtml);
                        }
                    });

                }
            });
            parent.empty();   //设置元素内容为空
            parent.append(newobj);   //添加子元素
            newobj.focus();   //获得焦点
        }
        /**
         * 点击删除按钮，弹出提示框，确认发送删除分类的请求
         */
        function delCategory(view, name, id) {

            layer.confirm('是否对 ' + name + ' 进行删除操作', {
                btn: ['确定', '取消'] //按钮
            }, function () {
                $.ajax({
                    type: 'post',
                    url: '{{url("admin/web_configs/")}}/' + id,
                    data: {
                        "_token": '{{csrf_token()}}',
                        '_method': 'delete',
                    },
                    beforeSend: function (XMLHttpRequest) {
                        //ShowLoading();
                    },
                    success: function (data, textStatus) {
                        if (data.status > 0) {
                            layer.alert(data.message, {icon: 6});
                        } else {
                            layer.alert(data.message, {icon: 5});
                        }
                        window.location.href = '{{url("admin/web_configs")}}';
                    },
                    complete: function (XMLHttpRequest, textStatus) {
                        //HideLoading();
                    },
                    error: function () {
                        layer.alert("删除失败", {icon: 5});
                    }
                });
            }, function () {
            });
        }
    </script>
@endsection

@section('page-css')

@endsection