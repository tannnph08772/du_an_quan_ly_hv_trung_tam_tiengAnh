@extends('staff')
@section('title', 'Danh sách bảo lưu')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h3 class="m-0 font-weight-bold text-primary">Danh sách bảo lưu</h3>
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
                        <th>Họ và tên</th>
                        <th>Email</th>
                        <th>Lớp đang học</th>
                        <th>Khóa đang học</th>
                        <th>Nội dung</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($reserves) === 0 )
                    <tr>
                        <td>Không có dữ liệu</td>
                    </tr>
                    @else
                    @php
                        $i = 1;
                    @endphp 
                    @foreach($reserves as $reserve)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $reserve->student->user->name }}</td>
                        <td>{{ $reserve->student->user->email }}</td>
                        <td>{{ $reserve->student->class->name_class }} - {{ $reserve->student->class->schedule->name_schedule }} ({{ $reserve->student->class->schedule->start_time }} - {{ $reserve->student->class->schedule->end_time }})</td>
                        <td>{{ $reserve->course->name_course }}</td>
                        <td>{{ $reserve->content }}</td>
                        <td>
                            @if($reserve->status == 1)  
                                Chờ xác nhận
                            @else
                                Đã xác nhận
                            @endif
                        </td>
                        <td><a href="{{ route('staff.reserveById', ['id' => $reserve->id]) }}" class="text-success"><i class="fas fa-info-circle"></i></i></a></td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection