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
            <i class="far fa-calendar-alt"></i>
            <span>Lịch học</span>
        </a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('classes.index') }}">
        <i class="fas fa-book-open"></i>
            <span>Bài tập về nhà</span></a>
    </li>
    <li class="nav-item active">
        <a href="{{ route('schedule.index') }}" class="nav-link">
        <i class="fas fa-globe-asia"></i>
            <span>Dịch vụ trực tuyến</span></a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>