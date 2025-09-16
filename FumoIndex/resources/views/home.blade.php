@extends('layouts.app')

@section('title', 'The Fumo Index')

@section('content')
    <div class="overflow-hidden relative">

        <div class="absolute inset-0 -z-10">
            <img src="/img/background/gensokyo.jpg"  alt="Gensokyo Background" class="w-full h-full object-cover header-image"/>
        </div>

        <div class="container mx-auto flex relative justify-center items-center flex-col gap-10 h-[850px] hidden md:flex" data-aos="fade-up" data-aos-duration="1200">
            <div class="absolute hidden w-50 h-50 rotate-[6deg] r-chibi-breakpoints" data-aos="zoom-in" data-aos-delay="100">
                <img src="/img/home/fumo_reimu.png" class="pointer-events-none" alt="Reimu Hakurei Fumo" />
            </div>
            <div class="absolute hidden w-50 h-50 scale-x-[-100%] rotate-[-6deg] l-chibi-breakpoints" data-aos="zoom-in" data-aos-delay="100">
                <img src="/img/home/fumo_marisa.png" class="pointer-events-none" alt="Marisa Kirisame Fumo" />
            </div>
            <div class="flex flex-col gap-2 text-center mt-24" data-aos="fade-up" data-aos-delay="600">
                <div class="text-5xl text-nowrap md:text-6xl font-bold text-white">The Fumo Index</div>
                <div class="text-2xl text-white">The ultimate guide to all things Fumo!</div>
            </div>
            <div class="flex w-full md:w-auto justify-between flex-col md:flex-row gap-10 mt-16" data-aos="fade-up" data-aos-delay="1200">
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
                <a href="{{ route('the_fumo_origins') }}" class="btn flex items-center justify-center text-nowrap btn-outline text-2xl gap-2 p-3">
                    <div class="flex w-full justify-center text-center">
                        The Fumo Origins
                    </div>
                </a>
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
            <div class="bg-container backdrop-blur-sm rounded-3xl shadow-xl border-4 border-secondary p-8 mt-10 mb-10 w-full max-w-5xl">
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
                        <h2 class="text-2xl font-semibold mt-2 text-primary text-center">The definitive Fumo Index <i class="fa-solid fa-book"></i></h2>
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
                <a href="{{route('the_fumo_origins')}}" class="btn flex items-center justify-center text-nowrap btn-primary text-2xl gap-2 p-3 mt-10">
                    <div class="flex w-full justify-center text-center">
                        The Fumo Origins
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="container mx-auto flex flex-col items-center justify-center mt-8">
        <div class="bg-container backdrop-blur-sm rounded-3xl shadow-xl border-4 border-secondary p-8 w-full max-w-7xl">
            <h2 class="text-3xl font-bold text-center mb-4 text-primary">FumoFumo Categories</h2>
            <p class="text-lg text-center mb-8">
                Originally, there were only two Fumos: Reimu and Marisa, but over time and with increasing popularity, more characters and, with them, more versions began to appear, thus giving rise to the Fumo categories.
            </p>
            <div class="flex flex-row flex-wrap justify-center gap-6 mb-8">

                @foreach($categories as $category)
                    <div class="group cursor-pointer">
                        <div class="relative bg-gradient-to-b from-gray-100 to-gray-300 rounded-2xl shadow-lg border-4 border-gray-300 overflow-hidden transition-all duration-300 hover:shadow-xl hover:scale-105 hover:border-red-500 flex flex-col items-center h-40">
                            <div class="aspect-square p-2 w-32 flex items-center justify-center relative z-10">
                                <img src="/img/fumo_types/{{ $category['type_image'] }}" alt="{{ $category['fumo_type'] }}" class="w-full h-full object-contain rounded-xl pointer-events-none" />
                            </div>
                            <div class="relative -mt-2 mx-2 mb-2 w-full z-10">
                                <div class="bg-black text-white text-xs font-bold py-2 px-3 rounded-lg text-center relative overflow-hidden">
                                    <span class="relative z-10">{{ $category['fumo_type'] }}</span>
                                    <div class="absolute inset-0 bg-gradient-to-r from-gray-800 to-black opacity-80"></div>
                                </div>
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-red-500/30 to-red-400/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl"></div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="flex flex-col items-center mt-6">
                <h3 class="text-xl font-semibold mb-8 text-primary">Fumo Size Comparison</h3>

                <div class="w-full flex justify-center relative overflow-hidden rounded-xl border-4 border-secondary h-56 md:h-56 hidden md:flex">
                    <img src="/img/background/marisa_kirisame_background.jpg" alt="Fumo comparison background" class="absolute inset-0 w-full h-full object-cover pointer-events-none -z-10" />
                    <img src="/img/home/fumo_comparasion_marisa.png" alt="Fumo comparison (Marisa Kirisame)" class="relative z-10 pointer-events-none h-64 scale-[1.40]" />
                </div>

                <div class="w-full flex justify-center relative overflow-hidden rounded-xl border border-secondary h-32 md:hidden">
                    <img src="/img/background/marisa_kirisame_background.jpg" alt="Fumo comparison background" class="absolute inset-0 w-full h-full object-cover pointer-events-none -z-10" />
                    <img src="/img/home/fumo_comparasion_marisa.png" alt="Fumo comparison (Marisa Kirisame)" class="relative z-10 pointer-events-none h-36 scale-[1.10]" />
                </div>

                <div class="text-center mt-4 text-lg text-gray-800">
                    <p>Deka (70cm) - Medium (40cm) - Puppet (40cm) - Nendoroid (40cm) - Standard (20cm) - Toy Strap (10cm)</p>
                </div>

                <div class="flex flex-col items-center mt-6">
                    <div class="bg-primary/10 border-l-4 border-primary rounded-xl px-6 py-4 max-w-2xl text-center shadow-md">
                        <p class="text-lg text-primary font-semibold mb-2">
                            <i class="fa-solid fa-circle-info mr-2"></i>
                            Important Note
                        </p>
                        <p class="text-gray-800">
                            These are the <span class="font-bold">"original"</span> Fumo categories, but there are many more: bowls, keychains, beach pillows, etc.<br>
                            Please check the <a href="#" class="text-primary font-semibold">categories section</a> for more information.
                        </p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

@endsection