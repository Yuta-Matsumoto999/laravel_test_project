@extends('layouts.admin')

@section('content')
<div class="py-4">
  <div class="container">
    <h3>商品編集</h3>
  </div>
  <div class="container">
    {!! Form::open(['route' => ['admin.update.product', $product->id]]) !!}
      <div class="form-group @if($errors->has('name')) has-error @endif">
        <label>name</label>
        {!! Form::text('name', $product->name, ['class' => 'form-control']) !!}
        <span class="help-block">{{ $errors->first('name') }}</span>
      </div>
      <div class="form-group @if($errors->has('model')) has-error @endif">
        <label>model</label>
        {!! Form::text('model', $product->model, ['class' => 'form-control']) !!}
        <span class="help-block">{{ $errors->first('model') }}</span>
      </div>
      <div class="form-row">
        <div class="form-group col-4 @if($errors->has('price')) has-error @endif">
          <label>price</label>
          {!! Form::text('price', $product->price, ['class' => 'form-control']) !!}
          <span class="help-block">{{ $errors->first('price') }}</span>
        </div>
        <div class="form-group col-8 @if($errors->has('tag_category_id')) has-error @endif">
          <label>category</label>
          <select name="tag_category_id" class="form-control">
            <option value="">Select</option>
            <option value="1">WEAR</option>
            <option value="2">GLOB</option>
            <option value="3">TRAINING</option>
          </select>
          <span class="help-block">{{ $errors->first('tag_category_id') }}</span>
        </div>
      </div>
      <div class="form-group @if($errors->has('content')) has-error @endif">
        <label>content</label>
        {!! Form::textarea('content', $product->content, ['class' => 'form-control']) !!}
        <span class="help-block">{{ $errors->first('content') }}</span>
      </div>
      <div class="form-group text-center">
        {!! Form::submit('UPDATE', ['class' => 'btn btn-primary mb-5']) !!}
      </div>
  </div>
</div>
{!! Form::close() !!}
@endsection