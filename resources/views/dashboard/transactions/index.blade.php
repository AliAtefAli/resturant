@extends('dashboard.layouts.app')
@section('title', trans('dashboard.Transactions.Transactions'))
@section('content')

    <!--content wrapper -->
    <div class="content-wrapper">
        <!--content header -->
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h1 class="content-header-title">{{trans('dashboard.Transactions.Transactions')}}</h1>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.home')}}">{{trans('dashboard.main.home')}}</a>
                            </li>
                            <li class="breadcrumb-item active">{{trans('dashboard.Transactions.Transactions')}}
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
                                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                                </ul>

                                            </div>
                                        </div>
                                        <div class="card-content collapse show">
                                            <div class="card-body card-dashboard">
                                                <table class="table table-striped table-bordered ">
                                                    <thead>
                                                    <tr>
                                                        <th>{{trans('dashboard.Transactions.Transaction id')}}</th>
                                                        <th>{{trans('dashboard.Transactions.User')}}</th>
                                                        <th>{{trans('dashboard.Transactions.Payment Method')}}</th>
                                                        <th>{{trans('dashboard.Transactions.Amount')}}</th>
                                                        <th>{{trans('dashboard.Transactions.Transaction type')}}</th>
                                                        <th>{{trans('dashboard.Transactions.Type')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($transactions as $transaction)
                                                        <tr>
                                                            <td>{{ $transaction->transaction_id }}</td>
                                                            <td>{{ $transaction->user->name }}</td>
                                                            <td>{{ $transaction->payment_method }}</td>
                                                            <td>{{ $transaction->amount }}</td>
                                                            <td>{{ $transaction->transactionable_type }}</td>
                                                            <td>{{ $transaction->transactionable_id }}</td>
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
        $('.modal').on('show', function () {
            $('this').$('form-actions').focus();
        });
    </script>
@endsection
