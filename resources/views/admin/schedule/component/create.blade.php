@extends('index')
@section('title', 'Thêm ca học')
@section('content')
<div class="container ">
   <div class="row mt-5">
       <div class="col-lg-2"></div>
       <div class="row col-lg-8 justify-content-center bg-light pt-3 pb-3">
        <form action="{{route('schedule.create')}}" class="col-12" method="POST">
           <h1>Tạo Ca Học</h1>
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên Ca Học</label>
                    <input type="text" name="name_schedule" class="form-control" 
                value="{{old('name_schedule')}}">
                        @error('name_schedule')
								<small style="color: red">{{ $message }}</small>
						@enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Giờ bắt đầu</label>
                    <input type="time" name="start_time" class="form-control" 
                        value="{{old('start_time')}}">
                        @error('start_time')
								<small style="color: red">{{ $message }}</small>
						@enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Giờ kết thúc</label>
                    <input type="time" name="end_time" class="form-control" 
                        value="{{old('end_time')}}">
                        @error('end_time')
								<small style="color: red">{{ $message }}</small>
						@enderror
                </div>
                <button type="submit" class="btn btn-primary mb-2">Thêm</button>
                <a href="{{route('schedule.index')}}" class="btn btn-danger mb-2">Hủy</a>
        </form>
    </div>
   </div>
</div>
@endsection
