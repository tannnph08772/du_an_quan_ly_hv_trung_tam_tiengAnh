<h3>Thông báo thay đổi lịch học lớp {{ $attendance->class->name_class }}</h3>
<p>Lịch cũ: 
Ngày: {{ $attendance->date }}, 
Ca: {{ $attendance->schedule->name_schedule }} ({{ $attendance->schedule->start_time }} - {{ $attendance->schedule->end_time }}),
Giảng viên: {{ $attendance->teacher->user->name }}
</p>
<p>Lịch mới: 
Ngày: {{ $params['date'] }},
Ca: @foreach($schedules as $schedule) 
    @if($schedule->id == $params['schedule_id'])
        {{ $schedule->name_schedule }} ({{ $schedule->start_time }} - {{ $schedule->end_time }})
    @endif
    @endforeach
Giảng viên: @foreach($teachers as $teacher) 
    @if($teacher->id == $params['teacher_id'])
        {{ $teacher->user->name }}
    @endif
    @endforeach
</p>