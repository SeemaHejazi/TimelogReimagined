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
        </div>
        @if (Auth::user()->isAdmin())
            <div class="container users">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="title col-sm-12">
                                <h2 class="title"> {{ __('Staff List') }}</h2>
                                <div class="new-teacher button-holder">
                                    <button class="button"
                                            data-title="Create"
                                            data-toggle="modal"
                                            data-target="#create-user">
                                        <span class="fa fa-plus-circle"></span>
                                        {!! __('New staff member') !!}
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                @include('partials.users-table')
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="title col-sm-12">
                                <h2 class="title"> {{ __('Centre List') }}</h2>

                                <div class="new-centre button-holder">
                                    <button class="button"
                                            data-title="Create"
                                            data-toggle="modal"
                                            data-target="#create-centre">
                                        <span class="fa fa-plus-circle"></span>
                                        {!! __('New centre') !!}
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                @include('partials.centres-table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="container entries">
            <div class="row">
                <div class="title col-sm-12">
                    <h2 class="title"> {{ __('Timelog Entries') }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    @include('partials.entries-table')
                </div>
            </div>
        </div>
    </div>

@include('modals.create-user')
@include('modals.create-centre')

@endsection