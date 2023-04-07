@component('mail::message')
# Hello Arif,

Your account has been created on {{ config('app.name') }}. Please use the following credentials to login.

@component('mail::panel')
    Email: arif@mail.com <br>
    Password: password
@endcomponent

@component('mail::button', ['url' => route('login')])
    Login Now   
@endcomponent

Thanks <br>
{{ config('app.name') }}
@endcomponent
