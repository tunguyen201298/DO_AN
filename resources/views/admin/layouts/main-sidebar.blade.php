<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            
            <li class="treeview @if(\Request::is('*admin')){{ 'active' }}@endif">
                <a href="{{url('/admin')}}">
                    <i class="fa fa-th"></i> <span>Trang chủ</span>
                </a>
            </li>
            <li class=" treeview @if(\Request::is('*blog*')){{ 'active' }}@endif">
                <a href="{{url('admin/blog')}}">
                    <i class="fa fa-th"></i> <span>Cập nhập bài viết</span>
                </a>
            </li>
            
            <li class=" treeview @if(\Request::is('*bill*')){{ 'active' }}@endif">
                <a href="{{url('admin/bill')}}">
                    <i class="fa fa-th"></i> <span>Cập nhập đơn hàng</span>
                    <span class="label label-success" style="float: right;">{{ $is_read }}</span>
                </a>
            </li>
             <li class=" treeview @if(\Request::is('*promotion*')){{ 'active' }}@endif">
                <a href="{{url('admin/promotion')}}">
                    <i class="fa fa-th"></i> <span>Cập nhập khuyến mãi</span>
                </a>
            </li>
            <li class="treeview">
                <a href="javascript:;">
                    <i class="fa fa-pie-chart"></i>
                    <span>Thông tin kho hàng</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/warehouse')}}"><i class="fa fa-circle-o"></i>Thông tin sản phẩm trong kho</a></li>
                    <li><a href="{{url('admin/import-bills')}}"><i class="fa fa-circle-o"></i>Thông tin phiếu nhập</a></li>
                    <!-- <li><a href="{{url('admin/areas')}}"><i class="fa fa-circle-o"></i>Phiếu xuất</a></li> -->
                </ul>
            </li>
            <li class=" treeview @if(\Request::is('*supplier*')){{ 'active' }}@endif">
                <a href="{{url('admin/supplier')}}">
                    <i class="fa fa-th"></i> <span>Cập nhập nhà cung cấp</span>
                </a>
            </li>
            <li class=" treeview @if(\Request::is('*product*')){{ 'active' }}@endif">
                <a href="{{url('admin/product')}}">
                    <i class="fa fa-th"></i> <span>Cập nhập sản phẩm</span>
                </a>
            </li>
            <li class=" treeview @if(\Request::is('*slider*')){{ 'active' }}@endif">
                <a href="{{url('admin/slider')}}">
                    <i class="fa fa-th"></i> <span> Cập nhập slider</span>
                </a>
            </li>
           
            <!-- <li class="treeview @if(\Request::is('*statistical*')){{ 'active' }}@endif">
                <a href="{{url('admin/statistical')}}">
                    <i class="fa fa-th"></i> <span>Thống kê</span>
                </a>
            </li> -->
            
            <li class="treeview @if(\Request::is('*statistical*')){{ 'active' }}@endif">
                <a href="javascript:;">
                    <i class="fa fa-pie-chart"></i>
                    <span>Báo cáo thống kê</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/revenue')}}"><i class="fa fa-circle-o"></i>Thống kê doanh thu</a></li>
                    <li><a href="{{url('admin/quantity')}}"><i class="fa fa-circle-o"></i>Thống kê số lượng</a></li>
                    <!-- <li><a href="{{url('admin/areas')}}"><i class="fa fa-circle-o"></i>Logo</a></li> -->
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
            
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
