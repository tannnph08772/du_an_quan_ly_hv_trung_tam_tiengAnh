@extends('index')
@section('title', 'View')
@section('content')
    <form action="{{route('schedule.create')}}" method="POST">
        <div class="container">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Tên Ca Học</label>
                <input type="text" name="name_schedule" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    value="">
                    <p class="text-danger">@error('name')
                        {{$message}}
                    @enderror</p>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Giờ bắt đầu</label>
                <input type="time" name="start_time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    value="">
                    <p class="text-danger">@error('name')
                        {{$message}}
                    @enderror</p>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Giờ kết thúc</label>
                <input type="time" name="end_time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    value="">
                    <p class="text-danger">@error('name')
                        {{$message}}
                    @enderror</p>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Thêm</button>
            <a href="{{route('schedule.index')}}" class="btn btn-danger mb-2">Hủy</a>
        </div>
        </div>
    </form>
    
@endsection