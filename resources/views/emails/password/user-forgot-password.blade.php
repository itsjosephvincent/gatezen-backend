@component('mail::message')

Hi {{ $name }},
<br><br>
We have received a request to reset the password on your GateZen account.
<br><br>
To complete the password reset, please visit the following URL below and update your password.
<br><br>
<a href="{{ env('USER_APP') }}/reset-password?token={{ $token }}">
    {{ env('USER_APP') }}/reset-password?token={{ $token }}
</a>
<br><br>
If you did not specifically request this password change, please contact support immediately.
<br><br>
Thank you,
<br><br>
{{ env('APP_NAME') }} Support

@endcomponent