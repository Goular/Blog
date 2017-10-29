<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            {{--<li class="header">主导航</li>--}}
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-newspaper-o"></i><span>文章管理</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{url("admin/articles")}}"><i class="fa fa-paper-plane"></i>文章列表</a></li>
                    <li><a href="{{url("admin/articles/create")}}"><i class="glyphicon glyphicon-plus"></i>文章添加</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-sort-by-alphabet"></i><span>分类管理</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{url("admin/categories")}}"><i class="glyphicon glyphicon-list"></i>分类列表</a></li>
                    <li><a href="{{url("admin/categories/create")}}"><i class="glyphicon glyphicon-plus"></i>分类添加</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-link"></i><span>友情链接</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{url("admin/friend_links")}}"><i class="glyphicon glyphicon-list"></i>链接列表</a></li>
                    <li><a href="{{url("admin/friend_links/create")}}"><i class="glyphicon glyphicon-plus"></i>链接添加</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-link"></i><span>网站导航</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{url("admin/navigations")}}"><i class="glyphicon glyphicon-list"></i>导航列表</a></li>
                    <li><a href="{{url("admin/navigations/create")}}"><i class="glyphicon glyphicon-plus"></i>导航添加</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-link"></i><span>网站配置</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{url("admin/web_configs")}}"><i class="glyphicon glyphicon-list"></i>配置列表</a></li>
                    <li><a href="{{url("admin/web_configs/create")}}"><i class="glyphicon glyphicon-plus"></i>配置添加</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i><span>用户管理</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{url("admin/category")}}"><i class="glyphicon glyphicon-list"></i>用户列表</a></li>
                    <li><a href="index2.html"><i class="glyphicon glyphicon-plus"></i>用户添加</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>