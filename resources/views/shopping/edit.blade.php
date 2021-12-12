@extends('layouts.app')

@push('styles')
    <style>
    </style>
@endpush

@push('scripts')


@endpush

@section('content')
    <div class="py-4 text-center">
        <h1>@lang('lang.UpdateProduct')</h1>
    </div>

    @foreach($edit_product as $key => $pro)
    <form role="form" action="{{URL::to('/update/'.$pro->id)}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label>@lang('lang.ProductName')</label>
            <input type="text" name="title" id="title" class="form-control" value="{{$pro->title}}">
        </div>

        <div class="form-group">
            <label>@lang('lang.description')</label>
            <textarea name="content" id="content" class="form-control">{{$pro->content}} </textarea>
        </div>

        <div class="form-group">
            <label>@lang('lang.category')</label>
            <select name="product_cate" class="form-control" id="category">
                <option value="{{$pro->cat_id}}">{{$pro->category->name_cat}}</option>
                @foreach($cate_product as $key => $cate)
                    @if($pro->cat_id != $cate->id)
                    <option value="{{$cate->id}}">{{$cate->name_cat}}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>@lang('lang.image')</label>
            <input type="hidden" name="old_image" class="form-control" value="{{$pro->image}}">
            <input type="file" name="product_image" class="form-control mb-3" id="image">
            @if($pro->image=='default.png')
            @else
                <img src="{{URL::to('/uploads/'.$pro->image)}}" style="object-fit: cover;" height="100" width="160">
            @endif
        </div>
        <input type="hidden" name="id_cat" value="{{$item}}">
        <div class="form-group">
            <div>
                <input type="submit" class="form-control btn btn-primary col-sm-2" value="@lang('lang.update')">
            </div>  
        </div>
    </form>
    
    @endforeach
    @stop
