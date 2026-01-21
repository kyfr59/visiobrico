@php
    switch($espace) {
        case 'demandeur':
            $link = route('demandeur.accueil');
            break;
        case 'prestataire':
            $link = route('prestataire.accueil');
            break;
        default:
            $link = route('accueil');
    }
@endphp

<a href="{{ $link }}" alt="Pensez visio pour vos travaux" id="logo" class="flex items-center gap-2 whitespace-nowrap">
    <x-icon-logo />
    <div class="flex flex-col">
        <span class="text-xl font-semibold leading-tight">VisioBrico</span>
        <span class="text-[10px] text-gray-500 leading-tight">Pensez visio pour vos travaux {{ $isDesktop }}</span>
    </div>
</a>