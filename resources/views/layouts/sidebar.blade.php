<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">Alibaba English Center</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.dashboardAdmin')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-table"></i>
            <span>Danh sách tài khoản</span></a>
    </li>
    <li class="nav-item active">
        <a href="{{ route('course.index') }}" class="nav-link" href="">
            <i class="fas fa-fw fa-table"></i>
            <span>Khóa học</span></a>
    </li>
    <li class="nav-item active">
        <a href="{{ route('place.index') }}" class="nav-link" href="">
            <i class="fas fa-fw fa-table"></i>
            <span>Cơ sở học</span></a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>