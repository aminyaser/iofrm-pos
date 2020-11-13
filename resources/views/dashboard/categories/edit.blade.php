@extends('layoutsDashboard.dashboard')

@section('content')

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
                        <li class="breadcrumb-item"><a href="{{route('dashboard.categories.index')}}">@lang('site.categories')</a></li>
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
                <h3 class="card-title">@lang('site.edit')</h3>
            </div>
            @include('partials._errors')
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('dashboard.categories.update',$category->id)}}" method="POST" >
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group">
                        <label for="fistname">@lang('site.categories')</label>
                        @foreach (config('translatable.locales') as $locale)

                    <input type="text" name="{{$locale}}[name]" class="form-control" value="{{$category->translate($locale)->name}}" id="fistname" value="{{old($locale .'.name')}}" placeholder="@lang('site.'. $locale . '.name')">
                    @endforeach
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">@lang('site.edit')</button>
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
