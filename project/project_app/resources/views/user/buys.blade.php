@extends('layouts.user')

@section('content')
<div class="py-4">
  <div class="container mb-4">
    <h1>購入履歴</h1>
  </div>
  @if ($buys->isNotEmpty())
  @foreach ($buys as $buy)
  <div class="container border">
    <div class="row">
      <div class="col-md-7 order-md-2 mt-2">
        <h4>{{ $buy->products->name }}</h4>
        <table class="table table-striped">
          <tbody>
            <tr>
              <th>商品番号</th>
              <td>{{ $buy->products->id }}</td>
            </tr>
            <tr>
              <th>モデル</th>
              <td>{{ $buy->products->model }}</td>
            </tr>
            <tr>
              <th>掲載日</th>
              <td>{{ $buy->products->updated_at->format('Y/m/d') }}</td>
            </tr>
            <tr>
              <th>PRICE</th>
              <td>{{ $buy->price }}円 +税</td>
            </tr>
            <tr>
              <th>数量</th>
              <td>{{ $buy->quentity }} 個</td>
            </tr>
            <tr>
              <th>小計</th>
              <td>{{ $buy->sumPrice }} 円 (税抜)</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-5 mt-4">
        <p><img src="{{ asset('storage/images/' . $buy->products->photo) }}" alt="画像がありません" class="img-fluid"></p> 
      </div>
    </div>
  </div>
  @endforeach
  @else 
    <div class="container vh-100">
      <div class="text-center mt-5">
        <h3>購入履歴はありません</h3>
      </div>
      <div class="text-center mt-5">
        <img src="{{ asset('logo.image/ogp-1.png') }}" alt="" class="img-fluid">
      </div>
    </div>
    @endif
</div>
@endsection