@component('mail::message')
# Réinitialisation du mot de passe

Vous recevez cet e-mail car nous avons reçu une demande de réinitialisation de mot de passe pour votre compte.

@component('mail::button', ['url' => $url])
Réinitialiser le mot de passe
@endcomponent

Ce lien de réinitialisation de mot de passe expirera dans 60 minutes.

Si vous n'avez pas demandé de réinitialisation de mot de passe, aucune action supplémentaire n'est requise.

Cordialement,<br>
{{ config('app.name') }}
@endcomponent
