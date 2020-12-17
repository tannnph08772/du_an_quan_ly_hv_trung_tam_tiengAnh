@extends('staff')
@section('title', "Danh sách chờ")
@section('content')
<div style="position: relative;">
    <h1 class="h3 mb-2 text-gray-800">Danh sách học viên đăng ký</h1>
    <div class="card shadow mb-4">
        <img src="img/loading.gif" alt="" id="img-loading"
            style="position: absolute;top: 10%;left: 50%;transform: translate(-50%, -50%); width:90px; display:none;z-index:99999">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" onclick="kiemTraTrungKhoaHoc()">
                Chọn lớp
            </button>
            <span>Số lượng học viên đăng ký: {{count($waitList)}}</span>
            <form action="" method="GET" class="form-inline">
                <select name="course" class="form-control mr-2">
                    <option value="all">--- Tất cả khóa học ---</option>
                    @foreach($courses as $course)
                    <option value="{{ $course->id }}" 
                        @php 
                            if(isset($_GET['course'])) {
                                if($course->id == $_GET['course']) {
                                    echo 'selected';
                                }
                            } 
                        @endphp>{{ $course->name_course }}
                    </option>
                    @endforeach
                </select>
                <button class="btn btn-primary">Lọc</button>
            </form>
            <!-- Modal -->
            <div class="modal fade danh_sach_lop" id="exampleModal2" tabindex="-1" role="dialog" data-dismiss="modal"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Danh sách lớp</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <select class="custom-select mr-sm-2" name="class_id" id="inlineFormCustomSelect">
                                <option value="">Chọn lớp</option>
                                @foreach($filteredArray as $class)
                                <option id_khoa_hoc="{{$class['course_id']}}{{$class['place_id']}}" class="option_lop"
                                    style="display:none" value="{{$class['id']}}">{{$class['name_class']}}
                                    ({{ $class['schedule']['name_schedule'] }} - {{ $class['place']['name_place'] }})
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                            <button type="button" onclick="addUser()" class="btn btn-primary">Thêm học viên</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th><input type="checkbox" class="d-none" onClick="toggle(this)"></th>
                            <th>#</th>
                            <th>Họ và tên</th>
                            <th>Email</th>
                            <th>Phone number</th>
                            <th>Giới tính</th>
                            <th>Khoá học</th>
                            <th>Cơ sở</th>
                            <th>Học viên</th>
                            <th>Chuyển</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @if (!isset($_GET["course"]) || ($_GET["course"] == "all"))
                        @foreach($waitList as $item)
                        <tr>
                            <td class=" dt-checkboxes-cell"><input class="hoc_vien_add"
                                    id_khoa_hoc="{{$item->course_id}}" id_place_id="{{$item->place_id}}"
                                    value="{{$item->id}}" type="checkbox" name="student[]">
                            </td>
                            <td>{{$i++}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->phone_number}}</td>
                            <td>{{$item->sex == 1? 'Nam' : 'Nữ'}}</td>
                            <td>{{$item->course->name_course}}</td>
                            <td>{{$item->place->name_place}}</td>
                            <td>{{$item->student_id != null ? "Học viên cũ" : "Học viên mới"}}</td>
                            <td>
                                <a href="{{ route('users.getInfoHV',['id' => $item->id]) }}" class="btn">Chọn lớp <i
                                        class="fas fa-arrow-circle-right text-success"></i></a>
                            </td>
                            <td>
                                <form action="{{ route('auth.remove',['id' => $item->id]) }}" method="POST">
                                    @csrf
                                    <button onclick=" return confirm('Bạn có chắc thực hiện thao tác này?')"
                                        class="btn"><i class="fas fa-trash-alt text-danger"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        @foreach($waitList as $item)
                        @if($item->course_id == $_GET['course'])
                        <tr>
                            <td class=" dt-checkboxes-cell"><input class="hoc_vien_add"
                                    id_khoa_hoc="{{$item->course_id}}" id_place_id="{{$item->place_id}}"
                                    value="{{$item->id}}" type="checkbox" name="student[]">
                            </td>
                            <td>{{$i++}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->phone_number}}</td>
                            <td>{{$item->sex == 1? 'Nam' : 'Nữ'}}</td>
                            <td>{{$item->course->name_course}}</td>
                            <td>{{$item->place->name_place}}</td>
                            <td>{{$item->user_id != null ? "Học viên cũ" : "Học viên mới"}}</td>
                            <td>
                                <a href="{{ route('users.getInfoHV',['id' => $item->id]) }}" class="btn">Chọn lớp <i
                                        class="fas fa-arrow-circle-right text-success"></i></a>
                            </td>
                            <td>
                                <form action="{{ route('auth.remove',['id' => $item->id]) }}" method="POST">
                                    @csrf
                                    <button onclick=" return confirm('Bạn có chắc thực hiện thao tác này?')"
                                        class="btn"><i class="fas fa-trash-alt text-danger"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="container">
                    <table class="m-auto">
                        <tr>
                            <td>
                                <a href="{{route('exportDsHocVienDk')}}" class="btn btn-primary">Download</a>
                            </td>
                            <td>
                                <form action="{{route('storeImport')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Upload Excel</button>
                                    <input type="file" name="file" />
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script language="javascript">
function toggle(source) {
    checkboxes = document.getElementsByName('student[]');
    for (var i = 0, n = checkboxes.length; i < n; i++) {
        checkboxes[i].checked = source.checked;
    }
}

