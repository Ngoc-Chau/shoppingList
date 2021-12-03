@extends('layouts.app')

@push('styles')
    <style>
    </style>

@endpush
@push('scripts')


@endpush

@section('content')
    <div class="py-4 text-center">
        <h1>ĐĂNG NHẬP</h1>
    </div>
    <div class="text-center">
        @if(Session::has('msg'))
            <p style="color:red;">{{ Session::get('msg') }}</p>
        @endif
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-4">
            <form action="{{ route('auth.login') }}" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <label for="floatingInput">Tên đăng nhập</label>
                    <input type="email" class="form-control" id="floatingInput" name="email" placeholder="you@gmail.com">
                </div>
                @error('email')
                    <p class="mb-3" style="color:red;">{{ $message }}</p>
                @enderror
                <div class="form-floating mb-3">
                    <label for="floatingPassword">Mật khẩu</label>
                    <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="mật khẩu">
                </div>
                @error('password')
                    <p class="mb-3" style="color:red;">{{ $message }}</p>
                @enderror
                <div class=" mb-3">
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Đăng nhập</button>
                </div>
                <a class="w-100 btn btn-lg btn-link" href="{{ route('auth.register') }}">Tạo tài khoản</a>
            </form>
        </div>
    </div>
@stop
