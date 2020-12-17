@extends('teacher')
@section('title', 'Chi tiết lớp')
@section('content')
<h1 class="h3 mb-2 text-gray-800">Danh sách học viên {{ $class->name_class }}</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <a class="btn btn-primary" href="{{ route('teachers.showPoint', ['id' => $class->id]) }}">Bảng điểm</a>
        @if(count($dates) != 0)
        @foreach($dates as $date)
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
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h3 class="m-0 font-weight-bold text-primary">Lịch sử điểm danh</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Ngày</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; \Carbon\Carbon::setLocale('vi'); @endphp
                    @foreach($attendances as $item)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td style="text-transform: capitalize;">{{ \Carbon\Carbon::parse($item->date)->translatedFormat('l') }}<br />{{ \Carbon\Carbon::parse($item->date)->translatedFormat('d/m/Y') }}</td>
                        <td><a class="btn btn-success" href="{{ route('attendance.create', ['id' => $item->id]) }}"><i class="fas fa-edit"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection