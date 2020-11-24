@extends('index')
@section('title', 'Sửa tài khoản giảng viên')
@section('content')
<div class="card shadow mb-4">
	<div class="card-header py-3 d-flex justify-content-between align-items-center">
		<h3 class="m-0 font-weight-bold text-primary">Sửa tài khoản giảng viên</h3>
		<a class="btn btn-success" href="{{ route('teacher.index') }}">Danh sách giảng viên</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<form method="POST" action="{{ route('teacher.update', ['id' => $teacher->id]) }}">
				@csrf
				<table class="table table-bordered">
					<tr>
						<td>Họ và tên <span class="text-danger">*</span></td>
						<td>
							@error('name')
								<small style="color: red">{{ $message }}</small>
							@enderror
							<input type="text" class="form-control" name="name" placeholder="Ví dụ: Nguyễn Văn A" value="{{ $teacher->name }}"></td>
					</tr>
					<tr>
						<td>Email <span class="text-danger">*</span></td>
						<td>
							@error('email')
								<small style="color: red">{{ $message }}</small>
							@enderror
                            <input type="email" class="form-control" name="email" placeholder="Ví dụ: abc123@gmail.com" value="{{ $teacher->email }}">
						</td>
					</tr>
					<tr>
						<td>Số điện thoại <span class="text-danger">*</span></td>
						<td>
							@error('phone_number')
								<small style="color: red">{{ $message }}</small>
							@enderror
                            <input type="text" class="form-control" name="phone_number" placeholder="Ví dụ: 0123456789" value="{{ $teacher->phone_number }}">
						</td>
					</tr>
					<tr>
						<td>Ngày sinh <span class="text-danger">*</span></td>
						<td>
                            @error('birthday')
								<small style="color: red">{{ $message }}</small>
							@enderror
                            <input type="date" class="form-control" name="birthday" value="{{ $teacher->birthday }}">
						</td>
					</tr>
					<tr>
						<td>Giới tính <span class="text-danger">*</span></td>
						<td>
							@error('sex')
								<small style="color: red">{{ $message }}</small>
							@enderror
							<div class="d-flex justify-content-between">
                                <div class="form-group">
                                    <input type="radio" name="sex" value="1" @if($teacher->sex == 1) checked @endif> Nam &nbsp; &nbsp; &nbsp;
                                    <input type="radio" name="sex" value="2" @if($teacher->sex == 2) checked @endif> Nữ
                                </div>
                            </div>
						</td>
					</tr>
					<tr>
						<td>Địa chỉ <span class="text-danger">*</span></td>
						<td>
                            @error('address')
								<small style="color: red">{{ $message }}</small>
							@enderror
                            <input type="text" class="form-control" name="address" placeholder="Ví dụ: 122 Cầu giấy, Hà nội" value="{{ $teacher->address }}">
						</td>
					</tr>
                    <tr>
						<td>Khóa học</td>
						<td>
							<select class="form-control" name="course_id">
								@foreach($courses as $course)
								<option @if($course->id == $teacher->teacher->course_id) selected @endif value="{{ $course->id }}">{{ $course->name_course }}</option>
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