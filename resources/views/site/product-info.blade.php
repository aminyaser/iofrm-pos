
    @extends('layouts.app')

    @section('content')
    <div class="product-full-wrapper" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="product-preview">
                        <div class="swiper-container gallery-top" >
                            <div class="swiper-wrapper">
                                <div class="swiper-slide product-main-img" >
                                <img src="{{$product->image_path}}" alt="" class="m-image">
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-full-details" >
                        <div class="basic-info">
                        <h2 class="">{{$product->name}}</h2>
                            <h4 class="price"> {{$product->sale_price}} @lang('site.EGP') </h4>
                        </div>
                        <div class="line"></div>
                        <div class="product-specifics">
                            <div class="specifics-item">
                                <h3>خيارات المنتج</h3>
                       {!!$product->description!!}

                            </div>
                            <div class="specifics-item">
                                <h3>@lang('site.category')</h3>
                                <ul>
                                    <li>
                                        <input class="specificsInput" type="radio" value="v1" name="color">
                                    <label class="specificsLabel">{{$product->category->name}}</label>
                                    </li>

                                </ul>

                            </div>

                        </div>
                        <div class="line"></div>
                        <div class="cart-block">
                            @if(in_array($product->id,$products_ids))
                            <div class="addCartBtn">
                            <button>  مضاف </button>
                            </div>
                            @else
                            <div class="addCartBtn">
                                <form action="{{route('new-order',Auth::id())}}" method="POST">
                                    @csrf
                                    <input hidden type="number"  name="products" value="{{$product->id}}" class="form-control input-sm product-quantity" >
                                    <input hidden type="text" name="quantity" value="1" id="">
                                <button> @lang('site.add_order') </button>
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="ads">
            <div class="water">
                <div class="water-col">
                    <h4>البدائل</h4>
                </div>
            </div>
            <div class="swiper-container relatedProductSlider">
                <div class="swiper-wrapper">
                    @foreach ($products as $item)

                    <div class="swiper-slide">
                        <div class="bg-ads">
                        <img src="{{$item->image_path}}" class="img-pro-ne" alt="">
                            <h3>ساديا جمبو بيف برجر</h3>
                            <h6>جم 450</h6>
                            <h6 class="prc">رس19.5</h6>
                            <div class="add-to-card">
                                <button><img src="{{url('site_files/images/cart.png')}}" alt=""> أضف للسلة </button>
                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>



@endsection
