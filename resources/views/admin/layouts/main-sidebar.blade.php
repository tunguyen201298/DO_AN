<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
                <a href="{{url('/admin')}}">
                    <i class="fa fa-th"></i> <span>Trang chủ</span>
                </a>
            </li>
            <li class=" treeview">
                <a href="{{url('admin/product')}}">
                    <i class="fa fa-th"></i> <span>Sản phẩm</span>
                </a>
            </li>
            <li class=" treeview">
                <a href="{{url('admin/bill')}}">
                    <i class="fa fa-th"></i> <span>Đơn hàng</span>
                </a>
            </li>
            <li class=" treeview">
                <a href="{{url('admin/supplier')}}">
                    <i class="fa fa-th"></i> <span>Nhà cung cấp</span>
                </a>
            </li>
            <li class=" treeview">
                <a href="{{url('admin/slider')}}">
                    <i class="fa fa-th"></i> <span>Slider</span>
                </a>
            </li>
            <li class=" treeview">
                <a href="{{url('admin/')}}">
                    <i class="fa fa-th"></i> <span>Trang</span>
                </a>
            </li>
            
            <li class="treeview">
                <a href="javascript:;">
                    <i class="fa fa-pie-chart"></i>
                    <span>Hình ảnh</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/img/slide')}}"><i class="fa fa-circle-o"></i>Slide</a></li>
                    <li><a href="{{url('admin/img/banner')}}"><i class="fa fa-circle-o"></i>Banner</a></li>
                    <li><a href="{{url('admin/areas')}}"><i class="fa fa-circle-o"></i>Logo</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="javascript:;">
                    <i class="fa fa-pie-chart"></i>
                    <span>Quản lý người dùng</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/users')}}"><i class="fa fa-circle-o"></i> Danh sách nhân viên</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Phân quyền</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="{{url('admin/')}}">
                    <i class="fa fa-th"></i> <span>Cấu hình</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>