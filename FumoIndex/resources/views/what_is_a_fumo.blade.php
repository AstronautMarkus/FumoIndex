@extends('layouts.app')

@section('title', 'What is a Fumo? The Fumo Index')

@section('content')
<div class="flex flex-col items-center justify-center py-8">
    <div class="bg-container border-4 border-secondary rounded-3xl shadow-md w-[95%] max-w-7xl mx-auto px-6 py-8 flex flex-col items-center">

        <h1 class="text-4xl font-bold mb-8 text-center text-primary">What is a Fumo? <i class="fa-solid fa-yin-yang"></i></h1>
        <div class="flex flex-col md:flex-row items-start gap-8 w-[95%] max-w-3xl mb-6 px-4 md:px-0">
            <div class="flex-1">
                <p class="text-lg mb-2">
                    A FumoFumo, also known as "Fumos," is a line of collectible plush toys manufactured and sold by the Japanese company Gift. These plush toys are based on ANGELTYPE designs. Originally, there were only two, Marisa and Reimu, designed and released by ANGELTYPE in 2008.
                </p>
            </div>
            <div class="flex flex-col items-center w-full md:w-auto">
                <div class="w-full md:w-50 h-48 md:h-50 bg-gray-200 flex items-center justify-center rounded shadow overflow-hidden">
                <img src="{{ asset('img/pages/what_is_a_fumo/marisa-2008.webp') }}" alt="Marisa Fumo" class="object-cover w-full h-full pointer-events-none" />
                </div>
                <span class="text-sm italic mt-2">- Marisa Kirisame Fumo (2008)</span>
            </div>
        </div>
        <h2 class="text-2xl md:text-3xl font-semibold mb-2 text-center text-primary">These plushies have the following qualities:</h2>
        <ul class="list-disc pl-6 text-lg mb-6 text-left max-w-2xl px-4 md:px-0 w-[95%]">
            <li>Soft, high-quality fabric.</li>
            <li>Chibi proportions.</li>
            <li>Highly collectible, with limited releases.</li>
            <li>Originally based on Touhou Project characters.</li>
            <li>Facial expressions (happy, serious, angry, etc.)</li>
        </ul>
        <div class="max-w-3xl mb-6 px-4 md:px-0 w-[95%]">
            <p class="text-lg mb-2">
                The name "FumoFumo" refers to something fluffy or soft. These plushies have a distinctive design compared to other anime or video game merchandise, which is why they began to stand out, although of course, this only began in late 2018, when they became known to the rest of the world.
            </p>
        </div>
        <div class="flex flex-col items-center mb-6 px-4 md:px-0 w-[95%]">
            <div class="w-full md:w-[540px] h-48 md:h-[400px] bg-gray-200 flex items-center justify-center rounded shadow mb-2 overflow-hidden">
                <img src="{{ asset('img/pages/what_is_a_fumo/marisa_reimu_deka.jpg') }}" alt="Marisa & Reimu Deka Fumo" class="object-cover w-full h-full pointer-events-none" />
            </div>
            <span class="text-sm italic">- Marisa & Reimu, Deka version</span>
        </div>
        <div class="max-w-3xl mb-6 px-4 md:px-0 w-[95%]">
            <p class="text-lg">
                Fumos started out as a simple video game plush, but now they're a household name on the internet. However, if you're interested in learning more, you can check out the following articles:
            </p>
        </div>
        <div class="flex flex-col md:flex-row justify-center items-center gap-4 md:gap-8 mb-8 w-[95%] px-4 md:px-0">
            <a href="#" class="btn flex items-center justify-center text-nowrap btn-primary text-2xl gap-2 p-3">The Fumo Origins</a>
            <a href="#" class="btn flex items-center justify-center text-nowrap btn-primary text-2xl gap-2 p-3">How to get Fumos</a>
        </div>
    </div>
</div>

