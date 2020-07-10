@extends('layouts.admin')

@section('content')
  <div class="py-4">
    <div class="container">
        <h1>発送管理</h1>
    </div>
    <div class="container">
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
    </div>
    <div class="container">
      <h3>発送先</h3>
      <div class="form-row mt-3">
        <div class="form-group col-7">
          <label>宛名</label>
          {!! Form::text('name', $buy->user->name, ['class' => 'form-control']) !!}
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-4">
          <label>郵便番号</label>
          {!! Form::text('address_num', $buy->user->address_num, ['class' => 'form-control']) !!}
        </div>
      </div>
      <div class="form-group">
        <label>住所</label>
        {!! Form::text('address', $buy->user->address, ['class' => 'form-control']) !!}
      </div>
      <div class="form-group">
        <label>ご連絡先</label>
        {!! Form::email('email', $buy->user->email, ['class' => 'form-control']) !!}
      </div>
      @if ($buy->shippingTime == null)
      {!! Form::open(['route' => ['admin.store.shipping', $buy->id]]) !!}
      {!! Form::hidden('shippingTime', Carbon::now()) !!}
      <div class="form-group text-center mt-3">
        {!! Form::submit('発送する', ['class' => 'btn btn-primary']) !!}
      </div>
      {!! Form::close() !!}
      @else
      <div class="form-group text-center mt-3">
        <a href="{{ route('admin.buys') }}"><button class="btn btn-info">発送済</button>
      </div>
      @endif
    </div>
  </div>
@endsection