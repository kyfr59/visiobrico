<svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path class="line line1" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16" />
    <path class="line line2" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 12h16" />
    <path class="line line3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 18h16" />
</svg>
<style>
    .line {
        @apply transition-all duration-500 ease-in-out;
        transform-origin: center;
    }

    .open .line1 {
        transform: translateY(5px) translateX(-5px) rotate(45deg);
    }

    .open .line2 {
        opacity: 0;
    }

    .open .line3 {
        transform: translateY(-4px) translateX(-5px) rotate(-45deg);
    }
</style>
