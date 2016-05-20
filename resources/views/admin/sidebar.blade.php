<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        {{--<div class="user-panel">--}}
            {{--<div class="pull-left image">--}}
                {{--<img src="{{ asset("/bower_components/admin-lte/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image" />--}}
            {{--</div>--}}
            {{--<div class="pull-left info">--}}
                {{--<p>Alexander Pierce</p>--}}
                {{--<!-- Status -->--}}
                {{--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>--}}
            {{--</div>--}}
        {{--</div>--}}

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
<span class="input-group-btn">
  <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
</span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="treeview @yield('productactive')">
                <a href="#"><span>产品管理</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url("/admin/products")}}">产品列表</a></li>
                    <li><a href="{{url("/admin/products/create")}}">添加产品</a></li>
                    <li><a href="{{url("/admin/category")}}">产品分类管理</a></li>
                </ul>
            </li>
            <li class="treeview @yield('relaisactive')">
                <a href="#"><span>Point realis</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url("/admin/relais")}}">Poin Realis列表</a></li>
                    <li><a href="{{url("/admin/relais/create")}}">添加Poin Realis</a></li>
                </ul>
            </li>
            <li class="treeview @yield('newsactive')">
                <a href="#"><span>新闻活动</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url("/admin/news")}}">文章列表</a></li>
                    <li><a href="{{url("/admin/news/create")}}">添加文章</a></li>
                </ul>
            </li>
            {{--<li><a href="#"><span>Another Link</span></a></li>--}}

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>