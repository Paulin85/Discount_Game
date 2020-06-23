@component('mail::message')
# Merci à vous d'avoir eu confiance en nous !



Cliquez-ci dessous pour récupérer votre facture.

@component('mail::button', ['url' => 'http://discount-game.herokuapp.com/home', 'color' => 'success'])
Télécharger la facture (pdf).
@endcomponent

Merci, l'équipe Discount Gaming.<br>
@endcomponent
