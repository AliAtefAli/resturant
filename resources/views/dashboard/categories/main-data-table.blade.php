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
            } ,
        });
    </script>
@endif
