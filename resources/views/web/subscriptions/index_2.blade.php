@extends('web.layouts.app')

@section('content')

    <div class="header-pic">
        <div class="container">
            <div class="img" style="background-image: url('{{asset('web_files/images/healthy-food-bowl.jpg')}}')">
                <div class="overlay"></div>
                <h3>يومى</h3>
            </div>
        </div>
    </div>
    <div class="over-to-shep">
        <img src="{{asset('web_files/images/flower.png')}}" class="line-shep"/>
        <form class="form-pic-select">
            <div class="container">
                <div class="pic-select">
                    <p class="name-input">
                        تحديد تاريخ بداية الباقة
                    </p>
                    <label class="input-style">
                        <input type="text">
                        <i class="far fa-calendar-alt"></i>
                    </label>
                    <div class="select-hh">
                        <label>
                            <input class="local-global" type="radio" name="aa" value="local">
                            <span></span>
                            محلى
                        </label>
                        <label>
                            <input class="local-global" type="radio" name="aa" value="global">
                            <span></span>
                            توصيل(10)ر.س
                        </label>
                    </div>
                    <div class="hide-section">
                        <p class="name-input">
                            العنوان
                        </p>
                        <label class="input-style">
                            <input type="text">
                            <i class="fas fa-map-marker-alt"></i>
                        </label>
                        <p class="name-input">
                            رقم جوال اضافى
                        </p>
                        <label class="input-style">
                            <input type="tel">
                        </label>
                    </div>
                    <p class="name-input">
                        طريقة الدفع
                    </p>
                    <div class="select-hh">
                        <label>
                            <input type="radio" name="aa">
                            <span></span>
                            الدفع ببطاقات الائتمان
                        </label>
                        <label>
                            <input type="radio" name="aa">
                            <span></span>
                            الدفع عند الاستلام
                        </label>
                    </div>
                    <p class="name-input">
                        ملاحظات
                    </p>
                    <textarea></textarea>
                </div>
                <button class="btn-aaa" type="submit">
                    إتمام الطلب
                </button>
            </div>
        </form>
    </div>

@endsection
