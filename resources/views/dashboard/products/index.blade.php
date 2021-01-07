@extends('dashboard.layouts.app')


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
                            <li class="breadcrumb-item active">{{trans('dashboard.product.Products')}}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        @include('dashboard.partials._alert')
        <div class="content-body">
            <!-- Description -->
            <section id="description" class="card">
                <div class="card-content">
                    <div class="card-body">
                        <!-- HTML5 export buttons table -->
                        <section id="dom">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="heading-elements-toggle"><i
                                                    class="la la-ellipsis-v font-medium-3"></i></a>
                                            <div class="heading-elements">
                                                <ul class="list-inline mb-0">
                                                    <li><a href="{{ route('dashboard.products.create') }}"
                                                           class="btn btn-success btn-sm mr-1"><i
                                                                class="ft-plus-circle"></i> {{trans('dashboard.main.Create')}}
                                                        </a>
                                                    </li>
                                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                                </ul>

                                            </div>
                                        </div>
                                        <div class="card-content collapse show">
                                            <div class="card-body card-dashboard">
                                                <table
                                                    class="table table-striped table-bordered dom-jQuery-events text-center">
                                                    <thead>
                                                    <tr>
                                                        <th>{{trans('dashboard.product.Name')}}</th>
                                                        <th>{{trans('dashboard.product.Price')}}</th>
                                                        <th>{{trans('dashboard.product.Quantity')}}</th>
                                                        <th>{{trans('dashboard.product.Status')}}</th>
                                                        <th>{{trans('dashboard.main.Actions')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($products as $product)
                                                        <tr>
                                                            <td>{{ $product->name }}</td>
                                                            <td>{{ $product->price }}</td>
                                                            <td>{{ $product->quantity }}</td>
                                                            <td>@if($product->featured) <i class="ft-star"></i> @endif
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('dashboard.products.edit', $product) }}"
                                                                   class="btn btn-info btn-sm" title="">
                                                                    <i class="ft-edit"></i>
                                                                </a>
                                                                @if($product->featured)
                                                                    <a href="{{ route('dashboard.products.unFeatured', $product) }}"
                                                                       class="btn btn-success btn-sm" title="">
                                                                        <i class="ft-star"></i>
                                                                    </a>
                                                                @else
                                                                    <a href="{{ route('dashboard.products.featured', $product) }}"
                                                                       class="btn btn-outline-success btn-sm" title="">
                                                                        <i class="ft-star"></i>
                                                                    </a>
                                                                @endif
                                                                <a href="#" data-toggle="modal"
                                                                   data-target="#delete-product-{{$product->id}}"
                                                                   class="btn btn-danger btn-sm" title="">
                                                                    <i class="ft-trash-2"></i>
                                                                </a>
                                                                <div class="modal fade  custom-imodal"
                                                                     id="delete-product-{{$product->id}}"
                                                                     tabindex="-1" role="dialog"
                                                                     aria-labelledby="exampleModalLabel"
                                                                     aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">{{ trans('dashboard.main.delete') }}</h5>
                                                                                <button type="button" class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                    <span
                                                                                        aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body custom-addpro">
                                                                                <div class="contact-page">
                                                                                    <form action="{{ route('dashboard.products.destroy', $product->id) }}"
                                                                                          method="post">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                        <h2>  {{ trans('dashboard.product.Do you want to delete this product') }} </h2>

                                                                                        <div class="form-actions right">
                                                                                            <button type="submit" class="btn btn-danger">
                                                                                                {{trans('dashboard.main.delete')}}
                                                                                            </button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $(document).on('click', '.delete', function (e) {
            e.preventDefault();
            var id = $(this).attr('product_id');

            swal({
                title: 'Are you sure?',
                text: "you want to remove this record?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    token();

                    $.ajax({
                        url: 'dashboard/products/' + id,
                        method: 'DELETE',
                        success: function (result) {
                            if (result.success) {
                                refresh();
                                cleaner();
                                swal(
                                    'Deleted!',
                                    'Successfull Deleted!',
                                    'success'
                                );
                            }
                        }
                    });
                }
            });

        });
    </script>
@endsection
