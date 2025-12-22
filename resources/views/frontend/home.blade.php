@extends('layouts.master')
@section('title')
    <title>Home | V-arch</title>
@endsection
@section('css')
    <style>
        .products_swiper {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .products_swiper .swiper {
            margin-inline: initial;
            padding-top: 6rem;
        }

        .products_swiper .swiper-button-next,
        .products_swiper .swiper-button-prev {
            position: absolute;
            top: 60px;
            transform: translateY(-50%);
            z-index: 10;
            background-color: transparent;
        }

        .products_swiper .swiper-button-next {
            right: 10px;
        }

        .products_swiper .swiper-button-prev {
            left: 91%;
        }

        .products_swiper .swiper-button-prev::after,
        .products_swiper .swiper-button-next::after {
            content: "";
        }


        @media (max-width: 1279px) {
                .products_swiper .swiper {
                    margin-inline: 0;
                    padding-top: 6rem;
                }

                .products_swiper .swiper-button-next,
                .products_swiper .swiper-button-prev {
                    position: absolute;
                    top: 60px;
                    transform: translateY(-50%);
                    z-index: 10;
                    background-color: transparent;
                }

                .products_swiper .swiper-button-next {
                    right: 10px;
                }

                .products_swiper .swiper-button-prev {
                    left: 10px;
                }
            }
    </style>
@endsection
@section('content')
    {{-- <x-loading /> --}}

    <x-scroll-top-button />

    <section class="relative w-full h-[70vh] sm:h-screen">
        <div class="absolute inset-0 w-full h-full overflow-hidden">
            {{-- <video autoplay muted loop class="w-full h-full object-cover">
                <source src="{{ asset('assets/videos/home-video.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video> --}}
            <img src="{{ asset('assets/images/home_bg.png') }}" alt="" class="object-cover w-full h-full"
                loading="lazy">
        </div>

        <div
            class="relative z-10 flex flex-col items-center justify-center w-full h-full px-4 text-center text-white lg:pt-20">
            <img src="{{ asset('assets/images/logo.png') }}" alt="" class="w-32">
            <div class="flex items-center justify-center mt-4">
                <svg class="w-[10rem] sm:w-[15rem] lg:w-[25rem]" viewBox="0 0 743 276" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M16.907 272.657C22.3738 264.239 27.2061 255.425 31.3637 246.289C58.6193 182.601 76.014 105.081 81.8753 57.4781C84.3769 31.4297 82.7915 12.3915 65.9495 13.0897C49.0057 14.3695 35.2325 29.1754 26.1715 42.6868C12.1074 64.881 4.15182 98.3324 21.1684 104.121C27.5968 106.041 35.5379 104.761 42.5336 99.6122C43.6535 98.6523 45.4424 99.2923 45.2533 100.572C44.5988 106.39 39.4357 114.084 32.28 118.272C24.8626 122.126 13.2855 122.126 6.87162 116.338C-11.9338 100.252 11.0458 46.5265 37.4141 23.7068C50.2274 12.7697 65.9205 1.8908 83.2279 2.15259C105.262 3.1125 112.214 22.7324 111.821 40.1125C110.367 97.6779 76.1012 202.54 37.6468 256.906C55.2906 240.821 71.7807 223.515 86.9947 205.115C120.81 165.235 151.73 123.421 184.905 83.5265C197.893 67.7753 211.928 53.2894 226.036 38.44C237.817 25.903 249.554 13.715 265.392 5.62855C271.675 2.71974 279.456 0.494509 286.379 1.45442C290.742 2.09435 298.102 4.36323 293.84 10.4572C292.546 12.3915 290.568 12.7115 288.575 13.0315C282.03 13.6715 276.184 15.9403 269.668 18.5001C247.96 27.927 228.283 41.4697 211.725 58.3798C203.929 66.4227 195.726 76.7199 188.454 85.4027C144.72 138.154 105.655 193.799 57.9212 243.656C46.286 254.914 34.4035 266.491 20.1067 275.173C17.4742 276.846 15.5544 274.912 16.907 272.657Z"
                        fill="white" />
                    <path d="M245.714 148.597H171.743L176.208 141.208H250.194L245.714 148.597Z" fill="white" />
                    <path
                        d="M269.872 152.145C298.8 101.372 336.498 83.9192 357.398 83.9192C369.629 83.9192 377.323 87.7734 376.203 101.939C378.045 96.7907 379.456 92.2869 380.435 88.4279L412.127 85.519L352.642 196.81C342.868 214.496 343.813 220.284 350.242 220.284C362.474 220.284 380.784 201.944 398.048 179.43L401.481 182.004C375.985 216.43 352.714 234.116 334.694 234.116C320.601 233.796 315.176 222.219 326.099 197.755C308.646 219.31 289.026 234.116 271.661 234.116C246.252 234.159 240.623 202.962 269.872 152.145ZM346.068 159.854L355.463 142.488C373.832 106.462 374.371 90.3768 360.801 90.3768C348.584 90.3768 321.387 108.397 296.56 154.065C271.413 199.748 270.73 222.582 282.961 222.582C295.498 222.582 322.914 203.282 346.068 159.854Z"
                        fill="white" />
                    <path
                        d="M439.615 88.4569L471.307 85.5481L443.12 137.732C468.66 103.001 492.803 84.021 508.569 84.021C527.229 84.021 524.989 108.47 510.474 118.112C498.839 125.835 485.967 122.301 484.295 114.898C483.349 109.08 486.432 104.281 493.239 103.961C500.686 103.641 504.874 92.7038 497.297 93.3437C486.142 94.6382 454.087 122.301 419.995 180.841L391.765 233.272L364.582 234.232L423.689 125.152C431.805 111.553 437.317 98.0996 439.615 88.4569Z"
                        fill="white" />
                    <path
                        d="M503.696 152.145C532.944 101.241 570.323 83.9482 591.222 83.9482C617.605 83.9482 620.79 104.863 610.13 118.359C601.403 129.631 586.074 129.297 581.652 119.334C580.977 117.846 580.739 116.198 580.964 114.58C581.189 112.962 581.869 111.441 582.925 110.194C583.981 108.948 585.37 108.027 586.929 107.539C588.488 107.051 590.153 107.015 591.731 107.437C598.32 108.397 604.705 104.863 605.97 99.3941C607.163 94.2455 604.516 89.4168 596.4 89.4168C579.994 89.4168 552.768 105.503 527.665 151.171C504.831 192.665 513.121 221.288 531.155 221.288C549.481 221.288 571.428 201.988 588.779 179.474L591.877 182.048C566.716 216.474 539.518 234.159 515.128 234.159C489.4 234.159 474.768 202.962 503.696 152.145Z"
                        fill="white" />
                    <path
                        d="M688.711 2.57433L720.359 0L641.239 147.637C670.706 108.717 702.324 83.9483 721.232 83.9483C737.23 84.2682 750.902 92.951 721.435 145.033L693.962 196.825C684.508 214.51 685.133 220.299 691.562 220.299C703.793 220.299 722.352 201.959 739.383 179.444L742.8 182.019C717.319 216.445 694.354 234.13 676.029 234.13C660.03 233.81 655.173 218.684 672.771 187.167L697.758 140.525C711.851 114.476 716.417 99.045 705.146 99.045C684.566 99.045 641.152 150.182 620.121 186.527L595.135 233.17L567.952 234.13L673.164 39.5308C680.857 26.0484 686.326 12.537 688.711 2.57433Z"
                        fill="white" />
                </svg>
            </div>
            <p class="mt-4 text-[16px] md:text-[25px] text-[#DD483A] font-[500] max-w-[500px]">LIGHTING UP YOUR HOME WITH
                CHARMING LIGHTING
            </p>
        </div>

        <div
            class="absolute left-0 -bottom-[15rem] w-full h-full overflow-visible flex items-end justify-center pb-10 pointer-events-none">
            <img src="{{ asset('assets/images/lamp.png') }}" alt="" class="p-0 w-[20rem] sm:w-[30rem]">
        </div>
    </section>

    {{-- about us --}}
    <section id="about" class="w-full pt-52 sm:pt-40 xl:pt-32 pb-10 bg-white">
        <div class="max-w-7xl mx-auto px-2 grid grid-cols-1 md:grid-cols-2 gap-4 items-center">

            <!-- LEFT IMAGE COLLAGE -->
            <div class="flex items-center gap-2">
                <div class="flex flex-col gap-2">
                    <img src="{{ asset('assets/images/about/img-1.png') }}" class="w-52 h-40 object-cover">
                    <div class="flex gap-2 items-start">
                        <div class="w-8 h-8 bg-[#326BEA]"></div>
                        <img src="{{ asset('assets/images/about/img-2.png') }}"
                            class="w-[142px] sm:w-36 lg:w-[164px] h-40 object-cover" loading="lazy">
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <div class="w-8 h-8 bg-[#DD483A]"></div>
                    <img src="{{ asset('assets/images/about/img-3.png') }}" class="w-48 h-48 object-cover" loading="lazy">
                </div>
            </div>

            <!-- RIGHT CONTENT -->
            <div>
                <h2 class="text-[20px] md:text-[30px] xl:text-[40px] font-bold text-[#830B00] mb-4">
                    {{ app()->getLocale() === 'en'
                        ? $aboutus->title_en
                        : (app()->getLocale() === 'km'
                            ? $aboutus->title_km
                            : $aboutus->title_ch) }}
                </h2>
                <div class="text-gray-700 leading-relaxed text-[14px] xl:text-[16px]">
                    {!! app()->getLocale() === 'en'
                        ? $aboutus->content1_en
                        : (app()->getLocale() === 'km'
                            ? $aboutus->content1_km
                            : $aboutus->content1_ch) !!}
                </div>
            </div>

        </div>
    </section>

    {{-- firm history --}}
    <section class="w-full pb-10 md:py-12 bg-white">
        <h1 class="text-[20px] md:text-[30px] xl:text-[40px] font-bold text-[#830B00] pb-10 md:py-10 text-center px-2">
            {{ app()->getLocale() === 'en'
                ? 'Firm History'
                : (app()->getLocale() === 'km'
                    ? 'ប្រវត្តិក្រុមហ៊ុនរបស់យើងខ្ញុំ'
                    : 'Firm History') }}
        </h1>
        <div class="hidden md:flex relative w-full">

            <!-- Horizontal Line -->
            <div class="absolute top-[140px] left-0 right-0 h-[2px] bg-[#1E1E1E]"></div>

            <div class="grid grid-cols-4 gap-4 md:gap-8 px-4">

                @foreach ($histories as $item)
                    <div class="relative" x-data="{ open: false }">

                        <!-- Text -->
                        <div class="text-[12px] lg:text-sm text-gray-700 leading-relaxed line-clamp-3">
                            {{-- {!! $item->content !!} --}}
                            {!! app()->getLocale() === 'en'
                                ? $item->content_en
                                : (app()->getLocale() === 'km'
                                    ? $item->content_km
                                    : $item->content_ch) !!}
                        </div>

                        <button @click="open = true" class="hover:translate-x-2 duration-300">
                            <svg width="20" height="10" viewBox="0 9 21 1" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="u-animated-cta__icon u-my-5">
                                <path d="M0 10L19 10" stroke="currentColor"></path>
                                <path
                                    d="M19.3 10L19.6535 10.3536L20.0071 10L19.6535 9.64645L19.3 10ZM18.9464 9.64645L14.9464 13.6464L15.6535 14.3536L19.6535 10.3536L18.9464 9.64645ZM14.9464 6.35355L18.9464 10.3536L19.6535 9.64645L15.6535 5.64645L14.9464 6.35355Z"
                                    fill="currentColor"></path>
                            </svg>
                        </button>

                        <!-- Modal -->
                        <div x-show="open" x-transition x-cloak
                            class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
                            <div @click.away="open = false" class="bg-white max-w-lg w-full mx-4 rounded-xl p-6 relative">
                                <button @click="open = false"
                                    class="absolute top-3 right-3 text-gray-500 hover:text-gray-800">
                                    ✕
                                </button>

                                <h3 class="text-lg font-bold mb-3 text-[#830B00]">{{ $item->year }}</h3>

                                <div class="text-sm text-gray-700 leading-relaxed">
                                    {!! app()->getLocale() === 'en'
                                        ? $item->content_en
                                        : (app()->getLocale() === 'km'
                                            ? $item->content_km
                                            : $item->content_ch) !!}
                                </div>
                            </div>
                        </div>

                        <!-- Year + Dot -->
                        <div class="relative flex flex-col items-center mt-4">
                            <span class="text-[#DD483A] text-sm mb-4 font-[400]">{{ $item->year }}</span>
                            <div class="w-3 h-3 bg-[#1E1E1E] rotate-45 z-10"></div>
                        </div>

                        <!-- Image -->
                        <div class="mt-10">
                            <img src="{{ $item->image }}" class="w-full h-[120px] md:h-[180px] object-cover"
                                loading="lazy" />
                        </div>

                    </div>
                @endforeach

            </div>
        </div>

        <div class="md:hidden flex relative w-full">

            <!-- Vertical Line (Mobile) -->
            <div class="md:hidden absolute left-5 top-0 bottom-0 w-[2px] bg-[#1E1E1E]"></div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 md:gap-8">
                @foreach ($histories as $item)
                    <!-- Item -->
                    <div class="relative md:text-center pl-12 pr-2" x-data="{ open: false }">

                        <!-- Dot -->
                        <div
                            class="absolute md:static left-[14px] top-2 md:top-auto
                            w-3 h-3 bg-[#1E1E1E] rotate-45 z-10">
                        </div>

                        <!-- Year -->
                        <span class="block text-[#DD483A] text-sm mb-4 font-[400]">
                            {{ $item->year }}
                        </span>

                        <!-- Text -->
                        <div class="text-[12px] text-gray-700 leading-relaxed line-clamp-3">
                            {!! app()->getLocale() === 'en'
                                ? $item->content_en
                                : (app()->getLocale() === 'km'
                                    ? $item->content_km
                                    : $item->content_ch) !!}
                        </div>

                        <button @click="open = true" class="mb-4 hover:translate-x-2 duration-300">
                            <svg width="20" height="10" viewBox="0 9 21 1" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="u-animated-cta__icon u-my-5">
                                <path d="M0 10L19 10" stroke="currentColor"></path>
                                <path
                                    d="M19.3 10L19.6535 10.3536L20.0071 10L19.6535 9.64645L19.3 10ZM18.9464 9.64645L14.9464 13.6464L15.6535 14.3536L19.6535 10.3536L18.9464 9.64645ZM14.9464 6.35355L18.9464 10.3536L19.6535 9.64645L15.6535 5.64645L14.9464 6.35355Z"
                                    fill="currentColor"></path>
                            </svg>
                        </button>

                        <!-- Modal -->
                        <div x-show="open" x-transition x-cloak
                            class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
                            <div @click.away="open = false" class="bg-white max-w-lg w-full mx-4 rounded-xl p-6 relative">
                                <button @click="open = false"
                                    class="absolute top-3 right-3 text-gray-500 hover:text-gray-800">
                                    ✕
                                </button>

                                <h3 class="text-lg font-bold mb-3 text-[#830B00]">{{ $item->year }}</h3>

                                <div class="text-[12px] text-gray-700 leading-relaxed">
                                    {!! app()->getLocale() === 'en'
                                        ? $item->content_en
                                        : (app()->getLocale() === 'km'
                                            ? $item->content_km
                                            : $item->content_ch) !!}
                                </div>
                            </div>
                        </div>

                        <!-- Image -->
                        <img src="{{ $item->image }}" class="w-full h-[140px] sm:h-[150px] object-cover"
                            loading="lazy" />

                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- vision & mission & core value --}}
    <section class="w-full max-w-7xl mx-auto px-2 xl:px-4 pt-10 mb-10">
        {{-- vision & mission --}}
        <div class="relative grid grid-cols-1 md:grid-cols-2 gap-4 items-center z-20">
            <div
                class="w-full h-full px-10 pb-6 md:pb-10 pt-6 bg-white border border-gray-300 relative group hover:bg-[#01014F] hover:text-[#fff] transition">
                <h1 class="text-[#01014F] group-hover:text-[#fff] text-[20px] sm:text-[30px] md:text-[40px] font-[700]">
                    {{ app()->getLocale() === 'en'
                        ? $vision->title_en
                        : (app()->getLocale() === 'km'
                            ? $vision->title_km
                            : $vision->title_ch) }}
                </h1>
                <div class="text-[14px] md:text-[16px]">
                    {!! app()->getLocale() === 'en'
                        ? $vision->content1_en
                        : (app()->getLocale() === 'km'
                            ? $vision->content1_km
                            : $vision->content1_ch) !!}</div>

                <div class="p-0 absolute right-2 top-2">
                    <svg viewBox="0 0 55 55" fill="none"
                        class="text-[#830B00] group-hover:text-[#fff] transition duration-300 w-10 h-10 md:w-16 md:h-16"
                        xmlns="http://www.w3.org/2000/svg">
                        <mask id="mask0_101_7012" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0"
                            width="55" height="55">
                            <path d="M0 0H54.2361V54.2361H0V0Z" fill="white" />
                        </mask>
                        <g mask="url(#mask0_101_7012)">
                            <path
                                d="M37.5602 31.2043L44.3236 24.4408C45.5157 23.2489 46.1852 21.6324 46.1852 19.9468V7.09746C46.1852 5.34231 47.6081 3.91957 49.3631 3.91957C51.1182 3.91957 52.541 5.34231 52.541 7.09746V24.4483C52.541 26.9263 51.6723 29.326 50.0858 31.2297L41.948 40.995V46.2915H27.1179V37.0471C27.1179 34.2379 28.2338 31.5435 30.2202 29.5569L39.4441 20.3326C40.685 19.0916 42.697 19.0915 43.938 20.3323C45.1791 21.5733 45.1792 23.5855 43.9383 24.8264L37.5603 31.2048"
                                stroke="currentColor" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M16.676 31.2043L9.91254 24.4408C8.72051 23.2489 8.05092 21.6324 8.05092 19.9468V7.09746C8.05092 5.34231 6.62807 3.91957 4.87303 3.91957C3.11798 3.91957 1.69513 5.34231 1.69513 7.09746V24.4483C1.69513 26.9263 2.56386 29.326 4.15037 31.2297L12.2881 40.995V46.2915H27.1183V37.0471C27.1183 34.2379 26.0023 31.5435 24.0159 29.5569L14.7921 20.3326C13.5511 19.0916 11.5392 19.0915 10.2981 20.3323C9.05705 21.5733 9.05694 23.5855 10.2979 24.8264L16.6758 31.2048"
                                stroke="currentColor" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M44.0666 52.6472H27.1179V46.2914H44.0666V52.6472Z" stroke="currentColor"
                                stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M27.1183 52.6472H10.1696V46.2914H27.1183V52.6472Z" stroke="currentColor"
                                stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M27.1176 4.7228L25.5239 3.12909C23.4703 1.07543 20.1407 1.07543 18.0869 3.12909C16.0331 5.18286 16.0331 8.51245 18.0869 10.5662L27.1176 19.597L36.1484 10.5662C38.2021 8.51245 38.2021 5.18286 36.1484 3.12909C34.0946 1.07543 30.765 1.07543 28.7113 3.12909L27.1176 4.7228Z"
                                stroke="currentColor" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </g>
                    </svg>

                </div>
            </div>
            <div
                class="w-full h-full px-10 pb-6 md:pb-10 pt-6 bg-white border border-gray-300 relative group hover:bg-[#01014F] hover:text-[#fff] transition">
                <h1 class="text-[#01014F] group-hover:text-[#fff] text-[20px] sm:text-[30px] md:text-[40px] font-[700]">
                    {{ app()->getLocale() === 'en'
                        ? $mission->title_en
                        : (app()->getLocale() === 'km'
                            ? $mission->title_km
                            : $mission->title_ch) }}
                </h1>
                <div class="text-[14px] md:text-[16px]">
                    {!! app()->getLocale() === 'en'
                        ? $mission->content1_en
                        : (app()->getLocale() === 'km'
                            ? $mission->content1_km
                            : $mission->content1_ch) !!}
                </div>
                <div class="absolute right-2 top-2">
                    <svg viewBox="0 0 55 55" fill="none"
                        class="text-[#830B00] group-hover:text-[#fff] transition duration-300 w-10 h-10 md:w-16 md:h-16"
                        xmlns="http://www.w3.org/2000/svg">
                        <mask id="mask0_2061_16" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0"
                            width="55" height="55">
                            <path d="M3.05176e-05 3.05176e-05H55V55H3.05176e-05V3.05176e-05Z" fill="white" />
                        </mask>
                        <g mask="url(#mask0_2061_16)">
                            <path
                                d="M43.1836 31.7966C43.7766 31.7966 44.2578 32.2779 44.2578 32.8709C44.2578 33.4638 43.7766 33.9451 43.1836 33.9451C42.5907 33.9451 42.1094 33.4638 42.1094 32.8709C42.1094 32.2779 42.5907 31.7966 43.1836 31.7966Z"
                                fill="currentColor" />
                            <path
                                d="M11.8164 31.7966C12.4094 31.7966 12.8907 32.2779 12.8907 32.8709C12.8907 33.4638 12.4094 33.9451 11.8164 33.9451C11.2235 33.9451 10.7422 33.4638 10.7422 32.8709C10.7422 32.2779 11.2235 31.7966 11.8164 31.7966Z"
                                fill="currentColor" />
                            <path
                                d="M22.5585 39.3164C22.5585 45.2493 17.7492 50.0586 11.8163 50.0586C5.88337 50.0586 1.0741 45.2493 1.0741 39.3164C1.0741 38.0241 1.30183 36.7866 1.7197 35.6394C1.9947 34.8853 2.35134 34.172 2.77781 33.5081C4.68991 30.54 8.02321 28.5742 11.8163 28.5742C17.7492 28.5742 22.5585 33.3835 22.5585 39.3164Z"
                                stroke="currentColor" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M15.8671 34.3063C17.327 35.489 18.2616 37.2958 18.2616 39.3164C18.2616 42.871 15.3708 45.7617 11.8163 45.7617"
                                stroke="currentColor" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M52.2207 33.5081C52.6472 34.172 53.0038 34.8853 53.2789 35.6394C53.6966 36.7866 53.9244 38.0241 53.9244 39.3164C53.9244 45.2493 49.1152 50.0586 43.1822 50.0586C37.2493 50.0586 32.44 45.2493 32.44 39.3164C32.44 33.3835 37.2493 28.5742 43.1822 28.5742C46.9752 28.5742 50.3085 30.54 52.2207 33.5081Z"
                                stroke="currentColor" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M47.2354 34.3009C47.7639 34.7295 48.229 35.244 48.6104 35.8359C48.8671 36.2356 49.0798 36.6642 49.241 37.1057C49.4988 37.8136 49.6288 38.5548 49.6288 39.3164C49.6288 42.871 46.738 45.7617 43.1834 45.7617"
                                stroke="currentColor" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M32.44 15.6836V17.832V23.2031V30.7227V35.0195V39.3164" stroke="currentColor"
                                stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M52.2207 33.5081L45.0246 17.6451L42.3304 11.7047C41.5602 10.509 40.328 9.63893 38.8853 9.34674C38.5383 9.27584 38.1785 9.23825 37.8111 9.23825C34.8452 9.23825 32.44 11.6434 32.44 14.6093"
                                stroke="currentColor" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M22.5583 14.6093C22.5583 11.6434 20.1531 9.23825 17.1872 9.23825C16.8198 9.23825 16.46 9.27584 16.113 9.34674C14.6703 9.63893 13.4382 10.509 12.668 11.7047L9.97384 17.6451L2.77765 33.5081"
                                stroke="currentColor" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M22.5586 39.3164V35.0195V30.7227V23.2031V17.832V15.6836" stroke="currentColor"
                                stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M22.5586 35.0195H32.4414" stroke="currentColor" stroke-width="3"
                                stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M22.5586 30.7227H32.4414" stroke="currentColor" stroke-width="3"
                                stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M22.5586 17.832H32.4414" stroke="currentColor" stroke-width="3"
                                stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M32.44 15.6833V14.6091V8.16382C32.44 6.38384 33.8827 4.94117 35.6627 4.94117C37.4426 4.94117 38.8853 6.38384 38.8853 8.16382V9.34546"
                                stroke="currentColor" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M16.1133 9.34571V8.16407C16.1133 6.38409 17.556 4.94141 19.336 4.94141C21.1159 4.94141 22.5586 6.38409 22.5586 8.16407V14.6094V15.6836"
                                stroke="currentColor" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M32.44 23.2029C32.44 19.05 35.8066 15.6834 39.9595 15.6834C41.9103 15.6834 43.6881 16.4267 45.0245 17.6449"
                                stroke="currentColor" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M9.97345 17.6451C11.3098 16.427 13.0876 15.6836 15.0384 15.6836C19.1913 15.6836 22.5579 19.0502 22.5579 23.2031"
                                stroke="currentColor" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </g>
                    </svg>


                </div>
            </div>
        </div>

        {{-- core value / md up --}}
        <div class="relative -top-[4rem] z-10 hidden md:block">
            <div class="absolute w-full h-full">
                <img src="{{ asset('assets/images/lamp-1.png') }}" alt=""
                    class="w-[40rem] lg:w-[50rem] mx-auto relative ">
            </div>
            <div class="relative pt-10 text-center">
                <h1
                    class="text-[20px] md:text-[30px] xl:text-[40px] font-bold text-[#830B00] pb-10 md:py-10 text-center px-2">
                    {{ app()->getLocale() === 'en'
                        ? $core->title_en
                        : (app()->getLocale() === 'km'
                            ? $core->title_km
                            : $core->title_ch) }}
                </h1>

                <div class="flex justify-between">
                    <div class="w-[48%] flex items-center justify-end text-end pr-10 leading-none">
                        <div class="text-[20px] xl:text-[30px] max-w-[300px]">
                            {!! app()->getLocale() === 'en'
                                ? $core->content1_en
                                : (app()->getLocale() === 'km'
                                    ? $core->content1_km
                                    : $core->content1_ch) !!}
                        </div>
                        <div class="w-[3px] h-[50px] bg-[#01014F] mx-2"></div>
                        <h1 class="text-[40px] lg:text-[50px] text-[#830B00] leading-none">01</h1>
                    </div>
                    <div class="w-[48%] flex items-center justify-start text-start pl-10 leading-none">
                        <h1 class="text-[40px] lg:text-[50px] text-[#830B00] leading-none">02</h1>
                        <div class="w-[3px] h-[50px] bg-[#01014F] mx-2"></div>
                        <div class="text-[20px] xl:text-[30px] max-w-[300px]">
                            {!! app()->getLocale() === 'en'
                                ? $core->content2_en
                                : (app()->getLocale() === 'km'
                                    ? $core->content2_km
                                    : $core->content2_ch) !!}</div>
                    </div>
                </div>

                <div class="flex justify-between pt-20 xl:pt-32">
                    <div class="w-[48%] flex items-center justify-end text-end pr-40 lg:pr-52 leading-none">
                        <div class="text-[20px] xl:text-[30px] max-w-[300px]">
                            {!! app()->getLocale() === 'en'
                                ? $core->content3_en
                                : (app()->getLocale() === 'km'
                                    ? $core->content3_km
                                    : $core->content3_ch) !!}
                        </div>
                        <div class="w-[3px] h-[50px] bg-[#01014F] mx-2"></div>
                        <h1 class="text-[40px] lg:text-[50px] text-[#830B00] leading-none">03</h1>
                    </div>
                    <div class="w-[48%] flex items-center justify-start text-start pl-40 lg:pl-52 leading-none">
                        <h1 class="text-[40px] lg:text-[50px] text-[#830B00] leading-none">04</h1>
                        <div class="w-[3px] h-[50px] bg-[#01014F] mx-2"></div>
                        <div class="text-[20px] xl:text-[30px] max-w-[300px]">
                            {!! app()->getLocale() === 'en'
                                ? $core->content4_en
                                : (app()->getLocale() === 'km'
                                    ? $core->content4_km
                                    : $core->content4_ch) !!}
                        </div>
                    </div>
                </div>

                <div class="flex justify-between pt-32 lg:pt-56 xl:pt-44">
                    <div class="w-full flex items-center justify-center text-end pr-16 leading-none">
                        <div class="text-[20px] xl:text-[30px] max-w-[300px]">
                            {!! app()->getLocale() === 'en'
                                ? $core->content5_en
                                : (app()->getLocale() === 'km'
                                    ? $core->content5_km
                                    : $core->content5_ch) !!}
                        </div>
                        <div class="w-[3px] h-[50px] bg-[#01014F] mx-2"></div>
                        <h1 class="text-[40px] lg:text-[50px] text-[#830B00] leading-none">05</h1>
                    </div>
                </div>
            </div>
        </div>

        {{-- core value / md down --}}
        <div class="relative z-10 md:hidden mt-10">
            <div class="w-full h-full">
                <img src="{{ asset('assets/images/lamp-1.png') }}" alt=""
                    class="w-[40rem] lg:w-[50rem] mx-auto relative ">
            </div>

            <h1 class="text-[20px] font-bold text-[#830B00] pb-6 text-center px-2">
                Core Values</h1>
            <div class="flex flex-col items-start justify-center gap-4">
                <div class="flex items-center justify-start text-start leading-none">
                    <h1 class="text-[40px] text-[#830B00] leading-none min-w-[50px]">01</h1>
                    <div class="w-[3px] h-[50px] bg-[#01014F] mx-2"></div>
                    <div class="text-[16px]">
                        {!! app()->getLocale() === 'en'
                            ? $core->content1_en
                            : (app()->getLocale() === 'km'
                                ? $core->content1_km
                                : $core->content1_ch) !!}
                    </div>
                </div>
                <div class="flex items-center justify-start text-start leading-none">
                    <h1 class="text-[40px] text-[#830B00] leading-none min-w-[50px]">02</h1>
                    <div class="w-[3px] h-[50px] bg-[#01014F] mx-2"></div>
                    <div class="text-[16px]">
                        {!! app()->getLocale() === 'en'
                            ? $core->content2_en
                            : (app()->getLocale() === 'km'
                                ? $core->content2_km
                                : $core->content2_ch) !!}
                    </div>
                </div>
                <div class="flex items-center justify-start text-start leading-none">
                    <h1 class="text-[40px] text-[#830B00] leading-none min-w-[50px]">03</h1>
                    <div class="w-[3px] h-[50px] bg-[#01014F] mx-2"></div>
                    <div class="text-[16px]">
                        {!! app()->getLocale() === 'en'
                            ? $core->content3_en
                            : (app()->getLocale() === 'km'
                                ? $core->content3_km
                                : $core->content3_ch) !!}
                    </div>
                </div>
                <div class="flex items-center justify-start text-start leading-none">
                    <h1 class="text-[40px] text-[#830B00] leading-none min-w-[50px]">04</h1>
                    <div class="w-[3px] h-[50px] bg-[#01014F] mx-2"></div>
                    <div class="text-[16px]">
                        {!! app()->getLocale() === 'en'
                            ? $core->content4_en
                            : (app()->getLocale() === 'km'
                                ? $core->content4_km
                                : $core->content4_ch) !!}
                    </div>
                </div>
                <div class="flex items-center justify-start text-start leading-none">
                    <h1 class="text-[40px] text-[#830B00] leading-none min-w-[50px]">05</h1>
                    <div class="w-[3px] h-[50px] bg-[#01014F] mx-2"></div>
                    <div class="text-[16px]">
                        {!! app()->getLocale() === 'en'
                            ? $core->content5_en
                            : (app()->getLocale() === 'km'
                                ? $core->content5_km
                                : $core->content5_ch) !!}
                    </div>
                </div>
            </div>

            {{-- <div class="relative pt-10 text-center">
                <h1 class="text-[20px] font-bold text-[#830B00] pb-10 md:py-10 text-center px-2">
                    Core Values</h1>

                <div class="flex justify-between">
                    <div class="w-[48%] flex items-start justify-end text-end pr-10 leading-none">
                        <p class="text-[12px] xl:text-[14px] max-w-[300px]">We prioritize high standards in our products
                            and services to
                            ensure customer satisfaction.</p>
                        <div class="w-[3px] h-[50px] bg-[#01014F] mx-2"></div>
                        <h1 class="text-[40px] text-[#830B00] leading-none">01</h1>
                    </div>
                    <div class="w-[48%] flex items-start justify-start text-start pl-10 leading-none">
                        <h1 class="text-[40px] lg:text-[50px] text-[#830B00] leading-none">02</h1>
                        <div class="w-[3px] h-[50px] bg-[#01014F] mx-2"></div>
                        <p class="text-[12px] xl:text-[14px] max-w-[300px]">We prioritize high standards in our products
                            and services to
                            ensure customer satisfaction.</p>
                    </div>
                </div>

                <div class="flex justify-between pt-20 xl:pt-32">
                    <div class="w-[48%] flex items-start justify-end text-end pr-40 lg:pr-52 leading-none">
                        <p class="text-[12px] xl:text-[14px] max-w-[300px]">We prioritize high standards in our products
                            and services to
                            ensure customer satisfaction.</p>
                        <div class="w-[3px] h-[50px] bg-[#01014F] mx-2"></div>
                        <h1 class="text-[40px] lg:text-[50px] text-[#830B00] leading-none">03</h1>
                    </div>
                    <div class="w-[48%] flex items-start justify-start text-start pl-40 lg:pl-52 leading-none">
                        <h1 class="text-[40px] lg:text-[50px] text-[#830B00] leading-none">04</h1>
                        <div class="w-[3px] h-[50px] bg-[#01014F] mx-2"></div>
                        <p class="text-[12px] xl:text-[14px] max-w-[300px]">We prioritize high standards in our products
                            and services to
                            ensure customer satisfaction.</p>
                    </div>
                </div>

                <div class="flex justify-between pt-24 xl:pt-40">
                    <div class="w-[48%] flex items-start justify-end text-end pr-16 leading-none">
                        <p class="text-[12px] xl:text-[14px] max-w-[300px]">We prioritize high standards in our products
                            and services to
                            ensure customer satisfaction.</p>
                        <div class="w-[3px] h-[50px] bg-[#01014F] mx-2"></div>
                        <h1 class="text-[40px] lg:text-[50px] text-[#830B00] leading-none">05</h1>
                    </div>
                    <div class="w-[48%] flex items-start justify-start text-start pl-16 leading-none">
                        <h1 class="text-[40px] lg:text-[50px] text-[#830B00] leading-none">06</h1>
                        <div class="w-[3px] h-[50px] bg-[#01014F] mx-2"></div>
                        <p class="text-[12px] xl:text-[14px] max-w-[300px]">We prioritize high standards in our products
                            and services to
                            ensure customer satisfaction.</p>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>

    {{-- why choose us --}}
    <section class="relative w-full h-full py-16">
        <div class="absolute inset-0 w-full h-full z-10">
            <img src="{{ asset('assets/images/bg-1.png') }}" alt="" class="w-full h-full object-cover">
        </div>
        <div class="absolute inset-0 w-full h-full bg-[#fff]/80 z-20"></div>
        <div class="relative z-30 max-w-7xl mx-auto px-2 md:px-4">
            <h1 class="text-[20px] md:text-[30px] xl:text-[40px] font-bold text-[#830B00] pb-10 text-center px-2">
                {{ app()->getLocale() === 'en'
                    ? 'Why Choose Us ?'
                    : (app()->getLocale() === 'km'
                        ? 'ហេតុអ្វីបានជាជ្រើសរើសយើងខ្ញុំ​ ?'
                        : 'Why Choose Us ?') }}
            </h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-10 xl:gap-16 px-4 md:px-0">
                @foreach ($whys as $item)
                    <div class="flex flex-col w-full">
                        <div class="flex items-center justify-start">
                            <img src="{{ $item->image }}" alt="" class="h-10 lg:h-16">
                        </div>
                        <h1 class="text-[16px] md:text-[20px] font-[600] py-2 md:h-[80px]    pt-4">
                            {{ app()->getLocale() === 'en'
                                ? $item->title_en
                                : (app()->getLocale() === 'km'
                                    ? $item->title_km
                                    : $item->title_ch) }}
                        </h1>
                        <div class="w-full h-[2px] bg-[#830B00]"></div>
                        <div class="text-[14px] pt-4">
                            {!! app()->getLocale() === 'en'
                                ? $item->content_en
                                : (app()->getLocale() === 'km'
                                    ? $item->content_km
                                    : $item->content_ch) !!}
                        </div>
                    </div>
                @endforeach

                {{-- <div class="flex flex-col w-full sm:w-[46%] lg:w-[30%] xl:w-[28%]">
                    <div class="flex items-center justify-start">
                        <svg class="h-10 lg:h-16" viewBox="0 0 52 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4.64285 53L47.3571 53C48.5881 52.9985 49.7682 52.4995 50.6385 51.6124C51.5089 50.7252 51.9986 49.5224 52 48.2679L52 4.73215C51.9986 3.47756 51.5089 2.27478 50.6385 1.38765C49.7682 0.500515 48.5881 0.00147599 47.3571 3.40881e-06L29.7143 1.86642e-06C28.4834 0.00147423 27.3033 0.500513 26.4329 1.38764C25.5625 2.27477 25.0729 3.47756 25.0714 4.73214L25.0714 8.73598C25.0759 8.95927 25.1576 9.17378 25.302 9.34171C25.4465 9.50963 25.6445 9.62018 25.8611 9.65388C26.0387 9.68562 26.2214 9.6654 26.3881 9.59554C28.858 8.25286 33.2716 9.70036 33.215 12.398C33.2893 15.1234 28.8752 16.536 26.3881 15.2009C26.1839 15.1105 25.9547 15.0976 25.7419 15.1644C25.5292 15.2313 25.347 15.3736 25.2282 15.5655C25.1338 15.7134 25.0797 15.8843 25.0714 16.0606L25.0714 25.5536L17.9214 25.5536C18.6332 22.0963 16.1994 18.3088 13.0276 18.3889C9.85596 18.3072 7.42368 22.0986 8.13448 25.5536L4.64286 25.5536C3.41194 25.555 2.23185 26.0541 1.36146 26.9412C0.491064 27.8283 0.00144024 29.0311 -1.82895e-06 30.2857L-3.401e-06 48.2679C0.00143844 49.5224 0.491062 50.7252 1.36145 51.6124C2.23185 52.4995 3.41193 52.9985 4.64285 53ZM47.3571 51.1071L26.9286 51.1071L26.9286 43.1976C26.9155 43.0693 26.8917 42.9423 26.8576 42.818C26.7596 42.5922 26.5812 42.4128 26.3583 42.3159C26.1355 42.2191 25.8849 42.2121 25.6572 42.2963C23.4006 43.2982 20.1725 41.6927 20.2613 39.2767C20.1746 36.8616 23.3985 35.2543 25.6573 36.2574C25.8878 36.3342 26.137 36.3305 26.3653 36.2468C26.5314 36.1668 26.6723 36.0409 26.7719 35.8835C26.8714 35.726 26.9257 35.5433 26.9286 35.3559L26.9286 27.4464L33.6472 27.4464C32.6665 31.0369 35.1562 35.3379 38.5358 35.2359C41.9153 35.3402 44.4044 31.0339 43.4241 27.4463L50.1429 27.4464L50.1429 48.2679C50.1421 49.0206 49.8483 49.7423 49.326 50.2746C48.8038 50.8069 48.0957 51.1063 47.3571 51.1071ZM26.9286 17.3753C30.5795 18.442 35.1934 15.9061 35.0721 12.3977C35.1958 8.89001 30.5763 6.35337 26.9285 7.4213L26.9286 4.73215C26.9294 3.97937 27.2231 3.25767 27.7454 2.72537C28.2676 2.19308 28.9757 1.89368 29.7143 1.89286L47.3571 1.89286C48.0957 1.89368 48.8038 2.19308 49.3261 2.72538C49.8483 3.25767 50.1421 3.97937 50.1429 4.73215L50.1429 25.5536L42.1199 25.5536C41.9646 25.5588 41.813 25.6027 41.6784 25.6816C41.5437 25.7604 41.4301 25.8717 41.3475 26.0058C41.2649 26.1398 41.2159 26.2925 41.2047 26.4504C41.1935 26.6083 41.2205 26.7665 41.2834 26.9113C42.586 29.3064 41.1272 33.4453 38.5356 33.343C35.9053 33.4062 34.4973 29.3276 35.7938 26.8889C35.8546 26.7468 35.8798 26.5915 35.8674 26.437C35.8549 26.2826 35.8051 26.1336 35.7224 26.0035C35.6425 25.8675 35.5296 25.7547 35.3947 25.6759C35.2597 25.5971 35.1071 25.555 34.9516 25.5536L26.9286 25.5536L26.9286 17.3753ZM1.85714 30.2857C1.85795 29.5329 2.1517 28.8112 2.67395 28.2789C3.1962 27.7467 3.90428 27.4472 4.64286 27.4464L9.36914 27.4464C9.61436 27.443 9.84858 27.3422 10.022 27.1654C10.1954 26.9887 10.2943 26.7499 10.2977 26.5C10.0585 25.7982 9.91794 25.0654 9.88019 24.3234C9.88012 22.095 11.292 20.2817 13.0277 20.2817C15.611 20.2745 16.8468 23.9202 15.7856 26.3601C15.7457 26.5773 15.7855 26.8018 15.8975 26.991C16.0094 27.1801 16.1857 27.3207 16.3928 27.386C16.4897 27.4233 16.5921 27.4437 16.6956 27.4464L25.0714 27.4464L25.0714 34.1618C21.7474 33.5327 18.3464 36.07 18.4042 39.2768C18.3448 42.4839 21.7496 45.0203 25.0714 44.3917L25.0714 51.1071L4.64285 51.1071C3.90428 51.1063 3.19619 50.8069 2.67395 50.2746C2.1517 49.7423 1.85794 49.0206 1.85714 48.2679L1.85714 30.2857Z"
                                fill="#01014F" />
                        </svg>
                    </div>
                    <h1 class="text-[16px] lg:text-[20px] font-[600] py-2">Comprehensive Solutions</h1>
                    <div class="w-full h-[2px] bg-[#830B00]"></div>
                    <p class="text-[14px] pt-4">We offer a full range of accounting, tax, and business advisory services to
                        meet all your needs under one roof.</p>
                </div>
                <div class="flex flex-col w-full sm:w-[46%] lg:w-[30%] xl:w-[28%]">
                    <div class="flex items-center justify-start">
                        <svg class="h-10 lg:h-16" viewBox="0 0 69 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.8444 36.8705C9.78002 36.8705 9.71427 36.8664 9.64715 36.8568C6.51717 36.4048 3.51458 35.4227 0.725683 33.9364C0.0585931 33.5803 -0.194818 32.7502 0.161328 32.0817C0.518844 31.416 1.34483 31.1626 2.01603 31.5174C4.52275 32.8557 7.22262 33.7378 10.0375 34.1433C10.7868 34.2515 11.306 34.946 11.1991 35.6953C11.1005 36.3788 10.5142 36.8705 9.8444 36.8705Z"
                                fill="#01014F" />
                            <path
                                d="M58.647 36.8706C57.9772 36.8706 57.3909 36.3789 57.2923 35.6967C57.1855 34.9474 57.7046 34.253 58.4539 34.1447C61.2702 33.7393 63.9687 32.8571 66.4754 31.5189C67.148 31.1641 67.9726 31.4175 68.3301 32.0832C68.6863 32.7503 68.4329 33.5818 67.7658 33.9379C64.9769 35.4241 61.9743 36.4063 58.8443 36.8583C58.7772 36.8665 58.7114 36.8706 58.647 36.8706Z"
                                fill="#01014F" />
                            <path
                                d="M44.3194 24.5739C44.0619 24.5739 43.803 24.5013 43.5729 24.352C42.9387 23.9383 42.7592 23.0904 43.1729 22.4562C45.1139 19.4797 48.3932 17.7017 51.9464 17.7017C52.7039 17.7017 53.3162 18.314 53.3162 19.0715C53.3162 19.829 52.7039 20.4412 51.9464 20.4412C49.3219 20.4412 46.9001 21.7535 45.4687 23.952C45.2071 24.3547 44.7687 24.5739 44.3194 24.5739Z"
                                fill="#01014F" />
                            <path
                                d="M54.9831 20.4412C50.1272 20.4412 46.026 16.3401 46.026 11.4855C46.026 6.63095 50.1272 2.52979 54.9831 2.52979C59.8376 2.52979 63.9388 6.63095 63.9388 11.4855C63.9388 16.3401 59.8376 20.4412 54.9831 20.4412ZM54.9831 5.26937C51.6134 5.26937 48.7656 8.11581 48.7656 11.4855C48.7656 14.8552 51.6134 17.7016 54.9831 17.7016C58.3528 17.7016 61.1992 14.8552 61.1992 11.4855C61.1992 8.11581 58.3528 5.26937 54.9831 5.26937Z"
                                fill="#01014F" />
                            <path
                                d="M67.1212 29.5464C66.3637 29.5464 65.7514 28.9341 65.7514 28.1766C65.7514 23.9124 62.2817 20.4427 58.0175 20.4427C57.26 20.4427 56.6477 19.8304 56.6477 19.0729C56.6477 18.3154 57.26 17.7031 58.0175 17.7031C63.7926 17.7031 68.4909 22.4029 68.4909 28.1766C68.4909 28.9327 67.8786 29.5464 67.1212 29.5464Z"
                                fill="#01014F" />
                            <path
                                d="M58.0172 20.4412H51.9477C51.1902 20.4412 50.5779 19.829 50.5779 19.0715C50.5779 18.314 51.1902 17.7017 51.9477 17.7017H58.0172C58.7747 17.7017 59.387 18.314 59.387 19.0715C59.387 19.829 58.7734 20.4412 58.0172 20.4412Z"
                                fill="#01014F" />
                            <path
                                d="M67.1209 34.0981C66.3634 34.0981 65.7511 33.4858 65.7511 32.7283V28.1764C65.7511 27.4189 66.3634 26.8066 67.1209 26.8066C67.8784 26.8066 68.4907 27.4189 68.4907 28.1764V32.7283C68.4907 33.4858 67.8784 34.0981 67.1209 34.0981Z"
                                fill="#01014F" />
                            <path
                                d="M18.0616 35.1093C17.3041 35.1093 16.6918 34.497 16.6918 33.7395C16.6918 26.2905 22.7517 20.2319 30.1993 20.2319C30.9568 20.2319 31.5691 20.8442 31.5691 21.6017C31.5691 22.3592 30.9568 22.9715 30.1993 22.9715C24.2613 22.9715 19.4314 27.8014 19.4314 33.7395C19.4314 34.497 18.8177 35.1093 18.0616 35.1093Z"
                                fill="#01014F" />
                            <path
                                d="M38.2924 22.9715H30.1996C29.4421 22.9715 28.8298 22.3592 28.8298 21.6017C28.8298 20.8442 29.4421 20.2319 30.1996 20.2319H38.2924C39.0499 20.2319 39.6622 20.8442 39.6622 21.6017C39.6622 22.3592 39.0499 22.9715 38.2924 22.9715Z"
                                fill="#01014F" />
                            <path
                                d="M24.1725 24.5739C23.7245 24.5739 23.2862 24.3547 23.0232 23.952C21.5904 21.7549 19.17 20.4412 16.5455 20.4412C15.788 20.4412 15.1757 19.829 15.1757 19.0715C15.1757 18.314 15.788 17.7017 16.5455 17.7017C20.1001 17.7017 23.378 19.4797 25.319 22.4562C25.7327 23.0904 25.5532 23.9383 24.919 24.352C24.6875 24.5013 24.4286 24.5739 24.1725 24.5739Z"
                                fill="#01014F" />
                            <path
                                d="M18.0616 41.1788C17.3041 41.1788 16.6918 40.5665 16.6918 39.809V33.7394C16.6918 32.9819 17.3041 32.3696 18.0616 32.3696C18.8191 32.3696 19.4314 32.9819 19.4314 33.7394V39.809C19.4314 40.5665 18.8177 41.1788 18.0616 41.1788Z"
                                fill="#01014F" />
                            <path
                                d="M34.2457 22.9714C28.02 22.9714 22.76 17.7114 22.76 11.4857C22.76 5.26001 28.02 0 34.2457 0C40.4715 0 45.7315 5.26001 45.7315 11.4857C45.7315 17.7114 40.4715 22.9714 34.2457 22.9714ZM34.2457 2.73959C29.5049 2.73959 25.4996 6.74487 25.4996 11.4857C25.4996 16.2266 29.5049 20.2319 34.2457 20.2319C38.9866 20.2319 42.9919 16.2266 42.9919 11.4857C42.9919 6.74487 38.9866 2.73959 34.2457 2.73959Z"
                                fill="#01014F" />
                            <path
                                d="M50.4299 35.1093C49.6724 35.1093 49.0601 34.497 49.0601 33.7395C49.0601 27.8014 44.2302 22.9715 38.2922 22.9715C37.5347 22.9715 36.9224 22.3592 36.9224 21.6017C36.9224 20.8442 37.5347 20.2319 38.2922 20.2319C45.7411 20.2319 51.7997 26.2919 51.7997 33.7395C51.7997 34.497 51.1874 35.1093 50.4299 35.1093Z"
                                fill="#01014F" />
                            <path
                                d="M50.4298 41.1788C49.6723 41.1788 49.06 40.5665 49.06 39.809V33.7394C49.06 32.9819 49.6723 32.3696 50.4298 32.3696C51.1873 32.3696 51.7996 32.9819 51.7996 33.7394V39.809C51.7996 40.5665 51.1873 41.1788 50.4298 41.1788Z"
                                fill="#01014F" />
                            <path
                                d="M34.2456 45.2333C28.4651 45.2333 22.6859 43.8279 17.4163 41.0185C16.7492 40.661 16.4958 39.8322 16.8519 39.1638C17.2095 38.4981 18.0341 38.2446 18.7066 38.5994C28.4377 43.7896 40.0563 43.7896 49.7859 38.5994C50.4571 38.2446 51.2845 38.4981 51.6406 39.1638C51.9968 39.8309 51.7433 40.661 51.0762 41.0185C45.8053 43.8266 40.0261 45.2333 34.2456 45.2333Z"
                                fill="#01014F" />
                            <path
                                d="M13.5086 20.4412C8.65408 20.4412 4.55292 16.3401 4.55292 11.4855C4.55292 6.63095 8.65408 2.52979 13.5086 2.52979C18.3632 2.52979 22.4643 6.63095 22.4643 11.4855C22.4643 16.3401 18.3632 20.4412 13.5086 20.4412ZM13.5086 5.26937C10.1389 5.26937 7.29251 8.11581 7.29251 11.4855C7.29251 14.8552 10.1389 17.7016 13.5086 17.7016C16.8783 17.7016 19.7248 14.8552 19.7248 11.4855C19.7248 8.11581 16.8783 5.26937 13.5086 5.26937Z"
                                fill="#01014F" />
                            <path
                                d="M1.37083 29.5464C0.613336 29.5464 0.0010376 28.9341 0.0010376 28.1766C0.0010376 22.4015 4.7008 17.7031 10.4745 17.7031C11.232 17.7031 11.8443 18.3154 11.8443 19.0729C11.8443 19.8304 11.232 20.4427 10.4745 20.4427C6.21032 20.4413 2.74063 23.911 2.74063 28.1766C2.74063 28.9327 2.12833 29.5464 1.37083 29.5464Z"
                                fill="#01014F" />
                            <path
                                d="M16.5442 20.4412H10.4746C9.7171 20.4412 9.1048 19.829 9.1048 19.0715C9.1048 18.314 9.7171 17.7017 10.4746 17.7017H16.5442C17.3016 17.7017 17.9139 18.314 17.9139 19.0715C17.9139 19.829 17.3016 20.4412 16.5442 20.4412Z"
                                fill="#01014F" />
                            <path
                                d="M1.37083 34.0981C0.613336 34.0981 0.0010376 33.4858 0.0010376 32.7283V28.1764C0.0010376 27.4189 0.613336 26.8066 1.37083 26.8066C2.12833 26.8066 2.74063 27.4189 2.74063 28.1764V32.7283C2.74063 33.4858 2.12833 34.0981 1.37083 34.0981Z"
                                fill="#01014F" />
                        </svg>
                    </div>

                    <h1 class="text-[16px] lg:text-[20px] font-[600] py-2">Experienced Team</h1>
                    <div class="w-full h-[2px] bg-[#830B00]"></div>
                    <p class="text-[14px] pt-4">Our professionals bring extensive industry knowledge and practical
                        experience, providing you with trusted advice and insights</p>
                </div>
                <div class="flex flex-col w-full sm:w-[46%] lg:w-[30%] xl:w-[28%]">
                    <div class="flex items-center justify-start">
                        <svg class="h-10 lg:h-16" viewBox="0 0 53 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M53 29.9665V23.0336C53 22.6136 52.695 22.2559 52.2803 22.1895L48.0394 21.5107C47.4903 19.1291 46.5564 16.8765 45.2571 14.7997L47.7775 11.3186C48.0239 10.9785 47.9865 10.5098 47.6896 10.2129L42.7872 5.31059C42.4904 5.01375 42.0217 4.97635 41.6814 5.22265L38.2003 7.74304C36.1229 6.44347 33.8705 5.50966 31.4894 4.96064L30.8105 0.719776C30.7442 0.305071 30.3863 0 29.9664 0H23.0334C22.6135 0 22.2557 0.305071 22.1894 0.719669L21.5105 4.96053C19.129 5.50955 16.8764 6.44336 14.7995 7.74282L11.3185 5.22254C10.9785 4.97624 10.5097 5.01364 10.2127 5.31048L5.31026 10.2128C5.01342 10.5097 4.97602 10.9784 5.22242 11.3186L7.74281 14.7996C6.44281 16.8778 5.50901 19.1299 4.96042 21.5106L0.719561 22.1894C0.304964 22.2559 0 22.6136 0 23.0336V29.9665C0 30.3865 0.304964 30.7442 0.719667 30.8106L4.96052 31.4894C5.50954 33.8708 6.44345 36.1234 7.74292 38.2004L5.22253 41.6815C4.97612 42.0216 5.01352 42.4903 5.31036 42.7872L10.2128 47.6895C10.5099 47.9866 10.9786 48.0235 11.3186 47.7775L14.7996 45.2571C16.8777 46.5571 19.1302 47.491 21.5106 48.0395L22.1895 52.2803C22.2558 52.6949 22.6137 53 23.0335 53H29.9665C30.3864 53 30.7442 52.6949 30.8105 52.2803L31.4196 48.4758C33.6461 51.233 37.0523 53 40.8641 53C47.5559 53.0001 53 47.556 53 40.8642C53 37.0524 51.2329 33.6461 48.4757 31.4196L52.2802 30.8106C52.695 30.7443 53 30.3866 53 29.9665ZM41.7699 28.7621C41.4708 28.7398 41.1688 28.7283 40.8641 28.7283C39.0289 28.7283 37.2882 29.1385 35.7272 29.8708V28.5191C35.7272 26.4992 34.1977 24.9614 31.5306 24.2999C30.6012 24.0694 29.6727 23.9042 28.7469 23.7999C30.1627 22.8063 31.1225 20.9058 31.1225 18.728C31.1225 15.7824 29.3513 13.9525 26.5001 13.9525C23.6488 13.9525 21.8776 15.7824 21.8776 18.728C21.8776 20.9011 22.8334 22.798 24.2441 23.7933C23.3101 23.8974 22.382 24.0651 21.4624 24.3016C18.7607 24.9961 17.2728 26.4939 17.2728 28.5191V36.1247C17.2728 36.5968 17.6555 36.9795 18.1276 36.9795H29.3658C28.9525 38.1997 28.7282 39.5062 28.7282 40.8642C28.7282 41.1688 28.7398 41.4709 28.762 41.77C28.0142 41.8798 27.2564 41.9355 26.5 41.9355C17.9889 41.9355 11.0646 35.0112 11.0646 26.4999C11.0646 17.9887 17.9889 11.0645 26.5 11.0645C35.0111 11.0645 41.9354 17.9889 41.9354 26.5001C41.9354 27.2565 41.8797 28.0143 41.7699 28.7621ZM31.0678 29.4126C30.5957 29.4126 30.213 29.7954 30.213 30.2674V35.0522C30.1736 35.1242 30.1351 35.1969 30.0971 35.2698H22.7868V30.2674C22.7868 29.7954 22.404 29.4126 21.932 29.4126C21.4599 29.4126 21.0771 29.7954 21.0771 30.2674V35.2698H18.9823V28.519C18.9823 27.0191 20.5624 26.2981 21.8879 25.9573C24.8933 25.1845 27.9989 25.1851 31.1189 25.9592C32.2015 26.2277 34.0175 26.9172 34.0175 28.519V30.8494C33.2516 31.3747 32.5486 31.9851 31.9227 32.6675V30.2673C31.9227 29.7954 31.5399 29.4126 31.0678 29.4126ZM26.5 22.8248C24.8939 22.8248 23.5871 20.9869 23.5871 18.7278C23.5871 16.0603 25.4121 15.6621 26.5 15.6621C27.5879 15.6621 29.4128 16.0604 29.4128 18.7278C29.4128 20.987 28.106 22.8248 26.5 22.8248ZM51.2903 40.8642C51.2903 46.6133 46.6132 51.2904 40.8641 51.2904C35.1151 51.2904 30.4379 46.6133 30.4379 40.8642C30.4379 35.115 35.1151 30.438 40.8641 30.438C46.6132 30.438 51.2903 35.1151 51.2903 40.8642ZM51.2903 29.2377L47.1923 29.8936C46.9778 29.928 46.7906 30.042 46.6605 30.2045C45.6694 29.6634 44.5947 29.2571 43.4615 29.0091C43.5833 28.1796 43.6451 27.339 43.6451 26.5001C43.6451 17.0462 35.9538 9.35495 26.4999 9.35495C17.046 9.35495 9.35482 17.0463 9.35482 26.5001C9.35482 35.9538 17.0461 43.6453 26.4999 43.6453C27.3389 43.6453 28.1794 43.5835 29.009 43.4617C29.2571 44.5949 29.6633 45.6696 30.2044 46.6608C30.0419 46.7908 29.9279 46.978 29.8935 47.1926L29.2375 51.2904H23.7624L23.1064 47.1925C23.0501 46.8406 22.7812 46.5605 22.4319 46.4899C19.8593 45.9693 17.4408 44.9666 15.2438 43.5098C14.947 43.313 14.559 43.3209 14.2701 43.5299L10.9064 45.9654L7.03489 42.0938L9.47033 38.7299C9.67934 38.4412 9.68735 38.0532 9.49042 37.7562C8.0342 35.5607 7.03148 33.1423 6.51034 30.5681C6.43961 30.2187 6.15954 29.95 5.80767 29.8937L1.70968 29.2377V23.7624L5.80756 23.1064C6.15954 23.0501 6.43961 22.7813 6.51024 22.432C7.03094 19.8592 8.03356 17.4409 9.49031 15.2439C9.68735 14.947 9.67934 14.5589 9.47022 14.2702L7.03479 10.9065L10.9062 7.03491L14.27 9.47035C14.5587 9.67936 14.9469 9.68727 15.2438 9.49033C17.4392 8.03422 19.8577 7.03149 22.4319 6.51025C22.7812 6.43951 23.05 6.15945 23.1064 5.80757L23.7624 1.70968H29.2375L29.8935 5.80757C29.9498 6.15945 30.2187 6.43951 30.568 6.51025C33.1416 7.03138 35.56 8.03411 37.7561 9.49033C38.0529 9.68716 38.4409 9.67936 38.7298 9.47024L42.0935 7.0348L45.9651 10.9064L43.5297 14.2702C43.3207 14.5589 43.3126 14.9469 43.5096 15.2439C44.9657 17.4392 45.9683 19.8576 46.4897 22.432C46.5604 22.7813 46.8405 23.05 47.1923 23.1064L51.2903 23.7624V29.2377ZM44.3055 36.1584L39.1977 41.3406L37.4228 39.5658C36.9478 39.0908 36.3163 38.8291 35.6445 38.8291C34.9727 38.8291 34.3412 39.0907 33.8663 39.5656C33.3912 40.0406 33.1295 40.6722 33.1295 41.3439C33.1295 42.0157 33.3911 42.6472 33.8661 43.1222L37.4263 46.6824C37.9167 47.1727 38.5606 47.4178 39.2046 47.4177C39.8486 47.4177 40.4927 47.1726 40.983 46.6823C42.7987 44.8665 46.5055 41.0721 47.8682 39.6958C48.341 39.2203 48.6004 38.5893 48.5985 37.9188C48.5966 37.2483 48.3338 36.6186 47.8584 36.1459C46.877 35.1698 45.2843 35.1742 44.3055 36.1584ZM46.6545 38.4918C45.2864 39.8735 41.5827 43.6649 39.7739 45.4736C39.46 45.7875 38.9491 45.7875 38.6353 45.4736L35.0752 41.9134H35.0751C34.923 41.7613 34.8393 41.5591 34.8393 41.344C34.8393 41.129 34.923 40.9268 35.0752 40.7747C35.2273 40.6227 35.4293 40.5389 35.6445 40.5389C35.8596 40.5389 36.0617 40.6227 36.2139 40.7747L38.5977 43.1584C38.758 43.3187 38.9754 43.4088 39.202 43.4088H39.2051C39.433 43.4079 39.6509 43.3163 39.8108 43.1541L45.5204 37.3614C45.8316 37.0484 46.3396 37.0471 46.6528 37.3583C46.8045 37.5091 46.8882 37.7099 46.8889 37.9237C46.8893 38.1374 46.8067 38.3387 46.6545 38.4918Z"
                                fill="#01014F" />
                        </svg>

                    </div>
                    <h1 class="text-[16px] lg:text-[20px] font-[600] py-2">Personalized Approach</h1>
                    <div class="w-full h-[2px] bg-[#830B00]"></div>
                    <p class="text-[14px] pt-4">We listen closely to your needs, tailoring our solutions to ensure they
                        align with your specific business goals.</p>
                </div>
                <div class="flex flex-col w-full sm:w-[46%] lg:w-[30%] xl:w-[28%]">
                    <div class="flex items-center justify-start">
                        <svg class="h-10 lg:h-16" viewBox="0 0 63 58" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M56.2533 33.346C55.9599 33.346 55.7643 33.2482 55.5688 33.0526C55.1776 32.6615 55.1776 32.0747 55.5688 31.6836C62.1206 25.0339 62.1206 14.3749 55.5688 7.72525C52.3417 4.49821 48.1368 2.73801 43.6385 2.73801C39.1402 2.73801 34.8375 4.49821 31.7082 7.72525L21.7337 17.6019C22.8094 18.3843 24.0807 18.8732 25.3519 18.8732C26.9166 18.971 28.3834 18.3843 29.4591 17.3086L29.8502 16.9174C31.5127 14.8639 34.0552 14.1793 36.4021 14.9616C37.2822 15.255 38.1623 15.4506 39.0424 15.4506C41.7805 15.4506 44.323 13.9838 45.8876 11.539C46.181 11.0501 46.7677 10.9523 47.2567 11.2457C47.7456 11.539 47.8434 12.1258 47.5501 12.6147C45.6921 15.6462 42.465 17.4064 39.0424 17.4064C37.8689 17.4064 36.7933 17.2108 35.7176 16.8196C34.153 16.2329 32.4905 16.8196 31.3171 18.1887C31.1215 18.3843 31.0237 18.5798 30.8281 18.7754C29.3613 20.2423 27.4055 21.0246 25.2541 20.9268C23.1028 20.829 21.147 19.9489 19.5824 18.3843L18.8979 17.6997L30.2414 6.3562C33.7618 2.8358 38.5535 0.782227 43.6385 0.782227C48.7235 0.782227 53.4174 2.73801 57.0356 6.3562C64.3698 13.6904 64.3698 25.7184 57.0356 33.0526C56.7422 33.2482 56.5467 33.346 56.2533 33.346Z"
                                fill="#01014F" />
                            <path
                                d="M28.7745 57.5C27.4055 57.5 26.232 57.0111 25.2541 56.0332C23.2983 54.0774 23.2983 50.9482 25.2541 48.9924L28.9701 45.2764C29.948 44.2985 31.1215 43.8096 32.4905 43.8096C33.8596 43.8096 35.033 44.2985 36.0109 45.2764C37.9667 47.2322 37.9667 50.3614 36.0109 52.3172L32.2949 56.0332C31.3171 56.9133 30.0458 57.5 28.7745 57.5ZM32.3927 45.7654C31.6104 45.7654 30.8281 46.0587 30.2414 46.6455L26.5254 50.3614C25.3519 51.5349 25.3519 53.4907 26.5254 54.6642C27.6989 55.8376 29.6546 55.8376 30.8281 54.6642L34.5441 50.9482C35.7176 49.7747 35.7176 47.8189 34.5441 46.6455C33.9574 46.0587 33.2728 45.7654 32.3927 45.7654Z"
                                fill="#01014F" />
                            <path
                                d="M22.4183 52.5123C21.0492 52.5123 19.778 52.0234 18.8979 51.0455C16.9421 49.0897 16.9421 45.9605 18.8979 44.0047L24.4718 38.4307C25.4497 37.4528 26.721 36.9639 27.9923 36.9639C29.2635 36.9639 30.6326 37.4528 31.5127 38.4307C33.4684 40.3865 33.4684 43.5157 31.5127 45.4715L25.9387 51.0455C24.9608 51.9256 23.6895 52.5123 22.4183 52.5123ZM27.9923 38.8219C27.2099 38.8219 26.4276 39.1152 25.8409 39.702L20.2669 45.2759C19.0934 46.4494 19.0934 48.4052 20.2669 49.5787C21.4404 50.7521 23.3962 50.7521 24.5696 49.5787L30.1436 44.0047C31.3171 42.8312 31.3171 40.8754 30.1436 39.702C29.5569 39.213 28.7746 38.8219 27.9923 38.8219Z"
                                fill="#01014F" />
                            <path
                                d="M15.9642 47.525C14.5952 47.525 13.4217 47.036 12.4438 46.0581L12.346 45.9603C10.3902 44.0046 10.3902 40.8753 12.346 39.0173L20.7559 30.6075C21.7338 29.6296 22.9072 29.1406 24.2763 29.1406C25.6453 29.1406 26.8188 29.6296 27.7967 30.6075L27.8945 30.7052C29.8503 32.661 29.8503 35.7903 27.8945 37.6483L19.4846 46.0581C18.5067 47.036 17.3333 47.525 15.9642 47.525ZM24.3741 30.9986C23.5918 30.9986 22.8095 31.292 22.2227 31.8787L13.8129 40.2886C12.6394 41.462 12.6394 43.32 13.8129 44.4935L13.9106 44.5913C15.0841 45.7648 17.0399 45.7648 18.1156 44.5913L26.5254 36.1814C27.6989 35.008 27.6989 33.15 26.5254 31.9765L26.4276 31.8787C25.9387 31.3898 25.1564 30.9986 24.3741 30.9986Z"
                                fill="#01014F" />
                            <path
                                d="M10.9769 41.0712C9.60785 41.0712 8.33659 40.5823 7.45649 39.6044C5.50071 37.6486 5.50071 34.5194 7.45649 32.5636L12.5415 27.4786C13.5194 26.5007 14.7907 26.0117 16.0619 26.0117C17.431 26.0117 18.7022 26.5007 19.5823 27.4786C21.5381 29.4343 21.5381 32.5636 19.5823 34.5194L14.4973 39.6044C13.6172 40.5823 12.3459 41.0712 10.9769 41.0712ZM16.0619 27.9675C15.2796 27.9675 14.4973 28.2609 13.9106 28.8476L8.82554 33.9326C7.65207 35.1061 7.65207 37.0619 8.82554 38.2354C9.99901 39.4088 11.9548 39.4088 13.1283 38.2354L18.2133 33.1503C19.3868 31.9769 19.3868 30.0211 18.2133 28.8476C17.6266 28.2609 16.8442 27.9675 16.0619 27.9675Z"
                                fill="#01014F" />
                            <path
                                d="M7.74979 34.1284C7.45642 34.1284 7.26084 34.0306 7.06526 33.835L5.50064 32.2704C-1.83355 24.9362 -1.83355 12.9082 5.50064 5.57398C9.02104 2.05357 13.8127 0 18.8977 0C23.9828 0 28.6766 1.95578 32.2948 5.57398C32.686 5.96513 32.686 6.55187 32.2948 6.94303C31.9037 7.33418 31.317 7.33418 30.9258 6.94303C27.6988 3.71599 23.4938 1.95578 18.9955 1.95578C14.4972 1.95578 10.1945 3.71599 7.06526 6.94303C0.513393 13.5927 0.513393 24.2517 7.06526 30.9014L8.62989 32.466C9.02104 32.8571 9.02104 33.4439 8.62989 33.835C8.23873 34.0306 8.04315 34.1284 7.74979 34.1284Z"
                                fill="#01014F" />
                            <path
                                d="M41.9759 51.9261C40.6068 51.9261 39.4334 51.4371 38.4555 50.4593L34.8373 46.8411C34.4461 46.4499 34.4461 45.8632 34.8373 45.472C35.2284 45.0809 35.8152 45.0809 36.2063 45.472L39.8245 49.0902C40.998 50.2637 42.9538 50.2637 44.1272 49.0902C45.3007 47.9167 45.3007 45.961 44.1272 44.7875L39.0422 39.7025C38.6511 39.3113 38.6511 38.7246 39.0422 38.3334C39.4334 37.9422 40.0201 37.9422 40.4113 38.3334L45.4963 43.4184C47.4521 45.3742 47.4521 48.5035 45.4963 50.4593C44.5184 51.3394 43.2471 51.9261 41.9759 51.9261Z"
                                fill="#01014F" />
                            <path
                                d="M34.8373 56.2281C33.7616 56.2281 32.7837 55.9348 31.9036 55.2502C31.5124 54.9569 31.4147 54.2723 31.708 53.8812C32.0014 53.49 32.6859 53.3922 33.0771 53.6856C34.2505 54.5657 36.0107 54.4679 36.9886 53.3922C38.1621 52.2188 38.1621 50.263 36.9886 49.0895L36.1085 48.1116C35.7174 47.7205 35.7174 47.1337 36.1085 46.7426C36.4997 46.3514 37.0864 46.3514 37.4776 46.7426L38.3577 47.6227C40.3135 49.5785 40.3135 52.7077 38.3577 54.6635C37.4776 55.7392 36.1085 56.2281 34.8373 56.2281Z"
                                fill="#01014F" />
                            <path
                                d="M49.0167 47.6233C47.7454 47.6233 46.4742 47.1344 45.4963 46.1565L36.4019 37.0621C36.0107 36.671 36.0107 36.0842 36.4019 35.6931C36.793 35.3019 37.3798 35.3019 37.7709 35.6931L46.8653 44.7875C48.0388 45.9609 49.9946 45.9609 51.168 44.7875C52.3415 43.614 52.3415 41.6582 51.168 40.4847L42.856 32.1727C42.4648 31.7815 42.4648 31.1948 42.856 30.8036C43.2471 30.4125 43.8339 30.4125 44.225 30.8036L52.5371 39.1157C54.4929 41.0715 54.4929 44.2007 52.5371 46.1565C51.5592 47.1344 50.2879 47.6233 49.0167 47.6233Z"
                                fill="#01014F" />
                            <path
                                d="M53.3194 40.5824C52.0482 40.5824 50.7769 40.0934 49.799 39.1155L40.7047 30.0211C40.3135 29.63 40.3135 29.0432 40.7047 28.6521C41.0958 28.2609 41.6825 28.2609 42.0737 28.6521L51.1681 37.7465C52.3416 38.9199 54.2973 38.9199 55.373 37.7465L55.4708 37.6487C56.6443 36.4752 56.6443 34.6172 55.4708 33.4437L41.487 19.3621C41.0958 18.971 41.0958 18.3842 41.487 17.9931C41.8781 17.6019 42.4649 17.6019 42.856 17.9931L56.8398 32.0747C58.7956 34.0305 58.7956 37.1597 56.8398 39.0177L56.7421 39.1155C55.862 39.9956 54.6885 40.5824 53.3194 40.5824Z"
                                fill="#01014F" />
                        </svg>
                    </div>

                    <h1 class="text-[16px] lg:text-[20px] font-[600] py-2">Commitment to Excellence</h1>
                    <div class="w-full h-[2px] bg-[#830B00]"></div>
                    <p class="text-[14px] pt-4">We’re dedicated to delivering high-quality service, prioritizing accuracy,
                        compliance, and efficiency in everything we do</p>
                </div>
                <div class="flex flex-col w-full sm:w-[46%] lg:w-[30%] xl:w-[28%]">
                    <div class="flex items-center justify-start">
                        <svg class="h-10 lg:h-16" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <mask id="mask0_101_7032" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0"
                                width="63" height="63">
                                <path d="M61.3663 61.3667V1.50049H1.50006V61.3667H61.3663Z" fill="white" stroke="white"
                                    stroke-width="3" />
                            </mask>
                            <g mask="url(#mask0_101_7032)">
                                <path
                                    d="M6.1393 35.2396C6.81708 35.2396 7.36717 35.7897 7.36717 36.4674C7.36717 37.1452 6.81708 37.6953 6.1393 37.6953C5.46152 37.6953 4.91144 37.1452 4.91144 36.4674C4.91144 35.7897 5.46152 35.2396 6.1393 35.2396Z"
                                    fill="#01014F" />
                                <path
                                    d="M11.0508 51.2094C11.0471 52.5626 9.94936 53.6577 8.59503 53.6577H1.22784V31.5562H8.59503C9.95182 31.5562 11.0508 32.6552 11.0508 34.0119V51.2094Z"
                                    stroke="#01014F" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M41.7546 45.8425L56.8426 40.6561C58.4523 40.0752 60.3592 40.6241 61.172 42.1282C62.2759 44.1703 61.3095 46.4222 59.4346 47.1723L36.4919 57.2741C34.6158 58.1274 32.5787 58.5693 30.5184 58.5693C27.903 58.5693 25.3368 57.8584 23.0947 56.5127L16.673 52.6597C15.191 51.7707 12.7733 51.2723 11.0506 51.2095"
                                    stroke="#01014F" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M11.0508 34.0119H20.7718C22.0377 34.0119 23.2815 34.3373 24.3842 34.9586L30.8722 38.6078C31.2406 38.8153 31.6543 38.9233 32.0767 38.9233H40.0284C42.0629 38.9233 43.712 40.5724 43.712 42.6069C43.712 43.9821 42.9593 45.1805 41.8419 45.8129C41.3066 46.1174 40.6877 46.2905 40.0284 46.2905H27.5459"
                                    stroke="#01014F" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M20.8677 10.1929C21.8621 6.79897 24.6901 4.28565 28.4496 4.28565C34.5054 4.28565 36.4185 11.1924 36.4185 11.1924C36.4185 11.1924 38.3315 4.28565 44.3885 4.28565C49.106 4.28565 52.3574 8.24551 52.3574 12.9358C52.3574 19.1428 46.5054 23.2978 36.5658 31.9126C30.5781 26.7229 25.7213 23.0967 22.9652 19.4864"
                                    stroke="#01014F" stroke-width="3" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M20.7509 13.8748C21.4287 13.8748 21.9787 14.4249 21.9787 15.1027C21.9787 15.7805 21.4287 16.3306 20.7509 16.3306C20.0731 16.3306 19.523 15.7805 19.523 15.1027C19.523 14.4249 20.0731 13.8748 20.7509 13.8748Z"
                                    fill="#01014F" />
                            </g>
                        </svg>

                    </div>

                    <h1 class="text-[16px] lg:text-[20px] font-[600] py-2">Client Partnership</h1>
                    <div class="w-full h-[2px] bg-[#830B00]"></div>
                    <p class="text-[14px] pt-4">We see ourselves as an extension of your team, committed to building
                        long-term relationships and supporting your continued success.</p>
                </div> --}}
            </div>
        </div>
    </section>

    {{-- our product --}}
    <section class="relative w-full h-full py-16">
        <h1 class="text-[20px] md:text-[30px] xl:text-[40px] font-bold text-[#830B00] text-center px-2 pb-6 md:pb-10">
            {{ app()->getLocale() === 'en' ? 'New Product' : (app()->getLocale() === 'km' ? 'ផលិតផល​ ថ្មី' : 'New Product') }}
        </h1>

        <div class="max-w-7xl mx-auto pt-5 products_swiper px-2 ">
            <div class="swiper productSwiper">
                <div class="swiper-wrapper">
                    @forelse ($product as $item)
                        @php
                            $colors = is_array($item->color) ? $item->color : json_decode($item->color ?? '[]', true);
                        @endphp
                        <div class="swiper-slide">
                            <div
                                class="text-[#580B0C] text-[16px] md:text-[20px] text-center flex flex-col items-center justify-center h-full">
                                @php
                                    $colors = $item->color ?? [];
                                    $firstColor = $colors[0] ?? null;
                                    $firstCode = $firstColor['code'] ?? null;
                                    $firstName = $firstColor['name'] ?? null;
                                    $firstImage = $firstColor['images'][0] ?? null;
                                @endphp
                                <div class="relative group w-full rounded-xl overflow-hidden">
                                    <!-- Image -->
                                    @if ($firstImage)
                                        <div class="w-full h-52 lg:h-64">
                                            <img src="{{ asset($firstImage) }}"
                                                class="w-full h-[300px] object-cover object-center rounded-xl transition-transform duration-300 group-hover:scale-105" />
                                        </div>
                                    @else
                                        <div class="w-full h-52 lg:h-64">
                                            <img src="{{ asset('assets/images/default.jpg') }}"
                                                class="w-full h-[300px] object-cover object-center rounded-xl transition-transform duration-300 group-hover:scale-105" />
                                        </div>
                                    @endif
                                    {{-- @if ($item->status)
                                        <span class="absolute top-2 right-2 bg-green-600 text-white text-[10px] px-2 py-1 rounded">
                                            New
                                        </span>
                                    @endif --}}

                                    <!-- Hover button -->
                                    <a href="{{ route('product.show', $item->id) }}"
                                        class="absolute inset-0 flex items-center justify-center bg-white bg-opacity-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-xl">
                                        <button class="p-10 bg-black/80 text-white">
                                            More Detail
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="col-span-2 text-center text-gray-500 py-10">
                            No items available in this category.
                        </p>
                    @endforelse
                </div>
                <div class="swiper-button-next">
                    <svg width="51" height="58" viewBox="0 0 51 58" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M48 23.3292C52 25.6386 52 31.4121 48 33.7215L9 56.2382C5 58.5476 -2.84716e-06 55.6608 -2.64527e-06 51.0421L-6.76799e-07 6.00873C-4.74904e-07 1.38993 5 -1.49683 9 0.812575L48 23.3292Z"
                            fill="#D9D9D9" />
                    </svg>

                </div>
                <div class="swiper-button-prev">
                    <svg width="51" height="58" viewBox="0 0 51 58" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3.00001 33.7215C-0.999993 31.4121 -1 25.6386 3 23.3292L42 0.812584C46 -1.49682 51 1.38993 51 6.00873L51 51.042C51 55.6608 46 58.5476 42 56.2382L3.00001 33.7215Z"
                            fill="#D9D9D9" />
                    </svg>

                </div>
            </div>
        </div>
    </section>

    {{-- our project --}}
    <section class="relative w-full h-full pt-10 pb-16">
        <h1 class="text-[20px] md:text-[30px] xl:text-[40px] font-bold text-[#830B00] text-center px-2 pb-6 md:pb-10">
            {{ app()->getLocale() === 'en' ? 'Our Projects' : (app()->getLocale() === 'km' ? 'គម្រោងរបស់យើងខ្ញុំ' : 'Our Projects') }}
        </h1>

        <div class="max-w-7xl mx-auto pt-5 grid grid-cols-2 lg:grid-cols-4 gap-2 md:gap-4 px-2 md:px-4">
            @foreach ($project as $index => $item)
                @php
                    $images = json_decode($item->image, true);
                @endphp
                <div class="relative group w-full h-[200px] sm:h-[250px] md:h-[300px] rounded-xl overflow-hidden">
                    <!-- Image -->
                    <img src="{{ asset($images[0]) }}"
                        class="w-full h-full object-cover object-center rounded-xl transition-transform duration-300 group-hover:scale-105"
                        alt="">

                    <!-- Hover button -->
                    <a href="{{ route('project.show', $item->slug) }}"
                        class="absolute inset-0 flex items-center justify-center bg-white bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-xl">
                        <button class="p-4 sm:p-10 bg-black/70 text-white text-[14px] md:text-[16px]">
                            More Detail
                        </button>
                    </a>
                </div>
            @endforeach

        </div>


    </section>

    {{-- banner --}}
    <section class="relative w-full h-full py-12 md:py-16">
        <div class="absolute inset-0 w-full h-full z-10">
            <img src="{{ asset('assets/images/bg-2.png') }}" alt="" class="w-full h-full object-cover">
        </div>
        <div class="absolute inset-0 w-full h-full bg-[#000]/50 z-20"></div>
        <div class="relative z-30 max-w-7xl mx-auto px-2 md:px-4 text-[#fff] text-center">
            <img src="{{ asset('assets/images/logo.png') }}" alt=""
                class="w-24 md:w-32 mx-auto mb-6 object-cover object-center">
            <div class="flex items-center justify-center  gap-4 ">
                <div class="w-24 md:w-32 h-[1px] bg-white"></div>
                <div class="text-[30px] md:text-[50px] font-[300]">
                    V-Arch
                </div>
                <div class="w-24 md:w-32 h-[1px] bg-white"></div>
            </div>
            <h1 class="text-[16px] md:text-[20px] font-[300] uppercase">
                {{ app()->getLocale() === 'en'
                    ? 'LIGHTING UP YOUR HOME'
                    : (app()->getLocale() === 'km'
                        ? 'LIGHTING UP YOUR HOME'
                        : 'LIGHTING UP YOUR HOME') }}
            </h1>
            <p class="text-[20px] md:text-[40px] font-[300] uppercase">
                {{ app()->getLocale() === 'en'
                    ? 'WITH CHARMING LIGHTING'
                    : (app()->getLocale() === 'km'
                        ? 'WITH CHARMING LIGHTING'
                        : 'WITH CHARMING LIGHTING') }}
            </p>
        </div>
        </div>
    </section>

    {{-- contact form --}}
    <section class="w-full py-10">
        <div x-data="contactForm()" class="w-full max-w-3xl mx-auto px-2">

            <form @submit.prevent="submitForm" class="space-y-4">
                @csrf
                <h2 class="text-center text-2xl font-bold text-red-800 mb-6">
                    {{ app()->getLocale() === 'en'
                        ? 'Contact Form'
                        : (app()->getLocale() === 'km'
                            ? 'Contact Form'
                            : 'Contact Form') }}
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="text" x-model="form.name" placeholder="Full Name"
                        class="w-full px-4 py-2 placeholder:text-gray-400 font-[300] border border-gray-200 rounded-md"
                        required>

                    <textarea x-model="form.message" rows="4" placeholder="Message"
                        class="w-full px-4 py-2 placeholder:text-gray-400 font-[300] border border-gray-200 rounded-md md:row-span-2"
                        required></textarea>

                    <input type="text" x-model="form.telegram" placeholder="Telegram Number"
                        class="w-full px-4 py-2 placeholder:text-gray-400 font-[300] border border-gray-200 rounded-md">

                    <input type="email" x-model="form.email" placeholder="Email"
                        class="w-full px-4 py-2 placeholder:text-gray-400 font-[300] border border-gray-200 rounded-md">

                    <div class="flex items-start gap-2 mt-1">
                        <input type="checkbox" x-model="form.consent" required
                            class="w-5 h-5
                        rounded-full
                        border border-gray-500
                        text-green-600
                        focus:ring-green-500
                        checked:bg-green-600
                        checked:border-green-600">
                        <p class="text-xs text-[#000]">
                            I consent to having this website store my submitted information so they can respond to my
                            enquiry.
                        </p>
                    </div>
                </div>

                <button type="submit" class="w-full bg-red-800 text-white py-2 font-semibold hover:bg-red-900">
                    Submit
                </button>
            </form>

            <!-- Toast Notification -->
            <div x-show="toast.show" x-transition x-text="toast.message"
                class="fixed top-5 right-5 px-4 py-2 rounded shadow-lg text-white z-50"
                :class="toast.type === 'success' ? 'bg-green-500' : 'bg-red-500'">
            </div>

        </div>
    </section>
@endsection
