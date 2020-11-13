@extends('layouts.app')

@section('content')
<div class="banner">
    <div class="container">
        <div class="main-search-bar">

        </div>
    </div>
</div>
<div class="Homeslider HomeNewsSlider">
    <div class="container">
        <div class="swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                @foreach ($mostproducts as $mostproduct)
                <div class="swiper-slide">
                    <div class="card-a">
                        <a href="{{url('/product/'.$mostproduct->id.'/'.$mostproduct->name)}}">
                            <img src="{{$mostproduct->image_path}}" alt="img slider">
                            <div class="textPro">
                                <h4>{{$mostproduct->name}} </h4>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="water" data-aos="fade-up">
            <div class="water-col">
                {{-- {{dd($order)}} --}}
                <h4> @lang('site.products') </h4>
            </div>
        </div>
        <div class="col-12" data-aos="fade-up">
            <div class="row">
                @foreach ($products as $product)
                <div class="col-3 p-1">
                    <div class="bg-ads12">
                    <a href="{{url('/product/'.$product->id.'/'.$product->name)}}">
                            <img src="{{$product->image_path}}" style="height: 200px;" class="img-pro-ne" alt="">
                        </a>
                    <h3> {{$product->name}}</h3>
                        <h6> {{$product->category->name}} </h6>
                        <h6 class="prc">{{$product->sale_price}} @lang('site.EGP')</h6>
                        @if (Auth::check())

                        <form action="{{route('new-order',Auth::id())}}" method="POST">
                            @csrf
                            <input hidden type="number"  name="products" value="{{$product->id}}" class="form-control input-sm product-quantity" >
                            <input hidden type="text" name="quantity" value="1" id="">
                            @if(in_array($product->id,$products_ids))
                            <div class="add-to-card ">
                            <button disabled>  مضاف </button>
                            </div>
                            @else
                            <div class="add-to-card  btn-add-card"
                             data-method="post"
                             data-quantity="{{$product->quantity}}"
                             data-user="{{Auth::id()}}"
                             data-products="{{$product->id}}"
                            data-url="{{route('new-order',Auth::id())}}">

                            <input type="hidden" name="_token" id="tokenProduct" value="{{ csrf_token() }}">

                            <button id="change-btn-cart"><img src="{{url('site_files/images/cart.png')}}" alt=""> أضف للسلة </button>
                            </div>
                            @endif
                        </form>


                        @else
                        <div class="add-to-card btn-add-card">
                        <button><img src="{{url('site_files/images/cart.png')}}" alt=""> <a href="{{url('/login')}}">أضف للسلة</a> </button>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
<div class="container-fluid">

    <div class="container">
        <div class="up">
            <button id="toTop" class="btn-up">العودة للأعلى</button>
        </div>
    </div>
</div>

@endsection
