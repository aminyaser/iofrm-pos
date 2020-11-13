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

                @if ($clients->count() > 0)
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>@lang('site.number')</th>
                            <th>@lang('site.name')</th>
                            <th>@lang('site.phone')</th>
                            <th>@lang('site.address')</th>
                            <th>@lang('site.add_order')</th>
                            <th>@lang('site.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $index=>$client)
                        <tr>
                            <td>{{$index +1}}</td>
                            <td>{{$client->name}}</td>
                            <td>{{ is_array($client->phone) ? implode(' - ', $client->phone) : $client->phone }}</td>

                            <td>{{$client->address}}</td>
                            @if (auth::user()->hasPermission('create-orders'))
                        <td><a href="{{route('dashboard.clients.orders.create',$client->id)}}" class="btn btn-primary btn-sm">@lang('site.add_order')</a></td>
                            @else
                            <td><button disabled  class="btn btn-primary btn-sm">@lang('site.add_order')</button></td>

                            @endif
                            <td>
                                @if (auth::user()->hasPermission('update-clients'))
                                <a href="{{route('dashboard.clients.edit',$client->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    @lang('site.edit')</a>
                                @else
                                <button class="btn btn-info btn-sm" disabled> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    @lang('site.edit') </button>

                                @endif
                                @if (auth::user()->hasPermission('delete-clients'))

                                <form action="{{route('dashboard.clients.destroy',$client->id)}}" method="post" style="display: inline-block;">
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
                            <th>@lang('site.phone')</th>
                            <th>@lang('site.address')</th>
                            <th>@lang('site.action')</th>
                        </tr>
                    </tfoot>
                </table>
                {{$clients->links()}}
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


@endsection
