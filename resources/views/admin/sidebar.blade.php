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
                <input type="text" name="query" class="form-control" placeholder="Search..."/>
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
                <a href="#"><i class="fa fa-database"></i><span>产品管理</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url("/admin/products")}}">产品列表</a></li>
                    <li><a href="{{url("/admin/products/create")}}">添加产品</a></li>
                    <li><a href="{{url("/admin/category")}}">产品分类管理</a></li>
                </ul>
            </li>
            <li class="treeview @yield('relaisactive')">
                <a href="#"><i class="fa fa-map-marker"></i><span>Point realis</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url("/admin/relais")}}">Poin Realis列表</a></li>
                    <li><a href="{{url("/admin/relais/create")}}">添加Poin Realis</a></li>
                </ul>
            </li>
            <li class="treeview @yield('newsactive')">
                <a href="#"><i class="fa fa-newspaper-o"></i><span>新闻活动</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url("/admin/news")}}">文章列表</a></li>
                    <li><a href="{{url("/admin/news/create")}}">添加文章</a></li>
                </ul>
            </li>
            <li class="treeview @yield('orderactive')">
                <a href="#"><i class="fa fa-shopping-cart"></i><span>订单管理</span>  <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{url("/admin/order/today")}}">今日订单
                        @inject('order','App\Orders')
                        <small class="label bg-yellow">{{$order->countOrder()}}</small>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i>Livraison</a></li>
                            <li><a href="#"><i class="fa fa-circle-o"></i>Emporter</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{url("/admin/order/all")}}">全部订单<i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i>Livraison</a></li>
                            <li><a href="#"><i class="fa fa-circle-o"></i>Emporter</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="{{url('/admin/users')}}"><i class="fa fa-user"></i><span>用户列表</span></a></li>
            <li><a href="{{url('/admin/points')}}"><i class="fa fa-user"></i><span>积分设置</span></a></li>
            <li><a href="{{url('/admin/times')}}"><i class="fa fa-clock-o"></i><span>送餐时间</span></a></li>

            {{--<li><a href="#"><span>Another Link</span></a></li>--}}

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>