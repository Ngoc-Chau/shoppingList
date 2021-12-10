@extends('layouts.app')

@push('styles')
    <style>
    </style>
@endpush

@push('scripts')


@endpush

@section('content')
    <div class="py-4 text-center">
        <h1>Thêm sản phẩm</h1>
    </div>
    <form action="{{ route('shopping.create') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Tên sản phẩm<span style="color:red">(*)</span></label>
            <input type="text" class="form-control" id="product" name="title">
        </div>
        <div class="form-group">
            <label>Mô tả</label>
            <input type="text" class="form-control" id="content" name="content">
        </div>
        <div class="form-group">
            <label>Danh mục</label>
            <select name="product_cate" class="form-control" id="category">
                <option value="">-- chọn --</option>
                @foreach($cate_product as $key => $cate)
                    <option value="{{$cate->id}}">{{$cate->name_cat}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Hình ảnh sản phẩm</label>
            <input type="file" name="product_image" class="form-control" id="image">
        </div>
        <br>

        <div class="form-group">
            <div>
                <input type="submit" class="form-control btn btn-primary col-sm-1" style="margin-bottom:5px" value="Tạo mới">
                <input type="reset" class="form-control btn btn-secondary col-sm-1" style="margin-bottom:5px" value="Nhập lại">
            </div>  
        </div>
    </form>
@stop
