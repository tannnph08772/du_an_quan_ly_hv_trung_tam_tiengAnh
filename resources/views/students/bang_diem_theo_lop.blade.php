@extends('student')
@section('title', 'Bảng điểm')
@section('content')
@if(count($classes) > 0)
@foreach($classes as $class)
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h4 class="m-0 font-weight-bold text-primary">@foreach($class as $value) {{ $value->name_class }} @endforeach</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên đầu điểm</th>
                        <th>Trọng số</th>
                        <th>Điểm</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp 
                    @foreach($class as $value)
                    @foreach($value->homeworks as $homework)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $homework->title }}</td>
                        <td></td>
                        <td>@foreach($homework->submit as $submit)
                                @if($submit->student_id == Auth::user()->student->id) 
                                    {{ $submit->point }}
                                @endif
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                    @endforeach
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>Trung bình bài tập</td>
                        <td>50%</td>
                        <td>@if(count($points) > 0)
                            @foreach($points as $point)
                            @foreach($class as $value)
                            @if($point->class_id == $value->id)
                                {{ $point->exercise }}
                                @php $exercise = ($point->exercise)*0.5 @endphp
                            @endif
                            @endforeach
                            @endforeach
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>Chuyên cần</td>
                        <td>10%</td>
                        <td>@if(count($points) > 0)
                            @foreach($points as $point)
                            @foreach($class as $value)
                            @if($point->class_id == $value->id)
                                {{ $point->diligence }}
                                @php $diligence = ($point->diligence)*0.1 @endphp
                            @endif
                            @endforeach
                            @endforeach
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>Thi</td>
                        <td>40%</td>
                        <td>@if(count($points) > 0)
                            @foreach($points as $point)
                            @foreach($class as $value)
                            @if($point->class_id == $value->id)
                                {{ $point->test }}
                                @php $test = ($point->test)*0.4 @endphp
                            @endif
                            @endforeach
                            @endforeach
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div style="font-size: 14px; color: #000;">
                <p class="mb-0">Trung bình: <span class="text-danger">@if(count($points) > 0) {{ $exercise + $diligence + $test }} @endif</span></p>
                <p>Trạng thái: @foreach($class as $value)
                    @if($value->status == 3) 
                        <span class="text-success">Đã học</span> 
                    @else 
                        <span class="text-warning">Đang học</span> 
                    @endif 
                    @endforeach
                </p>
            </div>
        </div>
    </div>
</div>
@endforeach
@else
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h4 class="m-0 font-weight-bold text-primary">{{ $class->name_class }}</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên đầu điểm</th>
                        <th>Trọng số</th>
                        <th>Điểm</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp 
                    @foreach($class->homeworks as $homework)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $homework->title }}</td>
                        <td></td>
                        <td>@foreach($homework->submit as $submit)
                                @if($submit->student_id == Auth::user()->student->id) 
                                    {{ $submit->point }}
                                @endif
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>Trung bình bài tập</td>
                        <td>50%</td>
                        <td>@if(count($points) > 0)
                            @foreach($points as $point)
                            @foreach($class as $value)
                            @if($point->class_id == $value->id)
                                {{ $point->exercise }}
                                @php $exercise = ($point->exercise)*0.5 @endphp
                            @endif
                            @endforeach
                            @endforeach
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>Chuyên cần</td>
                        <td>10%</td>
                        <td>@if(count($points) > 0)
                            @foreach($points as $point)
                            @foreach($class as $value)
                            @if($point->class_id == $value->id)
                                {{ $point->diligence }}
                                @php $diligence = ($point->diligence)*0.1 @endphp
                            @endif
                            @endforeach
                            @endforeach
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>Thi</td>
                        <td>40%</td>
                        <td>@if(count($points) > 0)
                            @foreach($points as $point)
                            @foreach($class as $value)
                            @if($point->class_id == $value->id)
                                {{ $point->test }}
                                @php $test = ($point->test)*0.4 @endphp
                            @endif
                            @endforeach
                            @endforeach
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div style="font-size: 14px; color: #000;">
                <p class="mb-0">Trung bình: <span class="text-danger">@if(count($points) > 0) {{ $exercise + $diligence + $test }} @endif</span></p>
                <p>Trạng thái: 
                    @if($class->status == 3) 
                        <span class="text-success">Đã học</span> 
                    @else 
                        <span class="text-warning">Đang học</span> 
                    @endif 
                </p>
            </div>
        </div>
    </div>
</div>
@endif
@endsection