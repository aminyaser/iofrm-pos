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

            <div class="status">
                <div class="status-cart">
                    <img src="{{ url('site_files/images/Capture3.png') }}" class="img-check" alt="">
                </div>
            </div>

        <div class="row">

            <div class="col-lg-12 ">
                <div class="row">

                    <div class="col-md-12">
                        <div class="cart-of-orders">
                            <div class="card">
                                <div class="card-header">
                                    <h2>بيانات الفيزا</h2>
                                </div>
                                <div class="card-body">
                                    <script src="https://test.oppwa.com/v1/paymentWidgets.js?checkoutId={{ $checkoutId }}"></script>
                                    <form action="{{ url('/GetStatus') }}" class="paymentWidgets" data-brands="VISA MASTER MADA">
                                        <div class="row">

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
