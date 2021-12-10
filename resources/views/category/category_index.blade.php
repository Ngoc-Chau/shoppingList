@extends('layouts.app')

@push('styles')
    <style>
    </style>

@endpush

@push('scripts')
    <script>
        $(".checkboxAll").change(function() {
            var $self = $(this);
            var ischeck = $self.prop('checked');
            $(".checkboxItem").prop('checked', ischeck);
            if ($(this).is(":checked")) {
                $('.btn-complete').attr('disabled', false);
                $('.btn-delete').attr('disabled', false);
            } else {
                $('.btn-complete').attr('disabled', true);
                $('.btn-delete').attr('disabled', true);
            }
        });
        $(".checkboxItem").change(function() {
            let isExistCheck = false;
            $(".checkboxItem").each(function() {
                if ($(this).is(":checked")) {
                    isExistCheck = true;
                }
            })
            if (isExistCheck) {
                $('.btn-complete').attr('disabled', false);
                $('.btn-delete').attr('disabled', false);
            } else {
                $('.btn-complete').attr('disabled', true);
                $('.btn-delete').attr('disabled', true);
                $(".checkboxAll").prop('checked', false);
            }
            if($(this).prop('checked') == false) {
                $(".checkboxAll").prop('checked', false);
            }
            if($('.checkboxItem:checked').length == $('.checkboxItem').length){
                $(".checkboxAll").prop('checked', true);
            }
        });

        function completed() {
            var allVals = [];
            $('.checkboxItem:checked').each(function() {
                allVals.push($(this).val());
            });
            $.ajax({
                url: "{{ route('shopping.completed') }}",
                method: 'POST',
                cache: false,
                data: {
                    _token: "{{ csrf_token() }}",
                    product_id: allVals,
                },
                success: function (data) {
                    console.log(data);
                    location.reload();
                },
                error: function() {
                    console.log("Có lỗi xảy ra, vui lòng thử lại.");
                }
            });
        }

        function deleteALl() {
            var confirmDel = confirm("Bạn chắc chắn muốn xóa đã chọn không?");
            if(confirmDel == true) {
                var allVals = [];
                $('.checkboxItem:checked').each(function() {
                    allVals.push($(this).val());
                });
                $.ajax({
                    url: "{{ route('shopping.deleteAll') }}",
                    method: 'POST',
                    cache: false,
                    data: {
                        _token: "{{ csrf_token() }}",
                        product_id: allVals,
                    },
                    success: function (data) {
                        console.log(data);
                        location.reload();
                    },
                    error: function() {
                        console.log("Có lỗi xảy ra, vui lòng thử lại.");
                    }
                });
            }
        }
    </script>
@endpush

@section('content')

