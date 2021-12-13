@extends('layouts.app')

@push('styles')
    <style>
    </style>
@endpush

@push('scripts')
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
                        $('.old_image').empty();
                    }else{
                        $(img_holder).html('This browser does not support FileReader');
                    }
                }else{
                    $(img_holder).empty();
                }
            })
        })
    </script>
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
            <div class="old_image">
                <img src="{{URL::to('/uploads/'.$pro->image)}}" style="object-fit: cover;" height="100" width="160">
            </div>
        </div>
        <div class="img-holder"></div>
        <input type="hidden" name="id_cat" value="{{$item}}">
        <div class="form-group">
            <div>
                <input type="submit" class="form-control btn btn-primary col-sm-2" value="@lang('lang.update')">
            </div>  
        </div>
    </form>
    
    @endforeach
    @stop
