@extends('frontend.layouts.app')
@section('title', 'Transaction')
@section('content')
<div class="notification">
    <div class="card text-center">
        <div class="card-body">
            <div>
                <img src="{{asset('img/notification.png')}}" alt="Notification Image" style="width: 240px;">
            </div>
            <h6>{{$notification->data['title']}}</h6>
            <p class="mb-1">{{$notification->data['message']}}</p>
            <p><small class="text-muted">{{Carbon\Carbon::parse($notification->created_at)->format('Y-m-d h:i:s A')}}</small></p>
            <a href="{{$notification->data['web_link']}}" class="btn btn-theme btn-sm">Continue</a>
        </div>
    </div>
</div>
@endsection