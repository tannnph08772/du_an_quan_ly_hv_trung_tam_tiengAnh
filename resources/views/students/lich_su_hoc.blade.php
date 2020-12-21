@extends('student')
@section('title', 'Lịch sử học')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h4 class="m-0 font-weight-bold text-primary">Danh sách các khóa đã học</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Lớp</th>
                        <th>Khóa</th>
                        <th>Điểm trung bình</th>
                        <th>Trạng thái</th>
                        <th>Số buổi học</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp 
                    @if(count($classes) > 0)
                    @foreach($classes as $class)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>@foreach($class as $value) {{ $value->name_class }} @endforeach</td>
                        <td>@foreach($class as $value) {{ $value->course->name_course }} @endforeach</td>
                        <td>
                            @if(count($points) > 0) 
                            @foreach($points as $point)
                            @foreach($class as $value)
                            @if($point->class_id == $value->id)
                                @php $exercise = ($point->exercise)*0.5 @endphp
                            @endif
                            @endforeach
                            @endforeach  

                            @foreach($points as $point)
                            @foreach($class as $value)
                            @if($point->class_id == $value->id)
                                @php $diligence = ($point->diligence)*0.1 @endphp
                            @endif
                            @endforeach
                            @endforeach

                            @foreach($points as $point)
                            @foreach($class as $value)
                            @if($point->class_id == $value->id)
                                @php $test = ($point->test)*0.4 @endphp
                            @endif
                            @endforeach
                            @endforeach
                            
                            {{ $exercise + $diligence + $test }}
                            @endif
                        </td>
                        <td>@foreach($class as $value) @if($value->status == 3) <span class="text-success">Đã học</span> @else <span class="text-warning">Đang học</span> @endif @endforeach</td>
                        <td>@foreach($class as $value) {{ $value->course->number_course }} @endforeach</td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $class->name_class }}</td>
                        <td>{{ $class->course->name_course }}</td>
                        <td>
                            @if(count($points) > 0) 
                            @foreach($points as $point)
                            @if($point->class_id == $class->id)
                                @php $exercise = ($point->exercise)*0.5 @endphp
                            @endif
                            @endforeach  

                            @foreach($points as $point)
                            @if($point->class_id == $class->id)
                                @php $diligence = ($point->diligence)*0.1 @endphp
                            @endif
                            @endforeach

                            @foreach($points as $point)
                            @if($point->class_id == $class->id)
                                @php $test = ($point->test)*0.4 @endphp
                            @endif
                            @endforeach
                            
                            {{ $exercise + $diligence + $test }}
                            @endif
                        </td>
                        <td>@if($class->status == 3) <span class="text-success">Đã học</span> @else <span class="text-warning">Đang học</span> @endif</td>
                        <td>{{ $class->course->number_course }}</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection