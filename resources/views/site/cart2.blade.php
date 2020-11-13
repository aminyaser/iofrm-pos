@extends('layouts.app')

@section('content')
<!-- /Header -->
<div class="background-cart">
    <div class="container">
        <img src="{{url('site_files/images/basket.png')}}" alt="" />
        <h3>سلة التسوق</h3>
    </div>
</div>

<div class="cart-page">
    <div class="container">
        <!--
            <div class="status">
                <div class="status-cart">
                    <img src="images/Capture2.png" class="img-check" alt="">
                </div>
            </div>
-->
        <div class="row">
            <div class="col-lg-6">
                <div class="cart-of-orders">
                    <div class="card">
                        <div class="card-header">
                            <h2>ملخص الطلب</h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive mt-3">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th scope="col">@lang('site.name')</th>
                                            <th scope="col">@lang('site.quantity')</th>
                                            <th scope="col">@lang('site.price')</th>
                                        </tr>
                                        @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->pivot->quantity }}</td>
                                            <td>{{ number_format($product->pivot->quantity * $product->sale_price, 2) }}</td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                                <h4>@lang('site.total') : <span class="total-price">{{ number_format($order->total_price, 2) }}</span></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="cart-of-orders deliverTimeBlock">
                    <div class="card">
                        <div class="card-header">
                            <h2>وقت التوصيل</h2>
                        </div>
                        <div class="card-body">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-day1-tab" data-toggle="tab" href="#nav-day1" role="tab" aria-controls="nav-day1" aria-selected="true">السبت <span>8/1</span></a>
                                    <a class="nav-item nav-link" id="nav-day2-tab" data-toggle="tab" href="#nav-day2" role="tab" aria-controls="nav-day2" aria-selected="false">الاحد <span>8/2</span></a>
                                    <a class="nav-item nav-link" id="nav-day3-tab" data-toggle="tab" href="#nav-day3" role="tab" aria-controls="nav-day3" aria-selected="false">الاثنين <span>8/3</span></a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-day1" role="tabpanel" aria-labelledby="nav-day1-tab">
                                    <ul class="deliver-time">
                                        <li>
                                            <input class="specificsInput" type="radio" value="v1" name="color">
                                            <label class="specificsLabel">
                                                12 م - 12 م
                                                <span>122 ر.س</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input class="specificsInput" type="radio" value="v1" name="color">
                                            <label class="specificsLabel">
                                                12 م - 12 م
                                                <span>122 ر.س</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade " id="nav-day2" role="tabpanel" aria-labelledby="nav-day2-tab">
                                    <ul class="deliver-time">
                                        <li>
                                            <input class="specificsInput" type="radio" value="v1" name="color">
                                            <label class="specificsLabel">
                                                12 م - 12 م
                                                <span>122 ر.س</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input class="specificsInput" type="radio" value="v1" name="color">
                                            <label class="specificsLabel">
                                                12 م - 12 م
                                                <span>122 ر.س</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade " id="nav-day3" role="tabpanel" aria-labelledby="nav-day3-tab">
                                    <ul class="deliver-time">
                                        <li>
                                            <input class="specificsInput" type="radio" value="v1" name="color">
                                            <label class="specificsLabel">
                                                12 م - 12 م
                                                <span>122 ر.س</span>
                                            </label>
                                        </li>
                                        <li>
                                            <input class="specificsInput" type="radio" value="v1" name="color">
                                            <label class="specificsLabel">
                                                12 م - 12 م
                                                <span>122 ر.س</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="cart-of-orders deliverTimeBlock">
                    <div class="card">
                        <div class="card-header">
                            <h2>طريقة الدفع</h2>
                        </div>
                        <div class="card-body">
                            <ul class="deliver-time">
                                <li>
                                    <input class="specificsInput" type="radio" value="v1" name="color">
                                    <label class="specificsLabel">
                                        بطاقة مدي
                                        <span><img src="images/mada.png" alt="" style="max-width: 70px"></span>
                                    </label>
                                </li>
                                <li>
                                    <input class="specificsInput" type="radio" value="v1" name="color">
                                    <label class="specificsLabel">
                                        البطاقة الإئتمانية
                                        <span><img src="images/visa.png" alt="" style="max-width: 70px;"></span>
                                    </label>
                                </li>
                                <li>
                                    <input class="specificsInput" type="radio" value="v1" name="color">
                                    <label class="specificsLabel">
                                        الدفع عن طريق Paypal
                                        <span><img src="images/paybal.png" alt="" style="max-width: 70px; "></span>
                                    </label>
                                </li>
                                <li>
                                    <input class="specificsInput" type="radio" value="v1" name="color">
                                    <label class="specificsLabel">
                                        نقدى
                                        <span><img src="images/cash.png" alt="" style="max-width: 70px;"></span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">

                <div class="cart-of-orders">
                    <div class="card">
                        <div class="card-header">
                            <h2>بيانات التوصيل</h2>
                        </div>
                        @php
                            $clients =  DB::table('clients')->where('user_id', Auth::id())->first();
                        @endphp
                        <div class="card-body">
                            <form method="post" action="{{ route('add_detiles') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('site.name')</label>
                                            <input type="text" name="name" value="{{ $clients->name ?? '' }}" class="form-control" placeholder="@lang('site.name')">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('site.phone')</label>
                                            <input type="text" name="phone[]" value="{{ is_array($clients->phone) ? implode(' - ', $clients->phone) : $clients->phone ?? '' }}" class="form-control" placeholder="@lang('site.phone')">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>@lang('site.address')</label>
                                            <textarea name="address" class="form-control" placeholder="@lang('site.address')">{{ $clients->address }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="final-order">
                                    <button>
                                         @lang('site.edit')
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="final-order">
                    <a href="{{ url('/get-checkout-id/'.$order->total_price) }}">
                        ادفع الان
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="up">
        <button id="toTop" class="btn-up">العودة للأعلى</button>
    </div>
</div>
@endsection
