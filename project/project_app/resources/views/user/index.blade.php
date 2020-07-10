@extends('layouts.user')

@section('content')
<main>
  <!-- メインビジュアル -->
  <div class="py-4">
    <div class="container">
      <!-- カルーセル外枠 -->
      <div id="main_visual" class="carousel slide" data-ride="carousel">
        <!-- インジケーター -->
        <ol class="carousel-indicators">
          <li data-target="#main_visual" data-slide-to="0" class="active"></li>
          <li data-target="#main_visual" data-slide-to="1"></li>
          <li data-target="#main_visual" data-slide-to="2"></li>
        </ol>
        <!-- / インジケーター -->
        <!-- カルーセル内枠 -->
        <div class="carousel-inner">
          <!-- スライド01 -->
          <div class="carousel-item active">
            <img class="img-fluid text-center" src="/logo.image/apartado-GAMAS-eskudo-final.jpg" alt="">
          </div>
          <!-- / スライド01 -->
          <!-- スライド02 -->
          <div class="carousel-item">
            <img class="img-fluid" src="/logo.image/maxresdefault.jpg" alt="">
          </div>
          <!-- / スライド02 -->
          <!-- スライド03 -->
          <div class="carousel-item">
            <img class="img-fluid" src="/logo.image/home-kv.png" alt="">
          </div>
          <!-- / スライド03 -->
        </div>
        <!-- / カルーセル内枠 -->
        <!-- コントローラー -->
        <a class="carousel-control-prev" href="#main_visual" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">前に戻る</span> </a>
        <a class="carousel-control-next" href="#main_visual" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">次に進む</span> </a>
        <!-- / コントローラー -->
      </div>
      <!-- / カルーセル外枠 -->
    </div>
  </div>
  <!-- / メインビジュアル -->

  <div class="py-4">
    <section id="menu">
      <div class="container">
        <h1 class="mb-3">Products</h1>
        <h5>SELECT YOUR FAVORITE ITEMS!!</h5>
        {!! Form::open(['route' =>['sale.index',], 'method' => 'GET']) !!}
        <div class="form-row">
          <div class="form-group col-10 text-center">
            {!! Form::text('name', $searches['name'] ??  null, ['class' => 'form-control', 'placeholder' => 'Seach Product...']) !!}
          </div>
          <div class="form-group col-2 text-center">
            {!! Form::submit('検索', ['class' => 'btn btn-primary']) !!}
          </div>
        </div>
        <!-- タブ型ナビゲーション -->
        <div class="nav nav-tabs category-wrap" id="tab-menus" role="tablist">
          <!-- タブ01 -->
          <a class="nav-item nav-link active category" id="" data-toggle="tab" href="" role="tab" aria-controls="" aria-selected="true">ALL</a>
          @foreach ($tagCategories as $tagCategory)
          <a class="nav-item nav-link active category" id="{{ $tagCategory->id }}" data-toggle="tab" href="" role="tab" aria-controls="" aria-selected="true">{{ $tagCategory->name }}</a>
          @endforeach
          {!! Form::hidden('tag_category_id', $searches['tag_category_id'] ??  null, ['id' => 'category-val']) !!}
        {!! Form::close() !!}
        </div>
        <!-- /タブ型ナビゲーション -->
        <!-- パネル -->
        <div class="tab-content" id="panel-menus">
          @foreach ($products as $product)
          <div class="tab-pane fade show active border border-top-0" id="{{ $product->tagCategories->id }}" role="tabpanel" aria-labelledby="tab-menu01">
            <div class="row p-3 mt-5">
              <div class="col-md-7 order-md-2">
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
              <div class="col-md-5 mt-3">
                <a href="{{ route('sale.show.product', $product->id) }}"><img src="{{ asset('storage/' . $product->photo) }}" alt="画像がありません" class="img-fluid"></a></div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
        {{ $products->appends($searches)->links() }}
    </section>
  </div>
</main>
<script>
  $('.category-wrap .category').on('click', function(){
    var category_id = $(this).attr('id');
    $('#category-val').val(category_id);
    $('form').submit();
  });
</script>
@endsection