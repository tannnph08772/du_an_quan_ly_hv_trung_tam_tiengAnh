@extends('student')
@section('title', 'Đơn bảo lưu')
@section('content')
<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex justify-content-between align-items-center">
		<h3 class="m-0 font-weight-bold text-primary">Đăng ký bảo lưu</h3>
	</div>
	<div class="card-body">
        <h6 class="text-danger">Thời gian đăng ký bảo lưu: {{ $start_day->format('Y-m-d') }} tới {{ $date }}</h6>
		<div class="table-responsive">
			<form method="POST" action="{{ route('student.storeReserve') }}">
				@csrf
                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                @error('student_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
				<table class="table table-bordered">
                    <tr>
                        <td>Họ và tên</td>
                        <td>{{ Auth::user()->name }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ Auth::user()->email }}</td>
                    </tr>
                    <tr>
                        <td>Lớp đang học</td>
                        <td>{{ Auth::user()->student->class->name_class }} - {{ Auth::user()->student->class->schedule->name_schedule }} ({{ Auth::user()->student->class->schedule->start_time }} - {{ Auth::user()->student->class->schedule->end_time }})</td>
                    </tr>
                    <tr>
                        <td>Khóa đang học</td>
                        <td>{{ Auth::user()->student->course->name_course }}</td>
                    </tr>
                    <tr>
                        <td style="width: 30%">Lý do bảo lưu <span class="text-danger">*</span></td>
                        <td>
                            @error('content')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                            <div class="form-group">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        @if($now <= $date)
                        <td></td>
                        <td><button class="btn btn-success form-control">Submit</button></td>
                        @else
                        @endif
                    </tr>
                </table>
                <input type="hidden" name="student_id" value="{{ Auth::user()->student->id }}">
			</form>
		</div>
	</div>
</div>
<div class="card shadow mb-4 mt-5">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h5 class="m-0 font-weight-bold text-primary">Lịch sử</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Ngày đăng ký</th>
                        <th></th>
                        <th>Khóa</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($reserveByStu) === 0 )
                    <tr>
                        <td>Không có dữ liệu</td>
                    </tr>
                    @else
                    @php
                        $i = 1;
                    @endphp 
                    @foreach($reserveByStu as $item)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ date_format($item->created_at,"Y-m-d") }}</td>
                        <td></td>
                        <td>{{ $item->course->name_course }}</td>
                        <td>
                            @if($item->status == 1)  
                                Chờ xác nhận
                            @else
                                Đã xác nhận
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