
@if(Auth::check())
    <div class="px-4 py-3 border-b border-gray-300 lg:px-0 lg:py-0 lg:border-none lg:flex lg:items-center lg:gap-1">
        <div class="flex items-center gap-3">
            <a href="#">
                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400&amp;h=400&amp;fit=crop" alt="Jean Dupont" class="object-cover w-12 h-12 rounded-full  lg:w-10 lg:h-10 lg:border-2 lg:border-gray-200 lg:hover:opacity-80">
            </a>
            <div class="flex-1 lg:flex-col lg:items-start lg:hidden lg:md:flex">
                <a href="#" class="lg:text-sm block font-medium text-gray-900">{{ Auth::user()->email }}</a>
                <form method="POST" action="{{ route('deconnexion') }}">
                    @csrf
                    <button class="lg:text-xs lg:pt-0.5 lg:flex text-sm text-gray-500 lg:hover:underline" type="submit">Se déconnecter</button>
                </form>
            </div>
        </div>
    </div>
@else
    <a href="{{ route('connexion')}}">Se connecter</a>
@endif
