

<link rel="stylesheet" href="public/css/blog2.css">
<style>
	.formulaire{
		text-align:center;
		padding-left:350px;

	}
	</style>

@extends('layouts.master')

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
	
			<div class="formulaire">
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
