@extends('staff')
@section('title', 'Tạo lớp')
@section('content')
<!-- <h1 class="h3 mb-2 text-gray-800">Tạo lớp</h1> -->
<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex justify-content-between align-items-center">
		<h3 class="m-0 font-weight-bold text-primary">Tạo lớp</h3>
		<a class="btn btn-success" href="{{ route('classes.index') }}">Danh sách lớp</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<form method="POST" action="{{ route('classes.store') }}">
				@csrf
				<table class="table table-bordered">
					<tr>
						<td>Tên lớp</td>
						<td>
							@error('name_class')
								<small style="color: red">{{ $message }}</small>
							@enderror
							<input type="text" class="form-control" name="name_class" value="{{ old('name_class') }}"></td>
					</tr>
					<tr>
						<td>Ngày bắt đầu</td>
						<td>
							@error('start_day')
								<small style="color: red">{{ $message }}</small>
							@enderror<input type="date" class="form-control" name="start_day" value="{{ old('start_day') }}">
						</td>
					</tr>
					<tr>
						<td>Ca học</td>
						<td>
							<select class="form-control" name="schedule_id">
								@foreach($schedules as $schedule)
								<option value="{{ $schedule->id }}">{{ $schedule->name_schedule }} ({{ $schedule->start_time }} - {{ $schedule->end_time }})</option>
								@endforeach
							</select>
						</td>
					</tr>
					<tr>
						<td>Ngày học</td>
						<td>
							@error('weekday')
								<small style="color: red">{{ $message }}</small><br />
							@enderror
							@foreach($weekdays as $weekday)
							<div class="form-check-inline">
								<input type="checkbox" class="form-check-input" name="weekday[]" value="{{ $weekday }}">
								<label class="form-check-label">
									@if($weekday == 0) Chủ nhật
									@elseif($weekday == 1) Thứ 2
									@elseif($weekday == 2) Thứ 3
									@elseif($weekday == 3) Thứ 4	
									@elseif($weekday == 4) Thứ 5	
									@elseif($weekday == 5) Thứ 6	
									@elseif($weekday == 6) Thứ 7							
									@endif
								</label>
							</div>
							@endforeach
						</td>
					</tr>
					<tr>
						<td>Giảng viên</td>
						<td>
							<select class="form-control" name="teacher_id">
								@foreach($teachers as $teacher)
								<option value="{{ $teacher->id }}">{{ $teacher->user->name }}</option>
								@endforeach
							</select>
						</td>
					</tr>
					<tr>
						<td>Khóa học</td>
						<td>
							<select class="form-control" name="course_id">
								@foreach($courses as $course)
								<option value="{{ $course->id }}">{{ $course->name_course }}</option>
								@endforeach
							</select>
						</td>
					</tr>
					<tr>
						<td>Cơ sở</td>
						<td>
							<select class="form-control" name="place_id">
								@foreach($places as $place)
								<option value="{{ $place->id }}">{{ $place->name_place }}</option>
								@endforeach
							</select>
						</td>
					</tr>
					<tr>
						<td></td>
						<td><button class="btn btn-success form-control">Submit</button></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>
@endsection