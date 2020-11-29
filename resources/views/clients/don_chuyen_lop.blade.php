@extends('client')
@section('title', 'Đơn chuyển lớp')
@section('content')
<div class="container py-5">
    <h1 class="text-center mb-5">Đơn chuyển lớp</h1>
    <h5 class="text-danger">Thời gian đăng ký chuyển lớp: {{ $start_day->format('Y-m-d') }} tới {{ $date }}</h5>
    <div class="table-responsive">
        <form method="POST" action="{{ route('auth.storeForm') }}">
            @csrf
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @error('student_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <table class="table table-bordered">
                <tr>
                    <td>Họ và tên</td>
                    <td>{{ Auth::user()->name }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ Auth::user()->email }}</td>
                </tr>
                <tr>
                    <td>Lớp đang học</td>
                    <td>{{ Auth::user()->student->class->name_class }} - {{ Auth::user()->student->class->schedule->name_schedule }} ({{ Auth::user()->student->class->schedule->start_time }} - {{ Auth::user()->student->class->schedule->end_time }})</td>
                </tr>
                <tr>
                    <td>Lớp chuyển tới</td>
                    <td>
                        @error('class_id')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                        <select class="form-control" name="class_id">
                            @foreach($filteredArray as $class)
                            <option value="{{ $class['id'] }}">{{ $class['name_class'] }} - {{ $class['schedule']['name_schedule'] }} ({{ $class['schedule']['start_time'] }} - {{ $class['schedule']['end_time'] }})</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="width: 30%">Lý do chuyển lớp <span class="text-danger">*</span></td>
                    <td>
                        @error('content')
                            <small style="color: red">{{ $message }}</small>
                        @enderror
                        <div class="form-group">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                    @if($now <= $date)
                    <td></td>
                    <td><button class="btn btn-success form-control">Submit</button></td>
                    @else
                    @endif
                </tr>
            </table>
            <input type="hidden" name="student_id" value="{{ Auth::user()->student->id }}">
        </form>
    </div>
</div>
@endsection
