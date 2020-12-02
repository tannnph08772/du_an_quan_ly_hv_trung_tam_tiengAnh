@extends('student')
@section('title', 'Lịch học')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h3 class="m-0 font-weight-bold text-primary">Lịch học</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Ngày</th>
                        <th>Lớp</th>
                        <th>Ca</th>
                        <th>Thời gian</th>
                        <th>Giảng viên</th>
                        <th>Khóa</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($calendars) === 0 )
                    <tr>
                        <td>Không có dữ liệu</td>
                    </tr>
                    @else
                    @php
                        \Carbon\Carbon::setLocale('vi');
                        $i = 1;
                    @endphp 
                    @foreach($calendars as $item)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td style="text-transform: capitalize;">{{ \Carbon\Carbon::parse($item->date)->translatedFormat('l') }}<br />{{ \Carbon\Carbon::parse($item->date)->translatedFormat('d/m/Y') }}</td>
                        <td>{{ $item->class->name_class }}</td>
                        <td>{{ $item->class->schedule->name_schedule }}</td>
                        <td>{{ $item->class->schedule->start_time }} - {{ $item->class->schedule->end_time }}</td>
                        <td>{{ $item->class->teacher->user->name }}</td>
                        <td>{{ $item->class->course->name_course }}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection