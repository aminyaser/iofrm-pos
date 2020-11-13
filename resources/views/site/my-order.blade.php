@extends('layouts.app')

@section('content')
<div class="background-cart">
    <div class="container">
        <img src="{{ url('site_files/images/order1.png') }}" alt="" />
        <h3>طلباتى</h3>

    </div>
</div>

<div class="orders-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="cart-of-orders">
                            <div class="card">
                                <div class="card-header">
                                    <h2>اصناف الطلب</h2>
                                </div>
                                @if ($orders->count() > 0)

                                <div class="box-body table-responsive">

                                    <table id="example1" class="table table-bordered table-striped">
                                        <tr>

                                            <th>@lang('site.price')</th>

                                            <th>@lang('site.paymented')</th>
                                            <th>@lang('site.created_at')</th>
                                            <th>@lang('site.action')</th>


                                        </tr>

                                        @foreach ($orders as $order)
                                        <tr>

                                            <td>{{ number_format($order->total_price, 2) }}</td>

                                            <td> @if($order->payment == 'done')
                                                @lang('site.done')
                                            @endif </td>
                                            <td>{{ $order->created_at->toFormattedDateString() }}</td>
                                            <td>
                                                <button class="btn btn-primary btn-sm order-products" data-url="{{ route('dashboard.orders.products', $order->id) }}" data-method="get">
                                                    <i class="fa fa-list"></i>
                                                    @lang('site.show')
                                                </button>
                                            </td>

                                        </tr>

                                        @endforeach

                                    </table><!-- end of table -->



                                </div>

                                @else

                                <div class="box-body">
                                    <h3>@lang('site.no_records')</h3>
                                </div>

                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div id="order-product-list">

                        </div><!-- end of order product list -->
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>

<style>
    #btn-prt{
        display: none !important;
    }
</style>
<!-- /.content-wrapper -->
<script src="{{url('dashboard_files/js/jquery.min.js')}}"></script>
<script>

    $('.order-status-btn').on('click', function(e) {
        e.preventDefault();

        var url = $(this).data('url');
        var classNames = this.className.split(/\s+/);
        var available = $(this).data('data-available-status');
        var status = $(this).data('status');
        var id = $(this).data('id');
        var method = $(this).data('method');
     var icon =    $(this).append('<i class="fa fa-spinner fa-spin"></i>');
     setTimeout(function() {
        icon
    // callback();
}, 2000)
$(this).empty();

$(this).text("{{__('site.finished')}}").removeClass('btn-warning').addClass('disabled btn-success').append('<i class="fa fa-check"></i>');

        // alert(id);
        $.ajax({
            url: url,
            method: method,
            data: {
                id: id,
            },
            success: function(response) {
            },

            // chach:clear;
        })

    }); //end of order products click
</script>
@endsection
