@extends('frontend.layouts.app')
@section('title', 'Magic Pay')
@section('content')
<div class="home">
    <div class="row">
        <div class="col-12">
            <div class="profile mb-3">
                <img src="https://ui-avatars.com/api/?background=5842E3&color=fff&name={{ $user->name }}" alt="Profile image">
                <h5 class="text-muted">{{$user->name}}</h5>
                <p>{{ number_format(($user->wallet ? $user->wallet->amount : 0), 2) }} <span class="text-muted">mmK</span></p>
            </div>
        </div>
        <div class="col-6">
            <a href="{{url('scan-and-pay')}}">
                <div class="card shortcut-box mb-3">
                    <div class="card-body p-3">
                        <img src="{{asset('img/qr-code-scan.png')}}" alt="Qr Scan">
                        <span>Scan & Pay</span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-6">
            <a href="{{url('receive-qr')}}">
                <div class="card shortcut-box mb-3">
                    <div class="card-body p-3">
                        <img src="{{asset('img/qr-code.png')}}" alt="Qr code">
                        <span>Receive QR</span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-12">
            <div class="card mb-3 function-box">
                <div class="card-body pr-0">
                    <a href="{{url('transfer')}}" class="d-flex justify-content-between">
                        <span><img src="{{asset('img/money-transfer.png')}}" alt="Transfer image">Transfer</span>
                        <span class="mr-3"><i class="fas fa-angle-right"></i></span>
                    </a>
                    <hr>
                    <a href="{{url('wallet')}}" class="d-flex justify-content-between">
                        <span><img src="{{asset('img/wallet.png')}}" alt="Wallet image">Wallet</span>
                        <span class="mr-3"><i class="fas fa-angle-right"></i></span>
                    </a>
                    <hr>
                    <a href="{{url('transaction')}}" class="d-flex justify-content-between">
                        <span><img src="{{asset('img/transaction.png')}}" alt="Transaction image">Transaction</span>
                        <span class="mr-3"><i class="fas fa-angle-right"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
