@extends('layouts.app')

@section('content')
    <div class="holder user-show">
        <div class="container-fluid top">
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

        <div class="container-fluid user">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="title col-sm-12">
                            <h2 class="title"> {{ __('Manage ') . $user->name . __('\'s Information') }}</h2>
                            <div class="button-holder">
                                {{--<button class="button"--}}
                                        {{--data-title="Create"--}}
                                        {{--data-toggle="modal"--}}
                                        {{--data-target="#create-user">--}}
                                    {{--<span class="fa fa-plus-circle"></span>--}}
                                    {{--{!! __('New staff member') !!}--}}
                                {{--</button>--}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 offset-md-3">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    First Name:
                                    <span>{{ $user->first_name }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Last Name:
                                    <span>{{ $user->last_name }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Username:
                                    <span>{{ $user->username }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Email:
                                    <span>{{ $user->email }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Role:
                                    <span>{{ $user->role->name }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid centres mt-4">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="title">
                                <h5 class="category">Centres Assigned</h5>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <form id="centres-list" method="POST" role="form" class="centres-list"
                                  action="{{ route('user_centre.update', $user->id) }}">
                                @csrf
                                <div class="row">
                                    @foreach ($centre_list as $index => $centre)
                                        <div class="col-sm-12 col-md-6 col-lg-4 mb-1 centre-list-item">
                                            <input type="checkbox" class="centre-checkbox" id="{{ $centre[0] }}"
                                                   name="{{$index}}" value="{{$centre[0]}}"
                                                   @if ($centre[1]) checked="checked" @endif>

                                            <label for="{{ $centre[0] }}">
                                                {{ $centre[0] }}
                                            </label>
                                        </div>
                                    @endforeach
                                    <div class="selectables">
                                        <a rel="group_1" id="select-all" href="#">Select All</a>
                                        <a rel="group_1" id="select-none" href="#">Deselect All</a>
                                    </div>
                                </div>

                                <div class="button-holder">
                                    <button type="submit" class="button">{{ __('Save') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--@include('modals.user-edit')--}}
    {{--@include('modals.user-delete')--}}
@stop
