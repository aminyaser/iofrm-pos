@extends('layoutsDashboard.dashboard')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">@lang('site.dashboard')</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">@lang('site.clients')</li>
                        <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">@lang('site.dashboard')</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                @if (auth::user()->hasPermission('create-clients'))

                <h3 class="card-title">
                    <a class="btn btn-primary" href="{{route('dashboard.clients.create')}}"> <i class="fa fa-plus"></i> @lang('site.add')</a>
                </h3>
                @else
                <h3 class="card-title">
                    <button class="btn btn-primary" disabled> <i class="fa fa-plus"></i> @lang('site.add')</button>
                </h3>
                @endif
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <div class="row">

                    <div class="col-md-8 col-12">

                        <div class="box box-primary">

                            <div class="box-header">

                                <h3 class="box-title" style="margin-bottom: 10px">@lang('site.orders')</h3>

                                <form action="{{ route('dashboard.orders.index') }}" method="get">

                                    <div class="row">

                                        <div class="col-md-8">
                                            <input type="text" name="search" class="form-control" placeholder="@lang('site.search')" value="{{ request()->search }}">
                                        </div>

                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('site.search')</button>
                                        </div>

                                    </div><!-- end of row -->

                                </form><!-- end of form -->

                            </div><!-- end of box header -->

                            @if ($orders->count() > 0)

                            <div class="box-body table-responsive">

                                <table id="example1" class="table table-bordered table-striped">
                                    <tr>
                                        <th>@lang('site.client_name')</th>
                                        <th>@lang('site.price')</th>
                                        <th>@lang('site.status')</th>
                                        <th>@lang('site.paymented')</th>
                                        <th>@lang('site.created_at')</th>
                                        <th>@lang('site.action')</th>


                                    </tr>

                                    @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->client->name }}</td>
                                        <td>{{ number_format($order->total_price, 2) }}</td>
                                        <td>
                                            <button
                                                data-status="{{$order->status}}"
                                                data-id="{{$order->id}}-order-status"
                                                data-url="{{ route('dashboard.orders.update_status', $order->id) }}"
                                                data-method="get"
                                                data-available-status='["@lang(' site.processing')", "@lang('site.finished') " ]'
                                                class="order-status-btn btn {{ $order->status == 'processing' ? 'btn-warning' : 'btn-success disabled' }} btn-sm">
                                                @lang('site.' . $order->status)
                                            </button>
                                        </td>
                                        <td> @if($order->payment == 'done')
                                            @lang('site.done')
                                        @endif </td>
                                        <td>{{ $order->created_at->toFormattedDateString() }}</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm order-products" data-url="{{ route('dashboard.orders.products', $order->id) }}" data-method="get">
                                                <i class="fa fa-list"></i>
                                                @lang('site.show')
                                            </button>
                                            @if (auth()->user()->hasPermission('update-orders'))
                                            <a href="{{ route('dashboard.clients.orders.edit', ['client' => $order->client->id, 'order' => $order->id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> @lang('site.edit')</a>
                                            @else
                                            <a href="#" disabled class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                            @endif

                                            @if (auth()->user()->hasPermission('delete-orders'))

                                            <form action="{{ route('dashboard.orders.destroy', $order->id) }}" method="post" style="display: inline-block;">
                                                {{ csrf_field() }}
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm delete-confirm">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i> @lang('site.delete')
                                                </button>
                                            </form>


                                            @else
                                            <a href="#" class="btn btn-danger btn-sm" disabled><i class="fa fa-trash"></i> @lang('site.delete')</a>
                                            @endif

                                        </td>

                                    </tr>

                                    @endforeach

                                </table><!-- end of table -->

                                {{ $orders->appends(request()->query())->links() }}

                            </div>

                            @else

                            <div class="box-body">
                                <h3>@lang('site.no_records')</h3>
                            </div>

                            @endif

                        </div><!-- end of box -->

                    </div><!-- end of col -->

                    <div class="col-md-4 col-12">

                        <div class="box box-primary">

                            <div class="box-header">
                                <h3 class="box-title" style="margin-bottom: 10px">@lang('site.show_products')</h3>
                            </div><!-- end of box header -->

                            <div class="box-body aria">

                                <div style="display: none; flex-direction: column; align-items: center;" id="loading">
                                    <div class="loader">

                                    </div>
                                    <p style="margin-top: 10px">@lang('site.loading')</p>
                                </div>

                                <div id="order-product-list">

                                </div><!-- end of order product list -->

                            </div><!-- end of box body -->

                        </div><!-- end of box -->

                    </div><!-- end of col -->

                </div><!-- end of row -->

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
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