<div class="flex flex-col items-center justify-center py-8">
    <div class="bg-container border-4 border-secondary rounded-3xl shadow-md w-[95%] max-w-7xl mx-auto px-6 py-8 flex flex-col items-center">
        <h1 class="text-4xl font-bold mb-8 text-center text-primary">How to Tell a Fumo from a Regular Plushie <i class="fa-solid fa-magnifying-glass"></i></h1>

            <section class="flex flex-col md:flex-row items-center gap-8 w-full max-w-5xl mx-auto mb-16">
                <div class="md:w-1/2 w-full flex justify-center">
                    <div class="w-80 h-64 bg-gray-200 rounded shadow flex items-center justify-center overflow-hidden relative">
                        <img src="{{ asset('img/pages/what_is_a_fumo/new-fumos-confirmed-via-gift-v0-b3ii26pxkhv91.webp') }}" alt="New Fumos confirmed Via Gift" class="object-cover w-full h-full pointer-events-none" />
                    </div>
                </div>
                <div class="md:w-1/2 w-full">
                    <p class="text-lg mb-2">
                        In the vast world of collecting, few items generate as much excitement as fumos, those small official Touhou Project plushies manufactured primarily by Gift.
                        However, many new collectors mistake a fumo for a simple generic plushie. To avoid disappointment (or fake bargains at dubious auctions), 
                    </p>
                    <p class="text-base text-gray-700">
                        here's a quick and practical guide to distinguishing a real fumo from a regular plushie.
                    </p>
                </div>
            </section>

            <section class="flex flex-col md:flex-row-reverse items-center gap-8 w-full max-w-5xl mx-auto mb-8">
                <div class="md:w-1/2 w-full flex justify-center">
                    <div class="w-80 h-64 bg-gray-200 rounded shadow flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('img/pages/what_is_a_fumo/FJ1JupIWUAEyzOT.jpeg') }}" alt="Fumo face" class="object-cover w-full h-full pointer-events-none" />
                    </div>
                </div>
                <div class="md:w-1/2 w-full">
                    <h2 class="text-2xl font-bold mb-4 text-primary">The Face: The Key to Everything</h2>
                    <p class="text-lg mb-2">
                        Fumos have a very distinctive facial expression—simple, yet unmistakable:
                    </p>
                    <ul class="list-disc pl-6 text-base text-gray-700">
                        <li>Solid-colored eyes with no extra details, featuring a single white circle at the top to represent a highlight or pupil.</li>
                        <li>A small, simple mouth—whether smiling, neutral, or another expression—with minimal detail.</li>
                        <li>No nose or extra facial features beyond those specific to the character. The face often resembles something like 'ᗜˬᗜ'.</li>
                    </ul>
                </div>
            </section>

            <section class="flex flex-col items-center w-full max-w-4xl mx-auto mt-8 mb-16">
                <p class="text-lg text-center mb-2">
                    It's important to note that some Fumos deviate from the standard design, featuring extra details like fangs, unique facial expressions, blushing cheeks, or additional facial features. In these cases, it's best to check the <a href="https://www.gift-gift.jp/" target="_blank" class="hover:underline text-primary hover:text-primary-light focus:outline-none cursor-pointer">official Gift website</a> and verify if the plush includes ふもふも (fumofumo) in its name. Still, it's usually easy to tell if a plush is a Fumo or not.
                </p>

                <div class="flex flex-row justify-center items-center gap-4 mt-6 mb-4">
                    <div class="w-48 h-48 bg-gray-200 rounded shadow flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('img/pages/what_is_a_fumo/61sIfpmEOhL._AC_SL1200_.jpg') }}" alt="Flandre fumo" class="object-cover w-full h-full pointer-events-none" />
                    </div>
                    <div class="w-48 h-48 bg-gray-200 rounded shadow flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('img/pages/what_is_a_fumo/GOODS-04483923.jpg') }}" alt="Nijika Fumo" class="object-cover w-full h-full pointer-events-none" />
                    </div>
                    <div class="w-48 h-48 bg-gray-200 rounded shadow flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('img/pages/what_is_a_fumo/GOODS-04650058.jpg') }}" alt="Monika Fumo" class="object-cover w-full h-full pointer-events-none" />
                    </div>
                </div>
                
                <blockquote class="border-l-4 border-primary pl-4 italic">
                    All of these photos show official Fumos. <a href="/characters/flandre_scarlet" target="_blank" class="hover:underline text-primary hover:text-primary-light focus:outline-none cursor-pointer">Flandre</a> is the most obvious example, as she is a Touhou character, but the other two (<a href="/characters/nijika_ijichi" target="_blank" class="hover:underline text-primary hover:text-primary-light focus:outline-none cursor-pointer">Nijika</a> and <a href="/characters/monika" target="_blank" class="hover:underline text-primary hover:text-primary-light focus:outline-none cursor-pointer">Monika</a>) are also official Fumos of characters outside Touhou that Gift decided to produce.
                </blockquote>
            </section>

            <section class="flex flex-col md:flex-row-reverse items-center gap-8 w-full max-w-5xl mx-auto mb-8">
                <div class="md:w-1/2 w-full flex justify-center">
                    <div class="w-80 h-64 bg-gray-200 rounded shadow flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('img/pages/what_is_a_fumo/473541199_3495134854113657_976642633946924613_n.jpg') }}" alt="Fumo Types" class="object-cover w-full h-full pointer-events-none" />
                    </div>
                </div>
                <div class="md:w-1/2 w-full">
                    <h2 class="text-2xl font-bold mb-4 text-primary">The Fumo Types:</h2>
                    <p class="text-lg mb-2">
                        Fumos come in various types, each with its own unique characteristics. Here are the main types:
                    </p>
                    <ul class="list-disc pl-6 text-base text-gray-700">
                        <li>Standard Type</li>
                        <li>Medium Type</li>
                        <li>Deka Type</li>
                    </ul>
                </div>
            </section>

            <blockquote class="border-l-4 border-primary pl-4 italic">
                These three are currently the most common types: Standard (the classic and most widespread), Mannaka/Medium (slightly larger and introduced around 2023), and Deka (the big, huggable ones). There are also less common categories, and even items that aren't plushies at all, such as keychains, mugs, or pencils. For a detailed overview, please see the <a href="#" target="_blank" class="hover:underline text-primary hover:text-primary-light focus:outline-none cursor-pointer">Fumo Types</a> page.
            </blockquote>
    </div>
