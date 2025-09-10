<header class="bg-[#a52a1a] py-2 flex justify-between items-center sticky top-0 z-50">
    <nav class="container mx-auto px-20 flex justify-between items-center">
        <a href="{{ route('home') }}">
            <img src="{{ asset('img/FUMO_INDEX.svg') }}" class="pointer-events-none" alt="FumoIndexLogo" width="100" height="100" />
        </a>
        <ul class="hidden md:flex space-x-8 text-white text-lg">
            <li><a href="{{ route('home') }}" class="hover:underline">Home</a></li>
            <li><a href="#" class="hover:underline">Fumo List</a></li>
            <li><a href="#" class="hover:underline">What is a Fumo?</a></li>
            <li><a href="#" class="hover:underline">The Fumo Origins</a></li>
        </ul>
    </nav>
</header>