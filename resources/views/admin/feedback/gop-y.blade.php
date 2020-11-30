@extends('client')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 pt-3 ">
            <div class="row">
                <form action="{{ route('feedback.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="col-md-12 bg-white mt-3 mb-3 border border-primary rounded">
                        <h3 class="pt-3">Đánh giá chất lượng mức độ hài lòng về khóa học</h3>
                        <p class="text-danger">*Bắt buộc</p>
                    </div>
                    <div class="col-md-12 bg-white mb-3 border border-primary rounded">
                        <h5 class="pt-3">Nhập tên của bạn ! <span class="text-danger">*</span></h5>
                        <input class="form-control mb-3" type="text" name="name_student" placeholder="Vui lòng nhập tên ...">
                    </div>
                    <div class="col-md-12 bg-white mb-3 border border-primary rounded">
                        <h5 class="pt-3">Nhập email của bạn ! <span class="text-danger">*</span></h5>
                        <input class="form-control mb-3" type="text" name="email" placeholder="Vui lòng nhập email ...">
                    </div>
                    <div class="col-md-12 bg-white mb-3 border border-primary rounded">
                        <h5 class="pt-3">Nhập số điện thoại của bạn ! <span class="text-danger">*</span></h5>
                        <input class="form-control mb-3" type="text" name="phone"
                            placeholder="Vui lòng nhập số điện thoại ...">
                    </div>
                    <div class="col-md-12 bg-white mb-3 border border-primary rounded">
                        <select id="khoaHoc" class="form-control mt-3 mb-3" name="course_id">
                            <option value="">--Chọn khóa học--</option>
                            @foreach ($course as $main)
                            <option value="{{$main->id}}">{{$main->name_course}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 bg-white mb-3 border border-primary rounded">
                        <select id="ClassInCourseID" class="form-control mt-3 mb-3" name="class_id" id="">
                            <option  value="">--Chọn lớp--</option>
                        </select>
                    </div>
                    @foreach ($question as $index=>$item)
                    <div class="col-md-12 bg-white mb-3 border border-primary rounded pt-2 pb-4">
                    <input type="hidden" name="question[{{$index}}]" value="{{$item->id}}">
                        <h5 class="pt-3">{{$item->question}}<span class="text-danger">*</span></h5>
                        @foreach ($answer as $data)
                        @if ($item->id == $data->question_id)
                        <div class="form-check pt-2">
                            <input class="form-check-input " type="radio" name="answer[{{$data->question_id}}]"
                                id="exampleRadios1" value="{{$data->id}}">
                            <label class="form-check-label">
                                {{$data->answer}}
                            </label>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    @endforeach
                    <div class="col-md-12 bg-white mt-3 mb-3 border border-primary rounded">
                        <h5 class="pt-3">Ý kiến cá nhân <span class="text-danger">*</span></h5>
                        <textarea name="content" id="" cols="91" rows="5"></textarea>
                    </div>
                    <button class="btn btn-danger mr-2 mb-3">Hủy</button>
                    <button class="btn btn-primary mb-3" type="submit">Gửi</button>
                </form>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<script>
var routeFindCourse = "{{route('feedback.apiFindClass')}}"

    $( "#khoaHoc" ).change(function() {
  var valueKhoaHoc=document.querySelector('#khoaHoc').value;
    axios
        .post(routeFindCourse, {
            id: valueKhoaHoc
        })
        .then(response => {
            console.log(response);
            var dataOption = `<option disabled selected>--Chọn lớp--</option>`;
            response.data.dataClass.map(function (value) {
                dataOption += `<option value="${value.id}">${value.name_class}</option>`;
            });
            $("#ClassInCourseID").html(dataOption);
            $("#loading").css("cssText", "display:none !important");
        })
        .catch(error => {
            console.log(error);
        });
});
      
</script>
@endsection
@section('script')

@endsection