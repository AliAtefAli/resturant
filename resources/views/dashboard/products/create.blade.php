@extends('dashboard.layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.min.css">
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
                            <li class="breadcrumb-item active">{{ trans('dashboard.product.Add Product') }}</li>
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
                            <form class="form-horizontal" method="post" action="{{ route('dashboard.products.store') }}"  enctype="multipart/form-data">
                                @csrf
                                @foreach(config('app.languages') as $key => $language)
                                    <div class="form-body">
                                        <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label class="col-md-2"
                                                   for="{{$key}}name">{{ trans('dashboard.main.Name In '.$language)}}</label>
                                            <div class="col-md-10">
                                                <div><input type="text" id="{{$key}}name" class="form-control"
                                                            placeholder="{{trans("dashboard.product.Name")}}"
                                                            name="{{$key}}[name]" value="{{ old("$key.name") }}"/>
                                                    @include('dashboard.partials._errors', ['input' => 'name'])
                                                    <div class="form-control-position">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                @foreach(config('app.languages') as $key => $language)
                                    <div class="form-body">
                                        <div class="form-group row {{ $errors->has('description') ? ' has-error' : '' }}">
                                            <label class="col-md-2"
                                                   for="{{$key}}.description">{{ trans('dashboard.product.Product Details In ' . $language) }}</label>
                                            <div class="col-md-10">
                                                <input id="{{$key}}.description" type="hidden"
                                                       name="{{$key}}[description]"
                                                       value="{{ old("$key.description") }}"/>
                                                <trix-editor input="{{$key}}.description"></trix-editor>
                                                @include('dashboard.partials._errors', ['input' => 'description'])
                                                <div class="form-control-position">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="form-body">
                                    <div class="form-group row {{ $errors->has('category_id') ? ' has-error' : '' }}">
                                        <label class="col-md-2"
                                               for="category_id">{{ trans('dashboard.product.Category')}}</label>
                                        <div class="col-md-10">
                                            <select class="custom-select" name="category_id">
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row {{ $errors->has('image') ? ' has-error' : '' }}">
                                    <label class="col-md-2" for="image">{{trans('dashboard.product.Image')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative has-icon-left">
                                            <input type="file" id="image" class="form-control image"
                                                   name="image[]" multiple/>
                                            @include('dashboard.partials._errors', ['input' => 'image'])
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row {{ $errors->has('price') ? ' has-error' : '' }}">
                                    <label class="col-md-2" for="price">{{trans('dashboard.product.Price')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative">
                                            <input type="float" id="price" class="form-control"
                                                   name="price" value="{{ old('price') }}"/>
                                            @include('dashboard.partials._errors', ['input' => 'price'])
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row {{ $errors->has('quantity') ? ' has-error' : '' }}">
                                    <label class="col-md-2" for="quantity">{{trans('dashboard.product.Quantity')}}</label>
                                    <div class="col-md-10">
                                        <div class="position-relative">
                                            <input type="number" id="quantity" class="form-control"
                                                   name="quantity" value="{{ old('quantity') }}"/>
                                            @include('dashboard.partials._errors', ['input' => 'quantity'])
                                        </div>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group row {{ $errors->has('featured') ? ' has-error' : '' }}">
                                        <label class="col-md-2"
                                               for="featured">{{ trans('dashboard.product.Status')}}</label>
                                        <div class="col-md-10">
                                            <select class="custom-select" name="featured">
                                                    <option value="1">{{ trans('dashboard.product.Featured') }}</option>
                                                    <option value="0">{{ trans('dashboard.product.Original') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions right">
                                    <button type="submit" class="btn btn-primary">
                                        {{trans('dashboard.product.Add Product')}}
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
@endsection
