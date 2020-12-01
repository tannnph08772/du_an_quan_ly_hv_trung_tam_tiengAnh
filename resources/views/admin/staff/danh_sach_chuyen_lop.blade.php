@extends('index')
@section('title', 'Danh sách chuyển lớp')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h3 class="m-0 font-weight-bold text-primary">Danh sách chuyển lớp</h3>
    </div>
    <div class="card-body">
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Họ và tên</th>
                        <th>Email</th>
                        <th>Lớp đang học</th>
                        <th>Lớp chuyển tới</th>
                        <th>Nội dung</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($sampleForms) === 0 )
                    <tr>
                        <td>Không có dữ liệu</td>
                    </tr>
                    @else
                    @php
                        $i = 1;
                    @endphp 
                    @foreach($sampleForms as $sampleForm)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $sampleForm->student->user->name }}</td>
                        <td>{{ $sampleForm->student->user->email }}</td>
                        <td>{{ $sampleForm->student->class->name_class }} - {{ $sampleForm->student->class->schedule->name_schedule }} ({{ $sampleForm->student->class->schedule->start_time }} - {{ $sampleForm->student->class->schedule->end_time }})</td>
                        <td>{{ $sampleForm->class->name_class }} - {{ $sampleForm->class->schedule->name_schedule }} ({{ $sampleForm->class->schedule->start_time }} - {{ $sampleForm->class->schedule->end_time }})</td>
                        <td>{{ $sampleForm->content }}</td>
                        <td>
                            @if($sampleForm->status == 1)  
                                Chờ xác nhận
                            @else
                                Đã xác nhận
                            @endif
                        </td>
                        <td><a href="{{ route('staff.classTransferById', ['id' => $sampleForm->id]) }}" class="text-success"><i class="fas fa-info-circle"></i></i></a></td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection