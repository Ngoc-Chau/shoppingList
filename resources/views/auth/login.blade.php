@extends('layouts.app')

@push('styles')
    <style>
    </style>

@endpush
@push('scripts')


@endpush

@section('content')
    <div class="py-4 text-center">
        <h1 style = 'text-transform: uppercase'>@lang('lang.login')</h1>
    </div>
    <div class="text-center">
        @if(Session::has('msg'))
            <p style="color:red;">{{ Session::get('msg') }}</p>
        @endif
    </div>
    <div class="row justify-content-center" style="margin-bottom: 4.5rem!important;">
        <div class="col-sm-4">
            <form action="{{ route('auth.login') }}" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <label for="floatingInput">@lang('lang.username')</label>
                    <input type="email" class="form-control" id="floatingInput" name="email" placeholder="you@gmail.com">
                </div>
                @error('email')
                    <p class="mb-3" style="color:red;">{{ $message }}</p>
                @enderror
                <div class="form-floating mb-3">
                    <label for="floatingPassword">@lang('lang.password')</label>
                    <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="@lang('lang.password')">
                </div>
                @error('password')
                    <p class="mb-3" style="color:red;">{{ $message }}</p>
                @enderror
                <div class=" mb-3">
                    <button class="w-100 btn btn-lg btn-primary" type="submit">@lang('lang.login')</button>
                </div>
                <div class="row text-center">
                    <a class="w-100  btn-lg btn-link mb-2" href="" data-toggle="modal" data-target="#myModal">@lang('lang.forgot')</a>
                </div>
                <div class="row justify-content-center">
                    <a class="btn btn-lg btn-success" href="{{ route('auth.register') }}">@lang('lang.CreateAccount')</a>
                </div>
            </form>
        </div>
    </div>
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('auth.sendMail') }}" method="POST">
                    @csrf
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">@lang('lang.ConfirmGmail')</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <label for="floatingInput">@lang('lang.yourMail')</label>
                            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="you@gmail.com">
                        </div>
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">@lang('lang.SendConfirmation')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
