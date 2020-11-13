@extends('client')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-12 mt-5">
            @foreach ($list as $item)
            <div id="htmldesc" class="d-none">
                {{$item->description}}
            </div>
            <div id="description">

            </div>
            @endforeach
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