const url_add_hoc_vien = "{{route('auth.addhocvien')}}"

const kiemTraTrungKhoaHoc = () => {
    let danh_sach_hoc_vien = document.querySelectorAll(".hoc_vien_add")
    var stt = 0
    var check = 0
    var danh_sach_hv = []
    var kiem_tra_trung_khoa_hoc = 0
    var kiem_tra_trung_co_co = 0
    danh_sach_hoc_vien.forEach(function(element) {

        if ($(element).prop('checked')) {
            if (stt == 0) {
                kiem_tra_trung_khoa_hoc = $(element).attr('id_khoa_hoc')
                kiem_tra_trung_co_co = $(element).attr('id_place_id')
                stt++
            }
            if (
                kiem_tra_trung_khoa_hoc != $(element).attr('id_khoa_hoc') || kiem_tra_trung_co_co != $(
                    element).attr('id_place_id')
            ) {
                check++
            }
        }
    });
    if (check > 0) {
        alert('Vui lòng chọn học viên cùng khóa học và cùng cơ sở !')
        $('#exampleModal2').modal('hide');
    } else {
        $('.option_lop').hide()
        var selectShow = `[id_khoa_hoc=${kiem_tra_trung_khoa_hoc}${kiem_tra_trung_co_co}]`

        $(selectShow).show()
        console.log(selectShow)
        $('#exampleModal2').modal('show');
    }
}
const addUser = () => {
    let danh_sach_hoc_vien = document.querySelectorAll(".hoc_vien_add")
    let img_loading = document.querySelector("#img-loading")
    img_loading.style.display = "block"
    let class_select = $("[name=class_id]").val()
    var danh_sach_hv = []
    danh_sach_hoc_vien.forEach(function(element) {
        if ($(element).prop('checked')) {
            danh_sach_hv.push($(element).val());
        }
    });
    var data = {
        'lop_id': class_select,
        'danh_sach_hv': danh_sach_hv,
    }
    axios.post(url_add_hoc_vien, data)
        .then(function(response) {
            window.location.href = 'lop-hoc/chi-tiet-lop-hoc/' + class_select + ''
            Swal.fire({
                icon: 'success',
                text: 'Thêm học viên thành công!',
            })
            // console.log(response);
        })
        .catch(function(error) {
            // handle error
            console.log(error);
        })
        .then(function() {
            // always executed
        });
}
</script>

@endsection