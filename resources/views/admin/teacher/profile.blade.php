@extends('teacher')
@section('title', 'Thông thin cá nhân')
@section('content')
<a class="form-control btn btn-success" href="{{route('user.resetPW')}}">
                     Đổi mật khẩu
                </a>
@endsection