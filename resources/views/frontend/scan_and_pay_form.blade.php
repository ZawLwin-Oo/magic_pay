@extends('frontend.layouts.app')
@section('title', 'Scan & Pay Form')
@section('content')
<div class="transfer">
    <div class="card">
        <div class="card-body">
            @include('frontend.layouts.flash')
            <form action="{{url('scan_and_pay_confirm')}}" method="GET" id="transferForm">

                <input type="hidden" name="hash_value" class="hash_value"  value="">
                <input type="hidden" name="to_phone" class="to_phone" value="{{$to_account->phone}}">

                <div class="form-group">
                    <label>From</label>
                    <p class="text-muted mb-1">{{$from_account->name}}</p>
                    <p class="text-muted mb-1">{{$from_account->phone}}</p>
                </div>
                <div class="form-group">
                    <label>To</label>
                    <p class="text-muted mb-1">{{$to_account->name}}</p>
                    <p class="text-muted mb-1">{{$to_account->phone}}</p>
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
