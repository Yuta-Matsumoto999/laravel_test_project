@extends('layouts.user')

@section('content')
<main>
  <div class="py-4">
    <div class="container">
      <h1>Thank You!!</h1>
    </div>
    <div class="container">
      <p class="text-center">{{ Auth::user()->name }} 様お買い上げありがとうございます!！ <br> 商品到着までしばらくお待ちください！！</p>
    </div>

    <div class="container">
      <div class="text-center">
        <img src="{{ asset('logo.image/ogp-1.png') }}" alt="" class="img-fluid">
      </div>
    </div>
    <div class="container text-center mt-5">
      <h3>商品のお問い合わせについて</h3>
      <p>商品のお問い合わせについては  <a href="{{ route('sale.show.contact') }}">こちら</a>  のお問い合わせフォームをご利用ください。</p>
      <p> ※商品到着までは、お時間を要する場合があります。</p>
    </div>
  </div>
</main>
@endsection