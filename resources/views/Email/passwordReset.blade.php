@component('mail::message')
# Demande de réinitialisation

Bonjour,

Pour réinitialiser votre mot de passe VaudVin, veuillez cliquer sur le lien ci-dessous. 
Si vous n''avez pas demandé de nouveau mot de passe, veuillez ignorer cet e-mail. 

@component('mail::button', ['url' => 'http://localhost:8100/reset-password-form?
token='.$token])
Réinitialiser le mot de passe
@endcomponent

Merci,<br>
Le développeur de VaudVin.

Ce message a été envoyé automatiquement. Veuillez ne pas répondre à cette adresse.

@endcomponent
