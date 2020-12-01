@extends('teacher')
@section('title', 'Ngày điểm danh')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        @if(count($dates) == 0)
        <h3 class="m-0 font-weight-bold text-primary">Danh sách học viên</h3>
        @else
        @foreach($dates as $date)
        <h3 class="m-0 font-weight-bold text-primary">Danh sách học viên {{ $date->class->name_class }}</h3>
        <a class="btn btn-success" href="{{ route('attendance.create', ['id' => $date->id]) }}">Mở điểm danh</a>
        @endforeach
        @endif
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên học viên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Giới tính</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($students) === 0 )
                    <tr>
                        <td>Không có dữ liệu</td>
                    </tr>
                    @else
                    @php $i = 1; @endphp
                    @foreach($students as $student)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $student->user->name }}</td>
                        <td>{{ $student->user->email }}</td>
                        <td>{{ $student->user->phone_number }}</td>
                        <td>@if($student->user->sex === 1) Nam @else Nữ @endif</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection