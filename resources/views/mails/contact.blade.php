@component('mail::message')
# Contact Form Message

User: {{ $name }} has sent a message from email: {{ $email }}

# Subject: {{ $subject }}

# Message: 
	{{ $message }}
	
Thanks,<br>
{{ config('app.name') }}
@endcomponent