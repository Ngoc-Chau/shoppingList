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
    <div class="row justify-content-center">
        <div class="col-4">
            <form>
                <div class="form-floating mb-3">
                    <label for="floatingInput">Tên đăng nhập</label>
                    <input type="email" class="form-control" id="floatingInput" placeholder="you@gmail.com">
                </div>
                <div class="form-floating mb-3">
                    <label for="floatingPassword">Mật khẩu</label>
                    <input type="password" class="form-control" id="floatingPassword" placeholder="mật khẩu">
                </div>
                <div class=" mb-3">
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                </div>
                <a class="w-100 btn btn-lg btn-link" href="{{ route('auth.register') }}">Đăng ký</a>
            </form>
        </div>
    </div>
@stop