</div>

<div class="flex flex-col items-center justify-center py-8">
    <div class="bg-container border-4 border-secondary rounded-3xl shadow-md w-[95%] max-w-7xl mx-auto px-6 py-8 flex flex-col items-center">
        <h1 class="text-4xl font-bold mb-8 text-center text-primary">The Bootleg Fumos <i class="fa-solid fa-skull-crossbones"></i></h1>

        <section class="flex flex-col md:flex-row items-center gap-8 w-full max-w-5xl mx-auto mb-16">
            <div class="md:w-1/2 w-full flex justify-center">
                <div class="w-80 h-64 bg-gray-200 rounded shadow flex items-center justify-center overflow-hidden relative">
                    <img src="{{ asset('img/pages/what_is_a_fumo/real-vs-bootleg-fumo-v0-ds93xejj9rsd1.jpg') }}" alt="Real Fumo and Bootleg Fumo" class="object-cover w-full h-full pointer-events-none" />
                </div>
                </div>
                <div class="md:w-1/2 w-full">
                <p class="text-lg mb-2">
                    Wherever there is something valuable, imitations are bound to appear—and fumos are no exception. For years, bootleg or counterfeit versions have circulated online, attempting to replicate the originals produced by Gift.
                </p>
                <p class="text-base text-gray-700">
                    These plushies can easily fool an inexperienced eye, but a well-informed collector should know how to spot them and understand the implications of buying a bootleg.
                </p>
            </div>
        </section>


        <blockquote class="border-l-4 border-primary pl-4 italic mb-16">
            IMPORTANT: The purpose of <strong>The Fumo Index</strong> is purely to inform and provide detailed explanations about fumos. We do not seek to judge or influence anyone's purchasing decisions. Every collector is free to choose what to buy, and we respect all choices. However, we believe it is important to understand the differences between an original fumo and a bootleg to make informed decisions. We are aware that not everyone has the same budget—especially those in Latin America, including ourselves—and sometimes a bootleg may be an option. Our goal here is not to encourage anyone to buy bootlegs, but simply to inform. Thank you.
        </blockquote>

        <section class="flex flex-col md:flex-row-reverse items-center gap-8 w-full max-w-5xl mx-auto mb-16">
            <div class="md:w-1/2 w-full flex justify-center">
                <div class="w-80 h-64 bg-gray-200 rounded shadow flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('img/pages/what_is_a_fumo/cheap-and-high-quality-looking-fumos-on-aliexpress-v0-zl9v5ucfeirb1.webp') }}" alt="Bootleg Cirno Fumo" class="object-cover w-full h-full pointer-events-none" />
                </div>
            </div>
            <div class="md:w-1/2 w-full">
                <h2 class="text-2xl font-bold mb-4 text-primary">What Is a Bootleg Fumo?</h2>
                <p class="text-lg mb-2">
                    A bootleg fumo is an unofficial plush inspired by authentic fumos, produced without a license by third-party manufacturers. These are mostly sold on sites like AliExpress, often by Chinese vendors, and are frequently advertised as "authentic Fumos." Sellers sometimes use photos of real fumos to attract buyers, which can be misleading. While the lower price may seem appealing, bootleg fumos have several clear differences compared to originals:
                </p>
                <ul class="list-disc pl-6 text-base text-gray-700">
                    <li>Poorer quality materials: cheaper fabrics, sloppy embroidery.</li>
                    <li>Noticeable deformities: the plush may have decent colors but a "warped" or odd appearance, nothing like a real Fumo.</li>
                    <li>Incorrect facial details: Unlike official examples, bootlegs often feature faces or expressions that do not match the Fumo style.</li>
                </ul>
                <blockquote class="text-base text-gray-700 mt-4 border-l-4 border-primary pl-4 italic">
                    If you want to avoid disappointment, always compare with official photos and check for the "ふもふも" (fumofumo) name on the <a href="https://www.gift-gift.jp/" target="_blank" class="hover:underline text-primary hover:text-primary-light focus:outline-none cursor-pointer">Gift website</a>.
                </blockquote>
            </div>
        </section>


        <section class="flex flex-col md:flex-row items-center gap-8 w-full max-w-5xl mx-auto mb-8">
            <div class="md:w-1/2 w-full flex justify-center">
                <div class="w-80 h-64 bg-gray-200 rounded shadow flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('img/pages/what_is_a_fumo/473541199_3495134854113657_976642633946924613_n.jpg') }}" alt="Fumo Types" class="object-cover w-full h-full pointer-events-none" />
                </div>
            </div>
            <div class="md:w-1/2 w-full">
                <h2 class="text-2xl font-bold mb-4 text-primary">The Unexpected Advantage: Exclusive Designs</h2>
                <p class="text-lg mb-2">
                    Interestingly, some bootlegs became popular because they offer what official ones do not:
                </p>
                <ul class="list-disc pl-6 text-base text-gray-700">
                    <li>Characters that Gift never produced (for example, secondary Touhou characters or even from other series).</li>
                    <li>Alternative or fanmade designs, sometimes with rare or themed outfits.</li>
                </ul>
            </div>
        </section>


        <section class="flex flex-col items-center w-full max-w-4xl mx-auto mt-8 mb-8">
            <div class="flex flex-row justify-center items-center gap-4 mt-6 mb-4">
                <div class="w-48 h-48 bg-gray-200 rounded shadow flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('img/pages/what_is_a_fumo/ranni_bootleg.jpg') }}" alt="Ranni Fumo bootleg" class="object-cover w-full h-full pointer-events-none" />
                </div>
                <div class="w-48 h-48 bg-gray-200 rounded shadow flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('img/pages/what_is_a_fumo/nazrin_bootleg.jpg') }}" alt="Nazrin Fumo bootleg" class="object-cover w-full h-full pointer-events-none" />
                </div>
                <div class="w-48 h-48 bg-gray-200 rounded shadow flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('img/pages/what_is_a_fumo/reimu_custom_bootleg.avif') }}" alt="Reimu Custom Fumo Bootleg" class="object-cover w-full h-full pointer-events-none" />
                </div>
            </div>
        </section>

        <section class="flex flex-col items-center w-full max-w-4xl mx-auto mt-8 mb-8">
            <h2 class="text-3xl font-bold mb-2 text-primary text-center">Some objective points about these bootlegs</h2>
            <p class="text-lg mb-6">
                Not everything is negative with bootlegs. Personally, in the <strong>The Fumo Index</strong> team, we have two positive points we want to mention:
            </p>

            <div class="flex flex-col md:flex-row justify-center items-start gap-8 w-full">
                <div class="flex-1 flex flex-col items-center">
                    <div class="w-48 h-48 bg-gray-200 rounded shadow flex items-center justify-center overflow-hidden mb-4">
                        <img src="{{ asset('img/pages/what_is_a_fumo/s-l1200.jpg') }}" alt="Nazrin Fumo (Official)" class="object-cover w-full h-full pointer-events-none" />
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-primary text-center">Other characters, "predicted releases"</h3>
                    <p class="text-base text-gray-700 text-center">
                        This is a bit odd but, as mentioned before, some bootlegs offer characters that Gift has not produced, or maybe not yet. For example, the bootleg of <a href="/characters/hina_kagiyama" target="_blank" class="hover:underline text-primary hover:text-primary-light focus:outline-none cursor-pointer">Hina Kagiyama</a> appeared in bootlegs before Gift announced its official version. Something similar happened with <a href="/characters/nazrin" target="_blank" class="hover:underline text-primary hover:text-primary-light focus:outline-none cursor-pointer">Nazrin</a>.
                </div>
                <div class="flex-1 flex flex-col items-center">
                    <div class="w-48 h-48 bg-gray-200 rounded shadow flex items-center justify-center overflow-hidden mb-4">
                        <img src="{{ asset('img/pages/what_is_a_fumo/fumo_bee.avif') }}" alt="Fumo Bee clothes" class="object-cover w-full h-full pointer-events-none" />
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-primary text-center">Merchandise compatible with Fumos</h3>
                    <p class="text-base text-gray-700 text-center">
                        Some bootleg shops have designed clothes and accessories compatible with fumos, like the bee costume in the photo, which is adorable, although not official. There are also items like backpacks to carry your Fumo, a little bed, articulated fumos, etc. These things are not official, but can be fun and it would be great if Gift considered using these ideas in the future.
                    </p>
                </div>
            </div>
        </section>

        <section class="flex flex-col items-center w-full max-w-4xl mx-auto mt-8 mb-8">
            <h2 class="text-2xl font-bold mb-4 text-primary text-center mb-8">Some images</h2>
            <div class="flex flex-row justify-center items-center gap-4">
                <div class="w-36 h-36 bg-gray-200 rounded shadow flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('img/pages/what_is_a_fumo/fumo_coat.jpg') }}" alt="Fumo Coat" class="object-cover w-full h-full pointer-events-none" />
                </div>
                <div class="w-36 h-36 bg-gray-200 rounded shadow flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('img/pages/what_is_a_fumo/fumo_bed.avif') }}" alt="Fumo Bed" class="object-cover w-full h-full pointer-events-none" />
                </div>
                <div class="w-36 h-36 bg-gray-200 rounded shadow flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('img/pages/what_is_a_fumo/articulated_reimu.jpg') }}" alt="Reimu Fumo with articulated limbs" class="object-cover w-full h-full pointer-events-none" />
                </div>
                <div class="w-36 h-36 bg-gray-200 rounded shadow flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('img/pages/what_is_a_fumo/fumo_bag.webp') }}" alt="Fumo Bag" class="object-cover w-full h-full pointer-events-none" />
                </div>
            </div>
        </section>

    </div>

    <blockquote class="border-l-4 border-primary pl-4 italic mt-8 text-lg text-center max-w-4xl mx-auto">
        In summary, Fumos are more than just plushies—they are a unique part of anime and game culture, beloved by collectors worldwide. Whether you choose official or bootleg, understanding their origins and differences helps you make informed decisions and appreciate the creativity behind each one. Happy collecting!
    </blockquote>

</div>

<div class="flex justify-center mb-8 px-4 md:px-0 w-[95%]">
    <a href="{{ route('home') }}" class="btn flex items-center justify-center text-nowrap btn-tertiary text-2xl gap-2 p-3">Back Home <i class="fa-solid fa-home"></i></a>
</div>

@endsection
