@extends('dashboard.layouts.app')
@section('content')

    <!--content wrapper -->
    <div class="content-wrapper">
        <!--content header -->
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h1 class="content-header-title">{{trans('dashboard.main.Sliders')}}</h1>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.home')}}">{{trans('dashboard.main.home')}}</a>
                            </li>
                            <li class="breadcrumb-item active">{{trans('dashboard.main.Sliders')}}
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
                                                    <li><a href="{{ route('dashboard.sliders.create') }}"
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
                                                <table class="table table-striped table-bordered dom-jQuery-events">
                                                    <thead>
                                                    <tr>
                                                        <th>{{trans('dashboard.slider.Image')}}</th>
                                                        <th>{{trans('dashboard.slider.Url')}}</th>
                                                        <th>{{trans('dashboard.slider.Order')}}</th>
                                                        <th>{{trans('dashboard.slider.Status')}}</th>
                                                        <th>{{trans('dashboard.main.Actions')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($sliders as $slider)
                                                        <tr>
                                                            <td><img src="{{ asset('assets/uploads/sliders/' . $slider->image ) }}" width="150" alt=""></td>
                                                            <td><a href="{{ url($slider->url) }}">{{ $slider->url }}</a></td>
                                                            <td>{{ $slider->ordered }}</td>
                                                            <td>{{ $slider->status }}</td>
                                                            <td>
                                                                <a href="{{ route('dashboard.sliders.edit', $slider) }}"
                                                                   class="btn btn-info btn-sm"
                                                                   title="{{ trans('dashboard.main.Edit') }}">
                                                                    <i class="ft-edit"></i>
                                                                </a>
                                                                @if($slider->status == 'active')
                                                                    <a href="{{ route('dashboard.sliders.makeAsPending', $slider) }}"
                                                                       class="btn btn-outline-success btn-sm">
                                                                        {{ trans('dashboard.slider.Pending') }}
                                                                    </a>
                                                                @else
                                                                    <a href="{{ route('dashboard.sliders.makeAsActive', $slider) }}"
                                                                       class="btn btn-success btn-sm">
                                                                        {{ trans('dashboard.slider.Active') }}
                                                                    </a>
                                                                @endif
                                                                <form
                                                                    action="{{ route('dashboard.sliders.destroy', $slider) }}"
                                                                    id="delete-confirm" method="post"
                                                                    style="display: inline-block">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                            class="btn btn-danger btn-sm"
                                                                            id="confirm-text"><i
                                                                            class="ft-trash-2"></i>
                                                                    </button>
                                                                </form>
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
