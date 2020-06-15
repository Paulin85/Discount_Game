@extends('layouts.master')

@section('content')
			<div class="col-md-12">
				<div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
					<div class="col p-4 d-flex flex-column position-static">
					<h3 class="mb-0">{{ $product->name }}</h3>
					<div class="mb-1 text-muted">{{ $product->getPrice() }}</div>
					<p class="mb-auto">{!! $product->description !!}</p>
					<form action="{{ route('cart.store') }}" method="POST">
					@csrf
						<input type="hidden" name="product_id" value="{{ $product->id }}">
						<button type="submit" class="stretched-link btn btn-info">Ajouter au panier</button>
					</form>
					</div>
					<div class="col-auto d-none d-lg-block">
	  					<img src="{{ asset('storage/' . $product->image) }}">
					</div>
				</div>
			</div>
@endsection