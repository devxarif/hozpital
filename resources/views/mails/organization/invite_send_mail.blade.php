@component('mail::message')
# Invite to join {{ $company->organization_name }}

You have been invited to join {{ $team->name }} team in {{ $company->organization_name }}. Please click the button below to
accept the invitation.

@component('mail::button', ['url' => $url])
    Accept Invitation
@endcomponent

Thanks <br>
{{ config('app.name') }}
@endcomponent
