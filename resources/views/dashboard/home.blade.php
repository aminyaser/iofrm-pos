@extends('layoutsDashboard.dashboard')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container-fluid">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">@lang('site.dashboard')</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">@lang('site.dashboard')</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$orders}}</h3>

                        <p> @lang('site.orders')</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('dashboard.orders.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$categories}}</h3>

                        <p>@lang('site.categories')</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{route('dashboard.categories.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$clients}}</h3>

                        <p>@lang('site.clients')</p>
                    </div>
                    <div class="icon">

                        <i class="ion ion-person"></i>
                    </div>
                    <a href="{{route('dashboard.clients.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$products}}</h3>

                        <p>@lang('site.products')</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{route('dashboard.products.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>

        <div class="col-md-12">
            <div class="box box-solid">

                <div class="box-header">
                    <h3 class="box-title">@lang('site.sales')</h3>
                </div>
                <div class="box-body border-radius-none">
                    <div class="chart" id="line-chart" style="height: 250px;"></div>
                </div>
                <!-- /.box-body -->
            </div>
        </div><!-- /.container-fluid -->
        <!-- /.card -->
</div>
<!-- /.col (RIGHT) -->
<script src="{{url('dashboard_files/js/jquery.min.js')}}"></script>
</section>

<!-- /.content -->
</div>


@push('scripts')
<script>

    //line chart
    var line = new Morris.Line({
        element: 'line-chart',
        resize: true,
        data: [
            @foreach ($sales_data as $data)
            {
                ym: "{{ $data->year }}-{{ $data->month }}", sum: "{{ $data->sum }}"
            },
            @endforeach
        ],
        xkey: 'ym',
        ykeys: ['sum'],
        labels: ['@lang('site.total')'],
        lineWidth: 2,
        hideHover: 'auto',
        gridStrokeWidth: 0.4,
        pointSize: 4,
        gridTextFamily: 'Open Sans',
        gridTextSize: 10
    });
</script>
@endpush

@endsection
