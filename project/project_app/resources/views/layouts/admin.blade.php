<!DOCTYPE html>
<html lang="ja">
<head>
<meta charest="UTF-8">
<meta name="viewport" content="width-device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="css/boootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
<title>ECサイト</title>
</head>
<body>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	
	<nav class="navbar navbar-expand-md navbar-dark sticky-top bg-info">
		<div class="container">
			<a class="navbar-brand" href="">HO SOCCER JAPAN (ADMIN)</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
			<div class="collapse navbar-collapse" id="navbar-content">
				<!-- 左側メニュー：トップページの各コンテンツへのリンク -->
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="{{ route('admin.index') }}">Top </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('admin.users') }}">Client</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('admin.products') }}">Product</a>
          </li>
          <li class="nav-item">
						<a class="nav-link" href="{{ route('admin.buys') }}">Buys</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('admin.contacts') }}">Contact</a>
					</li>
				</ul>
				<!-- 右側メニュー：Logoutのリンク -->
				<ul class="navbar-nav">
					<li class="nav-item">
						{!! Form::open(['route' => ['admin.logout']]) !!}
							{!! Form::submit('Logout', ['class' => 'btn btn-primary']) !!}
						{!! Form::close() !!}
					</li>
				</ul>
				<!-- /ナビゲーションメニュー -->
			</div>
			<!-- /サブコンポーネント -->
		</div>
	</nav>

	@yield('content')

	<footer class="py-4 bg-info text-light">
		<div class="container text-center">
			<!-- ナビゲーション -->
			<ul class="nav justify-content-center mb-3">
				<li class="nav-item">
					<a class="nav-link" href="{{ route('sale.index') }}">Top</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('logout') }}">Logout</a>
				</li>
			</ul>
			<!-- /ナビゲーション -->
			<p>
				<small>Copyright &copy;2018 HO SOCCER JAPAN, All Rights Reserved.</small>
			</p>
		</div>
	</footer>

</body>
</html>
