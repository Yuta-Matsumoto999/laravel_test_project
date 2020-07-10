@extends('layouts.admin')

@section('content')

  <div class="container">
    <div class="row mt-5 ml-5">
      <h3>管理内容一覧</h3>
    </div>

    <div class="row mb-5">
      <div class="col-sm-6 col-md-4 mt-5">
        <div class="card img-thumbnail">
          <img class="card-img-top" src="/logo.image/client.jpg" alt="画像">
          <div class="card-body px-2 py-3">
            <h3 class="card-title">Clients</h3>
            <p class="card-text">顧客情報管理</p>
            <p class="mb-0"><a href="{{ route('admin.users') }}" class="btn btn-primary btn-sm">詳細へ</a>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-4 mt-5">
        <div class="card img-thumbnail">
          <img class="card-img-top" src="/logo.image/product.jpg" alt="画像">
          <div class="card-body px-2 py-3">
            <h3 class="card-title">Products</h3>
            <p class="card-text">商品情報管理</p>
            <p class="mb-0"><a href="{{ route('admin.products') }}" class="btn btn-primary btn-sm">詳細へ</a>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-4 mt-5">
        <div class="card img-thumbnail">
          <img class="card-img-top" src="/logo.image/contact.jpg" alt="画像">
          <div class="card-body px-2 py-3">
            <h3 class="card-title">Contact</h3>
            <p class="card-text">お問い合わせ管理</p>
            <p class="mb-0"><a href="{{ route('admin.contacts') }}" class="btn btn-primary btn-sm">詳細へ</a>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-4 mt-5">
        <div class="card img-thumbnail">
          <img class="card-img-top" src="/logo.image/buys.jpg" alt="画像">
          <div class="card-body px-2 py-3">
            <h3 class="card-title">Buys</h3>
            <p class="card-text">発送管理</p>
            <p class="mb-0"><a href="{{ route('admin.buys') }}" class="btn btn-primary btn-sm">詳細へ</a>
          </div>
        </div>
      </div>

    </div>
  </div>

@endsection