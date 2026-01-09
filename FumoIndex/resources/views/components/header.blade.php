<header class="bg-primary py-2 flex justify-between items-center sticky top-0 z-50">
    <nav class="container mx-auto px-4 md:px-20 flex justify-between items-center">

        <div class="flex items-center flex-shrink-0 hover:scale-105 transition-transform duration-300 ease-in-out">
            <a href="{{ route('home') }}">
                <img src="{{ asset('img/FUMO_INDEX.svg') }}" class="pointer-events-none" alt="FumoIndexLogo" width="100" height="100" />
            </a>
        </div>

        <div class="flex-1 flex justify-center">
            <ul id="menu" class="hidden md:flex space-x-8 text-white text-lg flex-col md:flex-row md:items-center absolute md:static top-full left-0 w-full md:w-auto bg-primary md:bg-transparent">
                <li>
                    <a href="{{ route('home') }}" class="block px-4 py-2 hover:underline transition duration-300 ease-in-out hover:scale-105 font-bold">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('characters.list') }}" class="block px-4 py-2 hover:underline transition duration-300 ease-in-out hover:scale-105 font-bold">
                        Character List
                    </a>
                </li>

                <li class="relative">
                    <button type="button" class="flex items-center px-4 py-2 font-bold hover:underline transition duration-300 ease-in-out hover:scale-105 focus:outline-none dropdown-toggle cursor-pointer">
                        Fumos
                        <svg class="ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M5.23 7.21a.75.75 0 011.06.02L10 11.293l3.71-4.06a.75.75 0 111.08 1.04l-4.25 4.65a.75.75 0 01-1.08 0l-4.25-4.65a.75.75 0 01.02-1.06z"/></svg>
                    </button>
                    <ul class="dropdown-menu absolute left-0 mt-2 w-48 bg-white shadow-lg hidden z-50 text-gray-900 border border-gray-200">
                        <li>
                            <a href="{{ route('fumos') }}" class="block px-4 py-2 hover:bg-gray-100 transition duration-200">Fumo List</a>
                        </li>
                        <li>
                            <a href="{{ route('fumo_types') }}" class="block px-4 py-2 hover:bg-gray-100 transition duration-200">Fumo Types</a>
                        </li>
                    </ul>
                </li>

                <li class="relative">
                    <button type="button" class="flex items-center px-4 py-2 font-bold hover:underline transition duration-300 ease-in-out hover:scale-105 focus:outline-none dropdown-toggle cursor-pointer">
                        Info / About
                        <svg class="ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M5.23 7.21a.75.75 0 011.06.02L10 11.293l3.71-4.06a.75.75 0 111.08 1.04l-4.25 4.65a.75.75 0 01-1.08 0l-4.25-4.65a.75.75 0 01.02-1.06z"/></svg>
                    </button>
                    <ul class="dropdown-menu absolute left-0 mt-0 md:mt-2 w-56 bg-white shadow-lg hidden z-50 text-gray-900 border border-gray-200">
                        <li>
                            <a href="{{ route('what_is_a_fumo') }}" class="block px-4 py-2 hover:bg-gray-100 transition duration-200">What is a Fumo</a>
                        </li>
                        <li>
                            <a href="{{ route('the_fumo_origins') }}" class="block px-4 py-2 hover:bg-gray-100 transition duration-200">The Fumo Origins</a>
                        </li>
                    </ul>
                </li>

                @if(!Auth::check())
                    <li class="md:hidden">
                        <a href="{{ route('auth.login.form') }}" class="flex items-center px-4 py-2 hover:underline transition duration-300 ease-in-out hover:scale-105 font-bold text-white">
                            <i class="fa-solid fa-right-to-bracket"></i>
                            <span class="ml-1">Login</span>
                        </a>
                    </li>
                    <li class="md:hidden">
                        <a href="{{ route('auth.register.form') }}" class="flex items-center px-4 py-2 hover:underline transition duration-300 ease-in-out hover:scale-105 font-bold text-white">
                            <i class="fa-solid fa-user-plus"></i>
                            <span class="ml-1">Register</span>
                        </a>
                    </li>
                @else
                    <li class="relative md:hidden">
                        <button type="button" class="flex items-center px-4 py-2 font-bold hover:underline transition duration-300 ease-in-out hover:scale-105 focus:outline-none dropdown-toggle cursor-pointer text-white w-full">
                            <i class="fa-solid fa-user"></i>
                            <span class="ml-1">{{ Auth::user()->username }}</span>
                            <svg class="ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M5.23 7.21a.75.75 0 011.06.02L10 11.293l3.71-4.06a.75.75 0 111.08 1.04l-4.25 4.65a.75.75 0 01-1.08 0l-4.25-4.65a.75.75 0 01.02-1.06z"/></svg>
                        </button>
                        <ul class="dropdown-menu absolute left-0 mt-2 w-64 bg-white shadow-lg hidden z-50 text-gray-900 border border-gray-200">
                            <li class="px-4 py-2 border-b border-gray-200">
                                <div class="font-semibold">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>
                                <div class="text-sm text-gray-600">{{ Auth::user()->email }}</div>
                            </li>
                            <li>
                                <a href="{{ route('dashboard.profile') }}" class="block px-4 py-2 hover:bg-gray-100 transition duration-200">Profile</a>
                            </li>
                            @if(Auth::user()->is_admin)
                                <li>
                                    <a href="{{ route('dashboard.index') }}" class="block px-4 py-2 hover:bg-gray-100 transition duration-200">Dashboard</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                    <li class="md:hidden">
                        <form id="logoutFormMobile" method="POST" action="{{ route('auth.logout') }}">
                            @csrf
                            <button type="button" id="logoutBtnMobile" class="flex items-center px-4 py-2 hover:underline transition duration-300 ease-in-out hover:scale-105 font-bold text-white w-full">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <span class="ml-1">Logout</span>
                            </button>
                        </form>
                    </li>
                @endif
            </ul>
        </div>

        <div class="flex items-center space-x-2">

            @if(!Auth::check())
                <ul class="hidden md:flex space-x-4 text-white text-lg items-center">
                    <li>
                        <span class="flex items-center px-2 py-2 hover:underline transition duration-300 ease-in-out hover:scale-105 font-bold text-white cursor-pointer">
                            <i class="fa-solid fa-right-to-bracket"></i>
                            <a href="{{ route('auth.login.form') }}" class="ml-1 text-white">Login</a>
                        </span>
                    </li>
                    <li>
                        <span class="flex items-center px-2 py-2 hover:underline transition duration-300 ease-in-out hover:scale-105 font-bold text-white cursor-pointer">
                            <i class="fa-solid fa-user-plus"></i>
                            <a href="{{ route('auth.register.form') }}" class="ml-1 text-white">Register</a>
                        </span>
                    </li>
                </ul>
            @else
                <ul class="hidden md:flex space-x-4 text-white text-lg items-center">
                    <li class="relative">
                        <button type="button" class="flex items-center px-2 py-2 font-bold hover:underline transition duration-300 ease-in-out hover:scale-105 focus:outline-none dropdown-toggle cursor-pointer">
                            <i class="fa-solid fa-user"></i>
                            <span class="ml-1">{{ Auth::user()->username }}</span>
                            <svg class="ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M5.23 7.21a.75.75 0 011.06.02L10 11.293l3.71-4.06a.75.75 0 111.08 1.04l-4.25 4.65a.75.75 0 01-1.08 0l-4.25-4.65a.75.75 0 01.02-1.06z"/></svg>
                        </button>
                        <ul class="dropdown-menu absolute left-0 mt-2 w-64 bg-white shadow-lg hidden z-50 text-gray-900 border border-gray-200">
                            <li class="px-4 py-2 border-b border-gray-200">
                                <div class="font-semibold">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>
                                <div class="text-sm text-gray-600">{{ Auth::user()->email }}</div>
                            </li>
                            <li>
                                <a href="{{ route('dashboard.profile') }}" class="block px-4 py-2 hover:bg-gray-100 transition duration-200">Profile</a>
                            </li>
                            @if(Auth::user()->is_admin)
                                <li>
                                    <a href="{{ route('dashboard.index') }}" class="block px-4 py-2 hover:bg-gray-100 transition duration-200">Dashboard</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                    <li>
                        <form id="logoutFormDesktop" method="POST" action="{{ route('auth.logout') }}">
                            @csrf
                            <button type="button" id="logoutBtnDesktop" class="flex items-center px-2 py-2 hover:underline transition duration-300 ease-in-out hover:scale-105 font-bold text-white cursor-pointer">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <span class="ml-1">Logout</span>
                            </button>
                        </form>
                    </li>
                </ul>
            @endif
            <button id="menu-btn" class="md:hidden text-white focus:outline-none text-2xl ml-2">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
    </nav>
