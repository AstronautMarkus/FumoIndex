<header class="bg-primary py-2 flex justify-between items-center sticky top-0 z-50">
    <nav class="container mx-auto px-4 md:px-20 flex justify-between items-center">
        <a href="{{ route('home') }}">
            <img src="{{ asset('img/FUMO_INDEX.svg') }}" class="pointer-events-none" alt="FumoIndexLogo" width="100" height="100" />
        </a>

        <button id="menu-btn" class="md:hidden text-white focus:outline-none">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        <ul id="menu" class="hidden md:flex space-x-8 text-white text-lg flex-col md:flex-row md:items-center absolute md:static top-full left-0 w-full md:w-auto bg-[#a52a1a] md:bg-transparent">
            <li>
                <a href="{{ route('home') }}" class="block px-4 py-2 hover:underline transition duration-300 ease-in-out hover:scale-105">
                    Home
                </a>
            </li>
            <li>
                <a href="#" class="block px-4 py-2 hover:underline transition duration-300 ease-in-out hover:scale-105">
                    Fumo List
                </a>
            </li>
            <li>
                <a href="{{ route('characters.list') }}" class="block px-4 py-2 hover:underline transition duration-300 ease-in-out hover:scale-105">
                    Characters
                </a>
            </li>
            <li>
                <a href="{{ route('what_is_a_fumo') }}" class="block px-4 py-2 hover:underline transition duration-300 ease-in-out hover:scale-105">
                    What is a Fumo?
                </a>
            </li>
            <li>
                <a href="#" class="block px-4 py-2 hover:underline transition duration-300 ease-in-out hover:scale-105">
                    The Fumo Origins
                </a>
            </li>
        </ul>
    </nav>
</header>

<script>
    const btn = document.getElementById('menu-btn');
    const menu = document.getElementById('menu');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>
