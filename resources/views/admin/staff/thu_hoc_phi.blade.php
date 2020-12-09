@extends('staff')
@section('title' , 'Thu học phí')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h3 class="m-0 font-weight-bold text-primary">Thu học phí</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <form method="POST" action="{{ route('tuition.nopHocPhi',['id' => $student->id])}}"
                enctype="multipart/form-data">
                @csrf
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <table class="table table-bordered">
                    <tr>
                        <td>Họ và tên</td>
                        <td>
                            <input type="text" class="form-control" name="name" value="{{$student->user->name}}">
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input type="email" class="form-control" name="email" value="{{$student->user->email}}">
                        </td>
                    </tr>
                    <tr>
                        <td>Ảnh hóa đơn</td>
                        <td>
                            <input type="file" class="form-control" value="{{old('image')}}" name="image">
                        </td>
                    </tr>
                    <tr>
                        <td>Ngày sinh</td>
                        <td>
                            <input type="date" class="form-control" name="birthday"
                                value="{{$student->user->birthday}}">
                        </td>
                    </tr>
                    <tr>
                        <td>Số điện thoại</td>
                        <td>
                            <input type="text" class="form-control" name="phone_number"
                                value="{{$student->user->phone_number}}">
                        </td>
                    </tr>
                    <tr>
                        <td>Số tiền</td>
                        <td>
                            <input type="number" class="form-control" name="sum_money" value=""
                                placeholder="Nhập số tiền...">
                        </td>
                    </tr>
                    <tr>
                        <td>Giới tính</td>
                        <td>
                            <input type="radio" name="sex" @if($student->user->sex ==1) checked @endif value="1"> Nam
                            <input type="radio" name="sex" @if($student->user->sex ==2) checked @endif value="2"> Nữ
                        </td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td>
                            <input type="text" class="form-control" name="address" value="{{$student->user->address}}">
                        </td>
                    </tr>
                    <tr>
                        <td>Lớp học</td>
                        <td>
                            <input type="text" class="form-control" name="class"
                                value="{{$student->class->name_class}}">
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