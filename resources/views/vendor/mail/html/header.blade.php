@props(['url'])
<tr>
<td class="header">
<a href="https://edulalulintas.com" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://edulalulintas.com/assets/images/logo/Jasa%20Raharja%20Logo%20Member%20of%20IFG.png" class="logo" alt="Laravel Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
