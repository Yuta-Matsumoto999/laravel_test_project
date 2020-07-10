@extends('layouts.user')

@section('content')
<main>
  <div class="py-4">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1>購入画面</h1>
        </div>
      </div>
      @foreach ($carts as $cart)
      <div class="container border">
        <div class="row">
          <div class="col-md-7 order-md-2 mt-3">
            <h4>{{ $cart->products->name }}</h4>
            <table class="table table-striped">
              <tbody>
                <tr>
                  <th>商品番号</th>
                  <td>{{ $cart->products->id }}</td>
                </tr>
                <tr>
                  <th>モデル</th>
                  <td>{{ $cart->products->model }}</td>
                </tr>
                <tr>
                  <th>掲載日</th>
                  <td>{{ $cart->products->updated_at->format('Y/m/d') }}</td>
                </tr>
                <tr>
                  <th>PRICE</th>
                  <td>{{ $cart->price }}円 +税</td>
                </tr>
                <tr>
                  <th>数量</th>
                  <td>{{ $cart->quentity }} 個</td>
                </tr>
                <tr>
                  <th>小計</th>
                  <td>{{ $cart->sumPrice }} 円 (税抜)</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-md-5 mt-4">
            <a href="{{ route('sale.show.cart.product', $cart->id) }}"><img src="{{ asset('storage/' . $cart->products->photo) }}" alt="" class="img-fluid"></a> 
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-12 text-right">
        <h5 class="product-price">小計   {{ $sumPrice }}円</h5>
      </div>
      <div class="col-12 text-right">
        <h5 class="product-price">消費税   {{ round($taxPrice) }}円</h5>
      </div>
      <div class="col-12 text-right">
        <h5 class="product-price">送料   無料</h5>
      </div>
      <div class="col-12 text-right">
        <h3 class="product-price">合計金額   {{ round($totalPrice) }}円</h3>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h3>お客様情報</h3>
      </div>
      <div class="col-12">
        {!! Form::open(['route' => ['sale.store.cart.purchase']]) !!}
          <div class="form-row mb-3">
            <div class="form-group col-6">
              <label for="name1">お名前</label>
              {!! Form::text(null, $user->name, ['class' => 'form-control', 'id' => 'name1', 'readonly']) !!}
            </div>
            <div class="form-group col-6">
              <label for="email1">メールアドレス</label>
              {!! Form::email(null, $user->email, ['class' => 'form-control', 'id' => 'email1', 'readonly']) !!}
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-4 @if($errors->has('address_num')) has-error @endif">
              <label>郵便番号</label>
              {!! Form::text('address_num', $user->address_num, ['class' => 'form-control']) !!}
              <span class="help-block">{{ $errors->first('address_num') }}</span>
            </div>
            <div class="form-group col-8 @if($errors->has('address')) has-error @endif">
              <label>住所</label>
              {!! Form::text('address', $user->address, ['class' => 'form-control']) !!}
              <span class="help-block">{{ $errors->first('address') }}</span>
            </div>
          </div>
        <div class="text-center mb-4">
          {!! Form::submit('購入する', ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</main>
@endsection