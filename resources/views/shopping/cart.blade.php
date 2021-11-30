@extends('layouts.app')

@push('styles')
    .container {
        margin-top: 3em;
    }

@endpush

@push('scripts')


@endpush

@section('content')
  <h1><center> @lang('lang.create') / @lang('lang.edit')</center></h1>
  <form action="{{ route('blog.create', $id) }}" method="post">
      @csrf
      <div class="form-group">
          <label>@lang('lang.title') <span style="color:red">(*)</span></label>
          <input type="text" class="form-control" id="title" name="title">
      </div>
      @error('title')
          <p style="color:red">{{ $message }}</p>
      @enderror
      {{--  @if($errors->has('fullname'))
          <p style="color:red;" class="errors">{{ $errors->first('fullname') }}</p>
      @endif  --}}
      <div class="form-group">
          <label>@lang('lang.content') <span style="color:red">(*)</span></label>
          <input type="text" class="form-control" id="content"name="content">
      </div>
      @error('content')
          <p style="color:red">{{ $message }}</p>
      @enderror
      <div class="form-group">
          <label>@lang('lang.createBy')</label>
          <select class="form-control" id="by">
            <option>create by</option>
            <option>Mark</option>
            <option>Ceo</option>
            <option>John</option>
            <option>Vila</option>
          </select>
        </div>
      <div class="form-group">
          <label>@lang('lang.createDate')</label>
          <input type="datetime-local" class="form-control" name="create_date"  >
      </div>
      @error('create_date')
          <p style="color:red">{{ $message }}</p>
      @enderror
      <button type="submit" class="btn btn-primary">@lang('lang.save')</button>
      <a href="{{ route('blog.index') }}" class="btn btn-secondary">
          @lang('lang.back')
      </a>
  </form>
@stop
