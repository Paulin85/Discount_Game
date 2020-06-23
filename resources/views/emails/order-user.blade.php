@component('mail::message')
# Merci à vous d'avoir eu confiance en nous !

@foreach (unserialize($order->products) as $product)

Voici le code d'activation pour {{ $product[0] }} : {{ $product[4] }}

@endforeach

Cliquez-ci dessous pour récupérer votre facture.



Merci, l'équipe Discount Gaming.<br>
@endcomponent
