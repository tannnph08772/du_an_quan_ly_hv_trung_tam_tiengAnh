@extends('client')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-12 mt-5">

            <div id="htmldesc" class="d-none">
                {{$course->description}}
            </div>
            <div id="description">
            </div>
            <div class=" mt-4 container mb-3">
                <h4 class="text-center text-uppercase">Form đăng ký</h4>
                <div class="card card-contact">
                    <div id="container-form-register">
                        <form action="{{route('auth.store')}}" class="text-right p-4" method="post"
                            enctype="multipart/form-data">
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
                                <input type="text" name="phone_number" value="{{ old('phone_number') }}"
                                    class="form-control" placeholder="Ví dụ: 0123456789">
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
                            <div class="form-group ">
                                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Cở sở học</label>
                                <select name="place_id" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                    @foreach($places as $place)
                                    <option value="{{$place->id}}">{{$place->name_place}} : {{$place->address}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="form-group">
                                    <label>Giới tính<span class="text-danger">*</span></label> <br>
                                    <input type="radio" name="sex" checked id="" value="1">Nam
                                    <input type="radio" name="sex" value="2"> Nữ
                                    @error('sex')
                                    <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Khóa học</label>
                                    <input type="text" disabled class="form-control" value="{{$course->name_course}}">
                                    <input type="hidden" name="course_id" id="course" value="{{$course->id}}">
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
                                <button class="btn btn-warning text-white" onclick="confirmSuccess()"
                                    type="submit">Gửi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <aside id="widget_posts_new-5" class="widget widget_widget_posts_new">
                <div class="title-widget">
                    <div class="widget__icon"><i class="fas fa-paper-plane"></i></div>
                    <div class="widget__title">Tin tức mới nhất</div>
                </div>
                <div class="post-widget">
                    <div class="post-widget-content">
                        <div class="post-widget-avatar">
                            <img width="960" height="640"
                                src="https://alibabaenglish.edu.vn/wp-content/uploads/2018/09/39173275_1637782143016634_5896093334006398976_n.jpg"
                                class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""
                                srcset="https://alibabaenglish.edu.vn/wp-content/uploads/2018/09/39173275_1637782143016634_5896093334006398976_n.jpg 960w, https://alibabaenglish.edu.vn/wp-content/uploads/2018/09/39173275_1637782143016634_5896093334006398976_n-600x400.jpg 600w, https://alibabaenglish.edu.vn/wp-content/uploads/2018/09/39173275_1637782143016634_5896093334006398976_n-768x512.jpg 768w, https://alibabaenglish.edu.vn/wp-content/uploads/2018/09/39173275_1637782143016634_5896093334006398976_n-272x182.jpg 272w"
                                sizes="(max-width: 960px) 100vw, 960px">
                        </div>
                        <div class="post-widget-title">
                            <a href="https://alibabaenglish.edu.vn/tan-do-tay-khoa-hoc-tieng-anh-giao-tiep-gia-re-chua-den-1-trieu.html"
                                title="Tán đổ Tây KHÓA HỌC TIẾNG ANH GIAO TIẾP GIÁ RẺ chưa đến 1 triệu">
                                <h2>Tán đổ Tây KHÓA HỌC TIẾNG ANH GIAO TIẾP GIÁ RẺ chưa đến 1 triệu</h2>
                            </a>
                        </div>
                    </div>
                    <div class="post-widget-content">
                        <div class="post-widget-avatar">
                            <img width="450" height="363"
                                src="https://alibabaenglish.edu.vn/wp-content/uploads/2016/01/a2-1513516601573.jpg"
                                class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="">
                        </div>
                        <div class="post-widget-title">
                            <a href="https://alibabaenglish.edu.vn/me-va-con-gai.html"
                                title="Báo Vietnambiz “Hành trình khởi nghiệp của CEO câu lạc bộ tiếng Anh lớn nhất thủ đô”">
                                <h2>Báo Vietnambiz “Hành trình khởi nghiệp của CEO câu lạc bộ tiếng Anh lớn nhất
                                    thủ đô”</h2>
                            </a>
                        </div>
                    </div>
                    <div class="post-widget-content">
                        <div class="post-widget-avatar">
                            <img width="696" height="365"
                                src="https://alibabaenglish.edu.vn/wp-content/uploads/2019/04/top-13-trung-tam-tieng-anh-giao-tiep-uy-tin-tai-ha-noi-alibaba-1.png"
                                class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="">
                        </div>
                        <div class="post-widget-title">
                            <a href="https://alibabaenglish.edu.vn/top-13-trung-tam-tieng-anh-giao-tiep-uy-tin-tai-ha-noi.html"
                                title="Top 13 Trung Tâm Tiếng Anh Giao Tiếp Uy Tín Tại Hà Nội">
                                <h2>Top 13 Trung Tâm Tiếng Anh Giao Tiếp Uy Tín Tại Hà Nội</h2>
                            </a>
                        </div>
                    </div>
                    <div class="post-widget-content">
                        <div class="post-widget-avatar">
                            <img width="993" height="576"
                                src="https://alibabaenglish.edu.vn/wp-content/uploads/2019/04/NỀN-WEB.png"
                                class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""
                                srcset="https://alibabaenglish.edu.vn/wp-content/uploads/2019/04/NỀN-WEB.png 993w, https://alibabaenglish.edu.vn/wp-content/uploads/2019/04/NỀN-WEB-690x400.png 690w, https://alibabaenglish.edu.vn/wp-content/uploads/2019/04/NỀN-WEB-768x445.png 768w"
                                sizes="(max-width: 993px) 100vw, 993px">
                        </div>
                        <div class="post-widget-title">
                            <a href="https://alibabaenglish.edu.vn/hoc-tieng-anh-o-alibaba-co-tot-khong.html"
                                title="Học tiếng Anh ở Alibaba có tốt không?">
                                <h2>Học tiếng Anh ở Alibaba có tốt không?</h2>
                            </a>
                        </div>
                    </div>
                    <div class="post-widget-content">
                        <div class="post-widget-avatar">
                            <img width="782" height="500"
                                src="https://alibabaenglish.edu.vn/wp-content/uploads/2019/04/du-lich.png"
                                class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""
                                srcset="https://alibabaenglish.edu.vn/wp-content/uploads/2019/04/du-lich.png 782w, https://alibabaenglish.edu.vn/wp-content/uploads/2019/04/du-lich-626x400.png 626w, https://alibabaenglish.edu.vn/wp-content/uploads/2019/04/du-lich-768x491.png 768w"
                                sizes="(max-width: 782px) 100vw, 782px">
                        </div>
                        <div class="post-widget-title">
                            <a href="https://alibabaenglish.edu.vn/tieng-anh-giao-tiep-khi-du-lich-tu-a-den-z.html"
                                title="Tiếng Anh Giao Tiếp Khi Du Lịch Từ A Đến Z">
                                <h2>Tiếng Anh Giao Tiếp Khi Du Lịch Từ A Đến Z</h2>
                            </a>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>
<script>
var html = $('#htmldesc').text();
$('#description').html(html)
</script>
@endsection