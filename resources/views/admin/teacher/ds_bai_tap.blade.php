@extends('teacher')
@section('title', 'Bài tập đã giao')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h3 class="m-0 font-weight-bold text-primary">Bài tập đã giao</h3>
        <form action="" method="GET" class="form-inline">
            <select name="class" class="form-control mr-2">
                <option value="all">--- Tất cả lớp học ---</option>
                @foreach($arrayClass as $class)
                <option value="{{ $class->id }}" 
                    @php 
                        if(isset($_GET['class'])) {
                            if($class->id == $_GET['class']) {
                                echo 'selected';
                            }
                        } 
                    @endphp>{{ $class->name_class }}</option>
                @endforeach
            </select>
            <button class="btn btn-primary">Lọc</button>
        </form>
        <a class="btn btn-success" href="{{ route('homework.showFormHomework') }}">Thêm bài tập</a>
    </div>
    <div class="card-body">
        @if (Session::has('status'))
        <div class="alert alert-success">{{ Session::get('status') }}</div>
        @endif
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
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp 
                    @if (!isset($_GET["class"]) || ($_GET["class"] == "all"))
                    @foreach($homework as $item)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->file }}</td>
                        <td>{{ $item->end_day }}</td>
                        <td>{{ $item->class->name_class }}</td>
                        <td>{{ $item->note }}</td>
                        <td><a href="{{route('homework.dsNopBai', ['id' => $item->id])}}">Chi tiết</a></td>
                        <td><a href="{{route('homeworks.editBT',  ['id' => $item->id ])}}">Sửa</a></td>
                    </tr>
                    @endforeach
                    @else
                    @foreach($homework as $item)
                    @if($item->class_id == $_GET['class'])
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->file }}</td>
                        <td>{{ $item->end_day }}</td>
                        <td>{{ $item->class->name_class }}</td>
                        <td>{{ $item->note }}</td>
                        <td><a href="{{route('homework.dsNopBai', ['id' => $item->id])}}">Chi tiết</a></td>
                    </tr>
                    @endif
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection