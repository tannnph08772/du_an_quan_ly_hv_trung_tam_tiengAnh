@extends('teacher')
@section('title', 'Bảng điểm')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h4 class="m-0 font-weight-bold text-primary">Bảng điểm lớp {{ $class->name_class }}</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Học viên</th>
                        <th>Bài tập</th>
                        <th>Chuyên cần</th>
                        <th>Thi</th>
                        <th>Trung bình</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp 
                    @foreach($students as $student)
                    <tr class="info">
                        <td>{{ $i++ }}</td>
                        <td>{{ $student->user->name }}</td>
                        <td>
                            @php $total = 0; @endphp
                            @foreach($student->submit as $submit)
                            @if($submit->homework->class_id == $class->id)
                            @php $total += $submit->point; @endphp
                            @endif
                            @endforeach
                            {{ $total/count($homeworks) }}
                            <input type="hidden" class="form-control exercise" value="{{ $total/count($homeworks) }}">
                            <input type="hidden" class="form-control student" value="{{ $student->id }}">
                            <input type="hidden" class="form-control class" value="{{ $student->class->id }}">
                            <input type="hidden" class="form-control id" 
                                @foreach($student->points as $point)
                                @if($point->class_id == $class->id)
                                value="{{ $point->id == '' ? '' : $point->id }}"
                                @endif
                                @endforeach
                            >
                            <button class="btn" data-toggle="modal" data-target=".modal_{{ $student->id }}"><i class="fas fa-info-circle text-success"></i></button>
                            <div class="modal fade modal_{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Bài tập</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Học viên</th>
                                                        @foreach($homeworks as $homework)
                                                        <th>{{ $homework->title }}</th>
                                                        @endforeach
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $j = 1;
                                                    @endphp 
                                                    <tr>
                                                        <td>{{ $j++ }}</td>
                                                        <td>{{ $student->user->name }}</td>
                                                        @foreach($homeworks as $homework)
                                                        <td>
                                                            @foreach($student->submit as $submit)
                                                            @if($submit->homework_id == $homework->id && $homework->class_id == $class->id)
                                                                {{ $submit->point }}
                                                            @endif
                                                            @endforeach
                                                        </td>
                                                        @endforeach
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="d-flex justify-content-between">
                            <input style="width: 50% !important" type="text" class="form-control diligence" 
                                @if(count($student->points) > 0)
                                @foreach($student->points as $point)
                                @if($point->class_id == $class->id)
                                value="{{ $point->diligence == '' ? '' : $point->diligence }}"
                                @endif
                                @endforeach
                                @endif
                            >
                            @php $count = 0; @endphp
                            @foreach($attendances as $attendance)
                            @foreach($attendance->attendanceDetail as $attendanceDetail)
                            @if($attendanceDetail->student_id == $student->id)
                            @if($attendanceDetail->status == 1)
                            @php $count ++; @endphp
                            @endif
                            @endif
                            @endforeach
                            @endforeach
                            <p>Vắng <span class="text-danger font-weight-bold">{{ $count }}</span> buổi</p>
                        </td>
                        <td>
                            <input type="text" class="form-control test" 
                                @if(count($student->points) > 0)
                                @foreach($student->points as $point)
                                @if($point->class_id == $class->id)
                                value="{{ $point->test == '' ? '' : $point->test }}"
                                @endif
                                @endforeach
                                @endif
                            >
                        </td>
                        <td>
                            @php 
                                $exercise = ($total/count($homeworks))*0.5;
                                foreach($student->points as $point) {
                                    if($point->class_id == $class->id) {
                                        $diligence = ($point->diligence)*0.1;
                                    }
                                }
                                foreach($student->points as $point) {
                                    if($point->class_id == $class->id) {
                                        $test = ($point->test)*0.4;
                                    }
                                }
                            @endphp
                            @if(count($student->points) > 0) {{ $exercise + $diligence + $test }} @endif
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="6" class="text-center"><button onclick="submitData()" class="btn btn-primary">Cập nhật điểm</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    const submitData = () => {
        var info = document.querySelectorAll(".info");
        var data = [];
        var regex = /^\d+(?:\.\d{1})?$/;
        info.forEach(element => {
            if($(element).find('.diligence').val().match(regex) && $(element).find('.test').val().match(regex)) { 
                var point = {
                    'id': $(element).find('.id').val(),
                    'student': $(element).find('.student').val(),
                    'class': $(element).find('.class').val(),
                    'exercise': $(element).find('.exercise').val(),
                    'diligence': $(element).find('.diligence').val(),
                    'test': $(element).find('.test').val(),
                }
                data.push(point);
            }else { 
                Swal.fire(
                    'Sai định dạng',
                    '',
                    'error'
                )
                element.preventDefault();
            }
        });
        $.post('{{ route("point.store") }}', {
				'_token': "{{ csrf_token() }}",
				'data': JSON.stringify(data)
			}, function(e) {
                Swal.fire(
                    'Cập nhật thành công',
                    '',
                    'success'
                )
                location.reload();
			}
        )
    }
</script>
@endsection