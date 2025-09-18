<header class="bg-primary py-2 flex justify-between items-center sticky top-0 z-50">
    <nav class="container mx-auto px-4 md:px-20 flex justify-between items-center">
        
        <a href="{{ route('home') }}">
            <img src="{{ asset('img/FUMO_INDEX.svg') }}" class="pointer-events-none" alt="FumoIndexLogo" width="100" height="100" />
        </a>

        <button id="menu-btn" class="md:hidden text-white focus:outline-none text-2xl">
            <i class="fa-solid fa-bars"></i>
        </button>

        <ul id="menu" class="hidden md:flex space-x-8 text-white text-lg flex-col md:flex-row md:items-center absolute md:static top-full left-0 w-full md:w-auto bg-primary md:bg-transparent">
            <li>
                <a href="{{ route('home') }}" class="block px-4 py-2 hover:underline transition duration-300 ease-in-out hover:scale-105">
                    Home
                    <i class="fa-solid fa-home"></i>
                </a>
            </li>
            <li>
                <a href="#" class="block px-4 py-2 hover:underline transition duration-300 ease-in-out hover:scale-105">
                    Fumo List
                    <i class="fa-solid fa-list"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('characters.list') }}" class="block px-4 py-2 hover:underline transition duration-300 ease-in-out hover:scale-105">
                    Character List
                    <i class="fa-solid fa-users"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('fumo_types') }}" class="block px-4 py-2 hover:underline transition duration-300 ease-in-out hover:scale-105">
                    Fumo Types
                    <i class="fa-solid fa-tags"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('what_is_a_fumo') }}" class="block px-4 py-2 hover:underline transition duration-300 ease-in-out hover:scale-105">
                    What is a Fumo
                    <i class="fa-solid fa-question"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('the_fumo_origins') }}" class="block px-4 py-2 hover:underline transition duration-300 ease-in-out hover:scale-105">
                    The Fumo Origins
                    <i class="fa-solid fa-book"></i>
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
