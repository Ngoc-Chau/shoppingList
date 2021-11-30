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
        <h1>SHOPPING LIST</h1>
    </div>

    <div class="nav justify-content-center py-1 mb-4">
        <nav class="nav d-flex justify-content-between">
          <a class="btn btn-light" href="#">Tất cả</a>
          <a class="btn btn-light" href="#">Đồ gia dụng</a>
          <a class="btn btn-light" href="#">Hải sản</a>
          <a class="btn btn-light" href="#">Thịt</a>
          <a class="btn btn-light" href="#">Rau củ quả</a>
          <a class="btn btn-light" href="#">Gia vị</a>
          <a class="btn btn-light" href="#">Rau thơm</a>
        </nav>
    </div>
    

    <form class="row justify-content-center">
        <div class="col-4">
          <input type="search" class="form-control" id="search" placeholder="Nhập ...">
        </div>
        <div class="">
          <button type="submit" class="btn btn-secondary mb-3">Tìm kiếm</button>
        </div>
    </form>
    
    <form action="{{ route('shopping.deleteAll') }}" method="get">
        @csrf
        @if(Session::has('msg'))
        <p style="color:red;">{{ Session::get('msg') }}</p>
        @endif
        <div class="table">
            <table class="table">
                <tr>
                    <th width="30px"><input type="checkbox" id="checkall" name="" class="checkboxAll"></th>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Mô tả</th>
                    <th width="200px"></th>
                </tr>
                <tr>
                    <td><input type="checkbox" id="item1" name="item[]" class="checkboxItem" value="1"></td>
                    <td><img src="" alt="image"></td>
                    <td>Thịt gà</td>
                    <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                    <td>
                        <a href="{{ route('shopping.edit',1) }}" class="btn btn-primary">Chỉnh sửa</a>
                        <a href="{{ route('shopping.destroy',1) }}" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox" id="item1" name="item[]" class="checkboxItem" value="1"></td>
                    <td><img src="" alt="image"></td>
                    <td>Thịt gà</td>
                    <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                    <td>
                        <a href="{{ route('shopping.edit',1) }}" class="btn btn-primary">Chỉnh sửa</a>
                        <a href="{{ route('shopping.destroy',1) }}" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox" id="item1" name="item[]" class="checkboxItem" value="1"></td>
                    <td><img src="" alt="image"></td>
                    <td>Thịt gà</td>
                    <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                    <td>
                        <a href="{{ route('shopping.edit',1) }}" class="btn btn-primary">Chỉnh sửa</a>
                        <a href="{{ route('shopping.destroy',1) }}" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox" id="item1" name="item[]" class="checkboxItem" value="1"></td>
                    <td><img src="" alt="image"></td>
                    <td>Thịt gà</td>
                    <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                    <td>
                        <a href="{{ route('shopping.edit',1) }}" class="btn btn-primary">Chỉnh sửa</a>
                        <a href="{{ route('shopping.destroy',1) }}" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-6 mb-3">
            <a href="{{ route('shopping.create') }}" class="btn btn-info">Thêm Sản Phẩm</a>
            <button type="submit" class="btn btn-success" disabled>Hoàn Thành</button>
            <button type="submit" class="btn btn-danger btn-delete" disabled>Xóa đã chọn</button>
        </div>
    </form>
@stop
