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
                        <li class="breadcrumb-item"><a href="{{route('dashboard.products.index')}}">@lang('site.products')</a></li>
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
            <form action="{{route('dashboard.products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group">
                        <label>@lang('site.categories')</label>
                        <select class="form-control select2 " name="category_id" style="width: 100%;">
                            <option value="{{$product->category_id}}" selected>{{$product->category->name}}</option>

                            @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{old('category_id') == $product->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="card-body">
                    @foreach (config('translatable.locales') as $locale)
                    <div class="form-group">
                        <label >@lang('site.name')</label>
                        <input type="text" name="{{$locale}}[name]" class="form-control mt-1" id="" value="{{$product->translate($locale)->name}}" >
                    </div>
                    <div class="form-group">
                        <label >@lang('site.description')</label>
                        <textarea  class="ckeditor" name="{{$locale}}[description]">{{$product->translate($locale)->description}}</textarea>
                    </div>
                    @endforeach
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="image">@lang('site.image')</label>
                        <input type="file" name="image" class="form-control image" id="image" placeholder="@lang('site.image')">
                    </div>
                    <div class="form-group">
                        <img src="{{$product->image_path}}" class="img-thumbnail img-preview" width="100px" alt="">

                    </div>
                </div>

                <!-- /.card-body -->

                <div class="card-body">
                    <div class="form-group">
                        <label> @lang('site.purchase_price'):</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-dollar"></i></span>
                            </div>
                            <input type="number" name="purchase_price" step="0.01" value="{{$product->purchase_price}}" class="form-control">
                        </div>
                        <!-- /.input group -->
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label> @lang('site.sale_price'):</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-dollar"></i></span>
                            </div>
                            <input type="number" name="sale_price" step="0.01" value="{{$product->sale_price}}" class="form-control">
                        </div>
                        <!-- /.input group -->
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label> @lang('site.stock'):</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-hdd-o"></i></span>
                            </div>
                            <input type="number" name="stock" value="{{$product->stock}}" class="form-control">
                        </div>
                        <!-- /.input group -->
                    </div>
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
