@extends('teacher')
@section('title', 'Bài tập đã giao')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h3 class="m-0 font-weight-bold text-primary">Bài tập đã giao</h3>
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
                        <th>Lớp</th>
                        <th>Ghi chú</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp 
                    @foreach($homework as $item)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->file }}</td>
                        <td>{{ $item->end_day }}</td>
                        <td>{{ $item->class->name_class }}</td>
                        <td>{{ $item->note }}</td>
                        <td><a href="{{route('homework.dsNopBai', ['id' => $item->id])}}">Chi tiết</a></td>
                    </tr>
                    @endforeach
                 
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection