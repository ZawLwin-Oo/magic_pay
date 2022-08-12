@extends('frontend.layouts.app')
@section('title', 'Transfer Confirm')
@section('content')
<div class="transfer_confirm">
    <div class="card">
        <div class="card-body">
            @include('frontend.layouts.flash')

            <form action="{{url('transfer/complete')}}" method="POST" id="form">
                @csrf
                <input type="hidden" name="hash_value" value="{{$hash_value}}">
                <input type="hidden" name="to_phone" value="{{$to_account->phone}}">
                <input type="hidden" name="amount" value="{{$amount}}">
                <input type="hidden" name="description" value="{{$description}}">

                <div class="form-group">
                    <label class="mb-0">From</label>
                    <p class="text-muted mb-1">{{$from_account->name}}</p>
                    <p class="text-muted mb-1">{{$from_account->phone}}</p>
                </div>
                <div class="form-group">
                    <label class="mb-0">To</label>
                    <p class="text-muted mb-1">{{$to_account->name}}</p>
                    <p class="text-muted mb-1">{{$to_account->phone}}</p>
                </div>
                <div class="form-group">
                    <label class="mb-0">Amount (MMK)</label>
                    <p class="text-muted">{{number_format(($amount), 2)}}</p>
                </div>
                <div class="form-group">
                    <label class="mb-0">Description</label>
                    <p class="text-muted">{{$description}}</p>
                </div>
    
                <button type="submit" class="btn btn-block btn-theme mt-5 confirm-btn">Confirm</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('.confirm-btn').on('click',function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Enter your password.',
                icon: 'info',
                html:  '<input type="password" class="form-control text-center password"/>',
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText:  'confirm',
                cancelButtonText:  'cancel',
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    var password = $('.password').val();

                    $.ajax({
                        url : '/transfer_confirm/password-check?password=' + password,
                        type: 'GET',
                        success: function(res){
                            if(res.status == 'success'){
                                $('#form').submit();
                            }else{
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: res.message,
                                });
                            }
                        }
                    });
                }
            })
        });
    })
</script>
@endsection
