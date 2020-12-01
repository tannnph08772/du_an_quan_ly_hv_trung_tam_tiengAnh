@extends('client')
@section('content')
<div class=" mt-4 container">
<h3 class="text-center text-uppercase">Đăng kí khóa học</h3>
    <div class="card card-contact">
        <div id="container-form-register">
            <form action="{{route('auth.store')}}" class="text-right p-4" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Họ và tên <span class="text-danger">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                        placeholder="Ví dụ: Nguyễn Văn A">
                    @error('name')
                    <small style="color: red;">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                        placeholder="Ví dụ: abc123@gmail.com">
                    @error('email')
                    <small style="color: red;">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Số điện thoại<span class="text-danger">*</span></label>
                    <input type="text" name="phone_number" value="{{ old('phone_number') }}" class="form-control"
                        placeholder="Ví dụ: 0123456789">
                    @error('phone_number')
                    <small style="color: red;">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group ">
                    <label>Ngày sinh<span class="text-danger">*</span></label>
                    <input type="date" name="birthday" value="{{ old('birthday') }}" class="form-control">
                    @error('birthday')
                    <small style="color: red;">{{ $message }}</small>
                    @enderror
                </div>
                <div class="d-flex justify-content-between">
                    <div class="form-group col-md-6">
                        <label>Giới tính<span class="text-danger">*</span></label> <br>
                        <input type="radio" name="sex" value="1"> Nam
                        <input type="radio" name="sex" value="2"> Nữ
                        @error('sex')
                        <small style="color: red;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label>Khóa học<span class="text-danger">*</span></label> <br>
                        <input type="hidden" name="course_id" value="{{$course->id}}">
                        <input type="text" class="form-control" disabled value="{{$course->name_course}}">
                    </div>
                </div>
                <div class="form-group">
                    <label>Địa chỉ<span class="text-danger">*</span></label>
                    <input type="text" name="address" value="{{ old('address')}}" class="form-control"
                        placeholder="Ví dụ: 122 Cầu giấy, Hà nội">
                    @error('address')
                    <small style="color: red;">{{ $message }}</small>
                    @enderror
                </div>
                <div class="button">
                    <button class="btn btn-warning text-white" type="submit">Gửi</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection