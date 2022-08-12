@extends('frontend.layouts.app');
@section('title', 'Profile')

@section('content')
<div class="account">
    <div class="profile mb-3">
        <img src="https://ui-avatars.com/api/?background=5842E3&color=fff&name={{$user->name}}" alt="Profile image">
    </div>
    <div class="card mb-3">
        <div class="card-body pr-0">
            <div class="d-flex justify-content-between">
                <span>Name</span>
                <span class="mr-3">{{ $user->name }}</span>
            </div>
            <hr>
            <div class="d-flex justify-content-between">
                <span>Email</span>
                <span class="mr-3">{{ $user->email }}</span>
            </div>
            <hr>
            <div class="d-flex justify-content-between">
                <span>Phone</span>
                <span class="mr-3">{{ $user->phone }}</span>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-body pr-0">
            <a href="{{ route('update-password') }}"class="d-flex justify-content-between">
                <span>Update Password</span>
                <span class="mr-3"><i class="fas fa-angle-right"></i></span>
            </a>
            <hr>
            <div class="d-flex justify-content-between logout">
                <span>Logout</span>
                <span class="mr-3"><i class="fas fa-angle-right"></i></span>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $(document).on('click', '.logout', function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure, you want to logout?',
                showCancelButton: true,
                confirmButtonText: `Confirm`,
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url : "{{route('logout')}}",
                        type : 'GET',
                        success : function(){
                            window.location.replace("{{route('profile')}}");
                        }
                    });
                   
                }
            })
        });
    });
</script>
@endsection