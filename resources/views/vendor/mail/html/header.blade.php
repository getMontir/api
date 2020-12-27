<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
            @elseif( trim($slot) === 'logo' )
                <img src="{{ url('images/logo.png') }}" alt="getMontir" width="130">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
