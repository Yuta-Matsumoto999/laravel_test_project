@extends('layouts.admin')

@section('content')
<div class="py-4">
  <div class="container">
    <h3>商品管理</h3>
  </div>
  <div class="container mt-4">
    {!! Form::open(['route' =>['admin.products'], 'method' => 'GET']) !!}
      <div class="form-row">
        <div class="form-group col-6 text-center">
          {!! Form::text('name', $searches['name'] ??  null, ['class' => 'form-control', 'placeholder' => 'Seach Product...']) !!}
        </div>
        <div class="form-group col-4 text-right">
          <select name="tag_category_id" class="form-control">
            <option value="">Select category</option>
            <option value="1">WEAR</option>
            <option value="2">GLOB</option>
            <option value="3">TRAINING</option>
          </select>
        </div>
        <div class="form-group col-2 text-center">
          <a href="{{ route('admin.create.product') }}"><i class="fas fa-plus-circle fa-2x"></i></a>
        </div>
      </div>
      <div class="form-group text-center">
        {!! Form::submit('検索', ['class' => 'btn btn-primary']) !!}
      </div>
    {!! Form::close() !!}
    @foreach ($products as $product)
    <div class="row p-3">
      <div class="col-md-7 order-md-2 mt-2">
        <h4>{{ $product->name }}</h4>
        <table class="table table-striped">
          <tbody>
            <tr>
              <th>カテゴリー</th>
              <td>{{ $product->tagcategories->name }}</td>
            </tr>
            <tr>
              <th>モデル</th>
              <td>{{ $product->model }}</td>
            </tr>
            <tr>
              <th>掲載日</th>
              <td>{{ $product->updated_at->format('Y/m/d') }}</td>
            </tr>
            <tr>
              <th>商品番号</th>
              <td>{{ $product->id }}</td>
            </tr>
            <tr>
              <th>PRICE</th>
              <td>{{ $product->price }}円 (+税)</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-5 mt-4">
        <p><img src="{{ asset('storage/' . $product->photo) }}" alt="画像がありません" class="img-fluid"></p></div>
    </div>
    <div class="text-right mb-5 mr-3">
        <a href="{{ route('admin.edit.product', $product->id) }}" class="btn btn-info mr-3">編集する</a>
      {!! Form::open(['route' => ['admin.destroy.product', $product->id], 'method' => 'DELETE', 'class' => 'd-inline']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
      {!! Form::close() !!}
    </div>
    @endforeach
    {{ $products->appends($searches)->links() }}
  </div>
</div>
@endsection