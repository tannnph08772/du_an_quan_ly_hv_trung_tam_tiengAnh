<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion sidebar-menu tree" id="accordionSidebar">
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
        <a class="nav-link" href="{{route('teachers.dashboardTeacher')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('teachers.showCalendarTea')}}">
            <i class="far fa-calendar-alt"></i>
            <span>Lịch dạy</span>
        </a>
    </li>
    <li class="nav-item active">
        <a  class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-university"></i>
            <span>Danh sách lớp</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="collapse-inner rounded">
                @foreach($classes as $item)
                <a class="collapse-item" href="{{ route('attendance.index',['id' => $item->id]) }}"><i class="fas fa-circle"></i>
                    {{$item->name_class}}</a>
                @endforeach
            </div>
        </div>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('homework.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Quản lý bài tập</span></a>
    </li>
    <li class="nav-item active">      
        <a  class="nav-link" href="#" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3">
            <i class="fas fa-university"></i>
            <span>Lịch sử dạy</span>
        </a>
        <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordionSidebar">
            <div class="collapse-inner rounded">
                @foreach($classesHistory as $item)
                <a class="collapse-item" href="{{ route('attendance.index',['id' => $item->id]) }}"><i class="fas fa-circle"></i>
                    {{$item->name_class}}</a>
                @endforeach
            </div>
        </div>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('feedback.view')}}">
            <i class="fas fa-comment-alt"></i>
            <span>Danh sách góp ý</span></a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>