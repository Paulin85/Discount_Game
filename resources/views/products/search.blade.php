@extends('layouts.master')

@section('content')
		@foreach($products as $product)
			<div class="col-md-6">
				<div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-275 position-relative">
					<div class="col p-4 d-flex flex-column position-static">
					<h3 class="mb-0">{{ $product->name }}</h3>
					<div class="mb-1 text-muted">{{ $product->getPrice() }}</div>
					{!! $product->description !!}
					<a href="{{ route('products.show', $product->slug) }}" class="stretched-link btn btn-info">Acheter</a>
					</div>
					<div class="col-auto d-none d-lg-block">
	  					<img width="200" height="275" src="{{ asset('storage/' . $product->image) }}">
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