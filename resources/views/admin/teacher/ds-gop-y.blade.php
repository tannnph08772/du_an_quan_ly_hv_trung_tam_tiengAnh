@extends('teacher')
@section('title', 'Danh sách góp ý')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h4 class="m-0 font-weight-bold text-primary">Danh sách Feedback về bạn</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-dark text-center" id="dataTable" width="100%"
                cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Nội dung feedback</th>
                        <th>Ý kiến góp ý</th>
                        <th>Lớp</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $key=1;
                    @endphp
                    @foreach($classes as $class)
                    @foreach($fb as $feedback )
                    @if($class->id==$feedback->class_id)
                    <tr>
                        
                        <td>{{ $key++}}</td>
                        <td>
                            <p class="text-left">
                                @foreach($feedback->results as $result)
                                {{$result->question->question}} : {{$result->answer->answer}}</br>
                                @endforeach
                            </p>

                        </td>
                        <td>{{$feedback->content}}</td>
                        <td>{{$class->name_class}}</td>
                    </tr>

                    @endif
                    @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection