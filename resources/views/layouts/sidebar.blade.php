<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="https://alibabaenglish.edu.vn/wp-content/uploads/2019/03/logo-Alibaba.png" style="width:100%"
                alt="">
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0 mt-3">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.dashboardAdmin')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item active">
    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-users"></i>
            <span>Quản lý tài khoản</span>
        </a>
        <div id="collapseTwo" class="collapse show" data-parent="#accordionSidebar">
            <div class="collapse-inner rounded">
                <a class="collapse-item" href="{{ route('teacher.index') }}"><i class="fas fa-circle"></i> Danh sách giảng viên</a>
                <a class="collapse-item" href="{{ route('staff.index') }}"><i class="fas fa-circle"></i>
                Danh sách nhân viên</a>
            </div>
        </div>
    </li>
    <li class="nav-item active">
        <a href="{{ route('course.index') }}" class="nav-link" href="">
        <i class="fas fa-bookmark"></i>
            <span>Khóa học</span></a>
    </li>
    <li class="nav-item active">
        <a href="{{ route('place.index') }}" class="nav-link" href="">
        <i class="fas fa-map-marker-alt"></i>
            <span>Cơ sở học</span></a>
    </li>
    <li class="nav-item active">
        <a href="{{ route('feedback.index') }}" class="nav-link" href="">
        <i class="fas fa-comment-alt"></i>
            <span>Góp ý của học viên</span></a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>