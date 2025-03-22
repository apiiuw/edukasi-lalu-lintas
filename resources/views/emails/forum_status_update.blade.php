@component('mail::message')
# Halo {{ $pengirim }},

Permintaan Anda pada forum diskusi dengan pertanyaan:  
**"{{ $pertanyaan }}"**  

Telah diperbarui dengan status:  
@component('mail::panel')
{{ ucfirst($status) }}
@endcomponent

@component('mail::button', ['url' => 'https://edulalulintas.com', 'color' => 'primary'])
Lihat Forum Diskusi
@endcomponent

Jika Anda tidak merasa melakukan permintaan ini, Anda dapat mengabaikan email ini.

Terima kasih,  
Edukasi Lalu Lintas
@endcomponent
