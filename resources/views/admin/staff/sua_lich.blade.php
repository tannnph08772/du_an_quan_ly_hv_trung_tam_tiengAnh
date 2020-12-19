@extends('staff')
@section('title', 'Sửa lịch')
@section('content')
<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex justify-content-between align-items-center">
		<h3 class="m-0 font-weight-bold text-primary">Sửa lịch</h3>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<form method="POST" action="{{ route('classes.updateCalendar', ['id' => $attendance->id]) }}">
				@csrf
				<table class="table table-bordered">
					<tr>
						<td>Ngày</td>
						<td>
							@error('date')
								<small style="color: red">{{ $message }}</small>
							@enderror
							<input type="date" class="form-control" name="date" value="{{ $attendance->date }}">
                        </td>
					</tr>
                    <tr>
						<td>Ca học</td>
						<td>
							@error('schedule_id')
								<small style="color: red">{{ $message }}</small>
							@enderror
                            <select class="form-control" name="schedule_id">
								@foreach($schedules as $schedule)
								<option @if($schedule->id == $attendance->schedule_id) selected @endif value="{{ $schedule->id }}">{{ $schedule->name_schedule }} ({{ $schedule->start_time }} - {{ $schedule->end_time }}) </option>
								@endforeach
							</select>
                        </td>
					</tr>
                    <tr>
                        <td>Giảng viên</td>
                        <td>
							@error('teacher_id')
								<small style="color: red">{{ $message }}</small>
							@enderror
							<select class="form-control" name="teacher_id">
								@foreach($teachers as $teacher)
								<option @if($teacher->id == $attendance->teacher_id) selected @endif value="{{ $teacher->id }}">{{ $teacher->user->name }}</option>
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