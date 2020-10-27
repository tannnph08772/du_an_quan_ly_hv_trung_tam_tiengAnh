@extends('index')
@section('title', 'View')
@section('content')
<div class="container ">
   <div class="row mt-5">
       <div class="col-lg-2"></div>
            <div class="row col-lg-8 justify-content-center bg-light pt-3 pb-3">
                <form action="{{route('place.create')}}" class="col-12" method="POST">
                    <h1>Tạo Cơ Sở Học</h1>
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Cơ Sở</label>
                            <input type="text" name="name_place" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                value="">
                                <p class="text-danger">@error('name_place')
                                    {{$message}}
                                @enderror</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Địa Chỉ</label>
                            <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                value="">
                                <p class="text-danger">@error('address')
                                    {{$message}}
                                @enderror</p>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Thêm</button>
                        <a href="{{route('place.index')}}" class="btn btn-danger mb-2">Hủy</a>
                </form>
            </div>
    </div>
</div>
@endsection