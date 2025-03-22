@props(['url'])
<tr>
<td class="header">
<a href="https://edulalulintas.com" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://edulalulintas.com/assets/images/logo/logo-edulantas.png" class="logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
