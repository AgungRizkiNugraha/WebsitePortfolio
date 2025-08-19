@component('mail::message')
# Pesan Kontak Baru

**Nama:** {{ $data['name'] }}
**Email:** {{ $data['email'] }}

**Pesan:**
{{ $data['message'] }}

@endcomponent

