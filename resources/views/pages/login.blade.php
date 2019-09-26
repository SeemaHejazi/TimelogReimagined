@extends('layouts.app')

@section('content')
    <div class="login-page holder" id="login">
        <div class="container-fluid">
            <div class="panel panel-login col-sm-12">
                <div class="panel-heading row">
                    <div class="col-sm-6 tabs">
                        <a href="#" class="active" id="login-form-link">
                            <div class="title">
                                <h5>{{ __('Login') }}</h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 tabs">
                        <a href="#" id="register-form-link">
                            <div class="title">
                                <h5>{{ __('Register') }}</h5>
                            </div>
                        </a>
                    </div>
                    <hr>
                </div>
                <div class="panel-body row">
                    <div class="col-sm-8 offset-2 pt-3 pb-3">
                        <form id="login-form" method="POST" action="{{ route('login') }}"
                              role="form" style="display: block;">
                            @csrf
                            <h2 class="title">{{ __('Login to your account') }}</h2>
                            @if ($errors->any())
                                <span class="help-block" style="color: red;">
                                    <ul>
                                      @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </span>
                            @endif
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
                            <div class="input-group">
                                <div class="icon">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <input id="login-password"
                                       type="password"
                                       class="input-field form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password"
                                       placeholder="{{ __('Password') }}" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div style="clear:both;"></div>
                            <div class="button-holder">
                                <button type="submit" class="button">{{ __('Login') }}</button>
                            </div>
                            <div class="bottom">
                                <a href="#">{{ __('Forgot My Password') }}</a>
                            </div>
                        </form>
                        <form id="register-form" method="POST" action="{{ route('register') }}"
                              autocomplete="off"
                              role="form" style="display: none;">
                            @csrf
                            <h2 class="title">{{ __('Create an account') }}</h2>
                            @if ($errors->any())
                                <span class="help-block" style="color: red;">
                                    <ul>
                                      @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                      @endforeach
                                    </ul>
                                </span>
                            @endif
                            <div class="input-group">
                                <div class="icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <input id="first_name"
                                       type="text"
                                       class="input-field form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                       name="first_name"
                                       value="{{ old('first_name') }}"
                                       placeholder="{{ __('First Name') }}"
                                       autocomplete="new-password"
                                       required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group">
                                <div class="icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <input id="last_name"
                                       type="text"
                                       class="input-field form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                       name="last_name"
                                       value="{{ old('last_name') }}"
                                       placeholder="{{ __('Last Name') }}"
                                       autocomplete="new-password"
                                       required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('last_name') }}</strong>
                              </span>
                                @endif
                            </div>
                            <div class="input-group">
                                <div class="icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <input id="register-email"
                                       type="email"
                                       class="input-field form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       name="email"
                                       value="{{ old('email') }}"
                                       placeholder="{{ __('Email') }}"
                                       autocomplete="new-password"
                                       required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group">
                                <div class="icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <input id="register-username"
                                       type="text"
                                       class="input-field form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                       name="username"
                                       value="{{ old('username') }}"
                                       placeholder="{{ __('Username') }}"
                                       autocomplete="new-password"
                                       required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group">
                                <div class="icon">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <input id="password"
                                       type="password"
                                       class="input-field form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password"
                                       placeholder="{{ __('Password') }}"
                                       autocomplete="new-password"
                                       required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group">
                                <div class="icon">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <input id="password-confirm"
                                       type="password"
                                       class="input-field form-control"
                                       name="password_confirmation"
                                       placeholder="{{ __('Confirm Password') }}"
                                       autocomplete="new-password"
                                       required>
                            </div>
                            <div class="input-group">
                                <select class="input-field form-control" name="role_id" title="role">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" @if($role->id == 3) selected="selected" @endif>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            * A centre must be assigned to begin with
                            <div class="input-group">
                                <select class="input-field form-control" name="role_id" title="role">
                                    @foreach($centres as $centre)
                                        <option value="{{ $centre->id }}">
                                            {{ $centre->centre_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="button-holder">
                                <button type="submit" class="button">{{ __('Register') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
