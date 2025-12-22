<footer class="w-full px-6 md:px-16 lg:px-24 xl:px-32 text-sm text-white bg-zinc-900 pt-8">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div>
                <a href="{{ route('home') }}" class="inline-block font-bold text-lg text-white tracking-wide">
                    <h3 class="font-semibold mb-3 text-white tracking-wide hover:underline">
                        Fumo Index Admin Panel
                    </h3>
                </a>
                <p class="mt-4 text-white opacity-80 text-sm">
                    Fumo Index system administration. Access restricted to authorized users.
                </p>
            </div>
            <div class="flex flex-col lg:items-center lg:justify-center">
                <div class="flex flex-col text-sm space-y-2.5">
                    <h3 class="font-semibold mb-3 text-white tracking-wide">Navigation</h3>
                    <a class="hover:underline transition-colors" href="#">Lorem Ipsum 1</a>
                    <a class="hover:underline transition-colors" href="#">Lorem Ipsum 2</a>
                    <a class="hover:underline transition-colors" href="#">Lorem Ipsum 3</a>
                </div>
            </div>
            <div>
                <h3 class="font-semibold text-white mb-3 tracking-wide">Information</h3>
                <div class="text-sm space-y-3 max-w-xs text-white opacity-80">
                    <p>Administration panel for content and user management.</p>
                    <p>For support, contact the system administrator.</p>
                </div>
            </div>
        </div>
        <div class="flex flex-col md:flex-row items-center justify-between gap-4 py-4 border-t mt-8 border-zinc-800">
            <p class="text-center text-white text-xs opacity-70">
                &copy; {{ date('Y') }} Fumo Index Admin. All rights reserved.
            </p>
            <div class="flex items-center gap-4">
                <a href="{{ route('terms_and_conditions') }}" class="text-white hover:underline text-xs opacity-70">Terms and Conditions</a>
            </div>
        </div>
    </div>
</footer>