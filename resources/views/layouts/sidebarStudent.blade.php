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
        <a class="nav-link" href="{{ route('student.showCalendarStu') }}">
            <i class="far fa-calendar-alt"></i>
            <span>Lịch học</span>
        </a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('student.showAttendance') }}">
            <i class="fas fa-check"></i>
            <span>Điểm danh</span>
        </a>
    </li>
    <li class="nav-item active">
        <a href="#" class="nav-link" data-toggle="collapse" data-target="#collapse4" aria-expanded="true"
            aria-controls="collapse4">
            <i class="fas fa-book-open"></i>
            <span>Bài tập</span>
        </a>
        <div id="collapse4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="collapse-inner rounded">
                <a class="collapse-item" href="{{ route('homework.show') }}">
                    <i class="fas fa-circle"></i>
                    <span>Bài tập về nhà</span>
                </a>
            </div>
            <div class="collapse-inner rounded">
                <a class="collapse-item" href="{{ route('homework.dsBaiTap') }}">
                    <i class="fas fa-circle"></i>
                    <span>Bài tập đã nộp</span>
                </a>
            </div>
        </div>
    </li>
    <li class="nav-item active">
        <a href="#" class="nav-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="true"
            aria-controls="collapse3">
            <i class="fas fa-star"></i>
            <span>Điểm</span>
        </a>
        <div id="collapse3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="collapse-inner rounded">
                <a class="collapse-item" href="{{ route('student.showPointByClass') }}">
                    <i class="fas fa-circle"></i>
                    <span>Bảng điểm</span>
                </a>
            </div>
            <div class="collapse-inner rounded">
                <a class="collapse-item" href="{{ route('student.historyLesson') }}">
                    <i class="fas fa-circle"></i>
                    <span>Lịch sử học</span>
                </a>
            </div>
        </div>
    </li>
    <li class="nav-item active">
        <a href="#" class="nav-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-globe-asia"></i>
            <span>Dịch vụ trực tuyến</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="collapse-inner rounded">
                <a class="collapse-item" href="{{ route('student.showForm') }}">
                    <i class="fas fa-circle"></i>
                    <span>Đăng ký chuyển lớp</span>
                </a>
            </div>
            <div class="collapse-inner rounded">
                <a class="collapse-item" href="{{ route('student.formReserve') }}">
                    <i class="fas fa-circle"></i>
                    <span>Đăng ký bảo lưu</span>
                </a>
            </div>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="collapse-inner rounded">
                <a class="collapse-item" href="{{ route('student.dkKhoaMoi') }}">
                    <i class="fas fa-circle"></i>
                    <span>Đăng ký khóa học mới</span>
                </a>
            </div>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="collapse-inner rounded">
                <a class="collapse-item" href="{{ route('student.LsDongTien') }}">
                    <i class="fas fa-circle"></i>
                    <span>Lịch sử đóng tiền</span>
                </a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>