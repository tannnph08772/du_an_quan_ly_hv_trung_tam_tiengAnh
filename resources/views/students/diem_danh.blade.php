@extends('student')
@section('title', 'Điểm danh')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h3 class="m-0 font-weight-bold text-primary">{{ Auth::user()->student->class->name_class }}</h3>
        <h6>Vắng <span class="text-danger font-weight-bold">{{ $count_absent }} / {{ Auth::user()->student->class->course->number_course }}</span> buổi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Ngày</th>
                        <th>Ca</th>
                        <th>Người điểm danh</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($attendances) === 0 )
                    <tr>
                        <td>Không có dữ liệu</td>
                    </tr>
                    @else
                    @php
                        \Carbon\Carbon::setLocale('vi');
                        $i = 1;
                    @endphp 
                    @foreach($attendances as $item)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td style="text-transform: capitalize;">{{ \Carbon\Carbon::parse($item->date)->translatedFormat('l') }}<br />{{ \Carbon\Carbon::parse($item->date)->translatedFormat('d/m/Y') }}</td>
                        <td>{{ $item->class->schedule->name_schedule }}</td>
                        <td>{{ $item->class->teacher->user->name }}</td>
                        <td>
                            @if(isset($item->attendanceDetail))
                                @foreach($item->attendanceDetail as $value)
                                    @if($value->status === 1)
                                        <span class="text-danger font-weight-bold">Vắng</span>
                                    @else
                                        <span class="text-success font-weight-bold">Có</span>
                                    @endif
                                @endforeach
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