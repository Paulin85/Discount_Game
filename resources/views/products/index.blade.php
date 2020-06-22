@extends('layouts.master')
@section('pub')
<div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 font-italic">Discount-Gaming</h1>
      <p class="lead my-3">Le meilleur site de Jeux !</p>
    </div>
  </div>
@endsection


@section('content')
		@foreach($products as $product)
			<div class="col-md-6">
				<div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
					<div class="col p-4 d-flex flex-column position-static">
					<h3 class="mb-0">{{ $product->name }}</h3>
					<div class="mb-1 text-muted">{{ $product->getPrice() }}</div>
					{!! $product->description !!}
					<a href="{{ route('products.show', $product->slug) }}" class="stretched-link btn btn-info">Acheter</a>
					</div>
					<div class="col-auto d-none d-lg-block">
	  					<img width="200" height="250" src="{{ $product->image }}">
					</div>
				</div>
			</div>
		@endforeach
@endsection

@section('paginate')
      <ul class="pagination justify-content-center">
          {{ $products->appends(request()->input())->links() }}
      </ul>
@endsection('paginate')