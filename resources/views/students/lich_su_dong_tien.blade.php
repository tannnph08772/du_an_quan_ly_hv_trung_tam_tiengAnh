@extends('student')
@section('title', "Lịch sử đóng tiền")
@section('content')
<h1 class="h3 mb-2 text-gray-800">Danh sách hóa đơn</h1>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Lớp</th>
                        <th>Khoá học</th>
                        <th>Số tiền đã đóng</th>
                        <th>Người thu</th>
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
                        <td>{{$item->class->name_class}}</td>
                        <td>{{$item->class->course->name_course}}</td>
                        <td>{{$item->tuitionDetail->sum_money}} VNĐ</td>
                        <td>{{$item->user->name}}</td>
                        <td><img width=120 src={{ asset($item->tuitionDetail->image) }} alt=""></td>
                        <td>{{date_format($item->tuitionDetail->created_at,"d/m/Y")}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection