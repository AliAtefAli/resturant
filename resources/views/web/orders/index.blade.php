@extends('web.layouts.app')

@section('content')

    <div class="user-section">
        @include('web._sidebar')
    <div class="user-info">
        <div class="table-sta table-responsive">
            <table>
                <thead>
                <tr>
                    <th>
                        رقم الطلب
                    </th>
                    <th>
                        اسم الباقة
                    </th>
                    <th>
                        عدد الاشخاص
                    </th>
                    <th>
                        تاريخ الطلب
                    </th>
                    <th>
                        طريقة الدفع
                    </th>
                    <th>
                        سعر الباقة
                    </th>
                    <th>
                        سعر التوصيل
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        1234
                    </td>
                    <td>
                        شهرى
                    </td>
                    <td>
                        2
                    </td>
                    <td>
                        23/7/2543
                    </td>
                    <td>
                        كاش
                    </td>
                    <td>
                        سعر الباقة
                    </td>
                    <td>
                        سعر التوصيل
                    </td>
                </tr>
                <tr>
                    <td>
                        1234
                    </td>
                    <td>
                        شهرى
                    </td>
                    <td>
                        2
                    </td>
                    <td>
                        23/7/2543
                    </td>
                    <td>
                        كاش
                    </td>
                    <td>
                        سعر الباقة
                    </td>
                    <td>
                        سعر التوصيل
                    </td>
                </tr>
                <tr>
                    <td>
                        1234
                    </td>
                    <td>
                        شهرى
                    </td>
                    <td>
                        2
                    </td>
                    <td>
                        23/7/2543
                    </td>
                    <td>
                        كاش
                    </td>
                    <td>
                        سعر الباقة
                    </td>
                    <td>
                        سعر التوصيل
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--End User-->
<!--Start Our Meal-->

    <div class="our-meal">
        <div class="container">
            <h2 class="header-section wow zoomIn">
                من وجباتنا
            </h2>
            <div class="owl-carousel owl-theme our-meal-slider">
                <a href="#" class="item wow fadeInDown" style="background-image: url('{{asset('web_files/images/89279fe7-4668-42ac-83e9-995e7a8265f6.png')}}')"></a>
                <a href="#" class="item wow fadeInDown" style="background-image: url('{{asset('web_files/images/89279fe7-4668-42ac-83e9-995e7a8265f6.png')}}')"></a>
                <a href="#" class="item wow fadeInDown" style="background-image: url('{{asset('web_files/images/89279fe7-4668-42ac-83e9-995e7a8265f6.png')}}')"></a>
                <a href="#" class="item wow fadeInDown" style="background-image: url('{{asset('web_files/images/89279fe7-4668-42ac-83e9-995e7a8265f6.png')}}')"></a>
                <a href="#" class="item wow fadeInDown" style="background-image: url('{{asset('web_files/images/89279fe7-4668-42ac-83e9-995e7a8265f6.png')}}')"></a>
                <a href="#" class="item wow fadeInDown" style="background-image: url('{{asset('web_files/images/89279fe7-4668-42ac-83e9-995e7a8265f6.png')}}')"></a>
                <a href="#" class="item wow fadeInDown" style="background-image: url('{{asset('web_files/images/89279fe7-4668-42ac-83e9-995e7a8265f6.png')}}')"></a>
            </div>
        </div>
    </div>

<!--End Our Meal-->


@endsection