@extends('layouts.app')

@push('styles')
    <style>
    </style>

@endpush
@push('scripts')


@endpush

@section('content')
    <div class="py-4 text-center">
        <h1>ĐĂNG KÝ</h1>
    </div>
    <div class="row justify-content-center">
        <form class="needs-validation" novalidate>
          <div class="row g-3">
            <div class="col-12 mb-2">
              <label class="form-label">Họ tên</label>
              <input type="text" class="form-control" id="name" placeholder="Họ và tên" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-12 mb-2">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>
            
            <div class="col-12 mb-4">
              <label class="form-label">Mật khẩu</label>
              <input type="text" class="form-control" id="address2" placeholder="Nhập mật khẩu">
            </div>
            <div class="col-12 mb-3">
                <button class="w-100 btn btn-primary btn-lg" type="submit">Đăng ký</button>
            </div>
            <div class="col-12 mb-3">
                <a class="w-100 btn btn-lg btn-link" href="{{ route('auth.login') }}">Quay lại</a>
            </div>
        </form>
    </div>
@stop
