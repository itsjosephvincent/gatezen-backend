@component('mail::message')

There is a new inquiry from {{ $store->url }} regarding {{ $store_category_name }} Products.

Name: {{ $name }}
<br>
Email Address: {{ $email }}
<br>
Subject: {{$subject}}
<br>
Message:
<br>
{{ $message }}

@endcomponent