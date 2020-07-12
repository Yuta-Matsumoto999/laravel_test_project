@extends('layouts.user')

@section('content')
<main>
  <div class="py-4">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="text-center mb-5">
            <img src="{{ asset('storage/' . $cart->products->photo) }}" alt="商品画像がありません" class="img-fluid rounded text-center">
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12 text-center mb-3">
          <h3>小計  (税抜) : {{ $cart->products->price }}円</h3>
        </div>
      </div>
      <div class="container">
        <div class="p-4">
          <table class="table table-striped">
            <tbody>
              <tr>
                <th class="text-center">商品名</th>
                <td class="text-center">{{ $cart->products->name }}</td>
              </tr>
              <tr>
                <th class="text-center">商品番号</th>
                <td class="text-center">{{ $cart->products->id }}</td>
              </tr>
              <tr>
                <th class="text-center">モデル</th>
                <td class="text-center">{{ $cart->products->model }}</td>
              </tr>
              <tr>
                <th class="text-center">掲載日</th>
                <td class="text-center">{{ $cart->products->updated_at->format('Y/m/d') }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      <div class="container border border-primary rounded mb-3">
        <div class="row">
          <div class="col-12 text-left mb-2">
            <h5>商品詳細</h5>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <p class="text-justify">{{ $cart->products->content }}</p>
          </div>
        </div>
      </div>
      {!! Form::open(['route' => ['sale.update.cart', $cart->id], 'method' => 'PUT']) !!}
        <div class="form-row">
          <div class="form-group col-3  @if($errors->has('quentity')) has-error @endif">
            <label for="quentity1">数量</label>
            {!! Form::text('quentity', null, ['class' => 'form-control form-control-sm', 'id' => 'jsNum', 'placeholder' => $cart->quentity])!!}
            <span class="help-block">{{ $errors->first('quentity') }}</span>
            {!! Form::hidden('price', $cart->products->price, ['id' => 'item_price']) !!}
          </div>
          <div class="form-group col-6">
            <label for="quentity1">合計金額 (税抜)</label>
            {!! Form::text('sumPrice', '', ['class' => 'form-control form-control-sm text-center', 'id' => 'jsPrice', 'readonly']) !!}
          </div>
        </div>
        <div class="form-group text-center mt-3">
          {!! Form::submit('変更する', ['class' => 'btn btn-primary total-sum']) !!}
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</main>
<script>
  $(function(){  
    var tagInput = $('#jsNum'); 
    var tagOutput = $('#jsPrice'); 
    tagInput.on('change', function() {
      var value = $("#item_price").val();
      var str = $(this).val();
      var num = Number(str.replace(/[^0-9]/g, '')); 
      if(num == 0) {
        num = '';
      } 
      $(this).val(num);
      if(num != 0) {
        var price = num * value;
        tagOutput.val(price);
      }
    });
  });
  </script>
@endsection