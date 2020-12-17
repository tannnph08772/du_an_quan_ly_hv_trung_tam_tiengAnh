@extends('student')
@section('title', 'Lịch học')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h3 class="m-0 font-weight-bold text-primary">Lịch học</h3>
        @if($now >= $date && $now <= $end_day && $feedback == 0)<a href="{{ route('feedback.showfeedback') }}" class="btn btn-success">Đánh giá</a>@endif
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Ngày</th>
                        <th>Lớp</th>
                        <th>Ca</th>
                        <th>Thời gian</th>
                        <th>Giảng viên</th>
                        <th>Khóa</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($calendars) === 0 )
                    <tr>
                        <td>Không có dữ liệu</td>
                    </tr>
                    @else
                    @php
                        \Carbon\Carbon::setLocale('vi');
                        $i = 1;
                    @endphp 
                    @foreach($calendars as $item)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td style="text-transform: capitalize;">{{ \Carbon\Carbon::parse($item->date)->translatedFormat('l') }}<br />{{ \Carbon\Carbon::parse($item->date)->translatedFormat('d/m/Y') }}</td>
                        <td>{{ $item->class->name_class }}</td>
                        <td>{{ $item->class->schedule->name_schedule }}</td>
                        <td>{{ $item->class->schedule->start_time }} - {{ $item->class->schedule->end_time }}</td>
                        <td>{{ $item->class->teacher->user->name }}</td>
                        <td>{{ $item->class->course->name_course }}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Đánh giá chất lượng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Hãy đánh giá chất lượng giảng viên với link dưới đây</p>
                    <a href="{{ route('feedback.showfeedback') }}" class="btn btn-success">Đánh giá</a>
                </div>
            </div>
        </div>
    </div>
</div>
@if($now >= $date && $now <= $end_day && $feedback == 0)
<script>
    var modal = document.querySelector("#exampleModal");
    var close = document.querySelector(".close");
    window.addEventListener("load", () => {
        modal.classList.add("show");
        modal.style.display = "block"
    });
    close.addEventListener("click", () => {
        modal.classList.remove("show");
        modal.style.display = "none"
    })
</script>
@endif
@endsection 