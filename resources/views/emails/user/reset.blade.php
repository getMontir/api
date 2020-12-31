@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            logo
        @endcomponent
    @endslot

    {{-- Body --}}
    <h1>As-salamu alaykum <a href="mailto:{{ $email }}">{{ $name }}</a>!</h1>
    <p>Anda menerima email ini dikarenakan Anda meminta untuk dilakukan pengaturan ulang kata sandi.</p>
    <p>Untuk verifikasi pengaturan ulang kata sandi Anda, silahkan masukan kode berikut di aplikasi getMontir.</p>
    <div class="action">
        <h1 class="big">{{ $code }}</h1>
        <p class="text-small">Habis pada: <strong>{{ $expired }}</strong></p>
    </div>
    <p>Jika Anda merasa tidak melakukan permintaan pengaturan ulang kata sandi di aplikasi getMontir, silahkan abaikan email ini</p>

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
