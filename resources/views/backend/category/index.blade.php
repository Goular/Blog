@extends("backend.layout.main")

@section("page-title","后台管理系统--首页")

@section('page-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">博客目录</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th class="text-center">排序</th>
                            <th class="text-center">名称</th>
                            <th class="text-center">标题</th>
                            <th class="text-center">查看次数</th>
                            <th class="text-center">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td class="text-center"
                                    ondblclick="ShowElement(this,'{{$category->id}}')">{{$category->order}}</td>
                                <td class="text-green">{{str_repeat("|----",$category->level)}}
                                    &nbsp;&nbsp;{{$category->name}}</td>
                                <td class="text-center">{{$category->title}}</td>
                                <td class="text-center">{{$category->view}}</td>
                                <td class="text-center"><a href="#" class="text-green">修改</a>&nbsp;&nbsp;&nbsp;&nbsp;<a
                                            href="#" class="text-green">删除</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                    {{--分页--}}
                    {{--<div class="row">--}}
                    {{--<div class="col-md-4">--}}
                    {{--<div class="dataTables_info" id="" role="status" aria-live="polite">共 2570 条记录</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-8">--}}
                    {{--<div class="dataTables_paginate paging_simple_numbers pull-right">--}}
                    {{--<ul class="pagination">--}}
                    {{--<li class="paginate_button previous disabled">--}}
                    {{--<a href="#" aria-label="上一页">--}}
                    {{--<span aria-hidden="true">&laquo;</span>--}}
                    {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="paginate_button active"><a href="#">1</a></li>--}}
                    {{--<li class="paginate_button"><a href="#">2</a></li>--}}
                    {{--<li class="paginate_button"><a href="#">3</a></li>--}}
                    {{--<li class="paginate_button"><a href="#">4</a></li>--}}
                    {{--<li class="paginate_button"><a href="#">5</a></li>--}}
                    {{--<li class="paginate_button next">--}}
                    {{--<a href="#" aria-label="下一页">--}}
                    {{--<span aria-hidden="true">&raquo;</span>--}}
                    {{--</a>--}}
                    {{--</li>--}}
                    {{--</ul>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                </div>
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
                        url: '{{url("admin/category/changeorder")}}',
                        data: {
                            "_token": '{{csrf_token()}}',
                            'id': id,
                            'value': value
                        },
                        beforeSend: function (XMLHttpRequest) {
                            //ShowLoading();
                        },
                        success: function (data, textStatus) {
                            if (data.code > 0) {
                                layer.alert(data.message, {icon: 6});
                            }else{
                                layer.alert(data.message, {icon: 5});
                                parent.text(oldhtml)
                            }
                            //window.location.href = "{{url('admin/category')}}";
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
    </script>
@endsection

@section('page-css')

@endsection