@extends('client')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            @foreach ($list as $item)
            <div id="htmldesc" class="d-none">
                {{$item->description}}
            </div>
            <div id="description">

            </div>
            @endforeach
        </div>
        <div class="col-lg-4 pt-5">
            <div class="news">
                <p class="latest-news">TIN TỨC MỚI NHẤT</p>
                <div class="row">
                    <div class="col-lg-4">
                        <img src="https://alibabaenglish.edu.vn/wp-content/uploads/2016/01/a2-1513516601573.jpg" alt="">
                    </div>
                    <div class="col-lg-8">
                        <p>Báo Vietnambiz “Hành trình khởi nghiệp của CEO câu lạc bộ tiếng Anh lớn nhất thủ đô”</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <img src=https://alibabaenglish.edu.vn/wp-content/uploads/2019/04/top-13-trung-tam-tieng-anh-giao-tiep-uy-tin-tai-ha-noi-alibaba-1.png"" alt="">
                    </div>
                    <div class="col-lg-8">
                        <p>Top 13 Trung Tâm Tiếng Anh Giao Tiếp Uy Tín Tại Hà Nội</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <img src="https://alibabaenglish.edu.vn/wp-content/uploads/2019/04/N%E1%BB%80N-WEB.png" alt="">
                    </div>
                    <div class="col-lg-8">
                        <p>Học tiếng Anh ở Alibaba có tốt không?</p>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-4">
                        <img src="https://alibabaenglish.edu.vn/wp-content/uploads/2019/04/du-lich.png" alt="">
                    </div>
                    <div class="col-lg-8">
                        <p>Tiếng Anh Giao Tiếp Khi Du Lịch Từ A Đến Z</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  var html = $('#htmldesc').text();
  $('#description').html(html)
</script>
@endsection
    