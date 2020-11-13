@extends('client')
@section('title', 'Trang chủ')
@section('content')
<div class="section-slider">
    <img class="slide" src="img/Bìa-999k-2-min.png" idx="0" alt="">
    <img class="slide" src="img/bìa-999k-tháng-9-min.png" idx="1" alt="">

    <img class="btn-change" id="next" src="icon/next.png" alt="">
    <img class="btn-change" id="prev" src="icon/prev.png" alt="">

    <div class="change-img">
        <button class="active" idx="0"></button>
        <button idx="1"></button>
    </div>
</div>
<div class="section-content ctdt">
    <div class="title-e">
        <div class="title">Chương trình đào tạo</div>
        <div class="small-padd"></div>
    </div>
    <div class="start-learn">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <div class="item">
                        <div class="item-content">
                            <div class="item-avatar">
                                <img src="https://alibabaenglish.edu.vn/wp-content/uploads/2020/02/khóa-beginner.jpg"
                                    alt="">
                            </div>
                            <div class="item-title">
                                Khoá Beginner </div>
                            <div class="item-desc">
                                Khoá học dành cho người mới bắt đầu, cải thiện ngữ âm và giao tiếp trong các chủ đề cơ
                                bản. </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="item">
                        <div class="item-content">
                            <div class="item-avatar">
                                <img src="https://alibabaenglish.edu.vn/wp-content/uploads/2020/02/khóa-advanced.jpg"
                                    alt="">
                            </div>
                            <div class="item-title">
                                Khoá Master Communication </div>
                            <div class="item-desc">
                                Khoá học xây dựng nền tảng ngữ âm nâng cao và ứng dụng tiếng Anh cho giao tiếp trong
                                cuộc sống và công việc. </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="item">
                        <div class="item-content">
                            <div class="item-avatar">
                                <img src="https://alibabaenglish.edu.vn/wp-content/uploads/2020/02/khóa-grammar-and-vocabulary.jpg"
                                    alt="">
                            </div>
                            <div class="item-title">
                                Khoá Toeic Starter 500+ </div>
                            <div class="item-desc">
                                Khoá học kết hợp toàn diện 4 kỹ năng NGHE-NÓI - ĐỌC - VIẾT và ôn thi chứng chỉ CAM KẾT
                                ĐẦU RA 500+ Toeic. </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="item">
                        <div class="item-content">
                            <div class="item-avatar">
                                <img src="https://alibabaenglish.edu.vn/wp-content/uploads/2020/02/khóa-toeic.jpg"
                                    alt="">
                            </div>
                            <div class="item-title">
                                Khoá Toeic Flyer 700+ </div>
                            <div class="item-desc">
                                Khoá học kết hợp toàn diện 4 kỹ năng NGHE-NÓI - ĐỌC - VIẾT và ôn thi chứng chỉ CAM KẾT
                                ĐẦU RA 700+ Toeic. </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section-content relative">

    <div id="lo-trinh-hoc-qa">
        <div class="title-e">
            <div class="wp-title">Lộ Trình Học</div>
            <div class="wp-small-padd"></div>
        </div>
        <div class="row">
            <ul class="col-botro col medium-4">
                <h3><span><a class="hover-black" href="/supportskill/index?t=spdoc" title="Tài liệu học IELTS">Lộ Trình
                            English Skills Building</a></span>
                </h3>
                <li>
                    <i class="far fa-arrow-alt-circle-right" aria-hidden="true"></i><a href="#"
                        title="IELTS to Success (PDF + Audio) – Học chiến lược thi IELTS và luyện đề hiệu quả">2 tháng
                        đầu tập trung chính vào phát âm và kỹ năng nói.</a>
                </li>
                <li>
                    <i class="far fa-arrow-alt-circle-right" aria-hidden="true"></i><a href="#"
                        title="IELTS to Success (PDF + Audio) – Học chiến lược thi IELTS và luyện đề hiệu quả">2 tháng
                        tiếp theo giúp bạn hoàn thiện kiến thức căn bản về từ vựng và ngữ pháp.</a>
                </li>
                <li>
                    <i class="far fa-arrow-alt-circle-right" aria-hidden="true"></i><a href="#"
                        title="IELTS to Success (PDF + Audio) – Học chiến lược thi IELTS và luyện đề hiệu quả">2 tháng
                        cuối cùng giúp bạn hoàn thiện và nâng cao kỹ năng phản xạ và tư duy ngôn ngữ.</a>
                </li>
            </ul>
            <ul class="col-botro col medium-4">
                <h3><span><a class="hover-black" href="/supportskill/index?t=spdoc" title="Tài liệu học IELTS">Ultimate
                            English 2020</a></span>
                </h3>
                <li>
                    <i class="far fa-arrow-alt-circle-right" aria-hidden="true"></i><a href="#"
                        title="IELTS to Success (PDF + Audio) – Học chiến lược thi IELTS và luyện đề hiệu quả">Giúp cho
                        học viên hoàn thiện kỹ năng Phát Âm, nắm chắc Từ Vựng Và Ngữ Pháp thông dụng nhất trong giao
                        tiếp.</a>
                </li>
                <li>
                    <i class="far fa-arrow-alt-circle-right" aria-hidden="true"></i><a href="#"
                        title="IELTS to Success (PDF + Audio) – Học chiến lược thi IELTS và luyện đề hiệu quả">Trau dồi
                        kỹ năng phản xạ và tư duy ngôn ngữ một cách linh hoạt nhất.</a>
                </li>
                <li>
                    <i class="far fa-arrow-alt-circle-right" aria-hidden="true"></i><a href="#"
                        title="IELTS to Success (PDF + Audio) – Học chiến lược thi IELTS và luyện đề hiệu quả">3 tháng
                        cuối cùng học viên được đào tạo ôn thi chứng chỉ Quốc Tế Toeic với cam kết đầu ra 500+ bằng văn
                        bản.</a>
                </li>
            </ul>
            <ul class="col-botro col medium-4">
                <h3><span><a class="hover-black" href="/supportskill/index?t=spdoc"
                            title="Tài liệu học IELTS">Incredible English</a></span>
                </h3>
                <li>
                    <i class="far fa-arrow-alt-circle-right" aria-hidden="true"></i><a href="#"
                        title="IELTS to Success (PDF + Audio) – Học chiến lược thi IELTS và luyện đề hiệu quả">Lộ trình
                        phát triển tiếng Anh toàn diện trong vòng 6 tháng bao gồm NGHE - NÓI - ĐỌC - VIẾT.</a>
                </li>
                <li>
                    <i class="far fa-arrow-alt-circle-right" aria-hidden="true"></i><a href="#"
                        title="IELTS to Success (PDF + Audio) – Học chiến lược thi IELTS và luyện đề hiệu quả">Giúp bạn
                        có thể tự tin giao tiếp, thuyết trình, phản biện tiếng Anh và ứng dụng trong công việc. </a>
                </li>
                <li>
                    <i class="far fa-arrow-alt-circle-right" aria-hidden="true"></i><a href="#"
                        title="IELTS to Success (PDF + Audio) – Học chiến lược thi IELTS và luyện đề hiệu quả">6 tháng
                        cuối cùng học viên được đào tạo ôn thi chứng chỉ Quốc Tế Toeic với cam kết đầu ra 700+ bằng văn
                        bản.</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="section-content ctdt">
        <div class="title-e">
            <div class="title">Phương Pháp Học</div>
            <div class="small-padd"></div>
        </div>
        <div class="row" id="row-187761071">
            <div class="col small-12 large-12">
                <div class="col-inner">
                    <div class="box_moHinh" id="box_moHinh">
                        <div class="row">
                            <div class="col medium-6 large-3">
                                <div class="item item_1">
                                    <div class="item_content">
                                        <div class="item_info">
                                            <div class="title"
                                                style="background: url('https://alibabaenglish.edu.vn/wp-content/uploads/2019/03/4ce-1.png') no-repeat 0 0;">
                                                TPR </div>
                                            <div class="desc">Có mục đích giúp học viên phát triển ngôn ngữ thứ hai một
                                                cách tự nhiên, được áp dụng trong Alibaba như là một cách dạy Tiếng Anh
                                                có hiệu quả truyền đạt cao</div>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col medium-6 large-3">
                                <div class="item item_2">
                                    <div class="item_content">
                                        <div class="item_info">
                                            <div class="title"
                                                style="background: url('https://alibabaenglish.edu.vn/wp-content/uploads/2019/03/4ce-1.png') no-repeat 0 0;">
                                                ALE</div>
                                            <div class="desc">Phương pháp nghe chủ động, phương pháp khi nghe bạn phải
                                                thực sự hiểu đoạn văn, đoạn hội thoại có nội dung gì, đang nói về điều
                                                gì</div>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col medium-6 large-3">
                                <div class="item item_3">
                                    <div class="item_content">
                                        <div class="item_info">
                                            <div class="title"
                                                style="background: url('https://alibabaenglish.edu.vn/wp-content/uploads/2019/03/4ce-1.png') no-repeat 0 0;">
                                                SHADOWING</div>
                                            <div class="desc">Là kỹ thuật mà bạn phải BẮT CHƯỚC, NHẠI LẠI toàn bộ ngữ
                                                điệu, ngữ âm, cách luyến láy, nhịp điệu của một đoạn băng, đoạn hội
                                                thoại bất kì</div>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col medium-6 large-3">
                                <div class="item item_4">
                                    <div class="item_content">
                                        <div class="item_info">
                                            <div class="title"
                                                style="background: url('https://alibabaenglish.edu.vn/wp-content/uploads/2019/03/4ce-1.png') no-repeat 0 0;">
                                                NLP</div>
                                            <div class="desc">Là phương pháp tạo ra một nguồn động lực to lớn và cảm xúc
                                                tích cực giúp các bạn cố gắng duy trì việc học tiếng Anh và vượt qua
                                                những khó khăn trong cuộc sống</div>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <div class="col-inner">
                        <div class="title-e">
                            <div class="wp-title">
                                BÁO CHÍ NÓI GÌ VỀ CHÚNG TÔI</div>
                            <div class="wp-small-padd"></div>
                        </div>
                    </div>
                    <div class="row large-columns-3 medium-columns-1 small-columns-1">
                        <div class="col-lg-4 col-sm-12">
                            <div class="box box-normal box-text-bottom box-blog-post has-hover">
                                <div class="box-image">
                                    <div class="image-cover" style="padding-top:56.25%;">
                                        <img width="600" height="400"
                                            src="https://alibabaenglish.edu.vn/wp-content/uploads/2018/09/39173275_1637782143016634_5896093334006398976_n-600x400.jpg"
                                            class="attachment-medium size-medium wp-post-image" alt=""
                                            srcset="https://alibabaenglish.edu.vn/wp-content/uploads/2018/09/39173275_1637782143016634_5896093334006398976_n-600x400.jpg 600w, https://alibabaenglish.edu.vn/wp-content/uploads/2018/09/39173275_1637782143016634_5896093334006398976_n-768x512.jpg 768w, https://alibabaenglish.edu.vn/wp-content/uploads/2018/09/39173275_1637782143016634_5896093334006398976_n-272x182.jpg 272w, https://alibabaenglish.edu.vn/wp-content/uploads/2018/09/39173275_1637782143016634_5896093334006398976_n.jpg 960w"
                                            sizes="(max-width: 600px) 100vw, 600px">
                                    </div>
                                </div>
                                <div class="box-text text-center">
                                    <div class="box-text-inner blog-post-inner">
                                        <h5 class="post-title is-large ">Tán đổ Tây KHÓA HỌC TIẾNG ANH GIAO TIẾP GIÁ RẺ
                                            chưa đến 1 triệu</h5>
                                        <div class="is-divider"></div>
                                    </div>
                                    <!-- .box-text-inner -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <div class="box box-normal box-text-bottom box-blog-post has-hover">
                                <div class="box-image">
                                    <div class="image-cover" style="padding-top:56.25%;">
                                        <img width="450" height="363"
                                            src="https://alibabaenglish.edu.vn/wp-content/uploads/2016/01/a2-1513516601573.jpg"
                                            class="attachment-medium size-medium wp-post-image" alt="">
                                    </div>
                                </div>
                                <!-- .box-image -->
                                <div class="box-text text-center">
                                    <div class="box-text-inner blog-post-inner">
                                        <h5 class="post-title is-large ">Báo Vietnambiz “Hành trình khởi nghiệp của CEO
                                            câu lạc bộ tiếng Anh lớn nhất thủ đô”</h5>
                                        <div class="is-divider"></div>
                                    </div>
                                    <!-- .box-text-inner -->
                                </div>
                                <!-- .box-text -->
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <div class="box box-normal box-text-bottom box-blog-post has-hover">
                                <div class="box-image">
                                    <div class="image-cover" style="padding-top:56.25%;">
                                        <img width="711" height="400"
                                            src="https://alibabaenglish.edu.vn/wp-content/uploads/2016/01/42799970_1691792344282280_6167628210205884416_n-711x400.jpg"
                                            class="attachment-medium size-medium wp-post-image" alt=""
                                            srcset="https://alibabaenglish.edu.vn/wp-content/uploads/2016/01/42799970_1691792344282280_6167628210205884416_n-711x400.jpg 711w, https://alibabaenglish.edu.vn/wp-content/uploads/2016/01/42799970_1691792344282280_6167628210205884416_n-768x432.jpg 768w, https://alibabaenglish.edu.vn/wp-content/uploads/2016/01/42799970_1691792344282280_6167628210205884416_n.jpg 960w"
                                            sizes="(max-width: 711px) 100vw, 711px">
                                    </div>
                                </div>
                                <!-- .box-image -->
                                <div class="box-text text-center">
                                    <div class="box-text-inner blog-post-inner">
                                        <h5 class="post-title is-large ">Báo Tuổi Trẻ Thủ Đô “CEO 9X Ngô Xuân Thắng:
                                            Thành công đến từ sự khác biệt”</h5>
                                        <div class="is-divider"></div>
                                    </div>
                                    <!-- .box-text-inner -->
                                </div>
                                <!-- .box-text -->
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <div class="box box-normal box-text-bottom box-blog-post has-hover">
                                <div class="box-image">
                                    <div class="image-cover" style="padding-top:56.25%;">
                                        <img width="200" height="200"
                                            src="https://alibabaenglish.edu.vn/wp-content/uploads/2019/03/ngoxuanthang.png"
                                            class="attachment-medium size-medium wp-post-image" alt="">
                                    </div>
                                </div>
                                <!-- .box-image -->
                                <div class="box-text text-center">
                                    <div class="box-text-inner blog-post-inner">
                                        <h5 class="post-title is-large ">Báo Dân Trí “Gặp gỡ chàng doanh nhân 9X với CLB
                                            tiếng Anh lớn nhất Hà Nội”</h5>
                                        <div class="is-divider"></div>
                                    </div>
                                    <!-- .box-text-inner -->
                                </div>
                                <!-- .box-text -->
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <div class="box box-normal box-text-bottom box-blog-post has-hover">
                                <div class="box-image">
                                    <div class="image-cover" style="padding-top:56.25%;">
                                        <img width="600" height="400"
                                            src="https://alibabaenglish.edu.vn/wp-content/uploads/2015/10/42147785_517325095400605_6579742339575578624_n-600x400.jpg"
                                            class="attachment-medium size-medium wp-post-image" alt=""
                                            srcset="https://alibabaenglish.edu.vn/wp-content/uploads/2015/10/42147785_517325095400605_6579742339575578624_n-600x400.jpg 600w, https://alibabaenglish.edu.vn/wp-content/uploads/2015/10/42147785_517325095400605_6579742339575578624_n-768x512.jpg 768w, https://alibabaenglish.edu.vn/wp-content/uploads/2015/10/42147785_517325095400605_6579742339575578624_n-272x182.jpg 272w, https://alibabaenglish.edu.vn/wp-content/uploads/2015/10/42147785_517325095400605_6579742339575578624_n.jpg 960w"
                                            sizes="(max-width: 600px) 100vw, 600px">
                                    </div>
                                </div>
                                <!-- .box-image -->
                                <div class="box-text text-center">
                                    <div class="box-text-inner blog-post-inner">
                                        <h5 class="post-title is-large ">Báo Tin Tức Việt Nam “9X thành công với với mô
                                            hình câu lạc bộ tiếng Anh”</h5>
                                        <div class="is-divider"></div>
                                    </div>
                                    <!-- .box-text-inner -->
                                </div>
                                <!-- .box-text -->
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

    </div>
</div>
@endsection
