@extends('index')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Danh sach học viên đăng ký</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <form action="{{url('export-csv')}}" method="POST">
                @csrf
                <input type="submit" value="Export Excel" name="export_csv" class="btn btn-success">
            </form>
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
                            <th>Thêm học viên vào lớp</th>
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
                            <th>Thêm học viên vào lớp</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach($waitLists as $item)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->phone_number}}</td>
                            <td>{{$item->birthday}}</td>
                            <td>{{$item->sex}}</td>
                            <td>{{$item->course_id}}</td>
                            <td>{{$item->address}}</td>
                            <td><a href="{{route('users.getInfoHV', ['id' => $item->id])}}" class="btn btn-danger">Thêm vào lớp</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection