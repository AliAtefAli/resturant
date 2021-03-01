@extends('dashboard.layouts.app')
@section('title', trans('dashboard.main.Users'))
@section('content')
    @if(app()->getLocale() == 'ar')
        <style>
            .card-body
            {
                padding: 0; !important;
            }
            .dropToggle{
                width: auto;
                height: 30px;
                background-color: #28d094;
                border: 1px solid #28d094;
                color: #fff;
                border-radius: 5px;
            }
            .dropMenu{
                font-size: 12px;
            }
        </style>
    @endif
    <!--content wrapper -->
    <div class="content-wrapper">
        <!--content header -->
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h1>{{  trans('dashboard.main.Users') }}</h1>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.home')}}">{{trans('dashboard.main.home')}}</a></li>
                            <li class="breadcrumb-item active">{{ trans('dashboard.main.Users') }}</li>
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
                                                    <li><a href="{{ route('dashboard.users.create') }}" style="margin-top: 5px" class="btn btn-success btn-sm mr-1"><i
                                                                class="ft-plus-circle"></i> {{trans('dashboard.main.Create')}} </a>
                                                    </li>
                                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>

                                                </ul>

                                            </div>
                                        </div>
                                        <div class="card-content collapse show">
                                            <div class="card-body card-dashboard">
                                                <table class="table table-striped table-bordered" style="font-size: xx-small;">
                                                    <thead>
                                                    <tr>
                                                        <th>{{trans('dashboard.user.Name')}}</th>
                                                        <th>{{trans('dashboard.user.Email')}}</th>
                                                        <th>{{trans('dashboard.user.phone')}}</th>
                                                        <th>{{trans('dashboard.user.Status')}}</th>
                                                        <th>{{trans('dashboard.user.Last Active')}}</th>
                                                        <th>{{trans('dashboard.main.Actions')}}</th>
                                                        <th style="width: 50px;!important;">{{trans('dashboard.subscriptions.Add Subscription')}}</th>
                                                        <th style="width: 50px;!important;">{{trans('dashboard.subscriptions.All Subscriptions')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($users as $user)
                                                        <tr>
                                                            <td>{{ $user->name }}</td>
                                                            <td>{{ $user->email }}</td>
                                                            <td>{{ $user->phone }}</td>
                                                            <td>{{  trans('dashboard.'.$user->status) }}</td>
                                                            <td>{{ ($user->last_active_at)? $user->last_active_at->diffForHumans() : "" }}</td>
                                                            <td>
                                                                <a href="{{ route('dashboard.users.edit', $user) }}">
                                                                    <button class="btn btn-info btn-sm" title=""><i
                                                                            class="ft-edit"></i></button>
                                                                </a>
                                                                @if($user->status == 'active')
                                                                <a href="{{ route('dashboard.users.block', $user) }}"
                                                                     class="btn btn-outline-danger btn-sm" title="{{ __('dashboard.user.Block') }}">
                                                                    <i class="ft-lock"  aria-hidden="true"></i>
                                                                </a>
                                                                @else
                                                                <a href="{{ route('dashboard.users.unblock', $user) }}"
                                                                     class="btn btn-outline-success btn-sm" title="{{ __('dashboard.user.Un Block') }}">
                                                                    <i class="ft-unlock"  aria-hidden="true"></i>
                                                                </a>
                                                                @endif
                                                                <a href="#" data-toggle="modal"
                                                                   data-target="#delete-question-{{$user->id}}"
                                                                   class="btn btn-danger btn-sm" title="">
                                                                    <i class="ft-trash-2"></i>
                                                                </a>
                                                                <div class="modal fade  custom-imodal"
                                                                     id="delete-question-{{$user->id}}"
                                                                     tabindex="-1" role="dialog"
                                                                     aria-labelledby="exampleModalLabel"
                                                                     aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">{{ trans('dashboard.user.Delete user') }}</h5>
                                                                                <button type="button" class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                    <span
                                                                                        aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body custom-addpro">
                                                                                <div class="contact-page">
                                                                                    <form action="{{ route('dashboard.users.destroy', $user->id) }}"
                                                                                          method="post">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                        <h2>  {{ trans('dashboard.user.Do you want to delete this user') }} </h2>

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
                                                            <td>
                                                                <a href="{{ route('dashboard.users.select_subscribe', $user) }}">
                                                                    <button class="btn btn-warning btn-sm" title=""><i
                                                                                class="ft-book"></i></button>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button class="dropdown-toggle dropToggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        {{trans('dashboard.subscriptions.All Subscriptions')}}
                                                                    </button>

                                                                    <div class="dropdown-menu dropMenu" aria-labelledby="dropdownMenuLink">
                                                                        <a class="dropdown-item" href="{{ route('dashboard.users.activeSubs', $user) }}">{{trans('dashboard.subscriptions.active_subscriptions')}}</a>
                                                                        <a class="dropdown-item" href="{{ route('dashboard.users.stoppedSubs', $user) }}">{{trans('dashboard.subscriptions.stopped_subscriptions')}}</a>
                                                                        <a class="dropdown-item" href="{{ route('dashboard.users.finishedSubs', $user) }}">{{trans('dashboard.subscriptions.Finished Subscriptions')}}</a>
                                                                    </div>
                                                                </div>
{{--                                                                <a href="{{ route('dashboard.users.activeSubs', $user) }}">--}}
{{--                                                                    <button class="btn btn-info btn-sm" title=""><i--}}
{{--                                                                                class="ft-edit"></i></button>--}}
{{--                                                                </a>--}}
                                                            </td>
                                                    @endforeach
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
                $('.table').DataTable({
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
                });
            });

        </script>
    @else
        <script>
            // $('.table').addClass('dom-jQuery-events');
            var eventsTable = $('.dom-jQuery-events').DataTable();

            $('.table').DataTable({
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
            });
        </script>
    @endif
@endsection
