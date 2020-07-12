@extends('layouts.admin')

@section('content')
  <div class="py-4 vh-100">
    <div class="container">
      <h3>{{ $user->name }}  さんの購入品</h3>
    </div>
      @if ($buys->isNotEmpty())
    @foreach ($buys as $buy)
    <div class="container border mt-4">
      <div class="row">
        <div class="col-md-7 order-md-2 mt-4">
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
                <th>購入日</th>
                <td>{{ $buy->buyTime->format('Y/m/d') }}</td>
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
          <p><img src="{{ asset('storage/' . $buy->products->photo) }}" alt="画像がありません" class="img-fluid"></p> 
        </div>
      </div>
        <div class="form-group text-center">
          @if ($buy->shippingTime == null)
            <a href="{{ route('admin.edit.buys', $buy->id) }}"><button class="btn btn-danger">未発送</button></a>
            @else
            <a href="{{ route('admin.edit.buys', $buy->id) }}"><button class="btn btn-primary">発送済</button></a>
          @endif
        </div>
        {{ $buys->links() }}
    </div>
    @endforeach
    @else 
      <div class="container　mt-5">
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