@extends('layouts.user')

@section('content')
<main>
  <div class="py-4">
    <div class="container">
      <div class="row">
        <div class="col-8">
          <h1>My Cart</h1>
        </div>
      </div>
      @if ($carts->isNotEmpty())
      @foreach ($carts as $cart)
      <div class="container border">
        <div class="row">
          <div class="col-md-7 order-md-2 mt-2">
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
            <a href="{{ route('sale.show.cart.product', $cart->id) }}"><img src="{{ asset('storage/images/' . $cart->products->photo) }}" alt="画像がありません" class="img-fluid"></a> 
          </div>
        </div>
        <div class="row">
          <div class="col text-right mb-3">
            {!! Form::open(['route' =>['sale.destroy.cart', $cart->id], 'method' => 'delete']) !!}
              {!! Form::submit('カートから削除', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
          </div>
        </div>
      </div>
      @endforeach
      <div class="col-12 text-center mt-3">
        <h5>小計 ({{ $sumQuentity }}個の商品) (税抜) : {{ $sumPrice}}円</h5>
      </div>
      <div class="col-12 text-center mt-3">
        <a href="{{ route('sale.show.cart.purchase') }}"><button class="btn btn-primary">購入へ進む</button></a>
      </div>
      @else 
    </div>
    <div class="container mt-5 vh-100">
      <div class="text-center">
        <h3>カートは空です</h3>
      </div>
      <div class="text-center mt-5">
        <img src="{{ asset('logo.image/ogp-1.png') }}" alt="" class="img-fluid">
      </div>
      <div class="col-12 text-center mt-5">
        <h5>小計 ({{ $sumQuentity }}個の商品) (税抜) : {{ $sumPrice}}円</h5>
      </div>
      @endif
    </div>
  </div>
</main>
@endsection