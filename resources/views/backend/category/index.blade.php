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
                            <th class="text-center">ID</th>
                            <th class="text-center">标题</th>
                            <th class="text-center">审核状态</th>
                            <th class="text-center">点击</th>
                            <th class="text-center">发布人</th>
                            <th class="text-center">更新时间</th>
                            <th class="text-center">评论</th>
                            <th class="text-center">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Trident</td>
                            <td>Internet0 第三方水电费水电费是都是范德萨范德萨</td>
                            <td>Win 95+</td>
                            <td>Internet0 第三方水电费水电费是都是范德萨范德萨</td>
                            <td>Internet0 第三方水电费水电费是都是范德萨范德萨</td>
                            <td>Internet0 第三方水电费水电费是都是范德萨范德萨</td>
                            <td>Internet0 第三方水电费水电费是都是范德萨范德萨</td>
                            <td>Win 95+</td>
                            <td>Internet0 第三方水电费水电费是都是范德萨范德萨</td>
                        </tr>
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                    {{--分页--}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="dataTables_info" id="" role="status" aria-live="polite">共 2570 条记录</div>
                        </div>
                        <div class="col-md-8">
                            <div class="dataTables_paginate paging_simple_numbers pull-right">
                                <ul class="pagination">
                                    <li class="paginate_button previous disabled">
                                        <a href="#" aria-label="上一页">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="paginate_button active"><a href="#">1</a></li>
                                    <li class="paginate_button"><a href="#">2</a></li>
                                    <li class="paginate_button"><a href="#">3</a></li>
                                    <li class="paginate_button"><a href="#">4</a></li>
                                    <li class="paginate_button"><a href="#">5</a></li>
                                    <li class="paginate_button next">
                                        <a href="#" aria-label="下一页">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection

@section('page-js')
@endsection

@section('page-css')

@endsection