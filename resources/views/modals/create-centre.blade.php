{{--Modal--}}
<div class="modal fade" id="create-centre" role="dialog"
     aria-labelledby="createModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="category">{{ __('Add A New Centre') }}</h5>
                </div>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">close</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="create-centre-form" method="POST" action="{{ route('centres.store') }}"
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
                        <input id="centre_name"
                               type="text"
                               class="input-field form-control{{ $errors->has('centre_name') ? ' is-invalid' : '' }}"
                               name="centre_name"
                               value="{{ old('centre_name') }}"
                               placeholder="{{ __('Centre Name') }}"
                               autocomplete="new-password"
                               required autofocus>

                        @if ($errors->has('centre_name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('centre_name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group">
                        <div class="icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <input id="location"
                               type="text"
                               class="input-field form-control{{ $errors->has('location') ? ' is-invalid' : '' }}"
                               name="location"
                               value="{{ old('location') }}"
                               placeholder="{{ __('Location') }}"
                               autocomplete="new-password"
                               required autofocus>

                        @if ($errors->has('location'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('location') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group">
                        <select class="input-field form-control" name="timezone" title="timezone">
                            @foreach(timezone_identifiers_list(DateTimeZone::AMERICA) as $timezone)
                                <option value="{{ $timezone }}" @if ($timezone == 'America/Toronto') selected="selected" @endif>
                                    {{ $timezone }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="button-holder">
                        <button type="submit" class="button">{{ __('Save') }}</button>

                        <button type="button" class="button cancel-btn" data-dismiss="modal">{{ __('Close') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>