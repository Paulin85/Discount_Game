<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    
    @yield('extra-meta')
    <title>Discount Game</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    @yield('extra-script')
    

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">

<link rel="stylesheet" href="{{ asset('css/front.css') }}">



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/blog.css" rel="stylesheet">
  </head>
  <body>
    
    <div class="container">
    <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="pt-1">
        <a class="text-muted" href="{{ route('cart.index') }}">Panier <span class="badge badge-pill badge-dark">{{ Cart::count() }}</span></a>
      </div>
      <div class="text-center">
      <a href="{{ route('products.index') }}"><img class="icone" src="image/logo/icon.png"></a>
          </div>
      <div class="d-flex justify-content-end align-items-center">
          @include('partials.search')
          @include('partials.auth')
      </div>
    </div>
  </header>

  @section('content')
			<div class="col-md-12">
				<div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
					<div class="col p-4 d-flex flex-column position-static">
					<div class="badge badge-pill badge-info">{{ $stock }}</div>
					<h3 class="mb-0">{{ $product->name }}</h3>
					<div class="mb-1 text-muted">{{ $product->getPrice() }}</div>
					{!! $product->description !!}
					@if ($stock === 'Disponible')
						<form action="{{ route('cart.store') }}" method="POST">
						@csrf
							<input type="hidden" name="product_id" value="{{ $product->id }}">
							<button type="submit" class="stretched-link btn btn-info">Ajouter au panier</button>
						</form>
					@endif
					</div>
					<div class="col-auto d-none d-lg-block">
	  					<img width="300" height="375" src="{{ asset('storage/' . $product->image) }}">
					</div>
				</div>
			</div>
	
			<div class="formulaire text-align-center">
					<form action="/ma-page-de-traitement" method="post">
				<div class="pb-4">
					<input type="text" id="name" name="user_name" placeholder="Nom">
				</div>
				<div class="pb-4">
					<select name="note" id="note-select">
						<option>Choisissez une note...</option>
						<option>5</option>
						<option>4</option>
						<option>3</option>
						<option>2</option>
						<option>1</option>
					</select>
				</div>
				<div class="pb-3">
					<textarea id="msg" name="user_message" rows="4" cols="60" placeholder="Ecrivez votre commentaire..."></textarea>
				</div>
				<div class="pb-4">
					<input type="submit">
				</div>
			</form>
			@endsection
            <footer class="blog-footer">
  <p>Site créé par <a href="admin">Paulin Sirot</a> et <a href="admin">Mathias Dattin</a></p>
  <p>
    <a href="#">Haut de page</a>
  </p>
</footer>
@yield('extra-js')
</body>
</html>