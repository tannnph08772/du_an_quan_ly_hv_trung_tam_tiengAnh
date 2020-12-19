@extends('staff')
@section('title', 'Bảo lưu')
@section('content')
<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex justify-content-between align-items-center">
		<h3 class="m-0 font-weight-bold text-primary">Bảo lưu</h3>
		<a class="btn btn-success" href="{{ route('staff.reserveList') }}">Danh sách bảo lưu</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<form method="POST" action="{{ route('staff.updateReserve', ['id' => $reserve->id]) }}">
				@csrf
				<table class="table table-bordered">
					<tr>
						<td>Tên học viên</td>
						<td>{{ $reserve->student->user->name }}</td>
					</tr>
					<tr>
						<td>Email</td>
						<td>{{ $reserve->student->user->email }}</td>
					</tr>
					<tr>
						<td>Lớp đang học</td>
						<td>{{ $reserve->student->class->name_class }} - {{ $reserve->student->class->schedule->name_schedule }} ({{ $reserve->student->class->schedule->start_time }} - {{ $reserve->student->class->schedule->end_time }})</td>
					</tr>
					<tr>
						<td>Khóa đang học</td>
						<td>{{ $reserve->course->name_course }}</td>
					</tr>
					<tr>
						<td>Nội dung</td>
						<td>{{ $reserve->content }}</td>
					</tr>
					@if($reserve->status == 1)
					<tr>
						<td></td>
						<td><button class="btn btn-success form-control">Submit</button></td>
					</tr>
					@else
					<tr>
						<td></td>
						<td class="text-center">
							Đã xác nhận
							<a href="{{ route('reserve.getInfoLearnAgain', ['id' => $reserve->id]) }}" class="btn btn-primary ml-3">Xếp lớp học lại</a>
						</td>
					</tr>
					@endif
				</table>
			</form>
		</div>
	</div>
</div>
@endsection