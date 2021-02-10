@extends('web.layouts.app')
@section('title', trans('site.Notification'))
@section('content')

    <div class="text-section">
        <img class="line" src="images/flower.png" style="opacity: 0">
        <div class="container">
            @foreach($notifications as $notification)
                <div class="notices">
                    <div>
                        <img src="{{ asset('web_files/images/notices.png') }}" >
                        <div class="text-n">
                            <p>
                                @if($notification->type == 'App\Notifications\RejectOrder' ||$notification->type == 'App\Notifications\DeliveredOrder' ||$notification->type == 'App\Notifications\AcceptOrder')
                                    {{ trans("site." . $notification->data['data']) }}
                                @else
                                    {{ $notification->data['data'] }}
                                @endif
                            </p>
                            <span>{{ ($notification->created_at) ? $notification->created_at->diffForHumans() : '' }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
