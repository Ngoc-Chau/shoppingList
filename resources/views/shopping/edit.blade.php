@extends('layouts.app')

@push('styles')
    <style>
    </style>
@endpush

@push('scripts')


@endpush

@section('content')
    <div class="py-4 text-center">
        <h1>Sửa sản phẩm</h1>
    </div>
    <form action="{{ route('shopping.create') }}" method="post">
        @csrf
        <div class="form-group">
            <label>Tên sản phẩm<span style="color:red">(*)</span></label>
            <input type="text" class="form-control" id="product" name="product">
        </div>
        <div class="form-group">
            <label>Mô tả</label>
            <input type="text" class="form-control" id="content" name="content">
        </div>
        <div class="form-group">
            <label>Danh mục</label>
            <select class="form-control" id="category">
            <option>--chọn--</option>
            <option>Đồ gia dụng</option>
            <option>Hải sản</option>
            <option>Thịt</option>
            <option>Rau</option>
            </select>
        </div>
        <div class="form-group">
            <label>Hình ảnh</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Lưu </button>
        <a href="{{ route('shopping.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
@stop
