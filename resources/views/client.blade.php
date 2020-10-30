<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

</head>

<body>
    <header class="header">
        <div class="header-wapper">
            <div id="masthead" class="header-main ">
                <div class="header-inner flex-row container">
                    <!-- Logo -->
                    <div id="logo" class="flex-row logo">
                        <!-- Header logo -->
                        <a href="#" rel="home">
                            <img width="230" height="80" src="https://alibabaenglish.edu.vn/wp-content/uploads/2019/03/logo-Alibaba.png" class="header_logo header-logo" alt="Alibaba English Center">
                        </a>

                        <img class="img-top" src="https://alibabaenglish.edu.vn/wp-content/uploads/2019/03/53623352_1918711798257815_8196010289078992896_n.png" style="height:90px"></li>

                    </div>
                    <div class="container">
                        <div class="top-divider full-width"></div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg nav-center">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav text-uppercase nav-center">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Giới thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Đội ngũ đào tạo</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Phương pháp học</a>
                            <div class="dropdown-menu mr-2" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Khóa học
                            </a>
                            <div class="dropdown-menu mr-2" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Cảm nhận học viên</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tuyển dụng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tin tức</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Liên hệ</a>
                        </li>
                    </ul>
                </div>
            </nav>
    </header>
    @yield('content')
    <footer>
        <div class="row footer-top">
            <div class="col-4">
                <h3>Liên Hệ</h3>
                <p>
                    <i class="fas fa-map-marker-alt"></i> Cơ Sở 1: Số 186 Giải Phóng, Thanh Xuân, Hà Nội.
                </p>
                <p><i class="fas fa-phone"></i> Điện thoại: 02422 391 999</p>
            </div>
            <div class="col-4">
                <h3>Liên Hệ</h3>
                <p>
                    <i class="fas fa-map-marker-alt"></i> Cơ Sở 1: Số 186 Giải Phóng, Thanh Xuân, Hà Nội.
                </p>
                <p><i class="fas fa-phone"></i> Điện thoại: 02422 391 999</p>
            </div>
            <div class="col-4">
                <h3>Liên Hệ</h3>
                <p>
                    <i class="fas fa-map-marker-alt"></i> Cơ Sở 1: Số 186 Giải Phóng, Thanh Xuân, Hà Nội.
                </p>
                <p><i class="fas fa-phone"></i> Điện thoại: 02422 391 999</p>
            </div>

        </div>
        <div class=" footer-bottom">Copyright ® Alibabaenglish 2019. All Rights Reserved </div>
    </footer>
</body>
</html>