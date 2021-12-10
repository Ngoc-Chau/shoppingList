@extends('layouts.app')

@push('styles')
    <style>
        .changePass {
            top: 3em;
            position: fixed;
            z-index: 2;
            opacity: 0;
            visibility: hidden;
            transition: 0.6s;
            transform: translateY(500px);
        }
        .change{
            background: #ffffffcc;
            padding: 2em;
            margin-left: 1em;
            width: 60%;
        }
        .background {
            width: 100%;
            height: 100%;
            top: 0px;
            left: 0px;
            background: #6c6c6ce8;
            position: fixed;
            z-index: 1;
            opacity: 0;
            visibility: hidden;
            transition: 0.6s;
        }
        .show{
            opacity: 1;
            visibility: visible;
            transition: 0.6s;
            transform: translateY(0);
        }
        .close{
            margin-left: 1em;
        }
        .button{
            border-style: solid;
            border-radius: 5px;
        }
        label.error{
            padding-top: 5px; 
			color: red;
		}
    </style>

@endpush
@push('scripts')
    <script>
        $(document).ready(function() {
            $("#checkbox").change(function() {
                if ($(this).is(":checked")) {
                    $('.changePass').addClass('show')
                    $('.background').addClass('show')
                }
            });
            $('.close').click(function() {
                $('.changePass').removeClass('show')
                $('.background').removeClass('show')
            });
        });

        $().ready(function() {
            $("#changePassword").validate({
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
        <h1>@lang('lang.YourInfor')</h1>
    </div>
    <div class="row justify-content-center">
    @if(Session::has('msg'))
        <p style="color:red;">{{ Session::get('msg') }}</p>
    @endif
    </div>
    <div class="row justify-content-center">
      <div class="col-sm-4">
        @if(Auth::check())
            <form class="needs-validation" action="{{ route('auth.update') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-12 mb-3">
                        <label class="form-label">@lang('lang.fullname')</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="@lang('lang.fullname')" value="{{ Auth::user()->name }}">
                    </div>
                    <div class="col-12 mb-3">
                        <label for="email" class="form-label">Email <i>(@lang('lang.CannotChange'))</i></label>
                        <input type="email" class="form-control" id="email" name="email" readonly value="{{ Auth::user()->email }}">
                    </div>
                    <div class="col-12 mb-3">
                        <input id="checkbox" type="checkbox" onclick="check()">
                        <label  style="color:blue; margin-top: 15px;">@lang('lang.ChangeYourPassword')?</label>
                    </div>
                    <div id="new_pass" class="col-12">
                        
                    </div>
                    <div class="col-12 mb-3">
                        <button class="w-100 btn btn-primary btn-lg" type="submit">@lang('lang.update')</button>
                    </div>
                    <div class="col-12 mb-3">
                        <a class="w-100 btn btn-lg btn-link" href="{{ route('shopping.index') }}">@lang('lang.back')</a>
                    </div>
                </div>
            </form>
            @else
            <h3>@lang('lang.NoInfor')</h3>
            @endif
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="background"></div>
            <div class="changePass">
                <form id="changePassword" class="change row" action="{{ route('auth.changePass') }}" method="POST">
                    @csrf
                    <div class="col-sm-12">
                        <a class="close" href="#"><i class="fa fa-close button"></i></a>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <label class="form-label">@lang('lang.CurrentPassword')</label>
                        <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Nhập ...">
                    </div>
                    <div class="col-sm-12 mb-3">
                        <label class="form-label">@lang('lang.password')</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Nhập ...">
                    </div>
                    <div class="col-sm-12 mb-4">
                        <label class="form-label">@lang('lang.Re_EnterPassword')</label>
                        <input type="password" class="form-control" name="confirm_password" placeholder="Nhập ...">
                    </div>
                    <div class="col-sm-12 mb-3">
                        <button class="w-100 btn btn-primary btn-lg" type="submit">@lang('lang.change')</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
@stop
