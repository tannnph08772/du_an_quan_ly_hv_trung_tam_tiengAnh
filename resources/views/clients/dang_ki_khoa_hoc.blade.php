@extends('client')
@section('content')
<button aria-expanded="false" class="btn btn-outline-danger" data-toggle="collapse" data-target="#boxnoidung">Bấm vào
    đây</button>

<div class="collapse mt-4" id="boxnoidung">
    <div class="card card-contact no-transition">
        <h3 class="card-title text-center">Đăng kí khóa học</h3>
        <div id="container-form-register">
            <form action="{{route('register.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Họ và tên <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" placeholder="Ví dụ: Nguyễn Văn A">
                </div>
                <div class="form-group">
                    <label>Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" placeholder="Ví dụ: abc123@gmail.com">
                </div>
                <div class="form-group">
                    <label>Số điện thoại<span class="text-danger">*</span></label>
                    <input type="number" name="phone_number" class="form-control" placeholder="Ví dụ: 0123456789">
                </div>
                <div class="form-group ">
                    <label>Ngày sinh<span class="text-danger">*</span></label>
                    <input type="date" name="birthday" class="form-control">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Giới tính<span class="text-danger">*</span></label> <br>
                        <input type="radio" name="sex" value="1"> Nam
                        <input type="radio" name="sex" value="2"> Nữ
                    </div>
                    <div class="form-group col-md-6">
                        <label>Khóa học<span class="text-danger">*</span></label> <br>
                        <select class="custom-select custom-select-sm" name="course_id">
                            <option selected>Open this select menu</option>
                            @foreach($courses as $item )
                                <option value="{{$item->id}}">{{$item->name_course}}</option>
                            @endforeach  
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Địa chỉ<span class="text-danger">*</span></label>
                    <input type="text" name="address" class="form-control" placeholder="Ví dụ: 122 Cầu giấy, Hà nội">
                </div>
                <div class="form-group f-right">
                    <button class="btn btn-success" type="submit">Gửi</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection