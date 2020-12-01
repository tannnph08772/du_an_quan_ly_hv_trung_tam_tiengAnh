@extends('index')
@section('title', 'Chuyển lớp')
@section('content')
<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex justify-content-between align-items-center">
		<h3 class="m-0 font-weight-bold text-primary">Chuyển lớp</h3>
		<a class="btn btn-success" href="{{ route('staff.classTransferList') }}">Danh sách chuyển lớp</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<form method="POST" action="{{ route('staff.storeTransfer', ['id' => $sampleForm->id]) }}">
				@csrf
				<table class="table table-bordered">
					<tr>
						<td>Tên học viên</td>
						<td>{{ $sampleForm->student->user->name }}</td>
					</tr>
					<tr>
						<td>Email</td>
						<td>{{ $sampleForm->student->user->email }}</td>
					</tr>
					<tr>
						<td>Lớp đang học</td>
						<td>{{ $sampleForm->student->class->name_class }} - {{ $sampleForm->student->class->schedule->name_schedule }} ({{ $sampleForm->student->class->schedule->start_time }} - {{ $sampleForm->student->class->schedule->end_time }})</td>
					</tr>
					<tr>
						<td>Lớp chuyển tới</td>
						<td>{{ $sampleForm->class->name_class }} - {{ $sampleForm->class->schedule->name_schedule }} ({{ $sampleForm->class->schedule->start_time }} - {{ $sampleForm->class->schedule->end_time }}) --- {{ $countStuInClass }} học viên</td>
					</tr>
					<tr>
						<td>Nội dung</td>
						<td>{{ $sampleForm->content }}</td>
					</tr>
					@if($sampleForm->status == 1)
					<tr>
						<td></td>
						<td><button class="btn btn-success form-control">Submit</button></td>
					</tr>
					@else
					<tr>
						<td></td>
						<td class="text-center">Đã xác nhận</td>
					</tr>
					@endif
				</table>
			</form>
		</div>
	</div>
</div>
@endsection