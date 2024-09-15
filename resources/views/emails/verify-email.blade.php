@component('mail::message')
# Vérifiez votre adresse email

Cliquez sur le bouton ci-dessous pour vérifier votre adresse email.

@component('mail::button', ['url' => route('verify.email', $user->email_verification_token)])
Vérifier l'email
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