</header>

<div id="logoutConfirmModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 hidden opacity-0 transition-opacity duration-300" style="pointer-events: none;">
    <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 max-w-md w-full relative">
        <button id="closeLogoutModal" class="absolute top-4 right-4 text-primary hover:text-primary-light text-2xl focus:outline-none cursor-pointer" aria-label="Close">
            <i class="fa fa-times"></i>
        </button>
        <h3 class="text-2xl font-bold mb-6 text-primary text-center">Confirm Logout</h3>
        <p class="text-gray-700 mb-4 text-base leading-relaxed text-center">
            Are you sure you want to log out of your account?
        </p>
        <div class="flex flex-col gap-4 mt-6">
            <button id="confirmLogoutBtn" class="btn btn-primary w-full p-3 text-lg">
                Yes, log me out
            </button>
            <button id="cancelLogoutBtn" class="btn btn-tertiary w-full p-3 text-lg">
                Cancel
            </button>
        </div>
    </div>
</div>

<script>
    const btn = document.getElementById('menu-btn');
    const menu = document.getElementById('menu');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });

    // Dropdown logic: open on click, not on hover
    document.querySelectorAll('.dropdown-toggle').forEach((toggle) => {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            // Close other dropdowns
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                if (menu !== this.parentElement.querySelector('.dropdown-menu')) {
                    menu.classList.add('hidden');
                }
            });
            const dropdown = this.parentElement.querySelector('.dropdown-menu');
            dropdown.classList.toggle('hidden');
        });
    });

    // Close dropdowns when clicking outside
    document.addEventListener('click', function(e) {
        document.querySelectorAll('.dropdown-menu').forEach(menu => {
            if (!menu.parentElement.contains(e.target)) {
                menu.classList.add('hidden');
            }
        });
    });

    // Prevent closing when clicking inside dropdown
    document.querySelectorAll('.dropdown-menu').forEach(menu => {
        menu.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    });

    // Logout modal logic
    function showLogoutModal() {
        const modal = document.getElementById('logoutConfirmModal');
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.add('opacity-100');
            modal.classList.remove('opacity-0');
            modal.style.pointerEvents = 'auto';
        }, 10);
    }
    function hideLogoutModal() {
        const modal = document.getElementById('logoutConfirmModal');
        modal.classList.remove('opacity-100');
        modal.classList.add('opacity-0');
        modal.style.pointerEvents = 'none';
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }
    document.getElementById('logoutBtnDesktop')?.addEventListener('click', showLogoutModal);
    document.getElementById('logoutBtnMobile')?.addEventListener('click', showLogoutModal);
    document.getElementById('closeLogoutModal').onclick = hideLogoutModal;
    document.getElementById('cancelLogoutBtn').onclick = hideLogoutModal;
    document.getElementById('logoutConfirmModal').onclick = function(e) {
        if (e.target === this) hideLogoutModal();
    };
    document.getElementById('confirmLogoutBtn').onclick = function() {
        // Try to submit the visible logout form
        if (document.getElementById('logoutFormDesktop')) {
            document.getElementById('logoutFormDesktop').submit();
        }
        if (document.getElementById('logoutFormMobile')) {
            document.getElementById('logoutFormMobile').submit();
        }
    };
</script>
