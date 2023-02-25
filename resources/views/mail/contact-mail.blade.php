@component('mail::message')

User name: {{ $message['name'] }}

Topic: {{ $message['topic'] }}

Email: {{ $message['email'] }}

Message: {{ $message['message'] }}

The body of your message.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
