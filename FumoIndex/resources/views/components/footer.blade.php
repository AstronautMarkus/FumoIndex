<footer class="relative overflow-hidden px-6 md:px-16 lg:px-24 xl:px-32 w-full text-sm text-white bg-zinc-900 pt-10">
    <img 
        src="/img/background/cirnoFumo.png" 
        alt="Cirno Fumo Background" 
        aria-hidden="true"
        class="hidden sm:block pointer-events-none select-none absolute right-0 top-0 bottom-0 z-0 opacity-20 h-full"
        style="height: 100%; width: auto; max-width: none; min-width: 160px; object-fit: contain;"
    />
    <div class="relative z-10">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 lg:gap-14">
            <div class="sm:col-span-2 lg:col-span-1">
                <a href="{{ route('home') }}" class="inline-block">
                    <img src="/img/FUMO_INDEX.svg" alt="The Fumo Index" class="pointer-events-none" width="157" height="40" />
                </a>
                <p class="text-sm/7 mt-6 text-white opacity-90">
                    The Fumo Index is an online encyclopedia for fumofumo enthusiasts, offering comprehensive information about fumos from Touhou Project and other franchises.
                </p>
            </div>
            <div class="flex flex-col lg:items-center lg:justify-center">
                <div class="flex flex-col text-sm space-y-2.5">
                    <h3 class="font-semibold mb-4 text-white tracking-wide">Useful Links</h3>
                    <a class="hover:underline transition-colors" href="{{ route('characters.list') }}">Characters</a>
                    <a class="hover:underline transition-colors" href="{{ route('fumo_types') }}">Fumo Types</a>
                    <a class="hover:underline transition-colors" href="{{ route('fumos') }}">Fumo List</a>
                </div>
            </div>
            <div>
                <h3 class="font-semibold text-white mb-4 tracking-wide">By a Fan, For Fans</h3>
                <div class="text-sm space-y-4 max-w-xs text-white opacity-90">
                    <p>This site is free and non-profit. We just want to share our passion for fumofumos.</p>
                    <p>Please support official stores and ZUN, creator of Touhou Project.</p>
                </div>
            </div>
        </div>
        <div class="flex flex-col md:flex-row items-center justify-between gap-4 py-4 border-t mt-8 border-zinc-800">
            <p class="text-center text-white text-xs opacity-80">
                Copyright {{ date('Y') }} © <a href="{{ route('home') }}" class="text-white hover:underline">The Fumo Index</a>. All Rights Reserved.
            </p>
            <div class="flex items-center gap-4">
                <a href="{{ route('terms_and_conditions') }}" class="text-white hover:underline text-xs opacity-80">Terms and Conditions</a>
            </div>
        </div>
    </div>
</footer>