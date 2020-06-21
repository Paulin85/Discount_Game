@component('mail::message')
# Merci à vous d'avoir eu confiance en nous !

Voici le code d'activation de votre jeu :

Cliquez-ci dessous pour récupérer votre facture.

@component('mail::button', ['url' => 'http://localhost/discount_game/public/home', 'color' => 'success'])
Télécharger la facture (pdf).
@endcomponent

Merci, l'équipe Discount Gaming.<br>
@endcomponent
