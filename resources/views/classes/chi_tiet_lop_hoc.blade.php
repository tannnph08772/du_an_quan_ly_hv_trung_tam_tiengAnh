@extends('staff')
@section('title', 'Danh sách học viên')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h3 class="m-0 font-weight-bold text-primary">Danh sách lớp</h3>
        <a class="btn btn-success" href="{{ route('classes.create') }}">Tạo Lớp</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên học viên</th>
                        <th>Email</th>
                        <th>Giới tính</th>
                        <th>ngày sinh</th>
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
                        <td>{{ $item->user->birthday }}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection