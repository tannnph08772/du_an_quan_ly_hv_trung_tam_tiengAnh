@extends('teacher')
@section('title' , 'Thêm bài tập cho học viên')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h3 class="m-0 font-weight-bold text-primary">Thêm bài tập</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <form method="POST" action="{{ route('homeworks.storeBT')}}"
                enctype="multipart/form-data">
                @csrf
                <table class="table table-bordered">
                    <tr>
                        <td>Tiêu đề</td>
                        <td>
                            @error('title')
                            <small style="color: red">{{ $message }}</small>
                            @enderror
                            <input type="text" class="form-control" name="title" value="{{old('title')}}">
                        </td>
                    </tr>
                    <tr>
                        <td>File</td>
                        <td>
                            @error('file')
                            <small style="color: red">{{ $message }}</small>
                            @enderror
                            <input type="file" class="form-control" value="{{old('file')}}" name="file">
                        </td>
                    </tr>
                    <tr>
                        <td>Ngày hết hạn</td>
                        <td>
                            @error('end_day')
                            <small style="color: red">{{ $message }}</small>
                            @enderror
                            <input type="date" class="form-control" name="end_day" value="{{old('end_day')}}">
                        </td>
                    </tr>
                    <tr>
                        <td>Lớp học</td>
                        <td>
                            <select class="custom-select mr-sm-2" name="class_id" id="inlineFormCustomSelect">
                                @foreach($classes as $class)
                                    <option value="{{$class->id}}">{{$class->name_class}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Ghi chú</td>
                        <td>
                            @error('note')
                            <small style="color: red">{{ $message }}</small>
                            @enderror
                            <textarea rows="8" class="form-control" name="note">{{old('note')}}</textarea>
                        </td>
                    </tr>
                    <td></td>
                    <td><button class="btn btn-success form-control">Submit</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
@endsection