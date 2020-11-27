@extends('staff')
@section('title', "Danh sách học viên")
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Danh sách học viên</h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Họ và tên</th>
                            <th>Email</th>
                            <th>Liên hệ</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>Khoá học</th>
                            <th>Lớp</th>
                            <th>Ảnh hóa đơn</th>
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
                            <td>{{$item->course->name_course}}</td>
                            <td>{{$item->classRoom->name_class}}</td>
                            <td>{{$item->user->sex == 1? 'Nam' : 'Nữ'}}</td>
                            <td><img width=100% src="{{$item->image}}" alt=""></td>
                            <td>
                            <form method="POST" action="{{ route('student.status', ['id' => $item->user->id]) }}">
                                @csrf
                                <button class="btn btn-outline-light" onclick="return confirm('Bạn có muốn thực hiện thao tác này ?')">
                                @if(($item->user->status) == 1)
                                    <i class="fas fa-check-circle" style="color: #4ad295"></i>
                                @else
                                    <i class="fas fa-times-circle" style="color: #000"></i> 
                                @endif
                                </button>
                            </form>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection