@extends('layouts.app')

@section('content')
    <div class="clockin-page holder" id="clockin">
        <div class="container">
            <div class="panel col-sm-12">
                <div class="panel-heading row">
                    <div class="title">
                        {{--<h5>{{ $today_date }}</h5>--}}
                    </div>
                </div>
                <div class="panel-body row">
                    <div class="col-sm-8 offset-2 pt-3 pb-3">
                        <h2 class="title">{{ __('Clocking in / out') }}</h2>

                        <form id="clocking-form" method="POST"
                              {{--action="{{ route('clocking') }}"--}}
                              role="form">
                            <div class="input-group">
                                <div class="icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <input id="login-username"
                                       type="text"
                                       class="input-field form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                       name="username"
                                       value="{{ old('username') }}"
                                       placeholder="{{ __('Username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group btn-group radio-group" role="group">
                                <label class="btn btn-teal active">
                                    Clocking In
                                    <input name="clocking_type" type="radio" id="clock-in" class="form-control" value="in" checked>
                                </label>

                                <label class="btn btn-teal">
                                    Clocking Out
                                    <input name="clocking_type" type="radio" id="clock-out" class="form-control" value="out">
                                </label>
                            </div>

                            <div class="button-holder">
                                <button type="submit" class="button">{{ __('Submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection