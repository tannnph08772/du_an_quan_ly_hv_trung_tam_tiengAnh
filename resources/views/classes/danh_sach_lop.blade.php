@extends('staff')
@section('title', 'Danh sách lớp')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h3 class="m-0 font-weight-bold text-primary">Danh sách lớp</h3>
        <a class="btn btn-success" href="{{ route('classes.create') }}">Tạo Lớp</a>
    </div>
    <div class="card-body">
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên lớp</th>
                        <th>SLHV</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                        <th>Trạng thái</th>
                        <th>Giảng viên</th>
                        <th>Khóa học</th>
                        <th>Cơ sở</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($classes) === 0 )
                    <tr>
                        <td>Không có dữ liệu</td>
                    </tr>
                    @else
                    @php $i = 1; @endphp 
                    @foreach($classes as $class)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $class->name_class }}</td>
                        <td>{{ count($class->students) }}</td>
                        <td>{{ $class->start_day }}</td>
                        <td>{{ $class->end_day }}</td>
                        <td>@if($class->status == 1) Chưa bắt đầu @elseif($class->status == 2) Đang hoạt động @else Đã kết thúc @endif</td>
                        <td>{{ $class->teacher->user->name }}</td>
                        <td>{{ $class->course->name_course }}</td>
                        <td>{{ $class->place->name_place }}</td>
                        <td class="text-center">
                            <a href="{{ route('classes.getStudentByClass',['id' => $class->id]) }}" class="btn btn-info mr-3">Học viên</a>
                            <a href="{{ route('classes.getCalendarByClass',['id' => $class->id]) }}" class="btn btn-info">Lịch</a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection