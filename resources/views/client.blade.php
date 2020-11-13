<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script> 
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

</head>

<body>
    @include('clients/layouts/header')
    @yield('content')
    @include('clients/layouts/footer')
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            var stt = 0;
            var endImg = $("img.slide:last").attr("idx");

            $("button").click(function() {
                stt = $(this).attr("idx");

                changeImg(stt);
            });

            $("#next").click(function() {
                if (++stt > endImg) {
                    stt = 0;
                }

                changeImg(stt);
            });

            $("#prev").click(function() {
                if (--stt < 0) {
                    stt = endImg;
                }

                changeImg(stt);
            });

            var interval;
            var timer = function() {
                interval = setInterval(function() {
                    $("#next").click();
                }, 10000);
            };
            timer();
        });


        //Hide all image slide and show image have index "stt"
        //Remove active all buttton and set "active" for button have index "stt"
        //Reset timer when change image
        function changeImg(stt) {
            $("img.slide").hide();
            $("img.slide").eq(stt).fadeIn(500);
            $("button").removeClass("active");
            $("button").eq(stt).addClass("active");
        };
    </script>
</html>