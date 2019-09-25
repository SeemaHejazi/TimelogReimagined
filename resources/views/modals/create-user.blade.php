{{--Modal--}}
<div class="modal fade" id="create-user" role="dialog"
     aria-labelledby="createModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5>{{ __('Create New User') }}</h5>
                </div>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">close</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="register-form" method="POST" action="{{ route('users.store') }}"
                      autocomplete="off"
                      role="form">
                    @csrf
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
                                <option value="{{ $role->id }}" @if ($role->id == 3) selected="selected" @endif>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="button-holder">
                        <button type="submit" class="button">{{ __('Register') }}</button>

                        <button type="button" class="button cancel-btn" data-dismiss="modal">{{ __('Close') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>