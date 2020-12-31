@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            logo
        @endcomponent
    @endslot

    {{-- Body --}}
    <h1>As-salamu alaykum <a href="mailto:{{ $email }}">{{ $name }}</a>!</h1>
    <p>{{ __('auth.reset.info') }}</p>
    <p>{{ __('auth.reset.verify') }}</p>
    <div class="action">
        <h1 class="big">{{ $code }}</h1>
        <p class="text-small">{!! __('auth.confirm.expired', ['expired' => $expired]) !!}</p>
    </div>
    <p>{{ __('auth.reset.ignore') }}</p>

    @slot('subcopy')
        @component('mail::subcopy')
            <p><strong>getMontir Team</strong></p>
            <a href="mailto:support@getmontir.com">support@getmontir.com</a>
        @endcomponent
    @endslot

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            {{-- © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.') --}}
            getMontir Indonesia, PT <br />
            Ruko Citraland Blok D No.5, Kalijaga, <br /> 
            Kec. Harjamukti, Kota Cirebon, <br />
            Jawa Barat, Indonesia 45144
        @endcomponent
    @endslot
@endcomponent
