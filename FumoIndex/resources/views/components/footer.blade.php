<footer class="bg-zinc-800 py-6 mt-10 hidden md:block">
    <div class="container mx-auto px-4 md:px-20 flex flex-col md:flex-row justify-between items-start md:items-center">

    <div class="flex flex-col items-start w-full md:w-1/3 mb-6 md:mb-0">
            <img src="{{ asset('img/FUMO_INDEX.svg') }}" alt="FumoIndexLogo" width="150" height="150" class="pointer-events-none" />
        </div>

        <div class="flex flex-col items-center text-center w-full md:w-1/3 mb-6 md:mb-0">
            <p class="mt-5 text-white">© FumoIndex Project. All rights reserved.</p>
            <p class="text-white">This is a non-commercial archival project dedicated to cataloging all officially licensed "FumoFumo" plush merchandise.</p>
            <p class="my-5 text-white">All characters, names, and designs are property of their respective owners.</p>
            <p class="text-xs text-gray-400 mt-2">
                This page is created non-commercially, from a fan for the fans. Please read the 
                <a href="/terms-and-conditions" class="underline hover:text-gray-300">terms and conditions</a>.
            </p>
        </div>

        <div class="flex flex-col items-end w-full md:w-1/3 text-right">
            <p class="text-white">Developed by:</p>
            <div class="flex flex-row gap-4 justify-end mb-4">
                <a href="https://github.com/AstronautMarkus" target="_blank" class="text-white hover:text-gray-300 flex items-center">
                    <i class="fa fa-code mr-2"></i>MimaDev (AstronautMarkus)
                </a>
                <p class="text-white">&</p>
                <a href="https://github.com/anzar2" target="_blank" class="text-white hover:text-gray-300 flex items-center">
                    <i class="fa fa-code mr-2"></i>AnzarDev
                </a>
            </div>
            <a href="https://github.com/AstronautMarkus/FumoIndex" target="_blank" class="text-white hover:text-gray-300 flex items-center">
                <img src="{{ asset('img/helpers/github-mark-white.svg') }}" alt="GitHub Logo" width="24" height="24" class="mr-2 pointer-events-none" />
                GitHub Repository
            </a>
        </div>
    </div>
</footer>

<footer class="bg-zinc-800 py-6 mt-10 md:hidden">
    <div class="container mx-auto px-4 flex flex-col items-center">
        <img src="{{ asset('img/FUMO_INDEX.svg') }}" alt="FumoIndexLogo" width="100" height="100" class="mb-4 pointer-events-none" />
        <p class="text-white text-center text-sm mb-2">© FumoIndex Project. All rights reserved.</p>
        <p class="text-white text-center text-xs mb-2">Non-commercial archival project for "FumoFumo" plush merchandise.</p>
        <p class="text-xs text-gray-400 text-center mb-2">
            All characters, names, and designs are property of their respective owners.<br>
            Fan-made, non-commercial. 
            <a href="/terms-and-conditions" class="underline hover:text-gray-300">Terms</a>
        </p>
        <div class="flex flex-col items-center mt-4">
            <p class="text-white text-xs mb-1">Developed by:</p>
            <div class="flex flex-row gap-2 justify-center mb-2">
                <a href="https://github.com/AstronautMarkus" target="_blank" class="text-white hover:text-gray-300 flex items-center text-xs">
                    <i class="fa fa-code mr-1"></i>MimaDev
                </a>
                <span class="text-white text-xs">&</span>
                <a href="https://github.com/anzar2" target="_blank" class="text-white hover:text-gray-300 flex items-center text-xs">
                    <i class="fa fa-code mr-1"></i>AnzarDev
                </a>
            </div>
            <a href="https://github.com/AstronautMarkus/FumoIndex" target="_blank" class="text-white hover:text-gray-300 flex items-center text-xs">
                <img src="{{ asset('img/helpers/github-mark-white.svg') }}" alt="GitHub Logo" width="18" height="18" class="mr-1 pointer-events-none" />
                GitHub Repo
            </a>
        </div>
    </div>
</footer>
