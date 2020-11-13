@extends('layoutsDashboard.dashboard')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">@lang('site.users')</h1>

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"> @lang('site.add')</li>
                        <li class="breadcrumb-item"><a href="{{route('dashboard.users.index')}}">@lang('site.users')</a></li>
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
            <form action="{{route('dashboard.users.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="card-body">
                    <div class="form-group">
                        <label for="fistname">@lang('site.first_name')</label>
                        <input type="text" name="first_name" class="form-control" id="fistname" value="{{old('first_name')}}" placeholder="@lang('site.first_name')">
                    </div>
                    <div class="form-group">
                        <label for="lastname">@lang('site.last_name')</label>
                        <input type="text" name="last_name" class="form-control" id="lastname" value="{{old('last_name')}}" placeholder="@lang('site.last_name')">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">@lang('site.email')</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="@lang('site.email')">
                    </div>
                    <div class="form-group">
                        <label for="image">@lang('site.image')</label>
                        <input type="file" name="image" class="form-control image" id="image" placeholder="@lang('site.email')">
                    </div>
                    <div class="form-group">
                    <img src="{{asset('uploads/users-images/default.svg')}}" class="img-thumbnail img-preview" width="100px" alt="">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">@lang('site.password')</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="@lang('site.password')">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">@lang('site.password_confirmation')</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="@lang('site.password_confirmation')">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="row">
                    <div class="col-12">
                        <!-- Custom Tabs -->
                        <div class="card">
                            <div class="card-header d-flex p-0">
                                <h3 class="card-title p-3">@lang('site.permissions')</h3>
                                <ul class="nav nav-pills ml-auto p-2">
                                    @php

                                    $models = ['users','categories','products','orders','clients']
                                    @endphp
                                    @foreach ($models as $index=>$model)

                                    <li class="m-1"><a class="nav-link {{$index == '0' ? 'active' : ''}}" href="#{{$model}}" data-toggle="tab">{{$model}}</a></li>
                                    @endforeach


                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    @foreach ($models as $index=>$model)
                                    <div class="tab-pane {{$index == 0 ? 'active' : ''}}" id="{{$model}}">
                                        <div class="icheck-success d-inline">
                                            <input type="checkbox" name="permissions[]" value="create-{{$model}}" id="checkboxSuccess1{{$model}}">
                                            <label for="checkboxSuccess1{{$model}}">
                                                @lang('site.create')
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="checkbox" name="permissions[]" value="read-{{$model}}" id="checkboxSuccess2{{$model}}">
                                            <label for="checkboxSuccess2{{$model}}">
                                                @lang('site.read')
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="checkbox" name="permissions[]" value="update-{{$model}}" id="checkboxSuccess3{{$model}}">
                                            <label for="checkboxSuccess3{{$model}}">
                                                @lang('site.edit')
                                            </label>
                                        </div>
                                        <div class="icheck-success d-inline">
                                            <input type="checkbox" name="permissions[]" value="delete-{{$model}}" id="checkboxSuccess4{{$model}}">
                                            <label for="checkboxSuccess4{{$model}}">
                                                @lang('site.delete')
                                            </label>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!-- /.tab-pane -->

                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- ./card -->
                    </div>
                    <!-- /.col -->
                </div>

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
