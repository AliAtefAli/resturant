@extends('web.layouts.app')

@section('content')

    <div class="text-section">
        <img class="line" src="images/flower.png">
        <div class="container">
            @foreach($notifications as $notification)
                <div class="notices">
                    <div>
                        <img src="{{ asset('web_files/images/notices.png') }}">
                            <div class="text-n">
                                <p>
                                    {!! $notification->data['data'] !!}
                                </p>
                                <span>{{ ($notification->created_at) ? $notification->created_at->diffForHumans() : '' }}</span>
                            </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
