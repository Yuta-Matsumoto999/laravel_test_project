@extends('layouts.user')

@section('content')
<main>
  <div class="py-4">
    <div class="container">
        <h1>Contact </h1>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12">
          {!! Form::open(['route' => ['sale.store.contact']]) !!}
            <div class="form-group">
              <label for="name1">お名前</label>
              {!! Form::text('', $user->name, ['class' => 'form-control', 'id' => 'name1', 'placeholder' => 'お名前', 'readonly' ]) !!}
            </div>
            <div class="form-group">
              <label for="メールアドレス">メールアドレス</label>
              {!! Form::email('', $user->email, ['class' => 'form-control', 'id' => 'emal1', 'placeholder' => 'example@gmail.com', 'readonly']) !!}
            </div>
            <div class="form-group @if($errors->has('title')) has-error @endif">
              <label for="title1">タイトル</label>
              {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title1', 'placeholder' => 'title']) !!}
              <span class="help-block">{{ $errors->first('title') }}</span>
            </div>
            <div class="form-group @if($errors->has('content')) has-error @endif">
              <label for="content1">内容</label>
              {!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'content1', 'rows' => '10', 'placeholder' => 'content']) !!}
              <span class="help-block">{{ $errors->first('content') }}</span>
            </div>
            <div class="form-group text-center">
              {!! Form::submit('送信', ['class' => 'btn btn-primary']) !!}
            </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</main>
@endsection