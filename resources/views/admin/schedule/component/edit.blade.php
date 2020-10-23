@extends('index')
@section('title', 'View')
@section('content')
    <form action="{{ route ('schedule.edit') }}" method="POST">
        <div class="container">
            @csrf
            @forelse ($edit as $item)
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên Ca Học</label>
                <input  type="text" name="name_schedule" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        value="{{ $item->schedule_name }}">
                        <p class="text-danger">@error('name')
                            {{$message}}
                        @enderror</p>
                </div>
            
                <div class="form-group">
                    <label for="exampleInputEmail1">Giờ bắt đầu</label>
                    <input type="time" name="start_time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        value="{{ $list->start_time }}">
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
            @empty
            @endforelse
            <button type="submit" class="btn btn-primary mb-2">Cập nhật</button>
            <a href="{{route('schedule.index')}}" class="btn btn-danger mb-2">Hủy</a>
        </div>
        </div>
    </form>
    
@endsection