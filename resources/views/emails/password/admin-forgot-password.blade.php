@component('mail::message')

Hi {{ $first_name }} {{ $last_name }},
<br><br>
We have received a request to reset the password on your GateZen Admin account.
<br><br>
To complete the password reset, please visit the following URL below and update your password.
<br><br>
<a href="{{ env('ADMIN_APP') }}/reset-password?token={{ $token }}">
    {{ env('ADMIN_APP') }}/reset-password?token={{ $token }}
</a>
<br><br>
If you did not specifically request this password change, please contact support immediately.
<br><br>
Thank you,
<br><br>
{{ env('APP_NAME') }} Support

@endcomponent