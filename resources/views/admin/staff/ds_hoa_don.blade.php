@extends('staff')
@section('title', "Danh sách hóa đơn")
@section('content')
<h1 class="h3 mb-2 text-gray-800">Danh sách hóa đơn</h1>
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
                        <th>Giới tính</th>
                        <th>Khoá học</th>
                        <th>Số tiền</th>
                        <th>Ảnh hóa đơn</th>
                        <th>Ngày nộp</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach($tuition as $item)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$item->student->user->name}}</td>
                        <td>{{$item->student->user->email}}</td>
                        <td>{{$item->student->user->phone_number}}</td>
                        <td>{{$item->student->user->sex == 1 ? 'Nam' : 'Nữ'}}</td>
                        <td>{{$item->student->course->name_course}}</td>
                        <td>{{$item->tuitionDetail->sum_money}} VNĐ</td>
                        <td><img width=100% src="{{$item->tuitionDetail->image}}" alt=""></td>
                        <td>{{date_format($item->tuitionDetail->created_at,"d/m/Y")}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection