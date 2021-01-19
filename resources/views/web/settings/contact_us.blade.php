@extends('web.layouts.app')

@section('content')

    <div class="contact-us-info">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="info-contact">
                        <div class="head">
                            <i class="fas fa-map-marker-alt"></i>
                            {{__('site.Address')}}
                        </div>
                        <p class="info">
                            المملكة العربية السعودية , الرياض
                        </p>
                        <div class="head">
                            <i class="fas fa-phone-volume"></i>
                            {{__('site.Phone')}}
                        </div>
                        <p class="info">
                            @if(isset($setting['phone']))
                                {{ $setting['phone'] }}
                            @endif
                        </p>
                        <div class="head">
                            <i class="fas fa-envelope"></i>
                            {{__('site.E-mail')}}
                        </div>
                        <p class="info">
                            @if(isset($setting['email']))
                                {{ $setting['email'] }}
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d13674.194668823182!2d31.388455949999997!3d31.038822000000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sar!2seg!4v1610010818365!5m2!1sar!2seg"
                            width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                            aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="over-to-shep">
        <img src="{{asset('web_files/images/flower.png')}}" class="line-shep"/>
        <form action="{{ route('sendMessage') }}" method="post" class="form-pic-select">
            @csrf
            <div class="container">
                <div class="pic-select pic-select-auth">
                    <p class="name-input">
                        {{__('site.Name')}}
                    </p>
                    <label class="input-style">
                        <input type="text" name="name">
                    </label>
                    <p class="name-input">
                        {{__('site.E-mail')}}
                    </p>
                    <label class="input-style">
                        <input type="email" name="email">
                    </label>
                    <p class="name-input">
                        {{__('site.Phone')}}
                    </p>
                    <label class="input-style">
                        <input type="tel" name="phone">
                    </label>
                    <p class="name-input">
                        {{__('site.Message Subject')}}
                    </p>
                    <label class="input-style">
                        <input type="text" name="message_subject">
                    </label>
                    <p class="name-input">
                        {{__('site.Message Content')}}
                    </p>
                    <label class="input-style">
                        <textarea name="message"></textarea>
                    </label>
                    <button class="btn-aaa" type="submit">
                        {{__('site.Send')}}
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection
