@extends('web.layouts.app')
@section('title', trans('dashboard.main.FAQ'))
@section('content')
    <div class="about-us faqs-section">
        <div class="container">
            <h3>
                {{__('dashboard.main.FAQ')}}
            </h3>
            <div class="faqs">
                @foreach($faqs as $index => $faq)
                <div class="faq-up">
                    <div class="faq-qu">
                        <i class="fas fa-caret-down"></i>
                        {!!  $faq->question !!}
                    </div>
                    <div>
                        <div class="faq-an">
                            {!!  $faq->answer !!}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
