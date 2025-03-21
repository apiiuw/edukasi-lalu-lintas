@component('mail::message')

# Reset Password Akun Anda

Kami menerima permintaan untuk mereset password akun Anda.

Klik tombol di bawah untuk mengatur ulang password Anda:

@component('mail::button', ['url' => $actionUrl, 'color' => 'primary'])
Reset Password
@endcomponent

Jika Anda tidak merasa meminta reset password, abaikan email ini.

Terima kasih,<br>
Edukasi Lalu Lintas
@endcomponent
