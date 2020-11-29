<p>Đơn đăng ký chuyển lớp của bạn đã được xác nhận</p>
<p>Thông tin lớp chuyển tới:</p>
<p>- Tên lớp: {{ $class->name_class }}</p>
<p>- Ca học: {{ $class->schedule->name_schedule }} ({{ $class->schedule->start_time }} - {{ $class->schedule->end_time }})</p>
<p>- Giảng viên: {{ $class->teacher->user->name }}</p>
<p>- Địa chỉ: {{ $class->place->name_place }} - {{ $class->place->address }}</p>
<p>Vui lòng kiểm tra lịch học mới trên hệ thống</p>
