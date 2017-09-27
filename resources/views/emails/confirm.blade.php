@component('mail::message')
# Introduction

Please confirm

@component('mail::button', ['url' => '/register/confirm?token='.$user->token])
Confirm Email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
