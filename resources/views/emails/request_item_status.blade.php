@component('mail::message')
# Halo {{ $pengirim }},

Permintaan Anda dengan judul:  
**"{{ $judul }}"**  

Telah diperbarui dengan status:  
@component('mail::panel')
{{ ucfirst($status) }}
@endcomponent

@component('mail::button', ['url' => 'https://edulalulintas.com', 'color' => 'primary'])
Lihat Detail Permintaan
@endcomponent

Jika Anda tidak melakukan permintaan ini, abaikan email ini.

Terima kasih,  
Edukasi Lalu Lintas
@endcomponent
