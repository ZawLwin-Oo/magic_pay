@extends('frontend.layouts.app')
@section('title', 'Wallet')
@section('content')
<div class="wallet">
    <div class="card my-card">
        <div class="card-body">
            <div>
                <span>Amount</span>
                <h4>{{ number_format(($authUser->wallet ? $authUser->wallet->amount : 0),2)}} <span>MMK</span></h4>
            </div>
            <div>
                <span>Account Number</span>
                <h5>{{ $authUser->wallet ? $authUser->wallet->account_number : '-' }}</h5>
            </div>
            <div>
                <p>{{ $authUser->name }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
