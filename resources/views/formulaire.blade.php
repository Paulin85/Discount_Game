@extends('layouts.master')
<style>
	.formulaire{
		text-align:center;
		padding-left:290px;
	}
	</style>

@section('pub')
<div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 font-italic">Discount-Gaming</h1>
      <p class="lead my-3">Laissez-nous un commentaire !</p>
    </div>
  </div>
@endsection

@section('content')
<div class="formulaire">
					<form action="{{ route('formulaire.store') }}" method="post">
					@csrf
				<div class="pb-4 pt-2">
					<input type="text" id="nom" name="nom" placeholder="{{ Auth()->user()->name }}">
				</div>
				<div class="pb-4">
					<select name="note">
						<option>5</option>
						<option>4</option>
						<option>3</option>
						<option>2</option>
						<option>1</option>
					</select>
				</div>
				<div class="pb-4">
					<select name="products_id">
						@foreach (Auth()->user()->orders as $order)
						@foreach (unserialize($order->products) as $product)
						<option value="{{ $product[3] }}">{{ $product[0] }}</option>
						@endforeach
						@endforeach
					</select>
				</div>
				<div class="pb-3">
					<textarea id="commentaire" name="commentaire" rows="4" cols="60" placeholder="Ecrivez votre commentaire..."></textarea>
				</div>
				<div class="pb-4">
					<input type="submit">
				</div>
			</form>
            @endsection