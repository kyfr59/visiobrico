@php
    switch($espace) {
        case 'requester':
            $link = route('requester.home');
            break;
        case 'provider':
            $link = route('provider.home');
            break;
        default:
            $link = route('home');
    }
@endphp

<a href="{{ $link }}" alt="Pensez visio pour vos travaux" id="logo" class="flex items-center gap-2 whitespace-nowrap">
    <x-icon-logo />
    <div class="flex flex-col">
        <span class="text-xl font-semibold leading-tight">VisioBrico</span>
        <span class="text-[10px] text-gray-500 leading-tight">Pensez visio pour vos travaux {{ $isDesktop }}</span>
    </div>
</a>