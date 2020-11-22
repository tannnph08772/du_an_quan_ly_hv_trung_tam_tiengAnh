@extends('index')
@section('title', 'Danh sách giảng viên')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h3 class="m-0 font-weight-bold text-primary">Danh sách giảng viên</h3>
        <a class="btn btn-success" href="{{ route('teacher.create') }}">Thêm giảng viên</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Họ và tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Địa chỉ</th>
                        <th>Khóa học</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($teachers) === 0 )
                    <tr>
                        <td>Không có dữ liệu</td>
                    </tr>
                    @else
                    @php
                        $i = 1;
                    @endphp 
                    @foreach($teachers as $teacher)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->email }}</td>
                        <td>{{ $teacher->phone_number }}</td>
                        <td>{{ $teacher->birthday }}</td>
                        <td>@if($teacher->sex == 1) Nam @else Nữ @endif</td>
                        <td>{{ $teacher->address }}</td>
                        <td>{{ $teacher->teacher->course->name_course }}</td>
                        <td>
                            <form method="POST" action="{{ route('teacher.status', ['id' => $teacher->id]) }}">
                                @csrf
                                <button onclick="return confirm('Are you sure ?')" class="btn btn-outline-light">@if(($teacher->status) === 1)
                                    <i class="fas fa-check-circle" style="color: #4ad295"></i>
                                @else
                                    <i class="fas fa-times-circle" style="color: #000"></i> 
                                @endif
                                </button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route ('teacher.edit', ['id' => $teacher->id ]) }}"><i class="fas fa-edit text-success"></i></a>
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