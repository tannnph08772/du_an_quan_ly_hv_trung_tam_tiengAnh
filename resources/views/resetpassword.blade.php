@extends('teacher')
@section('title', 'Thông thin cá nhân')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @include('layouts/link')
</head>
<body>
    
    <div class="row pt-5">
        <div class="col-md-3"></div>
        <div class="col-md-6">
        @if(Session::has('success-message'))
    <div class="alert alert-success" role="alert">
        {{Session::get('success-message') }}
    </div>
    @endif
    <form action="{{route('user-savepw')}}" method="POST">
        @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Mật khẩu cũ</label>
                    <input type="password" name="curr_password" id="curr_password" class="form-control" 
                    value="">
                    @error('curr_password')
                    <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Mật khẩu mới</label>
                    <input type="password" name="new_password" id="new_password" class="form-control" 
                    value="">
                    @error('new_password')
                    <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nhập lại mật khẩu</label>
                    <input type="password" name="new_confirm_password" id="new_confirm_password" class="form-control" 
                    value="">
                    @error('new_confirm_password')
                    <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group row">
                    <label class=" col-form-label"></label>
                    <div class="col-sm-9">
                        <input type="checkbox" onclick="showPassword()"> Hiển thị mật khẩu
                    </div>
                </div>
                <div class="row justify-content-center">
                <div class="pr-2">
                    <a href="{{route('user.viewProfile')}}" class="btn btn-danger"
                    type="submit">Quay lại</a>
                </div>
                <div>
                    <button class="btn btn-success"
                    type="submit">Lưu</button>
                </div>
                </div>
    </form>
    </div>
    <div class="col-md-3"></div>
    </div>
    <script>
        function showPassword(){
             var curr_password = document.getElementById("curr_password");
             var new_passord = document.getElementById("new_password");
             var confirm_password = document.getElementById("new_confirm_password");

            curr_password.type === "password" ? curr_password.type = "text" : curr_password.type = "password";
            new_passord.type === "password" ? new_passord.type = "text" : new_passord.type = "password";
            confirm_password.type === "password" ? confirm_password.type = "text" : confirm_password.type = "password";


        }
    </script>
</body>
</html>
@endsection