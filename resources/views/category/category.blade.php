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
    <div class="form mb-5">
        <form action="{{ route('category_insert') }}" method="post">
            @csrf
            <div class="form-group py-2">
                <label>@lang('lang.CategoryName')<span style="color:red">(*)</span></label>
                @error('name_cat')
                    <p style="color: red">{{$message}}</p>
                @enderror
                @if(Session::has('message'))
                    <p style="color:red;">{{ Session::get('message') }}</p>
                @endif
                <input type="text" class="form-control" id="product" name="name_cat">
            </div>
            <button type="submit" class="btn btn-primary">@lang('lang.save') </button>
            <a href="{{ route('shopping.index') }}" class="btn btn-secondary">@lang('lang.back')</a>
        </form>
    </div>
    <div class="table" style="margin-bottom: 18rem!important;">
        <table class="table">
            <tr>
                <th class="col-sm-6">@lang('lang.CategoryList')</th>
                <th class="col-sm-6">@lang('lang.function')</th>
            </tr>
            @foreach($resul_category as $key => $sp)
            <tr>
                <td>{{$sp->name_cat}}</td>
                <td>
                <a class="btn btn-success" href="#" data-toggle="modal" data-target="#ModalEdit({{$sp->id}})" style="margin: 0 4px 4px 0;">@lang('lang.edit')</a>
                    <a href="{{url('category/delete')}}/{{$sp->id}}" class="btn btn-danger" style="margin: 0 4px 4px 0;">@lang('lang.delete')</a>
                </td>
            </tr>
            <form action="{{ route('category_update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal fade text-left" id="ModalEdit({{$sp->id}})" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">@lang('lang.edit')</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <p><strong>@lang('lang.ProductName'):</strong></p>
                                        <input type="text" class="form-control" id="floatingInput" name="name_cat" value="{{$sp->name_cat}}">
                                        <input type="hidden" name="id" value="{{$sp->id}}">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-warning">@lang('lang.edit')</button>
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
