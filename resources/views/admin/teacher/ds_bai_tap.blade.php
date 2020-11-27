@extends('teacher')
@section('title', 'Danh sách giảng viên')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h3 class="m-0 font-weight-bold text-primary">Danh sách bài tập</h3>
        <a class="btn btn-success" href="{{ route('homework.showFormHomework') }}">Thêm bài tập</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Title</th>
                        <th>File</th>
                        <th>Ngày kết thúc</th>
                        <th>Ghi chú</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($homework) === 0 )
                    <tr>
                        <td>Không có dữ liệu</td>
                    </tr>
                    @else
                    @php
                        $i = 1;
                    @endphp 
                    @foreach($homework as $item)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->file }}</td>
                        <td>{{ $item->end_day }}</td>
                        <td>{{ $item->note }}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection