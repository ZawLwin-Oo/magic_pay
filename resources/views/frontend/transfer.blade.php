@extends('frontend.layouts.app')
@section('title', 'Transfer')
@section('content')
<div class="transfer">
    <div class="card">
        <div class="card-body">
            @include('frontend.layouts.flash')
            <form action="{{url('transfer_confirm')}}" method="GET" id="transferForm">
                <input type="hidden" name="hash_value" class="hash_value"  value="">
                <div class="form-group">
                    <label>From</label>
                    <p class="text-muted mb-1">{{$user->name}}</p>
                    <p class="text-muted mb-1">{{$user->phone}}</p>
                </div>
                <div class="form-group">
                    <label>To <span class="to_account_info text-success"></span> </label>
                    <div class="input-group">
                        <input type="text" name="to_phone" class="form-control to_phone @error('to_phone') is-invalid @enderror" value="{{old('to_phone')}}">
                        <div class="input-group-append">
                            <span class="input-group-text btn verify-btn" id="basic-addon2"><i class="fas fa-check-circle"></i></span>
                        </div>
                        @error('to_phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Amount (MMK)</label>
                    <input type="number" name="amount" class="form-control amount @error('amount') is-invalid @enderror " value="{{old('amount')}}">
                    @error('amount')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control description">{{old('description')}}</textarea>
                </div>
    
                <button type="submit" class="btn btn-block btn-theme mt-5 submit-btn">Continue</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('.verify-btn').on('click', function(){
            var phone = $('.to_phone').val();
            $.ajax({
                url: '/to-account-verify?phone=' + phone,
                type: 'GET',
                success: function(res){
                    if(res.status == 'success'){
                        $('.to_account_info').text('('+res.data['name']+')');
                    }else{
                        $('.to_account_info').text('('+res.message+')');
                    }
                }             
            });
        });
        $('.submit-btn').on('click', function(e){
            e.preventDefault();
            var to_phone = $('.to_phone').val();
            var amount = $('.amount').val();
            var description = $('.description').val();

            $.ajax({
                url: `/transfer-hash?to_phone=${to_phone}&amount=${amount}&description=${description}`,
                type: 'GET',
                success: function(res){
                    if(res.status == 'success'){
                        $('.hash_value').val(res.data);
                        $('#transferForm').submit();
                    }
                }             
            });
        });
    });
</script>
@endsection
