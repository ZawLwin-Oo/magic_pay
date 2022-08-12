@extends('backend.layouts.app')

@section('title','Create Admin User')
@section('admin_user-active', 'mm-active')

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-users icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Create Admin User</div>
        </div>
    </div>
</div>

<div class="content">
    <div class="card">
        <div class="card-body">
            @include('backend.layouts.flash')
            
            <form action="{{ route('admin.admin_user.store') }}" method="POST" id="create">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="number" name="phone" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-secondary mr-2 back-btn">Cancel</button>
                    <button type="submit" class="btn btn-primary">Confrim</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
{!! JsValidator::formRequest('App\Http\Requests\StoreAdminUser', '#create') !!}

<script>
    $(document).ready(function () {
    
});
</script>

@endsection

@endsection