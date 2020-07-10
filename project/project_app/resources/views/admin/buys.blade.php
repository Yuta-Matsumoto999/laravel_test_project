@extends('layouts.admin')

@section('content')
<div class=py-4>
  <div class="container">
    <h3>注文品一覧</h3>
  </div>
  <div class="container">
    {!! Form::open(['route' => ['admin.buys'], 'method' => 'GET']) !!}
      <div class="form-row">
        <div class="form-group col-5 @if($errors->has('buyTime')) has-error @endif">
          <label>購入日</label>
          {!! Form::date('buyTime', null, ['class' => 'form-control']) !!}
          <span class="help-block">{{ $errors->first('buyTime') }}</span>
        </div>
        <div class="form-group col-5 @if($errors->has('shippingTime')) has-error @endif">
          <label>発送日</label>
          {!! Form::date('shippingTime', null, ['class' => 'form-control']) !!}
          <span class="help-block">{{ $errors->first('shippingTime') }}</span>
        </div>
        <div class="form-group col-2">
          <label>発送状況</label>
          <div class="form-check">
            <input name="buy" value="buy" class="form-check-input" type="checkbox">
            <label class="form-check-label">未発送</label>
          </div>
        </div>
      </div>
      <div class="form-group text-center">
        {!! Form::submit('検索', ['class' => 'btn btn-primary']) !!}
      </div>
    {!! Form::close() !!}
  </div>
  @if ($buys->isNotEmpty())
  @foreach ($buys as $buy)
  <div class="container border mt-4">
    <div class="row">
      <p class="ml-5 mt-3">購入者  :  <a href="{{ route('admin.confirm.user', $buy->user->id) }}">{{ $buy->user->name }}</a> さん</p>
    </div>
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
    <div class="container">
      <div class="text-center">
        <h3>購入履歴はありません</h3>
      </div>
      <div class="text-center">
        <img src="{{ asset('logo.image/ogp-1.png') }}" alt="" class="img-fluid">
      </div>
    </div>
  @endif
</div>
@endsection