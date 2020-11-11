@extends('index')
@section('title', 'View')
@section('content')
<div class="container ">
    <div class="row mt-5">
        <div class="col-lg-2"></div>
            <div class="row col-lg-8 justify-content-center bg-light pt-3 pb-3">
                <form method="POST">
                    <h1>Sửa Khóa Học</h1>
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Khóa Học</label>
                            <input type="text" name="name_course" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                value="{{old('name_course',$edit->name_course) }}">
                                <p class="text-danger">@error('name_course')
                                    {{$message}}
                                @enderror</p>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Số Buổi Học</label>
                            <input type="number" name="number_course" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                value="{{old('number_course', $edit->number_course)}}">
                                <p class="text-danger">@error('number_course')
                                    {{$message}}
                                @enderror</p>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô Tả</label>
                            <textarea id="summernote" name="description">{{ $edit->description }}</textarea>
                                <p class="text-danger">@error('description')
                                    {{$message}}
                                @enderror</p>
                        </div>

                        <button type="submit" class="btn btn-primary mb-2">Cập nhật</button>
                        <a href="{{route('course.index')}}" class="btn btn-danger mb-2">Hủy</a>
                </form>
            </div>
    </div>
</div>
    
@endsection
@section('script')
    <script>
        $('#summernote').summernote({
        tabsize: 2,
      height: 100
        });
    </script>
@endsection