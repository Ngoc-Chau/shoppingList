@extends('errors::minimal')

@section('title', __('Error404'))
@section('message')
    
        <div class="container">
            <div class="error py-4 text-center">
                <h1 style="font-size: 9em; color:#363f5e; margin-top: -1em;">404</h1>
                <h4 style="color:#363f5e;">PAGE NOT FOUND!</h4>
            </div>
            <div class="back text-center">
                <a href="{{ route('shopping.index') }}" class="btn btn-primary">Trang chủ</a>
            </div>
        </div>
@stop
