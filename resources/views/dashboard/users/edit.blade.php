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
                        <li class="breadcrumb-item active"> @lang('site.edit')</li>
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
                <h3 class="card-title">@lang('site.edit')</h3>
            </div>
            @include('partials._errors')
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('dashboard.users.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group">
                        <label for="fistname">@lang('site.first_name')</label>
                        <input type="text" name="first_name" class="form-control" id="fistname" value="{{$user->first_name}}" placeholder="@lang('site.first_name')">
                    </div>
                    <div class="form-group">
                        <label for="lastname">@lang('site.last_name')</label>
                        <input type="text" name="last_name" class="form-control" id="lastname" value="{{$user->last_name}}" placeholder="@lang('site.last_name')">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">@lang('site.email')</label>
                    <input type="email" name="email" class="form-control" value="{{$user->email}}" id="exampleInputEmail1" placeholder="@lang('site.email')">
                    </div>
                    <div class="form-group">
                        <label for="image">@lang('site.image')</label>
                        <input type="file" name="image" class="form-control image" id="image" placeholder="@lang('site.email')">
                    </div>
                    <div class="form-group">
                    <img src="{{ $user->image_path }}" class="img-thumbnail img-preview" width="100px" alt="">
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

                                    $models = ['users','categories','prodcts','clients','orders'];

                                    $maps = ['create','read','update','delete'];

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
                                        @foreach ($maps as $map)
                                        <div class="icheck-success d-inline">
                                            <input type="checkbox" name="permissions[]"  {{ $user->hasPermission($map. '-' .$model) ? 'checked' : '' }}  value="{{$map.'-'.$model}}" id="checkboxSuccess1{{$model.$map}}">
                                            <label for="checkboxSuccess1{{$model.$map}}">
                                                @lang('site.'.$map)
                                            </label>
                                        </div>
                                        @endforeach

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
