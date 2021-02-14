@extends('dashboard.layouts.app')
@section('title', trans('dashboard.product.Edit Product'))
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.min.css">
    <style>
        .img-uploaded img{
            width: 100px;
            margin: 5px;
        }
    </style>
@endsection

@section('content')
    <!--content wrapper -->
    <div class="content-wrapper">
        <!--content header -->
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h1 class="content-header-title">{{trans('dashboard.product.Products')}}</h1>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.home')}}">{{trans('dashboard.main.home')}}</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard.products.index')}}">{{trans('dashboard.product.Products')}}</a>
                            </li>
                            <li class="breadcrumb-item active">{{ trans('dashboard.product.Edit Product') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        @include('dashboard.partials._alert')
        @include('dashboard.partials._all_errors')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-content collpase show">
                        <div class="card-body">
                            <!-- form start -->
                            <form class="form-horizontal" method="post"
                                  action="{{ route('dashboard.products.update', $product) }}"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @foreach(config('app.languages') as $key => $language)
                                    <div class="form-body">
                                        <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label class="col-md-2"
                                                   for="name">{{ trans('dashboard.main.Name In '.$language)}}</label>
                                            <div class="col-md-10">
                                                <div><input type="text" id="name" class="form-control"
                                                            placeholder="{{trans("dashboard.category.Name")}}"
                                                            name="{{$key}}[name]"
                                                            value="{{ $product->translate($key)->name }}"/>
                                                    @include('dashboard.partials._errors', ['input' => "$key.name"])
                                                    <div class="form-control-position">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                @foreach(config('app.languages') as $key => $language)
                                    <div class="form-body">
                                        <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label class="col-md-2"
                                                   for="{{$key}}.description">{{ trans('dashboard.product.Product Details In ' . $language) }}</label>
                                            <div class="col-md-10">
                                                <input id="{{$key}}.description" type="hidden"
                                                       name="{{$key}}[description]"
                                                       value="{{ $product->translate($key)->description }}"/>
                                                <trix-editor input="{{$key}}.description"></trix-editor>
                                                @include('dashboard.partials._errors', ['input' => "$key.description"])
                                                <div class="form-control-position">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="form-body">
                                    <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label class="col-md-2"
                                               for="name">{{ trans('dashboard.product.Category')}}</label>
                                        <div class="col-md-10">
                                            <select class="custom-select" name="category_id">
                                                <option value="">{{ trans('') }}</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                            @if($category->id == $product->category->id) selected @endif >{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row {{ $errors->has('image') ? ' has-error' : '' }}">
                                    <label class="col-md-2" for="image">{{trans('dashboard.product.Image')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative has-icon-left">
                                            <span>
                                                <input name="image[]" autocomplete="off"
                                                       class="form-control hedden-input"
                                                       id="image" type="file" accept="image/*" multiple="">
                                            </span>
                                            @include('dashboard.partials._errors', ['input' => 'image'])
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-md-2" for="image"></label>
                                    <div class="col-md-10">
                                        <div class="position-relative multi-img-result d-flex align-items-center flex-wrap">
                                            @if($image_count > 0)
                                                    @foreach($product->images as $image)
                                                        <div class="img-uploaded uploaded-image m-1">
                                                            <img src="{{ asset('assets/uploads/products/' . $image->path) }}"
                                                                alt="" width="100">
                                                        </div>
                                                    @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row {{ $errors->has('price') ? ' has-error' : '' }}">
                                    <label class="col-md-2" for="price">{{trans('dashboard.product.Price')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative has-icon-left">
                                            <input type="text" id="price" class="form-control"
                                                   name="price" value="{{  $product->price }}"/>
                                            @include('dashboard.partials._errors', ['input' => 'price'])
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row {{ $errors->has('quantity') ? ' has-error' : '' }}">
                                    <label class="col-md-2"
                                           for="quantity">{{trans('dashboard.product.Quantity')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative has-icon-left">
                                            <input type="text" id="quantity" class="form-control"
                                                   name="quantity" value="{{ $product->quantity }}"/>
                                            @include('dashboard.partials._errors', ['input' => 'quantity'])
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions right">
                                    <button type="submit" class="btn btn-primary">
                                        {{trans('dashboard.product.Edit Product')}}
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.min.js"></script>
    <script src="{{ asset('dashboard_files/assets/js/image-preview-2.js') }}"></script>
@endsection
