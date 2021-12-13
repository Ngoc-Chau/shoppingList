@extends('layouts.app')

@push('styles')
    <style>
    </style>
@endpush

@push('scripts')


@endpush

@section('content')
    <div class="py-4 text-center">
        <h1>@lang('lang.AddProduct')</h1>
    </div>
    <form action="{{ route('shopping.create') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>@lang('lang.ProductName')<span style="color:red">(*)</span></label>
            <input type="text" class="form-control" id="product" name="title">
        </div>
        <span style="color: red">  
            @error('title')
                {{$message}}
            @enderror
        </span>
        
        <div class="form-group mt-2">
            <label>@lang('lang.description')</label>
            <input type="text" class="form-control" id="content" name="content">
        </div>
        <span style="color: red">  
            @error('content')
                {{$message}}
            @enderror
        </span>

        <div class="form-group mt-2">
            <label>@lang('lang.category')</label>
            <select name="product_cate" class="form-control" id="category">
                <option value="">-- @lang('lang.choose') --</option>
                @foreach($cate_product as $key => $cate)
                    <option value="{{$cate->id}}">{{$cate->name_cat}}</option>
                @endforeach
            </select>
        </div>
        <span style="color: red">  
            @error('product_cate')
                {{$message}}
            @enderror
        </span>

        <div class="form-group mt-2">
            <label>@lang('lang.image')</label>
            <input type="file" name="product_image" class="form-control" id="image">
        </div>
        <div class="img-holder"></div>
        <br>
        <div class="form-group">
            <div>
                <input type="submit" class="form-control btn btn-primary col-sm-2" style="margin-bottom:5px" value="@lang('lang.AddProduct')">
          
                <input type="reset" class="form-control btn btn-secondary col-sm-2" style="margin-bottom:5px" value="@lang('lang.reset')">
            </div>  
        </div>
    </form>
    
    <script type="text/javascript">
        $(function(){
            //Reset input file
            $('input[type="file"][name="product_image"]').val('');
            //Image preview
            $('input[type="file"][name="product_image"]').on('change', function(){
                var img_path = $(this)[0].value;
                var img_holder = $('.img-holder');
                var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();
                if(extension == 'jpeg' || extension == 'jpg' || extension == 'png' || extension == 'gif'){
                     if(typeof(FileReader) != 'undefined'){
                          img_holder.empty();
                          var reader = new FileReader();
                          reader.onload = function(e){
                              $('<img/>',{'src':e.target.result,'class':'img-fluid','style':'max-width:150px;margin-bottom:10px;'}).appendTo(img_holder);
                          }
                          img_holder.show();
                          reader.readAsDataURL($(this)[0].files[0]);
                     }else{
                         $(img_holder).html('This browser does not support FileReader');
                     }
                }else{
                    $(img_holder).empty();
                }
            })
        })
    </script>
@stop
