<header class="header">
    <div class="header-wapper">
        <div id="masthead" class="header-main ">
            <div class="header-inner flex-row container">
                <!-- Logo -->
                <div id="logo" class="flex-row logo">
                    <!-- Header logo -->
                    <a href="#" rel="home">
                        <img width="230" height="80"
                            src="https://alibabaenglish.edu.vn/wp-content/uploads/2019/03/logo-Alibaba.png"
                            class="header_logo header-logo" alt="Alibaba English Center">
                    </a>

                    <img class="img-top"
                        src="https://alibabaenglish.edu.vn/wp-content/uploads/2019/03/53623352_1918711798257815_8196010289078992896_n.png"
                        style="height:90px"></li>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg nav-center">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav text-uppercase nav-center">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/')}}">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/gioi-thieu')}}">Giới thiệu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/doi-ngu-dao-tao')}}">Đội ngũ đào tạo</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Phương pháp học</a>
                        <div class="dropdown-menu mr-2" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{url('/phuong-phap-tpr')}}">Phương pháp TPR</a>
                            <a class="dropdown-item" href="{{url('/phuong-phap-shadowing')}}">Phương pháp shadowing</a>
                            <a class="dropdown-item" href="{{url('/phuong-phap-nlp')}}">Phương pháp NLP</a>
                            <a class="dropdown-item" href="{{url('/phuong-phap-ale')}}">Phương pháp ALE</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Khóa học
                        </a>
                        <div class="dropdown-menu mr-2" aria-labelledby="navbarDropdownMenuLink">
                            @foreach($courses as $item)
                            <a class="dropdown-item"
                                href="{{route('english.single',['id'=>$item->id])}}">{{$item->name_course}}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/cam-nhan-cua-hoc-vien')}}">Cảm nhận học viên</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="https://www.facebook.com/Tuy%E1%BB%83n-D%E1%BB%A5ng-Alibaba-English-Center-100248944839614/">Tuyển
                            dụng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/tin-tuc')}}">Tin tức</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/lien-he')}}">Liên hệ</a>
                    </li>
                </ul>
            </div>
        </nav>
</header>
