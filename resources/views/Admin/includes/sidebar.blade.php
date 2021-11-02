<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar" style="height: auto;">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset('admin/dist/img/avatarr.jpg') }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ $cr_user->name }}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu tree" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="active treeview menu-open">
        <a href="/admin/dashboard">
          <i class="fa fa-dashboard"></i> <span>Trang tổng quan</span>
        </a>     
      </li>      
      <li class="treeview">
        <a href="">
          <i class="fa fa-files-o"></i>
          <span>Danh mục sản phẩm</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/admin/categories"><i class="fa fa-circle-o"></i> Liệt kê </a></li>
          <li><a href="/admin/categories/create"><i class="fa fa-circle-o"></i> Thêm danh mục</a></li>   
        </ul>
      </li>
      <li class="treeview">
        <a href="">
          <i class="fa fa-files-o"></i>
          <span>Danh sách sản phẩm</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/admin/products"><i class="fa fa-circle-o"></i> Liệt kê </a></li>
          <li><a href="/admin/products/create"><i class="fa fa-circle-o"></i> Thêm sản phẩm </a></li>      
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-pie-chart"></i>
          <span>Đơn hàng</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/admin/orders"><i class="fa fa-circle-o"></i> Liệt kê</a></li>
          <li><a href="/admin/orders/create"><i class="fa fa-circle-o"></i> Thêm đơn hàng</a></li>
          <li><a href="/admin/orderdetails"><i class="fa fa-circle-o"></i> Chi tiết đơn hàng</a></li>        
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-laptop"></i>
          <span>Khách hàng</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/admin/customers"><i class="fa fa-circle-o"></i> Liệt kê</a></li>
          <li><a href="/admin/customers/create"><i class="fa fa-circle-o"></i> Thêm khách hàng</a></li>
        </ul>
      </li>
      @can('manager')
      <li class="treeview">
        <a href="#">
          <i class="fa fa-laptop"></i>
          <span>Tài khoản Admin</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/admin/users"><i class="fa fa-circle-o"></i> Liệt kê</a></li>
          <li><a href="/admin/users/create"><i class="fa fa-circle-o"></i> Thêm </a></li>
        </ul>
      </li>
      @endcan
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>