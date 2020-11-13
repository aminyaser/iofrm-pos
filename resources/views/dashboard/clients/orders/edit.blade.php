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
                    <h1 class="m-0 text-dark">@lang('site.categories')</h1>

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"> @lang('site.edit')</li>
                        <li class="breadcrumb-item"><a href="{{route('dashboard.clients.index')}}">@lang('site.clients')</a></li>
                        <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">@lang('site.dashboard')</a></li>

                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
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
                                            <tr>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->stock }}</td>
                                                <td>{{ number_format($product->sale_price, 2) }}</td>
                                                <td>
                                                    <a href="" id="product-{{ $product->id }}" data-name="{{ $product->name }}" data-id="{{ $product->id }}" data-price="{{ $product->sale_price }}" class="{{ in_array($product->id, $order->products->pluck('id')->toArray()) ? 'btn-default disabled' : 'btn-success add-product-btn' }} btn-sm ">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </td>
                                            </tr>
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
            <div class="col-md-6">

                <div class="box box-primary">

                    <div class="box-header">

                        <h3 class="box-title">@lang('site.orders')</h3>

                    </div><!-- end of box header -->

                    <div class="box-body">

                        @include('partials._errors')

                        <form action="{{ route('dashboard.clients.orders.update', ['order' => $order->id, 'client' => $client->id]) }}" method="post">

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

                                <tbody class="order-list">

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

                            <button class="btn btn-primary btn-block" id="form-btn"><i class="fa fa-edit"></i> @lang('site.edit_order')</button>

                        </form><!-- end of form -->

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

                        <div class="panel-group">

                            <div class="panel panel-success">

                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#{{ $order->created_at->format('d-m-Y-s') }}">{{ $order->created_at->toFormattedDateString() }}</a>
                                    </h4>
                                </div>

                                <div id="{{ $order->created_at->format('d-m-Y-s') }}" class="panel-collapse collapse">

                                    <div class="panel-body">

                                        <ul class="list-group">
                                            @foreach ($order->products as $product)
                                            <li class="list-group-item">{{ $product->name }}</li>
                                            @endforeach
                                        </ul>

                                    </div><!-- end of panel body -->

                                </div><!-- end of panel collapse -->

                            </div><!-- end of panel primary -->

                        </div><!-- end of panel group -->

                        @endforeach

                        {{ $orders->links() }}

                    </div><!-- end of box body -->

                </div><!-- end of box -->

                @endif

            </div><!-- end of col -->

        </div><!-- end of row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
