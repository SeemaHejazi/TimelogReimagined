<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Timelog | Reimagined</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = {csrfToken: '{{ csrf_token()  }}'}</script>

    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500&display=swap" rel="stylesheet">
</head>
<body class="timelog">
<header>
    <div class="container">
        {{--<img class="himama-logo" src="{{  }}">--}}
        {{--<div class="menu-holder desktop-menu">--}}
            {{--@if (Auth::guard('dealer_rep')->check())--}}
                {{--@if (Auth::guard('dealer_rep')->user()->hasRole('dealer_manager'))--}}
                    {{--<a href="{{ route('ddc.dealer_manager.index') }}" class="menu-item dealership_manager">--}}
                        {{--<i class="fas fa-store"></i> {{ __('Dealerships') }}--}}
                    {{--</a>--}}
                    {{--<a href="{{ route('ddc.reps_manager.index') }}" class="menu-item reps_manager">--}}
                        {{--<i class="fas fa-users"></i> {{ __('Reps') }}--}}
                    {{--</a>--}}
                    {{--<a href="{{ route('ddc.sessions.index') }}" class="menu-item sessions">--}}
                        {{--<i class="fas fa-clipboard-list"></i> {{ __('Sessions') }}--}}
                    {{--</a>--}}
                    {{--<a href="{{ route('ddc.rep_dashboard.index') }}" class="menu-item rep_dashboard">--}}
                        {{--<i class="fas fa-tachometer-alt"></i> {{ __('Rep Dashboard') }}--}}
                    {{--</a>--}}
                {{--@endif--}}
                {{--<div class="user">--}}
                    {{--{{Auth::guard('dealer_rep')->user()->first_name}} {{Auth::guard('dealer_rep')->user()->last_name}}--}}
                    {{--<a class="menu-item rep-logout" href="{{ route('logout') }}"--}}
                       {{--onclick="event.preventDefault();--}}
                                         {{--document.getElementById('logout-form').submit();">--}}
                        {{--<i class="fas fa-user-circle"></i>--}}
                        {{--{{ __('Logout') }}--}}
                    {{--</a>--}}
                {{--</div>--}}

                {{--<form id="logout-form"--}}
                      {{--action="{{ route('logout') }}"--}}
                      {{--method="POST"--}}
                      {{--style="display: none;">--}}
                    {{--{{ csrf_field() }}--}}
                {{--</form>--}}
            {{--@endif--}}
        {{--</div>--}}
        {{--<div class="menu-holder mobile-menu">--}}
            {{--<div class="hamb" style="color:#00528a;">--}}
                {{--<i class="fas fa-bars"></i>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</header>--}}
{{--<div class="links hide">--}}
    {{--@if (Auth::guard('dealer_rep')->check())--}}
        {{--@if (Auth::guard('dealer_rep')->user()->hasRole('dealer_manager'))--}}
            {{--<a href="{{ route('ddc.dealer_manager.index') }}" class="menu-item dealership_manager">--}}
                {{--<i class="fas fa-store"></i> {{ __('Dealerships') }}--}}
            {{--</a>--}}
            {{--<a href="{{ route('ddc.reps_manager.index') }}" class="menu-item reps_manager">--}}
                {{--<i class="fas fa-users"></i> {{ __('Reps') }}--}}
            {{--</a>--}}
            {{--<a href="{{ route('ddc.sessions.index') }}" class="menu-item sessions">--}}
                {{--<i class="fas fa-clipboard-list"></i> {{ __('Sessions') }}--}}
            {{--</a>--}}
            {{--<a href="{{ route('ddc.rep_dashboard.index') }}" class="menu-item rep_dashboard">--}}
                {{--<i class="fas fa-tachometer-alt"></i> {{ __('Rep Dashboard') }}--}}
            {{--</a>--}}
        {{--@endif--}}
        {{--<a class="menu-item rep-logout" href="{{ route('logout') }}"--}}
           {{--onclick="event.preventDefault();--}}
                             {{--document.getElementById('logout-form').submit();">--}}
            {{--<i class="fas fa-user-circle"></i>--}}
            {{--{{ __('Logout') }}--}}
        {{--</a>--}}
        {{--<form id="logout-form-mob"--}}
              {{--action="{{ route('logout') }}"--}}
              {{--method="POST"--}}
              {{--style="display: none;">--}}
            {{--{{ csrf_field() }}--}}
        {{--</form>--}}
    {{--@endif--}}
{{--</div>--}}

@yield('content')

@yield('scripts')
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
