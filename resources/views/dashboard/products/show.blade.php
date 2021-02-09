@extends('dashboard.layouts.app')
@section('title', trans('dashboard.main.Show'))
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
                            <li class="breadcrumb-item active">{{ trans('dashboard.main.Show') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        @include('dashboard.partials._alert')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-content collpase show">
                        <div class="card-body">
                            <!-- form start -->
                            <form class="form-horizontal" method="post"
                                  {{--                                  action="{{ route('dashboard.products.update', $product) }}"--}}
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @foreach(config('app.languages') as $key => $language)
                                    <div class="form-body">
                                        <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label class="col-md-2"
                                                   for="name">{{ trans('dashboard.main.Name In '.$language)}}</label>
                                            <div class="col-md-10">
                                                {{--                                                <div><input type="text" id="name" class="form-control"--}}
                                                {{--                                                            placeholder="{{trans("dashboard.category.Name")}}"--}}
                                                {{--                                                            name="{{$key}}[name]"--}}
                                                {{--                                                            value="{{ $product->translate($key)->name }}"/>--}}
                                                {{--                                                    @include('dashboard.partials._errors', ['input' => "$key.name"])--}}
                                                {{--                                                    <div class="form-control-position">--}}
                                                <p>{!! $product->name !!}</p>
                                                {{--                                                    </div>/--}}
                                                {{--                                                </div>--}}
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
                                                {{--                                                <input id="{{$key}}.description" type="hidden"--}}
                                                {{--                                                       name="{{$key}}[description]" readonly--}}
                                                {{--                                                       value="{{ $product->translate($key)->description }}"/>--}}
                                                {{--                                                <trix-editor input="{{$key}}.description"></trix-editor>--}}
                                                {{--                                                @include('dashboard.partials._errors', ['input' => "$key.description"])--}}
                                                <p>{!! $product->translate($key)->description !!}</p>
                                                {{--                                                <div class="form-control-position">--}}
                                                {{--                                                </div>--}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="form-body">
                                    <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label class="col-md-2"
                                               for="name">{{ trans('dashboard.product.Category')}}</label>
                                        <div class="col-md-10">
                                            <p>{{ $product->category->name }}</p>
                                        </div>
                                    </div>

                                    <div class="form-group row image-contain">
                                        <div class="col-md-2"></div>

                                        @foreach($product->images as $image)
                                            <div class="m-1 image-preview">
                                                <img src="{{ asset('assets/uploads/products/' . $image->path) }}"
                                                     alt="Image" class="image-preview" width="100">
                                            </div>
                                        @endforeach
                                    </div>


                                    <div class="form-group row {{ $errors->has('price') ? ' has-error' : '' }}">
                                        <label class="col-md-2" for="price">{{trans('dashboard.product.Price')}}</label>
                                        <div class="col-md-10">
                                            <div class="position-relative has-icon-left">
                                                <input type="number" id="price" class="form-control" readonly
                                                       name="price" value="{{  $product->price }}"/>
                                                @include('dashboard.partials._errors', ['input' => 'price'])
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row {{ $errors->has('quantity') ? ' has-error' : '' }}">
                                        <label class="col-md-2"
                                               for="quantity">{{trans('dashboard.product.quantity')}}</label>
                                        <div class="col-md-10">
                                            <div class="position-relative has-icon-left">
                                                <input type="number" id="quantity" class="form-control" readonly
                                                       name="quantity" value="{{ $product->quantity }}"/>
                                                @include('dashboard.partials._errors', ['input' => 'quantity'])
                                            </div>
                                        </div>
                                    </div>
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
    <script src="{{ asset('dashboard_files/assets/js/image-review.js') }}"></script>
@endsection
