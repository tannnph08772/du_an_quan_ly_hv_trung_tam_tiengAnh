<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion sidebar-menu tree" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="https://alibabaenglish.edu.vn/wp-content/uploads/2019/03/logo-Alibaba.png" style="width:100%" alt="">
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0 mt-3">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-users"></i>
            <span>Quản lý học viên</span>
        </a>
        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar"
            style="">
            <div class="collapse-inner rounded">
                <a class="collapse-item" href="{{ route('users.dsHocVien') }}"><i class="far fa-circle"></i> Tất cả học viên</a>
                <a class="collapse-item" href="{{ route('auth.danhSachCho') }}"><i class="far fa-circle"></i>
                    Danh sách chờ</a>
            </div>
        </div>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('classes.index') }}">
        <i class="fas fa-university"></i>
            <span>Danh sách lớp học</span></a>
    </li>
    <li class="nav-item active">
        <a href="{{ route('schedule.index') }}" class="nav-link" href="">
            <i class="far fa-clock"></i>
            <span>Danh sách ca học</span></a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>