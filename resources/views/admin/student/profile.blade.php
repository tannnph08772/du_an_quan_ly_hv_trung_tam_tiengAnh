@extends('student')
@section('title', 'Thông thin cá nhân')
@section('content')
@if(Session::has('success-message'))
<div class="alert alert-success" role="alert">
     {{Session::get('success-message') }}
</div>
@endif
<div class="container">
     <div class="row"  style="font-size: 13px;">
          <div class="col-5 ">
               <div class="bg-white border rounded">
                    <div class="d-flex align-items-center">
                         <div class="col-md-4"><img src="https://ui-avatars.com/api/?background=random&name={{$user->name}}" style="width: 100%" alt=""></div>
                         <div class="col-md-8">
                              <p class="pt-3">Tên : <span class="ml-3">{{$user->name}}</span></p>
                              <p>Số điện thoại : <span class="ml-3">{{$user->phone_number}}</span></p>
                              <p>Email : <span class="ml-3">{{$user->email}}</span></p>
                              <p>Giới tính : <span class="ml-3">@foreach(config('common.sex') as $key => $value)
                                        @if($user->sex==$value)
                                        {{$key}}
                                        @endif
                                        @endforeach</span></p>
                         </div>
                    </div>
                    <div class="d-flex justify-content-center  mb-3">
                         <a class="form-control btn btn-success" style="width: 80%;" href="{{route('user.resetPW')}}">
                              Đổi mật khẩu
                         </a>
                    </div>
               </div>
          </div>
          <div class="col-7 border pb-4 pt-3 bg-white  rounded">

               <h5>Thông tin cá nhân :</h5>
               <hr>
               <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Họ và tên</label>
                    <div class="col-sm-10">
                         <input type="text" class="form-control" value="{{$user->name}}" id="inputPassword">
                    </div>
               </div>
               <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Sinh ngày</label>
                    <div class="col-sm-10">
                         <input type="text" class="form-control" value="{{$user->birthday}}" id="inputPassword">
                    </div>
               </div>
               @php
               foreach(config('common.sex') as $key => $value){
                    if($user->sex===$value){
                                       $sex=$key;
                    }
               };         
               @endphp
               <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Giới tính</label>
                    <div class="col-sm-10">
                         <input type="text" class="form-control" value="{{$sex}}" id="inputPassword">
                    </div>
               </div>
               <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Khóa học</label>
                    <div class="col-sm-10">
                         <input type="text" class="form-control" value="abc" id="inputPassword">
                    </div>
               </div>
               <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Lớp học</label>
                    <div class="col-sm-10">
                         <input type="text" class="form-control" value="acv" id="inputPassword">
                    </div>
               </div>
               <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Địa chỉ</label>
                    <div class="col-sm-10">
                         <input type="text" class="form-control" value="{{$user->address}}" id="inputPassword">
                    </div>
               </div>
          </div>
     </div>
</div>
@endsection