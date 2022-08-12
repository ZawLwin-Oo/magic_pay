@extends('frontend.layouts.app')
@section('title', 'Transaction Detail')
@section('content')
<div class="transaction_detail">
    <div class="card">
        <div class="card-body">
            <div class="text-center mb-3">
                <img src="{{asset('img/check.png')}}" alt="Transaction Imgae">
            </div>
            @if(session('transfer_success'))
                <div class="alert alert-success fade show text-center" role="alert">
                    {{session('transfer_success')}}    
                </div>
            @endif

            @if($transaction->type == 1)
                <p class="text-center text-success mb-4">{{$transaction->amount}} MMK</p>
            @elseif($transaction->type == 2)
                <p class="text-center text-danger mb-4">{{$transaction->amount}} MMK</p>
            @endif

            <div class="d-flex justify-content-between">
                <p class="mb-0 text-muted">Trx ID</p>
                <p class="mb-0">{{$transaction->trx_id}}</p>
            </div>
            <hr>

            <div class="d-flex justify-content-between">
                <p class="mb-0 text-muted">Reference No</p>
                <p class="mb-0">{{$transaction->ref_no}}</p>
            </div>
            <hr>

            <div class="d-flex justify-content-between">
                <p class="mb-0 text-muted">Type</p>
                <p class="mb-0">
                    @if($transaction->type == 1)    
                    <span class="badge badge-pill badge-success">Income</span>
                    @elseif($transaction->type == 2)
                    <span class="badge badge-pill badge-danger">Expense</span>
                    @endif
                </p>
            </div>
            <hr>

            <div class="d-flex justify-content-between">
                <p class="mb-0 text-muted">Date & Time</p>
                <p class="mb-0">{{$transaction->created_at}}</p>
            </div>
            <hr>

            <div class="d-flex justify-content-between">
                <p class="mb-0 text-muted">
                    @if($transaction->type == 1)    
                    From
                    @elseif($transaction->type == 2)
                    To
                    @endif
                </p>
                <p class="mb-0">{{$transaction->source ? $transaction->source->name : '-'}}</p>
            </div>
            <hr>

            <div class="d-flex justify-content-between">
                <p class="mb-0 text-muted">Description</p>
                <p class="mb-0">{{$transaction->description}}</p>
            </div>

        </div>
    </div>
</div>
@endsection
