<x-mail::message>

# Hello Admin!

You have received a new message, here's some details:
- **Name**: {{$lead->name}}
- **Email**: {{$lead->email}}

### **Message**: 
<x-mail::panel>
{{$lead->message}}
</x-mail::panel>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>