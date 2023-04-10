<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="icon" type='image/png' href={{ asset('storage/images/general/logoOko.png') }}>
    <!--<link rel="stylesheet" type="text/css" href={{ URL::asset('style.css') }}> !-->
    @vite('resources/css/app.css')
    <script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>
</head>

<body>
    <header>
        <nav>
            <div x-data="{ open: false }" class="bg-black bg-opacity-80 fixed w-full z-10 select-none p-5">

                    <a href="/" class="inline-block m-2">
                        <img src={{ URL::asset('storage/images/general/logoOko.png') }} 
                             class="h-8 inline-block">
                        <img src={{ URL::asset('storage/images/general/cropped-VAC-logo-white.png') }}
                             class="h-8 inline-block">
                    </a>
                    <div class='float-right md:hidden' @click="open = !open">
                        <div class='w-8 h-1 bg-white m-2 transition-all duration-300' :class="{ '-rotate-45 translate-y-3': open}"></div>
                        <div class='w-8 h-1 bg-white m-2 transition-all duration-300' :class="{ 'opacity-0': open }"></div>
                        <div class='w-8 h-1 bg-white m-2 transition-all duration-300' :class="{ 'rotate-45 -translate-y-3': open}"></div>
                    </div>
                    <x-navbar />
                    <x-navbar-admin />
                    <x-navbar-desk />
                    <x-navbar-desk-admin />
                    <!--    <x-navbar-admin isMobile="true" /> -->

            </div>
        </nav>
    </header>
    <segment>
        <div class='bg-intro py-48 bg-no-repeat bg-cover w-full'>
            <div class='container text-center text-white text-3xl lg:text-6xl font-bold overflow-hidden'>
                <h1>{{ $banner }}</h1>
            </div>
        </div>
    </segment>
    @include('_separator')
    @include('_success-msg')
    {{ $slot }}

    <footer>
        <div class="flex justify-center bg-gradient mt-28 py-10 text-white">
            <a href='https://www.facebook.com/VisualAnthropologyCenter/'
                target="_blank">@include('svg/_facebook')</a>
            <a href='https://www.instagram.com/visual.anthropology.center/'
                target="_blank">@include('svg/_instagram')</a>
            <a href='https://www.youtube.com/channel/UCeadgCIuhZ_Zwtv14POprRg'
                target="_blank">@include('svg/_youtube')</a>
            <a href='mailto: info@visualanthropologycenter.com' target="_blank">@include('svg/_email')</a>
        </div>
    </footer> 
</body>
