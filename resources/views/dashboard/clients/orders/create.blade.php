@extends('layoutsDashboard.dashboard')

@section('content')
<style>
    .panel-heading button {
        width: 100%;
    }

    label,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p,
    input,
    .form-group {
        text-align: right;
        font-family: 'font1';
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">@lang('site.clients')</h1>

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"> @lang('site.add')</li>
                        <li class="breadcrumb-item"><a href="{{route('dashboard.clients.index')}}">@lang('site.clients')</a></li>
                        {{-- <li class="breadcrumb-item"><a href="{{route('dashboard.ord')}}">@lang('site.dashboard')</a></li> --}}

                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <!-- general form elements -->
        @include('partials._errors')
        <!-- /.card-header -->

        <div class="row">

            <div class="col-md-6 col-12" style="border-top: 6px solid #28a745;">

                <div class="box box-primary">

                    <div class="box-header">

                        <h6 class="box-title" style="margin-bottom: 10px">@lang('site.categories')</h6>

                    </div><!-- end of box header -->

                    <div class="box-body">

                        @foreach ($categories as $category)

                        <div class="panel-group">

                            <div class="panel panel-info">

                                <div class="panel-heading ">

                                    <button class="panel-title panel-body btn btn-outline-success btn-sm" data-toggle="collapse" href="#{{ str_replace(' ', '-', $category->name) }}">{{ $category->name }}</button>

                                </div>

                                <div id="{{ str_replace(' ', '-', $category->name) }}" class="panel-collapse collapse">

                                    <div class="panel-body">

                                        @if ($category->products->count() > 0)

                                        <table class="table table-hover">
                                            <tr>
                                                <th>@lang('site.name')</th>
                                                <th>@lang('site.stock')</th>
                                                <th>@lang('site.price')</th>
                                                <th>@lang('site.add')</th>
                                            </tr>
                                            @foreach ($category->products as $product)
                                            @if ($product->stock > '0')
                                            <tr>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->stock }}</td>
                                                <td>{{ number_format($product->sale_price, 2) }}</td>
                                                <td>
                                                    <a href="" id="product-{{ $product->id }}" data-name="{{ $product->name }}" data-id="{{ $product->id }}" data-price="{{ $product->sale_price }}" class="btn btn-success btn-sm add-product-btn">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach

                                        </table><!-- end of table -->

                                        @else
                                        <h5>@lang('site.no_records')</h5>
                                        @endif

                                    </div><!-- end of panel body -->

                                </div><!-- end of panel collapse -->

                            </div><!-- end of panel primary -->

                        </div><!-- end of panel group -->

                        @endforeach

                    </div><!-- end of box body -->

                </div><!-- end of box -->

            </div><!-- end of col -->
            <div class="col-md-6 col-12">

                <div class="box box-primary">

                    <div class="box-header">

                        <h3 class="box-title">@lang('site.orders')</h3>

                    </div><!-- end of box header -->

                    <div class="box-body">

                        <form action="{{ route('dashboard.clients.orders.store', $client->id) }}" method="post">

                            {{ csrf_field() }}
                            {{ method_field('post') }}

                            @include('partials._errors')

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>@lang('site.product')</th>
                                        <th>@lang('site.quantity')</th>
                                        <th>@lang('site.price')</th>
                                    </tr>
                                </thead>

                                <tbody class="order-list">


                                </tbody>

                            </table><!-- end of table -->

                            <h4>@lang('site.total') : <span class="total-price">0</span></h4>

                            <button class="btn btn-primary btn-block disabled" id="add-order-form-btn"><i class="fa fa-plus"></i> @lang('site.add_order')</button>

                        </form>

                    </div><!-- end of box body -->

                </div><!-- end of box -->

                @if ($client->orders->count() > 0)

                <div class="box box-primary">

                    <div class="box-header">

                        <h3 class="box-title" style="margin-bottom: 10px">@lang('site.previous_orders')
                            <small>{{ $orders->total() }}</small>
                        </h3>

                    </div><!-- end of box header -->

                    <div class="box-body">

                        @foreach ($orders as $order)

                        <div id="{{ str_replace('-', '', $order->created_at->format('d-m-Y-s')) }}">
                            <div class="card">
                              <div class="card-header" id="{{ str_replace('-', '', $order->created_at->format('d-m-Y-s')) }}">
                                <h5 class="mb-0">

                                  <button class="btn btn-link" data-toggle="collapse show" aria-expanded="false" data-target="#{{ str_replace('-', '', $order->created_at->format('d-m-Y-s')) }}" aria-expanded="true" aria-controls="{{ str_replace('-', '', $order->created_at->format('d-m-Y-s')) }}">
                                    {{ $order->created_at->toFormattedDateString() }}
                                  </button>
                                </h5>
                              </div>

                              <div id="{{ str_replace('-', '', $order->created_at->format('d-m-Y-s')) }}" class="collapse show" aria-labelledby="{{ str_replace('-', '', $order->created_at->format('d-m-Y-s')) }}" data-parent="#{{ str_replace('-', '', $order->created_at->format('d-m-Y-s')) }}">
                                <div class="card-body">
                                    <ul class="list-group">
                                        @foreach ($order->products as $product)
                                        <li class="list-group-item">{{ $product->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                              </div>

                            </div>
                          </div>

                        @endforeach

                        {{ $orders->links() }}

                    </div><!-- end of box body -->

                </div><!-- end of box -->

                @endif
            </div><!-- end of col -->



            <!-- end of col -->

        </div><!-- end of row -->

</div>

<!-- /.card -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->



@endsection
