@extends('dashboard.layouts.app')
@section('title', trans('dashboard.order.Today Orders'))
@section('styles')
    @if(app()->getLocale() == 'ar')
        <style>
            .dataTables_wrapper .row {
                min-height: 55px;
            }
            div.dataTables_wrapper div.dataTables_filter {
                text-align: left;
                position: absolute  ;
                left: 840px;
                bottom: 5px;
                z-index: 3;
            }

            #DataTables_Table_0_length {
                z-index: 2;
                position: absolute;
                right: 865px;
                bottom: 15px;
            }

        </style>
    @endif
@endsection
@section('content')

    <!--content wrapper -->
    <div class="content-wrapper">
        <!--content header -->
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">{{trans('dashboard.main.orders')}}</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">{{trans('dashboard.main.home')}}</a>
                            </li>
                            <li class="breadcrumb-item active">{{trans('dashboard.order.Today Orders')}}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of content header -->

        <!--content body -->
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
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>{{trans('dashboard.order.payment method')}}</th>
                                                        <th>{{trans('dashboard.order.Order date')}}</th>
                                                        <th>{{trans('dashboard.order.address')}}</th>
                                                        <th>{{trans('dashboard.main.status')}}</th>
                                                        <th>{{trans('dashboard.order.Total Price')}}</th>
                                                        <th>{{ trans('dashboard.main.Actions') }}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($orders as $order)
                                                        <tr>
                                                            <td>{{ $order->id }}</td>
                                                            <td>{{ __("dashboard.order.$order->payment_method") }}</td>
                                                            <td>{{ ( $order->created_at) ? $order->created_at->diffForHumans()  : '' }}</td>
                                                            <td>{{ $order->billing_address }}</td>
                                                            <td>{{ __("dashboard.order.$order->order_status") }}</td>
                                                            <td>{{ $order->billing_total }}</td>
                                                            <td>
                                                                @if($order->order_status ==  'processing'  || $order->order_status ==  'accepted')
                                                                    <div class="col-sm-3 col-6">
                                                                        <div class="btn-group mr-1 mb-1">
                                                                            <button type="button"
                                                                                    class="btn btn-success btn-sm dropdown-toggle"
                                                                                    data-toggle="dropdown"
                                                                                    aria-haspopup="true"
                                                                                    aria-expanded="false">
                                                                            </button>

                                                                            <div class="dropdown-menu arrow">
                                                                                @if($order->order_status ==  'accepted')
                                                                                    <a href="{{ route('dashboard.orders.delivered', $order) }}">
                                                                                        <button
                                                                                            class="btn btn-primary  dropdown-item"
                                                                                            title="{{ trans('dashboard.order.Make as shipped') }}">
                                                                                            {{ trans('dashboard.order.Make as shipped') }}</button>
                                                                                    </a>
                                                                                @elseif($order->order_status ==  'processing')
                                                                                    <a href="{{ route('dashboard.orders.accepted', $order) }}">
                                                                                        <button
                                                                                            class="btn btn-info  dropdown-item"
                                                                                            title="{{ trans('dashboard.order.Make as In Progress') }}">
                                                                                            {{ trans('dashboard.order.Make as In Progress') }}</button>
                                                                                    </a>
                                                                                    <a href="{{ route('dashboard.orders.delivered', $order) }}">
                                                                                        <button
                                                                                            class="btn btn-primary  dropdown-item"
                                                                                            title="{{ trans('dashboard.order.Make as shipped') }}">
                                                                                            {{ trans('dashboard.order.Make as shipped') }}</button>
                                                                                    </a>
                                                                                    <a href="{{ route('dashboard.orders.rejected', $order) }}">
                                                                                        <button
                                                                                            class="btn btn-danger  dropdown-item"
                                                                                            title="{{ trans('dashboard.order.Make as Rejected') }}">
                                                                                            {{ trans('dashboard.order.Make as Rejected') }}</button>
                                                                                    </a>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
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
                        <!--/ HTML5 export buttons table -->
                    </div>
                </div>
            </section>
            <!--/ Description -->
        </div>
        <!--end of content body -->
    </div>
    <!--end of content wrapper -->

