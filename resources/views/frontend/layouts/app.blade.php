<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!--Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <!------Goole font------->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    
    <!----Awesome---->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!------Custom css ------->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

    @yield('extra_css')

</head>
<body>
    <div id="app">

        <div class="header-menu">
            <div class="d-flex justify-content-center text-center">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-2">
                            @if(!request()->is('/'))
                                <a href="#" class="back-btn">
                                    <i class="fas fa-angle-left"></i>
                                </a>
                            @endif
                        </div>
                        <div class="col-8">
                            <h3>@yield('title')</h3>
                        </div>
                        <div class="col-2">
                            <a href="{{url('notification')}}">
                                <i class="fas fa-bell"></i><span class="badge bg-danger rounded-pill unread_noti">{{$unread_noti_count}}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="d-flex justify-content-center">
                <div class="col-md-8">
                    @yield('content')
                </div>
            </div>
        </div>

        <div class="bottom-menu">
            <a href="{{url('scan-and-pay')}}">
                <div class="scan-tab">
                    <div class="inside">
                        <i class="fas fa-qrcode"></i>
                    </div>
                </div>
            </a>

            <div class="d-flex justify-content-center text-center">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-3">
                            <a href="{{ route('home') }}">
                                <i class="fas fa-home"></i>
                                <p>Home</p>
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="{{route('wallet')}}">
                                <i class="fa-solid fa-wallet"></i>
                                <p>Wallet</p>
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="{{url('transaction')}}">
                                <i class="fa-solid fa-right-left"></i>
                                <p>Transaction</p>
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="{{ route('profile') }}">
                                <i class="fas fa-user"></i>
                                <p>Profile</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Script --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>

    {{-- Sweet Alert 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="{{asset('frontend/js/jscroll.min.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


    <script>
        $(document).ready(function(){
            let token = document.head.querySelector('meta[name="csrf-token"]');
            if(token){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF_TOKEN' : token.content,
                        'Content-Type' : 'application/json',
                        'Accept' : 'application/json'
                    }
                });
            }

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            @if(session('create'))
                Toast.fire({
                    icon: 'success',
                    title: '{{ session('create') }}'
                })
            @endif

            @if(session('update'))
                Toast.fire({
                    icon: 'success',
                    title: '{{ session('update') }}'
                })
            @endif

            $('.back-btn').on('click', function(e){
                e.preventDefault();
                window.history.go(-1);
                return false;
            });

        });
    </script>

    @yield('scripts')

</body>
</html>
