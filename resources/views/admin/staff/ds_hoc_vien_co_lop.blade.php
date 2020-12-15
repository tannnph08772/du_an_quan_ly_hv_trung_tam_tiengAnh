@extends('staff')
@section('title', "Danh sách học viên")
@section('content')
<h1 class="h3 mb-2 text-gray-800">Danh sách học viên</h1>
<div class="card shadow mb-4">
    <div class="card-body">
        @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Họ và tên</th>
                        <th>Email</th>
                        <th>Liên hệ</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Lớp</th>
                        <th>Khoá học</th>
                        <th>Học phí</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach($students as $item)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$item->user->name}}</td>
                        <td>{{$item->user->email}}</td>
                        <td>{{$item->user->phone_number}}</td>
                        <td>{{$item->user->birthday}}</td>
                        <td>{{$item->user->sex == 1 ? 'Nam' : 'Nữ'}}</td>
                        <td>{{$item->classRoom->name_class}}</td>
                        <td>{{$item->course->name_course}}</td>
                        <td style="width:90px; text-align:center">@if($item->status == 1)
                            <small class="label bg-danger text-white py-1 px-1 w-100">Chưa đóng</small> <br>
                            <a style="font-size:11px"
                                href="{{ route('tuition.showFormHocPhi', ['id' => $item->id])}}">Thu học phí</a>
                            @else
                            <small class="label bg-success text-white py-1 px-1">Đã đóng <i
                                    class="fas fa-check"></i></small>
                            @endif
                        </td>
                        <td class="d-flex align-items-center">
                            <form method="POST" action="{{ route('student.status', ['id' => $item->user->id]) }}">
                                @csrf
                                <button class="btn btn-outline-light"
                                    onclick="return confirm('Bạn có muốn thực hiện thao tác này ?')">
                                    @if(($item->user->status) == 1)
                                    <i class="fas fa-check-circle" style="color: #4ad295"></i>
                                    @else
                                    <i class="fas fa-times-circle" style="color: #000"></i>
                                    @endif
                                </button>
                            </form>
                            <a href="{{ route('staff.editStudent', ['id' => $item->user->id]) }}"
                                class="btn btn-outline-light text-primary"><i class="fas fa-user-edit"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center mb-1">
                <a href="{{route('exportDSHV')}}" class="btn btn-primary">Download</a>
            </div>
        </div>
    </div>
</div>
@endsection