@extends('frontend.layouts.app');
@section('title', 'Update Password')

@section('content')
<div class="update-password">
    <div class="card mb-3">
        <div class="card-body">
            <div class="text-center">
                <img srcset="{{ asset('/img/password.png') }}" alt="Security Image">
            </div>
            <form action="{{ route('update-password.store') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="">Old Password</label>
                    <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" value="{{old('old_password')}}">
                    @error('old_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">New Password</label>
                    <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" value="{{old('new_password')}}">
                    @error('new_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-theme btn-block mt-5">Update Password</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
   
</script>
@endsection