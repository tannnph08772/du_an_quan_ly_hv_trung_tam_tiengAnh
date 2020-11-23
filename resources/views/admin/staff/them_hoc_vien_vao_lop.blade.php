@extends('staff')
@section('title' , 'Thêm học viên vào lớp')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h3 class="m-0 font-weight-bold text-primary">Thêm học viên vào lớp</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <form method="POST" action="{{ route('users.store', ['id' => $waitList->id])}}"
                enctype="multipart/form-data">
                @csrf
                <table class="table table-bordered">
                    <tr>
                        <td>Họ và tên</td>
                        <td>
                            @error('name')
                            <small style="color: red">{{ $message }}</small>
                            @enderror
                            <input type="text" class="form-control" name="name" value="{{$waitList->name}}">
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            @error('email')
                            <small style="color: red">{{ $message }}</small>
                            @enderror
                            <input type="email" class="form-control" name="email" value="{{$waitList->email}}">
                        </td>
                    </tr>
                    <tr>
                        <td>Ảnh hóa đơn</td>
                        <td>
                            @error('image')
                            <small style="color: red">{{ $message }}</small>
                            @enderror
                            <input type="file" class="form-control" value="{{old('image')}}" name="image">
                        </td>
                    </tr>
                    <tr>
                        <td>Ngày sinh</td>
                        <td>
                            @error('birthday')
                            <small style="color: red">{{ $message }}</small>
                            @enderror
                            <input type="date" class="form-control" name="birthday" value="{{$waitList->birthday}}">
                        </td>
                    </tr>
                    <tr>
                        <td>Số điện thoại</td>
                        <td>
                            @error('phone_number')
                            <small style="color: red">{{ $message }}</small>
                            @enderror
                            <input type="text" class="form-control" name="phone_number"
                                value="{{$waitList->phone_number}}">
                        </td>
                    </tr>
                    <tr>
                        <td>Giới tính</td>
                        <td>
                            @error('sex')
                            <small style="color: red">{{ $message }}</small> <br>
                            @enderror
                            <input type="radio" name="sex" @if($waitList->sex ==1) checked @endif value="1"> Nam
                            <input type="radio" name="sex" @if($waitList->sex ==2) checked @endif value="2"> Nữ
                        </td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td>
                            @error('address')
                            <small style="color: red">{{ $message }}</small>
                            @enderror
                            <input type="text" class="form-control" name="address" value="{{$waitList->address}}">
                        </td>
                    </tr>
                    <tr>
                        <td>Lớp học</td>
                        <td>
                            <select class="custom-select mr-sm-2" name="class_id" id="inlineFormCustomSelect">
                                @foreach($filteredArray as $class)
                                <option value="{{$class['id']}}">{{$class['name_class']}} ({{ $class['schedule']['name_schedule'] }})</option>
                                @endforeach
                            </select>
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