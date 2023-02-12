@component('mail::message')

Dear Admin,

An error has occured with the error type: <b>{{ $error_type }}</b>

and error message of:

{{ $error_message }}

Regards,
<br><br>
{{ env('APP_NAME') }} Support

@endcomponent