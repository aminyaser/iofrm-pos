@extends('layoutsDashboard.dashboard')

@section('content')

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
                        <li class="breadcrumb-item active">@lang('site.products')</li>
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
                @if (auth::user()->hasPermission('create-products'))

                <h3 class="card-title">
                    <a class="btn btn-primary" href="{{route('dashboard.products.create')}}"> <i class="fa fa-plus"></i> @lang('site.add')</a>
                </h3>
                @else
                <h3 class="card-title">
                    <button class="btn btn-primary" disabled> <i class="fa fa-plus"></i> @lang('site.add')</button>
                </h3>
                @endif
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                @if ($products->count() > 0)
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>@lang('site.number')</th>
                            <th>@lang('site.name')</th>
                            <th>@lang('site.description')</th>
                            <th>@lang('site.category')</th>
                            <th>@lang('site.image')</th>
                            <th>@lang('site.purchase_price')</th>
                            <th>@lang('site.sale_price')</th>
                            <th>@lang('site.profit_percent')</th>
                            <th>@lang('site.stock')</th>
                            <th>@lang('site.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $index=>$product)
                        <tr>
                            <td>{{$index +1}}</td>
                            <td>{{$product->name}}</td>
                            <td>{!!$product->description!!}</td>
                            <td>{{$product->category->name}}</td>
                            <td><img src="{{$product->image_path}}" width="100px" height="100px" alt="{{$product->name}}"></td>
                            <td>{{$product->purchase_price}}</td>
                            <td>{{$product->sale_price}}</td>
                            <td>{{$product->profit_percent}} %</td>
                            <td>{{$product->stock}}</td>
                            <td>
                                @if (auth::user()->hasPermission('update-categories'))
                                <a href="{{route('dashboard.products.edit',$product->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    @lang('site.edit')</a>
                                @else
                                <button class="btn btn-info btn-sm" disabled> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    @lang('site.edit') </button>

                                @endif
                                @if (auth::user()->hasPermission('delete-categories'))

                                <form action="{{route('dashboard.products.destroy',$product->id)}}" method="post" style="display: inline-block;">
                                    {{ csrf_field() }}
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm delete-confirm">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i> @lang('site.delete')
                                    </button>
                                </form>
                                @else
                                <button type="submit" disabled class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i> @lang('site.delete')
                                </button>
                                @endif
                            </td>
                            {{-- <td> 4</td> --}}
                        </tr>

                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>@lang('site.number')</th>
                            <th>@lang('site.name')</th>
                            <th>@lang('site.description')</th>
                            <th>@lang('site.category')</th>
                            <th>@lang('site.image')</th>
                            <th>@lang('site.purchase_price')</th>
                            <th>@lang('site.sale_price')</th>
                            <th>@lang('site.profit_percent')</th>
                            <th>@lang('site.stock')</th>
                            <th>@lang('site.action')</th>
                        </tr>
                    </tfoot>
                </table>
                {{$products->links()}}
                @else
                <h2>@lang('site.no_date_found')</h2>
                @endif
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="{{url('js/jquery.min.js')}}"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $('.delete-confirm').on('click', function(event) {
        event.preventDefault();
        //   const url = $(this).attr('href');
        swal({
            title: '@lang("site.Are_you_sure")',
            text: '@lang("site.This record and it`s details will be permanantly deleted!")',
            icon: 'warning',
            buttons: ["@lang('site.cancle')", "@lang('site.yes')"],
        }).then(function(value) {
            if (value) {
                $('.delete-confirm').closest('form').submit();
            }
        });
    });
</script>

@endsection
