@extends('staff')
@section('title', 'Danh sách học viên')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h3 class="m-0 font-weight-bold text-primary">Danh sách học viên {{$classes->name_class}}</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên học viên</th>
                        <th>Email</th>
                        <th>Giới tính</th>
                        <th>Số điện thoại</th>
                        <th>Ngày sinh</th>
                        <th>Học phí</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($students) === 0 )
                    <tr>
                        <td>Không có dữ liệu</td>
                    </tr>
                    @else
                    @php
                    $i = 1;
                    @endphp
                    @foreach($students as $item)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->user->name}}</td>
                        <td>{{ $item->user->email }}</td>
                        <td>{{ $item->user->sex ==1 ? 'Nam' : 'Nữ' }}</td>
                        <td>{{ $item->user->phone_number }}</td>
                        <td>{{ $item->user->birthday }}</td>
                        <td>
                            @if($item->status == 1)
                            <small class="label bg-danger text-white py-1 px-1">Chưa đóng</small> <br>
                            <a style="font-size:11px"
                                href="{{ route('tuition.showFormHocPhi', ['id' => $item->id])}}">Thu học phí</a>
                            @else
                            <small class="label bg-success text-white py-1 px-1">Đã đóng <i
                                    class="fas fa-check"></i></small>
                            @endif
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