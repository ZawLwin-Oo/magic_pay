@extends('backend.layouts.app')

@section('title','Edit Admin User')
@section('admin_user-active', 'mm-active')

@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-users icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Edit Admin User</div>
        </div>
    </div>
</div>

<div class="content">
    <div class="card">
        <div class="card-body">
            @include('backend.layouts.flash')
            
            <form action="{{ route('admin.admin_user.update', $admin_user->id) }}" method="POST" id="update">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{$admin_user->name}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="{{$admin_user->email}}">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="number" name="phone" class="form-control" value="{{$admin_user->phone}}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-secondary mr-2 back-btn">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
{!! JsValidator::formRequest('App\Http\Requests\UpdateAdminUser', '#update') !!}

<script>
    $(document).ready(function () {
    
});
</script>

@endsection

@endsection