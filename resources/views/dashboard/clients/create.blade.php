@extends('layoutsDashboard.dashboard')

@section('content')

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
                        <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">@lang('site.dashboard')</a></li>

                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header" style="text-align: right;">
                <h3 class="card-title">@lang('site.add')</h3>
            </div>
            @include('partials._errors')
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('dashboard.clients.store')}}" method="POST">
                @csrf
                @method('post')
                <div class="card-body">
                    <div class="form-group">
                        <label for="fistname">@lang('site.name')</label>
                        <input type="text" name="name" class="form-control mt-1" id="fistname" value="{{old('name')}}" placeholder="@lang('site.name')">
                    </div>
                </div>

                @for ($i = 0; $i < 2; $i++) <div class="card-body">
                    <div class="form-group">
                        <label for="fistname">@lang('site.phone')</label>
                        <input type="text" name="phone[]" class="form-control mt-1" id="" value="" placeholder="@lang('site.phone')">
                    </div>
                     </div>
                     @endfor

        <div class="card-body">
            <div class="form-group">
                <label for="fistname">@lang('site.address')</label>
                <input type="text" name="address" class="form-control mt-1" id="" value="{{old('address')}}" placeholder="@lang('site.address')">
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">@lang('site.add')</button>
        </div>
        </form>
        <!--end form -->

</div>
<!-- /.card -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->



@endsection
