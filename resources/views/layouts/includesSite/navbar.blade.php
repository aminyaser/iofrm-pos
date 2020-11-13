<div class="topBar">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5 m-order-2">
                <div class="topBarMenu">
                    <ul>
                        <li><a href="{{ url('/') }}">الرئيسية</a></li>
                        <li><a href="{{ url('/cart') }}"> @lang('site.cart')</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2 m-order-1">
                <div class="logo">
                    <img src="{{url('site_files/images/logo/logo-dark.png')}}" alt="">
                </div>
            </div>
            <div class="col-md-5 m-order-2 ">
                <div class="topBarBtns">
                    <ul>
                        @guest
                    <li class="topBarBtn__login"><a href="{{url('/login')}}">تسجيل الدخول</a></li>
                        <li class="topBarBtn__register"><a href="#">التسجيل</a></li>
                        @endguest
                        @auth

                    <li>  <a href="{{ url('/my-orders') }}"> {{Auth::user()->first_name}}<i class="fa fa-user"></i> </a></li>
                        <li class="cartBtn">
                        <a href="{{route('cart')}}" ><i class="fa fa-shopping-cart"></i> <button id="myorder-count" value="{{$myorder->count()}}">{{$myorder->count()}} </button> </a>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header -->

<header class="main-header">
    <div class="container-fluid">
        <div class="toggle-nav">
            <button class="toggle-btn" id="toggle-menu-btn">
                <span style=" width: 20px; height: 2px;"></span>
                <span style=" width: 30px; height: 2px;"></span>
                <span style=" width: 20px; height: 2px;"></span>
            </button>
            <div class="mobile-menu">
                <div class="closeIcon">
                    <a href="#"><i class="fa fa-times"></i></a>
                </div>
                <ul>
                    <li><a href="{{ url('/') }}">الرئيسية</a></li>
                    <li><a href="{{ url('/cart') }}"> @lang('site.cart')</a></li>
                </ul>

            </div>

        </div>
        <div class="mobile-logo">
            <img src="{{url('site_files/images/logo/logo-light.png')}}" alt="">
        </div>
        <div class="topBarBtns">
            <ul>
                @guest
            <li class="topBarBtn__login"><a href="{{url('/login')}}">تسجيل الدخول</a></li>
                <li class="topBarBtn__register"><a href="#">التسجيل</a></li>
                @endguest
                @auth

            <li>  <a href="{{ url('/my-orders') }}"> {{Auth::user()->first_name}}<i class="fa fa-user"></i> </a></li>
                <li class="cartBtn">
                <a href="{{route('cart')}}" ><i class="fa fa-shopping-cart"></i> <button id="myorder-count" value="{{$myorder->count()}}">{{$myorder->count()}} </button> </a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</header>
<!-- /Header -->
