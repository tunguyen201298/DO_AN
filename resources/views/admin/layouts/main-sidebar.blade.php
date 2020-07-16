<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            
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
                    <span class="label label-success" style="float: right;">{{ $is_read }}</span>
                </a>
            </li>
             <li class=" treeview">
                <a href="{{url('admin/blog')}}">
                    <i class="fa fa-th"></i> <span>Bài viết</span>
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
                <a href="{{url('admin/promotion')}}">
                    <i class="fa fa-th"></i> <span>Khuyến mãi</span>
                </a>
            </li>
            <li class="treeview">
                <a href="javascript:;">
                    <i class="fa fa-pie-chart"></i>
                    <span>Kho</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/warehouse')}}"><i class="fa fa-circle-o"></i>Thông tin</a></li>
                    <li><a href="{{url('admin/import-bills')}}"><i class="fa fa-circle-o"></i>Phiếu nhập</a></li>
                    <li><a href="{{url('admin/areas')}}"><i class="fa fa-circle-o"></i>Phiếu xuất</a></li>
                </ul>
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
                    <li><a href="{{url('admin/user')}}"><i class="fa fa-circle-o"></i> Danh sách nhân viên</a></li>
                    <li><a href="{{url('admin/user/customer')}}"><i class="fa fa-circle-o"></i> Danh sách khách hàng</a></li>
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
