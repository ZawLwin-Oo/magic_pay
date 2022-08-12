@extends('frontend.layouts.app')
@section('title', 'Transaction')
@section('content')
<div class="notification">
    <div class="infinite-scroll">
        @foreach ($notifications as $notification)
            <a href="{{url('notification/'. $notification->id)}}">
                <div class="card mb-2 position-relative">
                    <div class="card-body">
                        <h6>{{Illuminate\Support\Str::limit($notification->data['title'], 40)}}</h6>
                        <p class="mb-1">{{Illuminate\Support\Str::limit($notification->data['message'], 100)}}</p>
                        <p class="text-muted mb-1">{{Carbon\Carbon::parse($notification->created_at)->format('Y-m-d h:i:s A')}}</p>
                    </div>
                    <span><i class="fas fa-bell @if(!$notification->read_at) text-danger @endif"></i></span>
                </div>
            </a>
        @endforeach
        {{$notifications->links()}}
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('ul.pagination').hide();
    $(function() {
        $('.infinite-scroll').jscroll({
            autoTrigger: true,
            //loadingHtml: '<img class="center-block" src="/images/loading.gif" alt="Loading..." />',
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.infinite-scroll',
            callback: function() {
                $('ul.pagination').remove();
            }
        });

        $('.date').daterangepicker({
            "singleDatePicker": true,
            "autoApply": true,
            "locale": {
                "format": "YYYY-MM-DD",
            },
        });

        $('.date').on('apply.daterangepicker', function(ev, picker) {
            var date = $('.date').val();
            var type = $('.type').val();
            history.pushState(null, '', `?date=${date}&type=${type}`);
            window.location.reload();
        });

        $('.type').change(function(){
            var date = $('.date').val();
            var type = $('.type').val();
            history.pushState(null, '', `?date=${date}&type=${type}`);
            window.location.reload();
        });

    });
</script>
@endsection