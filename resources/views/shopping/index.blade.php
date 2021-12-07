@extends('layouts.app')

@push('styles')
    <style>
    </style>

@endpush

@push('scripts')
    <script>
        
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
            @if(empty($resul_category))
            <a class="btn btn-light" href="{{ route('shopping.index') }}">Tất cả</a>
            @else
            @foreach($resul_category as $cate)
                <a class="btn btn-light" href="{{ url('category')}}/{{$cate->id}}">{{$cate->name_cat}}</a>
            @endforeach
            @endif
        </nav>
    </div>
    
            
    <form class="row justify-content-center">
        <div class="col-4">
          <input type="search" class="form-control" id="search" placeholder="Nhập ..." >
        </div>
        <div class="">
          <button type="submit" class="btn btn-secondary mb-3">Tìm kiếm</button>
        </div>
        <div class="">
          <a class="btn btn-secondary ml-2"  data-toggle="modal" data-target="#myModal"><i class='fa fa-share-alt'></i></a>
        </div>
    </form>
    <div class="row justify-content-center">
        @if(Session::has('welcome'))
            <p style="color:red;">{{ Session::get('welcome') }}</p>
        @endif
    </div>

    {{-- Share TodoList Start --}}
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('shopping.shareMail') }}" method="POST">
                    @csrf
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Nhập Gmail Bạn Muốn Chia Sẻ</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <label for="floatingInput">Nhập gmail</label>
                            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="you@gmail.com">
                        </div>
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Share TodoList Stop --}}


    <form action="{{ route('category_complete') }}" method="post">
        @csrf
        <div class="table">
            <table class="table">
                <tr>
                    <th width="30px"><input type="checkbox" id="checkall" name="item[]"></th>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Mô tả</th>
                    <th width="200px"></th>
                </tr>
                @forelse($resul_product as $sp)
                <tr>
                        <td><input type="checkbox" id="checkall" name="item[]" class="checkboxItem" value="{{$sp->id}}"></td>
                        <td><img src="" alt="image">{{$sp->image}}</td>
                        <td>{{$sp->title}}</td>
                        <td>{{$sp->content}}</td>
                        <td>
                            <a href="{{ route('shopping.edit',1) }}" class="btn btn-primary">Chỉnh sửa</a>
                            <a href="{{ route('shopping.destroy',1) }}" class="btn btn-danger">Xóa</a>
                        </td>
                        @empty
                        <td colspan="4" style="color: red;">Không có sản phẩm nào</td>
                </tr>
                @endforelse
                

            </table>
        </div>
        <div class="col-6 mb-3">
            <a href="{{ route('shopping.create') }}" class="btn btn-info">Thêm Sản Phẩm</a>
            <button type="submit" class="btn btn-success">Hoàn Thành</button>
            <button type="submit" class="btn btn-danger btn-delete">Xóa đã chọn</button>
        </div>
    </form>
    <div class="table">
            <table class="table">
                @forelse($resul_product_complete as $sp)
                <tr>
                        <td width="30px"><input type="checkbox" id="item1" name="item[]" readonly="false" value="{{$sp->id}}" checked disabled="true"></td>
                        <td><img src="" alt="image">{{$sp->image}}</td>
                        <td style="text-decoration: line-through; color: #80868b!important;">{{$sp->title}}</td>
                        <td style="text-decoration: line-through; color: #80868b!important;">{{$sp->content}}</td>
                        <td width="200px">
                            <a href="{{ url('category_uncomplete')}}/{{$sp->id}} " class="btn btn-primary">Hoàn Tác</a>
                            <a href="{{ route('shopping.destroy',1) }}" class="btn btn-danger">Xóa</a>
                        </td>
                        @empty
                        <td colspan="4" style="color: red;">Chưa có sản phẩm nào được tìm thấy hoặc mua</td>
                </tr>
                @endforelse
            </table>
    </div> 
    <!-- <script>
        $("#checkall").change(function(){
            $(".checkboxItem").prop("checked",$(this).prop("checked"))
        })
        $(".checkboxItem").change(function(){
            if($this).prop("checked"==false){
                $("#checkall").prop("checked",false)
            }
            if($(".checkboxItem:checked").length==$(".checkboxItem").length){
                $("#checkall").prop("checked",true)
            }
        })
    </script>            -->
@stop
