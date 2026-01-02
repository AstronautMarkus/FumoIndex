<footer class="w-full px-6 md:px-16 lg:px-24 xl:px-32 text-sm text-white bg-zinc-900 pt-8">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="flex flex-col justify-center">
                <a href="{{ route('dashboard.index') }}" class="inline-block">
                    <img src="/img/FUMO_INDEX.svg" alt="The Fumo Index" class="pointer-events-none" width="157" height="40" />
                    <span class="block text-xs text-white opacity-80 mt-2">(Admin panel)</span>
                </a>
            </div>
            <div class="flex flex-col justify-center">
                <p class="text-sm/7 text-white opacity-90">
                    The Fumo Index administrative panel. Manage the site's content and settings from here.

                </p>
            </div>
        </div>
        <div class="flex flex-col items-center gap-4 py-4 border-t mt-8 border-zinc-800">
            <div class="flex items-center gap-4">
                <a href="{{ route('terms_and_conditions') }}" class="text-white hover:underline text-xs opacity-70">Terms and Conditions</a>
            </div>
            <p class="text-center text-white text-xs opacity-70">
                &copy; {{ date('Y') }} Fumo Index Admin. All rights reserved.
            </p>
        </div>
    </div>
</footer>