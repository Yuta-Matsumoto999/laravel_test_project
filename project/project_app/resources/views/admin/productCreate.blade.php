@extends('layouts.admin')

@section('content')
  <div class="container">
    <div class="row mt-5 mb-5">
      <h3>商品新規作成</h3>
    </div>
    {!! Form::open(['route' => ['admin.store.product'], 'enctype' => 'multipart/form-data']) !!}
      <div class="form-group @if($errors->has('name')) has-error @endif">
        <label>name</label>
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        <span class="help-block">{{ $errors->first('name') }}</span>
      </div>
      <div class="form-group @if($errors->has('model')) has-error @endif">
        <label>model</label>
        {!! Form::text('model', null, ['class' => 'form-control']) !!}
        <span class="help-block">{{ $errors->first('model') }}</span>
      </div>
      <div class="form-row">
        <div class="form-group col-4 @if($errors->has('price')) has-error @endif">
          <label>price</label>
          {!! Form::text('price', null, ['class' => 'form-control']) !!}
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
      <div class="form-group @if($errors->has('photo')) has-error @endif">
        <label>photo</label>
        {!! Form::file('photo', ['class' => 'form-control-file']) !!}
        <span class="help-block">{{ $errors->first('photo') }}</span>
      </div>
      <div class="form-group @if($errors->has('content')) has-error @endif">
        <label>content</label>
        {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
        <span class="help-block">{{ $errors->first('content') }}</span>
      </div>
      <div class="form-group text-center">
        {!! Form::submit('新規作成', ['class' => 'btn btn-primary mb-5']) !!}
      </div>
  </div>
  {!! Form::close() !!}
@endsection