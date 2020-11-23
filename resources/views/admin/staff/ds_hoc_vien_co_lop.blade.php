@extends('staff')
@section('title', "Danh sách học viên")
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Danh sách học viên</h1>
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
                            <th>Liên hệ</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>Khoá học</th>
                            <th>Lớp</th>
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
                            <td>{{$item->user->sex == 1? 'Nam' : 'Nữ'}}</td>
                            <td>{{$item->course->name_course}}</td>
                            <td>{{$item->classRoom->name_class}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection