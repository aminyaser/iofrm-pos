@extends('layouts.app')

@section('content')
<div class="background-cart">
    <div class="container">
        <img src="{{url('site_files/images/basket.png')}}" alt="" />
        <h3>سلة التسوق</h3>
    </div>
</div>

<div class="cart-page">
    <div class="container">
        <div class="row">
            <div class="col-7">
                @if($order)
                <div class="cart-of-orders">
                    <div class="card">
                        <div class="card-header">
                            <h2>سلة الطلبات</h2>
                            <h3>لديك {{ $order->products->count() }} منتجات</h3>
                        </div>


                        <div class="box box-primary">

                            <div class="box-header">

                                <h3 class="box-title">@lang('site.orders')</h3>

                            </div><!-- end of box header -->

                            <div class="box-body">

                                @include('partials._errors')

                                <form action="{{ route('dashboard.clients.orders.update', ['order' => $order->id, 'client' => Auth::id()]) }}" method="post" class="order-list">

                                    {{ csrf_field() }}
                                    {{ method_field('put') }}

                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>@lang('site.product')</th>
                                                <th>@lang('site.quantity')</th>
                                                <th>@lang('site.price')</th>
                                            </tr>
                                        </thead>



                                            @foreach ($order->products as $product)
                                            <tr>
                                                <td>{{ $product->name }}</td>
                                                <td><input type="number" name="products[{{ $product->id }}][quantity]" data-price="{{ number_format($product->sale_price, 2) }}" class="form-control input-sm product-quantity" min="1" value="{{ $product->pivot->quantity }}"></td>
                                                <td class="product-price">{{ number_format($product->sale_price * $product->pivot->quantity, 2) }}</td>
                                                <td>
                                                    <button class="btn btn-danger btn-sm remove-product-btn" data-id="{{ $product->id }}"><span class="fa fa-trash"></span></button>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>

                                    </table><!-- end of table -->

                                    <h4>@lang('site.total') : <span class="total-price">{{ number_format($order->total_price, 2) }}</span></h4>

                                    <div class="col-lg-12">
                                        <div class="final-order">
                                            <button>
                                                ادفع الان
                                            </button>
                                        </div>
                                    </div>

                                </form><!-- end of form -->

                            </div><!-- end of box body -->

                        </div><!-- end of box -->
                    </div>
                </div>
                @else
                <div class="cart-of-orders">
                    <div class="card">
                        <div class="card-header">
                            <h2>سلة الطلبات</h2>

                        </div>


                        <div class="box box-primary">

                            <div class="box-header">



                            </div><!-- end of box header -->

                            <div class="box-body">

                                @include('partials._errors')

                         @lang('site.no_records')

                            </div><!-- end of box body -->

                        </div><!-- end of box -->
                    </div>
                </div>
                @endif
            </div>

            <div class="col-5">
                <div class="cart-of-orders">
                    <div class="card">
                        <div class="card-header">
                            <h2>اختر عنوان التوصيل</h2>
                        </div>
                        <div class="card-body">
                            <ul class="chooseAddress">
                                @foreach ($clients as $client)

                                <li>
                                    <input class="specificsInput" type="radio" value="v1" name="color">
                                    <label class="specificsLabel">
                                      {{ $client->address ?? '' }} - {{ $client->phone }}

                                    </label>
                                </li>
                                @endforeach
                            </ul>
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
