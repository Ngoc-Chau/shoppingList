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

        function completed(id) {
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

        function deleteALl(id) {
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

        $(document).ready(function() {
            var id = $("#categoty").val();
            $('.cat-'+id).addClass('active');
        });
    </script>
@endpush

@section('content')

<div class="py-4 text-center">
        @if(Session::has('welcome'))
            <p style="color:red;">{{ Session::get('welcome') }}</p>
        @endif
        <h1>SHOPPING LIST</h1>
    </div>
    {{session('er')}}
    
    <div class="nav justify-content-center py-1 mb-4">
        <nav class="nav d-flex justify-content-between">
            <a class="btn btn-light" href="{{ route('category_index')}}">+</a>
            <a class="btn btn-light ml-2" href="{{ route('shopping.index') }}">Tất cả</a>
          @foreach($resul_category as $cate)
          <a class="btn btn-light ml-2 cat-{{$cate->id}}" href="{{ url('category')}}/{{$cate->id}}">{{$cate->name_cat}}</a>
          @endforeach
        </nav>
    </div>

    <form class="row justify-content-center" action="{{ route('shopping.searchProduct') }}" method="GET">
        @csrf
        <div class="col-4">
            <input type="hidden" class="form-control" id="categoty" value="{{ $cat_id }}">
            <input type="search" name="search" class="form-control" id="search" placeholder="Nhập ..." >
        </div>
        <div class="">
            <button type="submit" class="btn btn-secondary mb-3">Tìm kiếm</button>
        </div>
    </form>

    <div class="col-6 mb-3">
        <a href="{{ route('shopping.create') }}" class="btn btn-info">Thêm Sản Phẩm</a>
    </div>
    <div class="table-responsive mb-3">
        <table class="table">
            <tr>
                <th class="col-sm-1" width="89px"><input type="checkbox" id="checkall" class="checkboxAll" name="item[]"></th>
                <th class="col-sm-2">Hình ảnh</th>
                <th class="col-sm-2">Tên sản phẩm</th>
                <th class="col-sm-3">Mô tả</th>
                <th class="col-sm-2">Loại Sản Phẩm</th>
                <th class="col-sm-2" width="200px"></th>
            </tr>
            @forelse($resul_product as $sp)
            <tr>
                    <td class="col-sm-1"><input type="checkbox" id="item1" name="item[]" class="checkboxItem" value="{{$sp->id}}"></td>
                    <td class="col-sm-2"><img src="{{asset('uploads')}}/{{$sp->image}}" style="object-fit: cover;" height="50" width="80"></td>
                    <td class="col-sm-2">{{$sp->title}}</td>
                    <td class="col-sm-3">{{$sp->content}}</td>
                    <td class="col-sm-2">{{$sp->category->name_cat}}</td>

                    <td class="col-sm-2">
                        <a href="{{ url('edit')}}/{{$sp->id}}" class="btn btn-primary" style="margin: 0 4px 4px 0;">Chỉnh sửa</a>
                        <a href="{{ url('destroy')}}/{{$sp->id}}" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa không?')" style="margin: 0 4px 4px 0;">Xóa</a>
                    </td>
                    @empty
                    <td colspan="6" style="color: red;">Không có sản phẩm nào</td>
            </tr>
            @endforelse
            

        </table>
    </div>
    <div class="row">
        <div class="mb-3 ml-4">
            <button type="sumit" class="btn btn-success btn-complete" onclick="completed({{$cat_id}})" disabled>Hoàn Thành</button>       
        </div>
        <div class="mb-3 ml-2">
            <button type="submit" class="btn btn-danger btn-delete" onclick="deleteALl({{$cat_id}})" disabled>Xóa đã chọn</button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table" style="background: #f3f3f375;">
            <tr>
                <th colspan="6"> Tổng sản phẩm đã chọn ({{$count}})</th>
            </tr>
            @forelse($resul_product_complete as $sp)
            <tr>
                    <td class="col-sm-1"><input type="checkbox" checked disabled="true"></td>
                    <td class="col-sm-2"><img src="{{asset('uploads')}}/{{$sp->image}}" style="object-fit: cover;" height="50" width="80"></td>
                    <td class="col-sm-2" style="text-decoration: line-through; color: #80868b!important;">{{$sp->title}}</td>
                    <td class="col-sm-3" style="text-decoration: line-through; color: #80868b!important;">{{$sp->content}}</td>
                    <td class="col-sm-2" style="text-decoration: line-through; color: #80868b!important;">{{$sp->category->name_cat}}</td>
                    <td class="col-sm-2">
                        <a href="{{ url('category_uncomplete')}}/{{$sp->id}} " class="btn btn-primary" style="margin: 0 4px 4px 0;">Hoàn Tác</a>
                        <a href="{{ url('destroy')}}/{{$sp->id}}" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa không?')" style="margin: 0 4px 4px 0;">Xóa</a>
                    </td>
                    @empty
                    <td colspan="4" style="color: red;">Chưa có sản phẩm nào được tìm thấy hoặc mua</td>
            </tr>
            @endforelse
        </table>
    </div>
@stop