<div class="py-4 text-center">
        @if(Session::has('welcome'))
            <p style="color:red;">{{ Session::get('welcome') }}</p>
        @endif
        <h1>@lang('lang.ShoppingList')</h1>
    </div>
    {{session('er')}}
    
    <div class="nav justify-content-center py-1 mb-4">
        <nav class="nav d-flex justify-content-between">
            <a class="btn btn-light" href="{{ route('category_index')}}">+</a>
            <a class="btn btn-light" href="{{ route('shopping.index') }}">@lang('lang.all')</a>
          @foreach($resul_category as $cate)
          <a class="btn btn-light" href="{{ url('category')}}/{{$cate->id}}">{{$cate->name_cat}}</a>
          @endforeach
        </nav>
    </div>
    

    <form class="row justify-content-center">
        <div class="col-4">
          <input type="search" class="form-control" id="search" placeholder="Nhập ...">
        </div>
        <div class="">
          <button type="submit" class="btn btn-secondary mb-3">@lang('lang.search')</button>
        </div>
    </form>
        <div class="col-6 mb-3">
            <a href="{{ route('shopping.create') }}" class="btn btn-info">@lang('lang.AddProduct')</a>
        </div>
    <form action="{{ route('category_complete') }}" method="post">
        @csrf
        <div class="table">
            <table class="table">
                <tr>
                    <th class="col-sm-1"><input type="checkbox" id="checkall" class="checkboxAll" name="item[]"></th>
                    <th class="col-sm-2">@lang('lang.image')</th>
                    <th class="col-sm-2">@lang('lang.ProductName')</th>
                    <th class="col-sm-3">@lang('lang.description')</th>
                    <th class="col-sm-2">@lang('lang.category')</th>
                    <th class="col-sm-2" width="200px"></th>
                </tr>
                @forelse($resul_product as $sp)
                <tr>
                    <td class="col-sm-1"><input type="checkbox" name="item[]" class="checkboxItem" value="{{$sp->id}}"></td>
                    <td class="col-sm-2"><img src="{{asset('uploads')}}/{{$sp->image}}" style="object-fit: cover;" height="50" width="80"></td>
                    <td class="col-sm-2">{{$sp->title}}</td>
                    <td class="col-sm-3">{{$sp->content}}</td>
                    <td class="col-sm-2">{{$sp->category->name_cat}}</td>
                    <td class="col-sm-2">
                        <a href="{{ url('edit')}}/{{$sp->id}}" class="btn btn-primary" style="margin: 0 4px 4px 0;">@lang('lang.edit')</a>
                        <a href="{{ url('destroy')}}/{{$sp->id}}" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa không?')" style="margin: 0 4px 4px 0;">@lang('lang.delete')</a>
                    </td>
                    @empty
                    <td colspan="6" style="color: red;">@lang('lang.msgProduct')</td>
                </tr>
            @endforelse
            </table>
        </div>
        <!-- Phân trang -->
            <div class="row justify-content-center mb-3">{{ $resul_product->links("pagination::bootstrap-4") }}</div>

        <div class="row">
            <div class="mb-3 ml-4">
                <button type="sumit" class="btn btn-success btn-complete" onclick="completed()" disabled>@lang('lang.completed')</button>       
            </div>
            <div class="mb-3 ml-2">
                <button type="submit" class="btn btn-danger btn-delete" onclick="deleteALl()" disabled>@lang('lang.DeleteAll')</button>
            </div>
        </div>
    </form>
    <div class="table">
            <table class="table">
                <tr> <th colspan="6"> @lang('lang.TotalProduct') ({{$count}})</th> </tr>
                @forelse($resul_product_complete as $sp)
                <tr>
                    <td class="col-sm-1"><input type="checkbox" id="item1" name="item[]" readonly="false" value="{{$sp->id}}" checked disabled="true"></td>
                    @if($sp->image=='default.png')
                        <td>
                            <img src="{{URL::to('/uploads/'.$sp->image)}}" height="100" width="100">
                        </td>    
                    @else
                        <td class="col-sm-2"><img src="{{asset('uploads')}}/{{$sp->image}}" height="50" width="100" style = "filter:brightness(40%);"></td>
                    @endif
                    <td class="col-sm-2" style="text-decoration: line-through; color: #80868b!important;">{{$sp->title}}</td>
                    <td class="col-sm-3" style="text-decoration: line-through; color: #80868b!important;">{{$sp->content}}</td>
                    <td class="col-sm-2" style="text-decoration: line-through; color: #80868b!important;">{{$sp->category->name_cat}}</td>
                    <td class="col-sm-2">
                        <a href="{{ url('category_uncomplete')}}/{{$sp->id}} " class="btn btn-primary" style="margin: 0 4px 4px 0;">@lang('lang.undo')</a>
                        <a href="{{ url('destroy')}}/{{$sp->id}}" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa không?')" style="margin: 0 4px 4px 0;">@lang('lang.delete')</a>
                    </td>
                    @empty
                    <td colspan="6" style="color: red;">Chưa có sản phẩm nào được tìm thấy hoặc mua</td>
                </tr>
                @endforelse
            </table>
    </div>
@stop
