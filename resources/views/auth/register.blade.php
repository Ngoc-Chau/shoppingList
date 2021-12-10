@extends('layouts.app')

@push('styles')
    <style>
    </style>

@endpush
@push('scripts')


@endpush

@section('content')
    <div class="py-4 text-center">
        <h1 style = 'text-transform: uppercase'>@lang('lang.register')</h1>
    </div>
    <div class="text-center">
      @if(Session::has('msg'))
          <p style="color:red;">{{ Session::get('msg') }}</p>
      @endif
  </div>
    <div class="row justify-content-center">
      <div class="col-sm-4">
        <form class="needs-validation" action="{{ route('auth.register') }}" method="POST">
          @csrf
          <div class="row g-3">
            <div class="col-12 mb-2">
              <label class="form-label">@lang('lang.fullname')</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="@lang('lang.fullname')" value="">
            </div>
            @error('name')
                <p class="col-12 mb-3" style="color:red;">{{ $message }}</p>
            @enderror
            <div class="col-12 mb-2">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">
            </div>
            @error('email')
              <p class="col-12 mb-3" style="color:red;">{{ $message }}</p>
            @enderror
            <div class="col-12 mb-2">
              <label class="form-label">@lang('lang.password')</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="@lang('lang.password')">
            </div>
            @error('password')
              <p class="col-12 mb-3" style="color:red;">{{ $message }}</p>
            @enderror
            <div class="col-12 mb-3">
              <label class="form-label">@lang('lang.Re_EnterPassword')</label>
              <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="@lang('lang.Re_EnterPassword')">
            </div>
            @error('confirm_password')
              <p class="col-12 mb-4" style="color:red;">{{ $message }}</p>
            @enderror
            <div class="col-12 mb-3">
                <button class="w-100 btn btn-primary btn-lg" type="submit">@lang('lang.register')</button>
            </div>
            <div class="col-12 mb-3">
                <a class="w-100 btn btn-lg btn-link" href="{{ route('auth.login') }}">@lang('lang.back')</a>
            </div>
          </div>
        </form>
      </div>
    </div>
@stop
