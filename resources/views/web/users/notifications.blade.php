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
                                @if($notification->type == 'App\Notifications\AcceptSubscription' ||$notification->type == 'App\Notifications\DeliveredSubscription' ||$notification->type == 'App\Notifications\RejectSubscription'||$notification->type == 'App\Notifications\NewSubscriptions')
                                    {{ trans("dashboard.order." . $notification->data['data']) }}
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
