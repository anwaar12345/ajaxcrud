@component('mail::message')

# Thanks For SignUp To User management App

@component('mail::button', ['url' => 'http://127.0.0.1:8000/login'])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }},
<br>
Syed Anwar Ahmed Shah, <br>CEO
@endcomponent
