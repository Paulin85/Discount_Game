
@extends('layouts.master')



@section('content')
			<div class="col-md-12">
				<div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-375 position-relative">
					<div class="col p-4 d-flex flex-column position-static">
					<div class="badge badge-pill badge-info">{{ $stock }}</div>
					<h3 class="mb-0 mt-2">{{ $product->name }}</h3>
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
	  					<img width="300" height="375" src="{{ asset('public/' . $product->image) }}">
					</div>								
				</div>

                @foreach($product->formulaires as $formulaire)
                        <div class="media card mt-3">
                            <div class="ml-2 mt-2 mb-1 media-body">
                                <h5 >{{ $formulaire-> Nom }}, <strong>{{ $formulaire-> Note }}/5</strong></h5>
                                {{ $formulaire-> Commentaire}}
                            </div>
                        </div>           
                @endforeach
			</div>



@endsection