@endsection
@section('scripts')
    @if(lang() === 'ar')
        <script>
            $(document).ready(function () {

                var table = $('.table').DataTable([{
                    language: {

                        "sEmptyTable": "ليست هناك بيانات متاحة في الجدول",
                        "sLoadingRecords": "جارٍ التحميل...",
                        "sProcessing": "جارٍ التحميل...",
                        "sLengthMenu": "أظهر _MENU_ مدخلات",
                        "sZeroRecords": "لم يعثر على أية سجلات",
                        "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                        "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                        "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                        "sSearch": "ابحث:",
                        "oPaginate": {
                            "sFirst": "الأول",
                            "sPrevious": "السابق",
                            "sNext": "التالي",
                            "sLast": "الأخير"
                        },
                        "oAria": {
                            "sSortAscending": ": تفعيل لترتيب العمود تصاعدياً",
                            "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
                        },
                        "select": {
                            "rows": {
                                "_": "%d قيمة محددة",
                                "0": "",
                                "1": "1 قيمة محددة"
                            }
                        },
                        "buttons": {
                            "print": "طباعة",
                            "colvis": "الأعمدة الظاهرة",
                            "copy": "نسخ إلى الحافظة",
                            "copyTitle": "نسخ",
                            "copyKeys": "زر <i>ctrl</i> أو <i>\u2318</i> + <i>C</i> من الجدول<br>ليتم نسخها إلى الحافظة<br><br>للإلغاء اضغط على الرسالة أو اضغط على زر الخروج.",
                            "copySuccess": {
                                "_": "%d قيمة نسخت",
                                "1": "1 قيمة نسخت"
                            },
                            "pageLength": {
                                "-1": "اظهار الكل",
                                "_": "إظهار %d أسطر"
                            }
                        }
                    },
                }]);

                new $.fn.dataTable.Buttons(table, {
                    buttons: [
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        'colvis'
                    ],
                    columnDefs: [ {
                        targets: -1,
                        visible: false
                    } ],
                });
                table.buttons(0, null).container().prependTo(
                    table.table().container()
                );
                var eventsTable = $('.dom-jQuery-events').DataTable();
            });
        </script>
    @else
        <script>
            // $('.table').addClass('dom-jQuery-events');
            $(document).ready(function () {

                var table = $('.table').DataTable();

                new $.fn.dataTable.Buttons(table, {
                    language: {
                        "emptyTable": "No data available in table",
                        "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                        "infoEmpty": "Showing 0 to 0 of 0 entries",
                        "infoFiltered": "(filtered from _MAX_ total entries)",
                        "infoThousands": ",",
                        "lengthMenu": "Show _MENU_ entries",
                        "loadingRecords": "Loading...",
                        "processing": "Processing...",
                        "search": "Search:",
                        "zeroRecords": "No matching records found",
                        "thousands": ",",
                        "paginate": {
                            "first": "First",
                            "last": "Last",
                            "next": "Next",
                            "previous": "Previous"
                        },
                        "aria": {
                            "sortAscending": ": activate to sort column ascending",
                            "sortDescending": ": activate to sort column descending"
                        },
                        "autoFill": {
                            "cancel": "Cancel",
                            "fill": "Fill all cells with <i>%d<\/i>",
                            "fillHorizontal": "Fill cells horizontally",
                            "fillVertical": "Fill cells vertically"
                        },
                        "buttons": {
                            "collection": "Collection <span class='ui-button-icon-primary ui-icon ui-icon-triangle-1-s'\/>",
                            "colvis": "Column Visibility",
                            "colvisRestore": "Restore visibility",
                            "copy": "Copy",
                            "copyKeys": "Press ctrl or u2318 + C to copy the table data to your system clipboard.<br><br>To cancel, click this message or press escape.",
                            "copySuccess": {
                                "1": "Copied 1 row to clipboard",
                                "_": "Copied %d rows to clipboard"
                            },
                            "copyTitle": "Copy to Clipboard",
                            "csv": "CSV",
                            "excel": "Excel",
                            "pageLength": {
                                "-1": "Show all rows",
                                "1": "Show 1 row",
                                "_": "Show %d rows"
                            },
                            "pdf": "PDF",
                            "print": "Print"
                        },
                        "searchBuilder": {
                            "add": "Add Condition",
                            "button": {
                                "0": "Search Builder",
                                "_": "Search Builder (%d)"
                            },
                            "clearAll": "Clear All",
                            "condition": "Condition",
                            "conditions": {
                                "date": {
                                    "after": "After",
                                    "before": "Before",
                                    "between": "Between",
                                    "empty": "Empty",
                                    "equals": "Equals",
                                    "not": "Not",
                                    "notBetween": "Not Between",
                                    "notEmpty": "Not Empty"
                                },
                                "moment": {
                                    "after": "After",
                                    "before": "Before",
                                    "between": "Between",
                                    "empty": "Empty",
                                    "equals": "Equals",
                                    "not": "Not",
                                    "notBetween": "Not Between",
                                    "notEmpty": "Not Empty"
                                },
                                "number": {
                                    "between": "Between",
                                    "empty": "Empty",
                                    "equals": "Equals",
                                    "gt": "Greater Than",
                                    "gte": "Greater Than Equal To",
                                    "lt": "Less Than",
                                    "lte": "Less Than Equal To",
                                    "not": "Not",
                                    "notBetween": "Not Between",
                                    "notEmpty": "Not Empty"
                                },
                                "string": {
                                    "contains": "Contains",
                                    "empty": "Empty",
                                    "endsWith": "Ends With",
                                    "equals": "Equals",
                                    "not": "Not",
                                    "notEmpty": "Not Empty",
                                    "startsWith": "Starts With"
                                },
                                "array": {
                                    "without": "Without",
                                    "notEmpty": "Not Empty",
                                    "not": "Not",
                                    "contains": "Contains",
                                    "empty": "Empty",
                                    "equals": "Equals"
                                }
                            },
                            "data": "Data",
                            "deleteTitle": "Delete filtering rule",
                            "leftTitle": "Outdent Criteria",
                            "logicAnd": "And",
                            "logicOr": "Or",
                            "rightTitle": "Indent Criteria",
                            "title": {
                                "0": "Search Builder",
                                "_": "Search Builder (%d)"
                            },
                            "value": "Value"
                        },
                        "searchPanes": {
                            "clearMessage": "Clear All",
                            "collapse": {
                                "0": "SearchPanes",
                                "_": "SearchPanes (%d)"
                            },
                            "count": "{total}",
                            "countFiltered": "{shown} ({total})",
                            "emptyPanes": "No SearchPanes",
                            "loadMessage": "Loading SearchPanes",
                            "title": "Filters Active - %d"
                        },
                        "select": {
                            "1": "%d row selected",
                            "_": "%d rows selected",
                            "cells": {
                                "1": "1 cell selected",
                                "_": "%d cells selected"
                            },
                            "columns": {
                                "1": "1 column selected",
                                "_": "%d columns selected"
                            }
                        }
                    },
                    buttons: [
                        {
                            extend: 'print',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        'colvis'
                    ],
                    columnDefs: [ {
                        targets: -1,
                        visible: false
                    } ],
                });
                table.buttons(0, null).container().prependTo(
                    table.table().container()
                );
                var eventsTable = $('.dom-jQuery-events').DataTable();
            });
        </script>
    @endif
@endsection

