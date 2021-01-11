@extends('web.layouts.app')

@section('content')


    <!--Start tabal cart-->

    <div class="tabal-cart">
        <img src="{{asset('web_files/images/flower.png')}}" class="line-shep"/>
        <div class="container">
            <div class="small-container table-responsive">
                <table>
                    <thead>
                    <tr>
                        <th>

                        </th>
                        <th>
                                <span>
                                صورة المنتج
                                </span>
                        </th>
                        <th>
                                <span>
                                اسم المنتج
                                </span>
                        </th>
                        <th>
                                <span>
                                العنوان
                                </span>
                        </th>
                        <th>
                                <span>
                                السعر
                                    </span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="remove-product">
                            <i class="fas fa-times"></i>
                        </td>
                        <td class="product-img">
                            <div>
                                <div class="img">
                                    <img src="{{asset('web_files/images/4207074.png')}}">
                                </div>
                            </div>
                        </td>
                        <td class="product-name">
                            <h3>
                                اسم المنتج
                            </h3>
                        </td>
                        <td class="product-address">
                            <h3>
                                جدة - شارع المستشار
                            </h3>
                        </td>
                        <td class="product-price">
                            <h3>
                                100 رس
                            </h3>
                        </td>
                    </tr>
                    <tr>
                        <td class="remove-product">
                            <i class="fas fa-times"></i>
                        </td>
                        <td class="product-img">
                            <div>
                                <div class="img">
                                    <img src="{{asset('web_files/images/4207074.png')}}">
                                </div>
                            </div>
                        </td>
                        <td class="product-name">
                            <h3>
                                اسم المنتج
                            </h3>
                        </td>
                        <td class="product-address">
                            <h3>
                                جدة - شارع المستشار
                            </h3>
                        </td>
                        <td class="product-price">
                            <h3>
                                100 رس
                            </h3>
                        </td>
                    </tr>
                    <tr>
                        <td class="remove-product">
                            <i class="fas fa-times"></i>
                        </td>
                        <td class="product-img">
                            <div>
                                <div class="img">
                                    <img src="{{asset('web_files/images/4207074.png')}}">
                                </div>
                            </div>
                        </td>
                        <td class="product-name">
                            <h3>
                                اسم المنتج
                            </h3>
                        </td>
                        <td class="product-address">
                            <h3>
                                جدة - شارع المستشار
                            </h3>
                        </td>
                        <td class="product-price">
                            <h3>
                                100 رس
                            </h3>
                        </td>
                    </tr>
                    <tr>
                        <td class="remove-product">
                            <i class="fas fa-times"></i>
                        </td>
                        <td class="product-img">
                            <div>
                                <div class="img">
                                    <img src="{{asset('web_files/images/4207074.png')}}">
                                </div>
                            </div>
                        </td>
                        <td class="product-name">
                            <h3>
                                اسم المنتج
                            </h3>
                        </td>
                        <td class="product-address">
                            <h3>
                                جدة - شارع المستشار
                            </h3>
                        </td>
                        <td class="product-price">
                            <h3>
                                100 رس
                            </h3>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!--End tabal cart-->
    <!--Start Line-->

    <div class="line-section line-section1">
        <div class="container">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <!--End Line-->
    <div class="info-pro-cart-section">
        <div class="container">
            <div class="info-pro-cart">
                <div>
                    <div>
                            <span>
                                سعر التوصيل
                            </span>
                    </div>
                    <div>
                            <span>
                                15 ر.س
                            </span>
                    </div>
                </div>
                <div>
                    <div>
                            <span>
                                المجموع
                            </span>
                    </div>
                    <div>
                            <span>
                                1000 ريال سعودي
                            </span>
                    </div>
                </div>
            </div>
            <p class="cape-shop">
                هل تود إتمام الشراء؟
            </p>
        </div>
    </div>
    <div class="last-part small-container">
        <div class="container">
            <p>
                هل لديك كوبون خصم؟
            </p>
            <form class="offer">
                <input type="text" placeholder="كوبون الخصم">
                <button type="submit">
                    تفعيل
                </button>
            </form>
            <p>
                طريقة الدفع
            </p>
            <form class="finsh-requet">
                <div>
                    <label>
                        <input type="radio" name="pay-way">
                        <span></span>
                        الدفع ببطاقات الائتمان
                    </label>
                </div>
                <div>
                    <label>
                        <input type="radio" name="pay-way">
                        <span></span>
                        الدفع عند الاستلام
                    </label>
                </div>
                <button type="submit">
                    إتمام الطلب
                </button>
            </form>
        </div>
    </div>

@endsection