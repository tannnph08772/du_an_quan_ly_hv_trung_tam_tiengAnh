@extends('index')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Danh sach học viên đăng ký</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            <button class="btn btn-primary">Thêm học viên</button>
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
                            <th>Địa chỉ</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Họ và tên</th>
                            <th>Email</th>
                            <th>Phone number</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>Khoá học</th>
                            <th>Địa chỉ</th>
                            <th>Hành động</th>
                        </tr>
                    </tfoot>
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
                            <td>{{$item->course_id}}</td>
                            <td>{{$item->address}}</td>
                            <td><a href="" class="btn btn-danger">delete</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection