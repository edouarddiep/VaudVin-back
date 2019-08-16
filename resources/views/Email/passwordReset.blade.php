@component('mail::message')
# Demande de réinitialisation

Vous avez reçu cet e-mail car vous souhaitez réinitialiser le mot de passe de votre compte VaudVin.
Cliquez sur le bouton ci-dessous pour procéder au changement de mot de passe.

@component('mail::button', ['url' => 'http://localhost:8100/reset-password-form?
token='.$token])
Réinitialiser votre mot de passe
@endcomponent

Merci,<br>
Le développeur de VaudVin.
@endcomponent
