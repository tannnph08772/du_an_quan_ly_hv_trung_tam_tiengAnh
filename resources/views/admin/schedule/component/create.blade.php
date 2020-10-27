@extends('index')
@section('title', 'View')
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
                            <input type="text" name="name_schedule" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                value="">
                                <p class="text-danger">@error('name_schedule')
                                    {{$message}}
                                @enderror</p>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Giờ bắt đầu</label>
                            <input type="time" name="start_time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                value="">
                                <p class="text-danger">@error('start_time')
                                    {{$message}}
                                @enderror</p>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Giờ kết thúc</label>
                            <input type="time" name="end_time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                value="">
                                <p class="text-danger">@error('end_time')
                                    {{$message}}
                                @enderror</p>
                        </div>

                        <button type="submit" class="btn btn-primary mb-2">Thêm</button>
                        <a href="{{route('schedule.index')}}" class="btn btn-danger mb-2">Hủy</a>
                </form>
            </div>
   </div>
</div>
@endsection