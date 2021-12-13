@extends('layouts.app')

@push('styles')
    <style>
        label.error{
            padding-top: 5px; 
			color: red;
		}
    </style>
@endpush
@push('scripts')
    <script>
        $().ready(function() {
            $("#resetPassword").validate({
                onfocusout: false,
                onkeyup: false,
                onclick: false,
                rules: {
                    "old_password": {
                        required: true,
                    },
                    "password": {
                        required: true,
                        minlength: 6
                    },
                    "confirm_password": {
                        required: true,
                        equalTo: "#password",
                    }
                },
                messages: {
                    "old_password": {
                        required: "@lang('lang.CurrentPasswordPlease')",
                    },
                    "password": {
                        required: "@lang('lang.PasswordIsRequired')",
                        minlength: "@lang('lang.Need at least 6 characters')"
                    },
                    "confirm_password": {
                        required: "@lang('lang.PasswordIsRequired')",
                        equalTo: "@lang('lang.2PasswordsMustBeTheSame')",
                    }
                }
            });
        });
    </script>
@endpush

@section('content')
    <div class="py-4 text-center">
        <h2> @lang('lang.YourNewPassword') </h2>
    </div>
    <div class="text-center">
        @if(Session::has('msg'))
            <p style="color:red;">{{ Session::get('msg') }}</p>
        @endif
    </div>
    <div class="row justify-content-center" style="margin-bottom: 11.5rem!important;">
        <div class="col-sm-4">
            <form id="resetPassword" action="{{ route('auth.resetPassword') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <input type="hidden" name="token_password" value="{{ $token }}">
                    <div class="col-12 mb-2">
                      <label class="form-label">@lang('lang.password')</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="@lang('lang.password')">
                    </div>
                    <div class="col-12 mb-3">
                      <label class="form-label">@lang('lang.Re_EnterPassword')</label>
                      <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="@lang('lang.Re_EnterPassword')">
                    </div>
                    <div class="col-12 mb-3">
                        <button class="w-100 btn btn-primary btn-lg" type="submit"> @lang('lang.change') </button>
                    </div>
                  </div>
            </form>
        </div>
    </div>
@stop
