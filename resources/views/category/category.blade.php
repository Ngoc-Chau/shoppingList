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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<form action="{{ route('category_insert') }}" method="post">
        @csrf
        @error('name_cat')
            <p>{{$message}}</p>
        @enderror
        <div class="form-group">
            <label>Tên Loại sản phẩm<span style="color:red">(*)</span></label>
            <input type="text" class="form-control" id="product" name="name_cat">
        </div>
        <button type="submit" class="btn btn-primary">Lưu </button>
        <a href="{{ route('shopping.index') }}" class="btn btn-secondary">Quay lại</a>

</form>
        <div class="table">
            <table class="table">
                <tr>
                    <th>Danh sách Loại sản phẩm</th>
                    <th width="200px"></th>
                </tr>
                @foreach($resul_category as $key => $sp)
                <tr>
                    <td>{{$sp->name_cat}}</td>
                    <td>
                    
                    <a class="btn btn-success" href="#" data-toggle="modal" data-target="#ModalEdit({{$sp->id}})">Edit</a>
                        <a href="{{url('category/delete')}}/{{$sp->id}}" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
                <form action="{{ route('category_update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal fade text-left" id="ModalEdit({{$sp->id}})" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Sửa</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Tên Loại Sản Phấm:</strong>
                                            <input type="text" class="form-control" id="floatingInput" name="name_cat" value="{{$sp->name_cat}}">
                                            <input type="hidden" name="id" value="{{$sp->id}}">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <button type="submit" class="btn btn-warning">Edit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                @endforeach
            </table>
        </div>
@stop