@extends('layouts.user')

@section('content')

<div class="py-4">
  <div class="container">
    <div class="row">
      <h1>アカウント情報</h1>
    </div>
    <div class="row">
      <div class="col-12">
        {!! Form::open(['route' => ['sale.update.user']]) !!}
          <div class="form-row">
            <div class="form-group col-7">
              <label>お名前</label>
              {!! Form::text(null, $user->name, ['class' => 'form-control', 'readonly']) !!}
            </div>
          </div>
          <div class="form-group">
            <label>メールアドレス</label>
            {!! Form::email(null, $user->email, ['class' => 'form-control', 'readonly']) !!}
          </div>
          <div class="form-group">
            <p>** メールアドレス、パスワードの変更は  <a href="">こちら</a>  からお願い致します **
          </div>
          <div class="form-row">
            <div class="form-group col-6 @if($errors->has('birthday')) has-error @endif">
              <label>生年月日</label>
              {!! Form::date('birthday', $user->birthday, ['class' => 'form-control']) !!}
              <span class="help-block">{{ $errors->first('birthday') }}</span>
            </div>
            <div class="form-group col-6 @if($errors->has('gender')) has-error @endif">
              <label>性別</label>
              <select name="gender" class="form-control">
                <option value="">select</option>
                <option value="1">男性</option>
                <option value="2">女性</option>
                <option value="3">指定しない</option>
              </select>
              <span class="help-block">{{ $errors->first('gender') }}</span>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-4 @if($errors->has('address_num')) has-error @endif">
              <label>郵便番号</label>
              {!! Form::text('address_num', $user->address_num, ['class' => 'form-control']) !!}
              <span class="help-block">{{ $errors->first('address_num') }}</span>
            </div>
          </div>
          <div class="form-group @if($errors->has('address')) has-error @endif">
            <label>ご住所</label>
            {!! Form::text('address', $user->address, ['class' => 'form-control']) !!}
            <span class="help-block">{{ $errors->first('address') }}</span>
          </div>
          <div class="form-group">
            <p>* こちらのご住所に商品をお届け致します。 お届け先が変わった場合はこちらから変更をお願い致します。</p>
          </div>
          <div class="form-group text-center">
            {!! Form::submit('変更する', ['class' => 'btn btn-primary']) !!}
          </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

@endsection