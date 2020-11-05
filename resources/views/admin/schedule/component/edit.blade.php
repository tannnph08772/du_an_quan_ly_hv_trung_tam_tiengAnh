@extends('index')
@section('title', 'View')
@section('content')
<div class="container ">
    <div class="row mt-5">
        <div class="col-lg-2"></div>
            <div class="row col-lg-8 justify-content-center bg-light pt-3 pb-3">
                <form method="POST" class="col-12">
                    <h1>Sửa Ca Học</h1>
                        @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Ca Học</label>
                            <input  type="text" name="name_schedule" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    value="{{ $edit->name_schedule }}">
                                    <p class="text-danger">@error('name')
                                        {{$message}}
                                    @enderror</p>
                            </div>
                        
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giờ bắt đầu</label>
                                <input type="time" name="start_time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    value="{{ $edit->start_time }}">
                                    <p class="text-danger">@error('name')
                                        {{$message}}
                                    @enderror</p>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Giờ kết thúc</label>
                                <input type="time" name="end_time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    value="{{ $edit->end_time }}">
                                    <p class="text-danger">@error('name')
                                        {{$message}}
                                    @enderror</p>
                            </div>

                        <button type="submit" class="btn btn-primary mb-2">Cập nhật</button>
                        <a href="{{route('schedule.index')}}" class="btn btn-danger mb-2">Hủy</a>
                </form>
            </div>
    </div>
</div>
@endsection