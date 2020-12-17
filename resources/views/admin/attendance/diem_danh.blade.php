@extends('teacher')
@section('title', 'Điểm danh')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h3 class="m-0 font-weight-bold text-primary">Điểm danh lớp {{ $attendance->class->name_class }}</h3>
        <h6>Ngày {{ $attendance->updated_at->format('d/m/yy') }}</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
						<th>STT</th>
						<th>Tên học viên</th>
						<th>Email</th>
						<th>Số điện thoại</th>
                        <th class="text-center">Vắng</th>
						<th class="text-center">Có</th>
                    </tr>
                </thead>
                <tbody>
					@if(count($attendanceDetails) === 0 )
					<tr>
						<td>Không có dữ liệu</td>
					</tr>
					@else
					@php $i = 1; @endphp
					@foreach($attendanceDetails as $attendanceDetail)
					<tr>
						<td>{{ $i++ }}</td>
						<td>{{ $attendanceDetail->student->user->name }}</td>
						<td>{{ $attendanceDetail->student->user->email }}</td>
						<td>{{ $attendanceDetail->student->user->phone_number }}</td>
						<td class="text-center">
							<input type="hidden" name="attendance_id_{{ $attendanceDetail->id }}" value="{{ $attendance->id }}">
							<input type="hidden" name="id_{{ $attendanceDetail->id }}" value="{{ $attendanceDetail->id }}">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="{{ $attendanceDetail->id }}" id="{{ $attendanceDetail->id }}" value="1" @if($attendanceDetail->status == 1) checked @endif>
								<label class="form-check-label" for="{{ $attendanceDetail->id }}"></label>
							</div>
						</td>
						<td class="text-center">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="{{ $attendanceDetail->id }}" id="{{ $attendanceDetail->id }}" value="2" @if($attendanceDetail->status == 2) checked @endif>
								<label class="form-check-label" for="{{ $attendanceDetail->id }}">&nbsp;</label>
							</div>
						</td>
					</tr>
					@endforeach
					@endif
				</tbody>
            </table>
			<div class="text-center">
				<button onclick="submitData()" class="btn btn-primary">Lưu điểm danh</button>
				<a href="{{ url()->previous() }}" class="btn btn-danger">Hủy</a>
			</div>
        </div>
    </div>
</div>
<script>
	function submitData(){
        var statusList = $('input[type=radio]:checked');
        var data = [];
        for(i=0; i<statusList.length; i++) {
			std = {
				'id': $('[name=id_'+$(statusList[i]).attr('name')+']').val(),
				'attendance_id': $('[name=attendance_id_'+$(statusList[i]).attr('name')+']').val(),
				'status': $(statusList[i]).val(),
			}
			data.push(std)
		}
		console.log(data);
		$.post('{{ route("attendance.store") }}', {
				'_token': "{{ csrf_token() }}",
				'data': JSON.stringify(data)
			}, function(e) {
                Swal.fire(
                    'Điểm danh thành công',
                    '',
                    'success'
                )
			}
		)
    }
</script>
@endsection

