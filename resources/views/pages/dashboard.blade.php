@extends('layouts.app')

@section('content')
    <div class="holder dashboard">
        <div class="container top">
            @if(session('success'))
                <div class="alert alert-success">
                    {!! session('success') !!}
                </div>
            @endif

            @if(session('failure'))
                <div class="alert alert-danger">
                    {!! session('failure') !!}
                </div>
            @endif

            <div class="row">
                <div class="title col-sm-12">
                    <h2 class="title"> {{ __('Timelog Entries') }}</h2>
                </div>
            </div>
        </div>
        <div class="container entries">
            <div class="row">
                <div class="col-sm-12">
                    @include('partials.entries-table')
                </div>
            </div>
        </div>
    </div>
@endsection