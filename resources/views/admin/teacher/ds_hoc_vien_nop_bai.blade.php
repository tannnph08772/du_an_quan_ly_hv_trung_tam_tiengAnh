@extends('teacher')
@section('title', 'Danh sách học viên nộp bài')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h3 class="m-0 font-weight-bold text-primary">Danh sách học viên nộp bài {{$hw->class->name_class}}</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Họ và tên</th>
                        <th>File</th>
                        <th>Ngày nộp bài</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp 
                    @foreach($submit as $item)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->student->user->name }}</td>
                        <td>
                            @foreach($item->submitDetail as $it)
                            <a href="{{ route('download',$it->file) }}">{{$it->file}}</a><br>
                            @endforeach
                        </td>
                        <td>{{date_format($it->created_at,"d/m/Y H:i:s")}}</td>
                        <td>
                            @if(date_format($item->created_at,"Y-m-d") <= $hw->end_day)
                                <span class="text-success font-weight-bold">Đúng hạn</span>
                            @else
                                <span class="text-danger font-weight-bold">Muộn</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection