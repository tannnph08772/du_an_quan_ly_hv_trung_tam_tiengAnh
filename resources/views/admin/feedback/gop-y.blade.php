@extends('client')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 pt-3 ">
            <div class="row">
                <div class="col-md-12 bg-white mt-3 mb-3 border border-primary rounded">
                    <h3 class="pt-3">Đánh giá chất lượng lớp Pt14312</h3>
                    <p class="text-danger">*Bắt buộc</p>
                </div>
                <div class="col-md-12 bg-white mb-3 border border-primary rounded">
                    <h5 class="pt-3">Bạn đang học lớp nào tại Alibaba? <span class="text-danger">*</span></h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                        <label class="form-check-label" >
                          Pt14311
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option2" checked>
                        <label class="form-check-label" >
                        Pt14312
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option3" checked>
                        <label class="form-check-label" >
                        Pt14313
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option4" checked>
                        <label class="form-check-label" >
                        Pt14314
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option5" checked>
                        <label class="form-check-label" >
                        Pt14315
                        </label>
                    </div>
            </div>
            <div class="col-md-12 bg-white mb-3 border border-primary rounded">
                <select class="form-control mt-3 mb-3" name="" id="">
                    <option value="">--Chọn tên giảng viên--</option>
                    <option value="">Đức</option>
                    <option value="">Tân</option>
                    <option value="">Hiệp</option>
                    <option value="">Khánh</option>
                </select>
            </div>
            <div class="col-md-12 bg-white mb-3 border border-primary rounded">
                <h5 class="pt-3">Giảng viên có chuyên môn chắc không? <span class="text-danger">*</span></h5>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" >
                        Giảng viên không có chuyên môn
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option2" checked>
                    <label class="form-check-label" >
                        Có chuyên môn nhưng kiến thức chưa sâu và rộng
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option3" checked>
                    <label class="form-check-label" >
                        Chuyên môn tiếng Anh phù hợp với khóa học
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option4" checked>
                    <label class="form-check-label" >
                        Có chiều sâu về chuyên môn, tạo sự cho yên tâm cho học viên
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option5" checked>
                    <label class="form-check-label" >
                        Có chuyên môn sâu rộng gây ấn tượng với học viên, tạo niềm tin tuyệt đối
                    </label>
                </div>
            </div>
            <div class="col-md-12 bg-white mb-3 border border-primary rounded">
                <h5 class="pt-3">Giảng viên có phương pháp truyền đạt rõ ràng, dễ hiểu không? <span class="text-danger">*</span></h5>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" >
                        Không có khả năng truyền đạt
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option2" checked>
                    <label class="form-check-label" >
                        Gặp khó khăn trong việc diễn đạt, gây khó hiểu, hoang mang cho học viên
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option3" checked>
                    <label class="form-check-label" >
                        Truyền đạt ổn, học viên nắm bắt được bài giảng
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option4" checked>
                    <label class="form-check-label" >
                        Truyền đạt tốt, dễ hiểu, dễ nhớ
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option5" checked>
                    <label class="form-check-label" >
                        Truyền đạt dễ hiểu, tạo sự hứng thú cho học viên
                    </label>
                </div>
            </div>
            <div class="col-md-12 bg-white mb-3 border border-primary rounded">
                <h5 class="pt-3">Mức độ quan tâm lớp của Giảng Viên ? <span class="text-danger">*</span></h5>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" >
                        GV Không quan tâm tới lớp
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option2" checked>
                    <label class="form-check-label" >
                        GV Quan tâm hời hợt
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option3" checked>
                    <label class="form-check-label" >
                        GV Quan tâm tới lớp vừa đủ
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option4" checked>
                    <label class="form-check-label" >
                        GV nhiệt tình quan tâm tới học viên không chỉ là vấn đề học tiếng Anh
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option5" checked>
                    <label class="form-check-label" >
                        GV như một người bạn tri kỉ đồng hành với lớp
                    </label>
                </div>
            </div>
            <div class="col-md-12 bg-white mb-3 border border-primary rounded">
                <h5 class="pt-3">Năng lượng của Giảng viên khi đi lớp ? <span class="text-danger">*</span></h5>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" >
                        Ủ rũ, thiếu năng lượng khi giảng dạy
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option2" checked>
                    <label class="form-check-label" >
                        GV hoàn thành trách nhiệm với bài giảng
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option3" checked>
                    <label class="form-check-label" >
                        GV truyền được năng lượng cho học viên qua bài học
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option4" checked>
                    <label class="form-check-label" >
                        GV nhiều năng lượng tạo hứng thú cho học viên với bài học
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option5" checked>
                    <label class="form-check-label" >
                        Ấn tượng tuyệt đối với năng lượng giảng dạy của Giảng viên
                    </label>
                </div>
            </div>
            <div class="col-md-12 bg-white mb-3 border border-primary rounded">
                <h5 class="pt-3">Giảng viên trả lời comment và phản hồi thắc mắc của bạn như thế nào ? <span class="text-danger">*</span></h5>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" >
                        Không phản hồi thắc mắc
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option2" checked>
                    <label class="form-check-label" >
                        Ít phản hồi thắc mắc
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option3" checked>
                    <label class="form-check-label" >
                        Thỉnh thoảng phản hồi thắc mắc
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option4" checked>
                    <label class="form-check-label" >
                        Thường xuyên phản hồi thắc mắc
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option5" checked>
                    <label class="form-check-label" >
                        Phản hồi thắc mắc tận tâm và nhiệt tình
                    </label>
                </div>
            </div>
            <div class="col-md-12 bg-white mt-3 mb-3 border border-primary rounded">
                <h5 class="pt-3">Ý kiến cá nhân <span class="text-danger">*</span></h5>
                <textarea name="" id="" cols="74" rows="5"></textarea>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
@endsection