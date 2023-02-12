@component('mail::message')

Name: {{ $name }}
<br>
Email Address: {{ $email }}
<br>
Message:
<br>
{{ $inquiry }}

@endcomponent