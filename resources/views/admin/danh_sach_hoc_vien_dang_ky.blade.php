@extends('index')
@section('title', "Danh sách chờ")
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Danh sach học viên đăng ký</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Họ và tên</th>
                            <th>Email</th>
                            <th>Phone number</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>Khoá học</th>
                            <th>Chuyển</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach($waitList as $item)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->phone_number}}</td>
                            <td>{{$item->birthday}}</td>
                            <td>{{$item->sex}}</td>
                            <td>{{$item->course->name_course}}</td>
                            <td>
                                <a href="{{ route('users.getInfoHV',['id' => $item->id]) }}" class="btn">Chọn lớp <i class="fas fa-arrow-circle-right"></i></a>
                            </td>
                            <td>
                                <form action="{{ route('auth.remove',['id' => $item->id]) }}" method="POST">
                                    @csrf
                                    <button onclick=" return confirm('Bạn có chắc thực hiện thao tác này?')"
                                        class="btn"><i class="fas fa-trash-alt text-danger"></i></button>
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