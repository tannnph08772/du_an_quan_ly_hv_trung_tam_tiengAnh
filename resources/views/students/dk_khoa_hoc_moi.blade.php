@extends('student')
@section('title', 'Đăng ký khóa học mới')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h3 class="m-0 font-weight-bold text-primary">Đăng ký khóa học mới</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <form method="POST" action="{{ route('student.storeKhoaHocMoi') }}">
                @csrf
                @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <table class="table table-bordered">
                    <tr>
                        <td>Họ và tên</td>
                        <td><span class="form-control">{{ Auth::user()->name }}</span></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><span class="form-control">{{ Auth::user()->email }}</span></td>
                        <input type="hidden" name="email" value="{{Auth::user()->email}}">
                    </tr>
                    <tr>
                        <td>Lớp</td>
                        <td><span class="form-control">{{ Auth::user()->student->class->name_class }}</span></td>
                    </tr>
                    <tr>
                        <td>Số điện thoại</td>
                        <td><span class="form-control">{{ Auth::user()->phone_number}}</span></td>
                    </tr>
                    <tr>
                        <td>Địa chỉ</td>
                        <td><span class="form-control">{{ Auth::user()->address}}</span></td>
                    </tr>
                    <tr>
                        <td>Khóa học</td>
                        <td>
                            <select class="form-control" name="course_id">
                                @foreach($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name_course }} </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Cơ sở học</td>
                        <td>
                            <select class="form-control" name="place_id">
                                @foreach($places as $place)
                                <option value="{{ $place->id }}">{{ $place->name_place }} : {{ $place->address }}
                                </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button class="btn btn-success form-control">Đăng Ký</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h4 class="m-0 font-weight-bold text-primary">Các khóa học đang đăng ký</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-dark" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên khóa học</th>
                        <th>Cơ sở</th>
                        <th>Ngày đăng ký</th>
                        <th>Hủy đăng ký</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach($waitList as $item)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$item->course->name_course}}</td>
                        <td>{{$item->place->name_place}}</td>
                        <td>{{($item->created_at)->format('d/m/Y')}}</td>
                        <td>
                            <form action="{{ route('xoaDk',['id' => $item->id]) }}" method="POST">
                                @csrf
                                <button onclick=" return confirm('Bạn có chắc thực hiện thao tác này?')" class="btn"><i
                                        class="fas fa-trash-alt text-danger"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection