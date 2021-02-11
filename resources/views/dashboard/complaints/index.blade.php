@extends('dashboard.layouts.app')
@section('title', trans('dashboard.main.complaints'))
@section('content')

    <!--content wrapper -->
    <div class="content-wrapper">
        <!--content header -->
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h1 class="content-header-title">{{trans('dashboard.main.complaints')}}</h1>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="{{route('dashboard.home')}}">{{trans('dashboard.main.home')}}</a>
                            </li>
                            <li class="breadcrumb-item active">{{trans('dashboard.main.complaints')}}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of content header -->

    @include('dashboard.partials._alert')
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
                                                        <th>{{trans('dashboard.complaints.owner')}}</th>
                                                        <th>{{trans('dashboard.complaints.content')}}</th>
                                                        <th>{{trans('dashboard.complaints.The Answer')}}</th>
                                                        <th>{{trans('dashboard.main.Actions')}}</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($complaints as $index => $complaint)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ ($complaint->user->name) ?? '' }}</td>
                                                            <td>
                                                                <span style="font-size:12px;font-family:monospace;width:200px;word-break:break-all;word-wrap:break-word;">{{ $complaint->message }}</span>
                                                            </td>
                                                            <td>
                                                                <span style="font-size:12px;font-family:monospace;width:200px;word-break:break-all;word-wrap:break-word;">{{ $complaint->answer }}</span>
                                                            </td>
                                                            <td>
                                                                <div class="col-sm-3 col-6">
                                                                    <div class="btn-group mr-1 mb-1" style="font-size: 15px;">
                                                                        <div class="dropdown">
                                                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                {{ __('dashboard.main.Actions') }}
                                                                            </button>
                                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                                <a href="#" class="btn btn-success btn-sm dropdown-item" style="padding: 10px 0px;" data-toggle="modal" data-target="#replySMS-{{$complaint->id}}">{{ trans('dashboard.complaints.SMS Reply') }}</a>
                                                                                <a href="#" class="btn btn-primary btn-sm dropdown-item" style="padding: 10px 0px;" data-toggle="modal" data-target="#replyEmail-{{$complaint->id}}">{{ trans('dashboard.complaints.email Reply') }}</a>
                                                                                <a href="#" class="btn btn-secondary btn-sm dropdown-item" style="padding: 10px 0px;" data-toggle="modal" data-target="#replyNotification-{{$complaint->id}}">{{ trans('dashboard.complaints.Notification Reply') }}</a>
                                                                                <a href="{{ route('dashboard.complaint.show', $complaint) }}" class="btn btn-danger btn-sm dropdown-item" style="padding: 10px 0px;" title=""><i class="ft ft-eye"></i> {{ trans('dashboard.messages.show') }}</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        @include('dashboard.complaints.modal_reply_email')
                                                        @include('dashboard.complaints.modal_reply_notification')
                                                        @include('dashboard.complaints.modal_reply_SMS')
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
        <script>
            $('.modal').on('shown.bs.modal', function () {
                $('.answer').focus();
            })
        </script>
    @else
        @include('dashboard.categories.main-data-table')
        <script>
            $('.modal').on('shown.bs.modal', function () {
                console.log(this);
                $('.answer').focus();
            })
        </script>
    @endif
@endsection
