@extends('staff')
@section('title', 'Xếp lớp học lại')
@section('content')
<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex justify-content-between align-items-center">
		<h3 class="m-0 font-weight-bold text-primary">Xếp lớp cho học viên bảo lưu</h3>
        <a class="btn btn-success" href="{{ route('staff.reserveList') }}">Danh sách bảo lưu</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<form method="POST" action="{{ route('reserve.updateLearnAgain', ['id' => $reserve->id]) }}">
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
						<td>Lớp bảo lưu</td>
						<td>{{ $reserve->student->class->name_class }} - {{ $reserve->student->class->schedule->name_schedule }} ({{ $reserve->student->class->schedule->start_time }} - {{ $reserve->student->class->schedule->end_time }})</td>
					</tr>
					<tr>
						<td>Khóa bảo lưu</td>
						<td>{{ $reserve->course->name_course }}</td>
					</tr>
					<tr>
						<td>Nội dung</td>
						<td>{{ $reserve->content }}</td>
					</tr>
                    <tr>
                        <td>Lớp chuyển tới</td>
                        <td>
                            <select class="form-control" name="class_id">
								@if(count($filteredArray) == 0) 
                                    Chưa có lớp phù hợp
								@else
								@foreach($filteredArray as $class)
								<option value="{{ $class['id'] }}">{{ $class['name_class'] }} - {{ $class['schedule']['name_schedule'] }} ({{ $class['schedule']['start_time'] }} - {{ $class['schedule']['end_time'] }}) - {{ $class['place']['name_place'] }} ({{ $class['place']['address'] }})</option>
								@endforeach
								@endif
							</select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button class="btn btn-success form-control">Submit</button>
                        </td>
                    </tr>
				</table>
			</form>
		</div>
	</div>
</div>
@endsection