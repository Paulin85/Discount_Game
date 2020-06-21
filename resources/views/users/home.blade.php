@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mes commandes</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach (Auth()->user()->orders->sortByDesc('created_at') as $order)
                        <div class="card">
                            <div class="card-header">
                                Commande passé le {{ Carbon\carbon::parse
                                ($order->payment_created_at)->format('d/m/Y à H:i')}} d'un montant de
                                <strong>{{ getPrice($order->amount) }} </strong>
                            </div>
                            <div class="card-body">
                                    <h6>Liste des produits</h6>
                                    @foreach (unserialize($order->products) as $product)
                                        <div>Nom du produit: {{ $product[0] }}</div>
                                        <div>Prix: {{ getPrice($product[1]) }}</div>
                                        <div>Quantité: {{ $product[2] }}</div>
                                        <div><a href="formulaire">Donner votre avis</a></div>
                                       <div> <a href="{{route('order.pdf',$order)}}">Enregistrer en PDF</a></div>
                                    @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
