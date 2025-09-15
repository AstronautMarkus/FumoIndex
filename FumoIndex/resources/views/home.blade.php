@extends('layouts.app')

@section('title', 'The Fumo Index')

@section('content')
    <div class="overflow-hidden relative">
        <div class="absolute inset-0 -z-10">
            <img src="/img/background/gensokyo.jpg"  alt="Gensokyo Background" class="w-full h-full object-cover header-image"/>
        </div>

        <div class="container mx-auto flex relative justify-center items-center flex-col gap-10 h-[850px] hidden md:flex">
            <div class="absolute hidden w-50 h-50 rotate-[6deg] r-chibi-breakpoints">
                <img src="/img/home/fumo_reimu.png" class="pointer-events-none" alt="Reimu Hakurei Fumo" />
            </div>
            <div class="flex flex-col gap-2 text-center mt-24">
                <div class="text-5xl text-nowrap md:text-6xl font-bold text-white">The Fumo Index</div>
                <div class="text-2xl text-white">The ultimate guide to all things Fumo!</div>
            </div>
            <div class="flex w-full md:w-auto justify-between flex-col md:flex-row gap-10 mt-16">
                <a href="{{ route('what_is_a_fumo') }}" class="btn flex items-center justify-center text-nowrap btn-outline text-2xl gap-2 p-3">
                    <div class="flex w-full justify-center text-center">
                        What's a Fumo?
                    </div>
                </a>
                <a href="#" class="btn flex items-center justify-center text-nowrap btn-primary text-2xl gap-2 p-3">
                    <div class="flex w-full justify-center text-center">
                        Explore Fumo List
                    </div>
                </a>
                <a href="#" class="btn flex items-center justify-center text-nowrap btn-outline text-2xl gap-2 p-3">
                    <div class="flex w-full justify-center text-center">
                        The Fumo Origins
                    </div>
                </a>
            </div>
            <div class="absolute hidden w-50 h-50 scale-x-[-100%] rotate-[-6deg] l-chibi-breakpoints">
                <img src="/img/home/fumo_marisa.png" class="pointer-events-none" alt="Marisa Kirisame Fumo" />
            </div>
        </div>

        <div class="flex md:hidden relative items-center justify-center h-[450px]">
            <div class="absolute inset-0 -z-10">
                <img src="/img/background/gensokyo.jpg" alt="Gensokyo Background" class="w-full h-full object-cover header-image"/>
            </div>
            <div class="flex flex-col w-full h-full items-center justify-center px-4">
                <div class="flex w-full items-center justify-center gap-4 mt-8">
                    <div class="flex flex-col gap-2 text-center flex-1">
                        <div class="text-3xl font-bold text-white">The Fumo Index</div>
                        <div class="text-lg text-white">The ultimate guide to all things Fumo!</div>
                    </div>
                    <div class="flex items-center justify-end flex-none">
                        <img src="/img/home/fumo_reimu.png" class="pointer-events-none w-24 h-24" alt="Reimu Hakurei Fumo" />
                    </div>
                </div>
                <div class="flex flex-row w-full items-center justify-center mt-6 gap-2">
                    <div class="flex items-center justify-center flex-none">
                        <img src="/img/home/fumo_marisa.png" class="pointer-events-none w-24 h-24 scale-x-[-100%]" alt="Marisa Kirisame Fumo" />
                    </div>
                    <div class="flex flex-col gap-2 w-8/12">
                        <a href="{{ route('what_is_a_fumo') }}" class="btn flex items-center justify-center text-nowrap btn-outline text-sm gap-2 p-2 w-full">
                            <div class="flex w-full justify-center text-center">
                                What's a Fumo?
                            </div>
                        </a>
                        <a href="#" class="btn flex items-center justify-center text-nowrap btn-primary text-sm gap-2 p-2 w-full">
                            <div class="flex w-full justify-center text-center">
                                Explore Fumos List
                            </div>
                        </a>
                        <a href="#" class="btn flex items-center justify-center text-nowrap btn-outline text-sm gap-2 p-2 w-full">
                            <div class="flex w-full justify-center text-center">
                                How to get Fumos
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="overflow-hidden mt-4">
        <div class="container mx-auto flex flex-col items-center justify-center">
            <div class="bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 mt-10 mb-10 w-full max-w-4xl">
                <div class="flex justify-center mx-10 gap-6 items-stretch">
                    <div class="grow hidden md:flex items-stretch">
                        <div class="flex mx-4 transform-origin-top h-full">
                            <div class="decoration-line decoration-animate" id="decoration-animation">
                                <div class="decoration-head"></div>
                                <div class="decoration-head"></div>
                            </div>
                        </div>
                    </div>
                    <div class="text-xl flex flex-col justify-center">
                        <h2 class="text-2xl font-semibold mt-2 text-primary">The definitive Fumo Index <i class="fa-solid fa-book"></i></h2>
                        <p class="my-5">
                            We are a page created to guide you and compile all the FumoFumo plush toys ever created.
                        </p>
                        <p class="my-5">
                            Originally, the FumoFumo plush toys belonged exclusively to Touhou Project series,
                            but times have changed, and now we have other collaborations from different franchises.
                        </p>
                        <p class="my-5">
                            On this page you’ll primarily find information and images about Fumos,
                            but we’ll also publish other articles from time to time.
                        </p>
                    </div>
                </div>
                <a href="#" class="btn flex items-center justify-center text-nowrap btn-primary text-2xl gap-2 p-3 mt-10">
                    <div class="flex w-full justify-center text-center">
                        The Fumo Origins
                    </div>
                </a>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const decoration = document.getElementById('decoration-animation');
    if (!decoration) return;
    function onScroll() {
        const rect = decoration.getBoundingClientRect();
        if (rect.top < window.innerHeight * 0.9) {
            decoration.classList.add('decoration-inview');
            window.removeEventListener('scroll', onScroll);
        }
    }
    window.addEventListener('scroll', onScroll);
    onScroll();
});
</script>
@endpush
