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

        /* client */
        @keyframes scroll {
            0% {
                transform: translateX(0%);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .animate-scroll {
            animation: scroll 20s linear infinite;
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
                left: 88%;
            }
        }

        @media (max-width: 1023px) {
            .products_swiper .swiper {
                margin-inline: 0;
                padding-top: 0rem;
            }

            .products_swiper .swiper-button-next,
            .products_swiper .swiper-button-prev {
                display: none;
            }
        }
    </style>
@endsection
@section('content')
    {{-- <x-loading /> --}}
    <x-scroll-top-button />

    <section class="relative w-full h-[70vh] sm:h-screen">
        {{-- <div class="absolute inset-0 z-[8] opacity-50 w-full h-full overflow-hidden bg-[#ffe19a]">
        </div> --}}
        <div class="absolute inset-0 w-full h-full overflow-hidden z-[7]">
            @php
                $videoPath = is_array($banners->media) ? $banners->media['path'] ?? null : $banners->media;
            @endphp

            @if ($videoPath)
                <video autoplay muted loop playsinline class="absolute inset-0 z-0 object-cover w-full h-full"
                    poster="fallback-image.jpg">
                    <source src="{{ asset($videoPath) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @endif
        </div>

        <div
            class="relative z-10 flex flex-col items-center justify-center w-full h-full px-4 text-center text-[#830B00] lg:pt-20">
            <img src="{{ asset('assets/images/logo-black.png') }}" alt="" class="w-48 md:w-64" data-aos="fade-up"
                data-aos-duration="1000">
            <div class="flex items-center justify-center mt-4" data-aos="fade-up" data-aos-duration="1200">
                <svg class="w-[8rem] sm:w-[10rem] lg:w-[15rem]" viewBox="0 0 498 148" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M11.335 146.245C15.0002 141.729 18.24 137.002 21.0274 132.102C39.3005 97.9412 50.9625 56.362 54.8921 30.8295C56.5693 16.8579 55.5064 6.64645 44.2149 7.02089C32.8552 7.70738 23.6211 15.6488 17.5463 22.8959C8.11725 34.8001 2.78353 52.7424 14.192 55.8472C18.5019 56.8769 23.8259 56.1904 28.516 53.4289C29.2668 52.914 30.4662 53.2572 30.3394 53.9437C29.9006 57.0641 26.4391 61.1908 21.6417 63.4375C16.6688 65.5047 8.9071 65.5048 4.60698 62.4C-8.00087 53.7721 7.40547 24.9553 25.0838 12.7156C33.6743 6.84929 44.1954 1.01418 55.7989 1.1546C70.5715 1.66946 75.2324 12.1929 74.9691 21.5151C73.994 52.3913 51.021 108.636 25.2398 137.796C37.0688 129.169 48.1243 119.886 58.3244 110.017C80.9951 88.6268 101.725 66.199 123.967 44.801C132.675 36.3525 142.084 28.5828 151.543 20.618C159.441 13.8936 167.31 7.35633 177.928 3.01899C182.141 1.4588 187.357 0.265256 191.999 0.780119C194.924 1.12336 199.858 2.34031 197.001 5.60892C196.133 6.64645 194.807 6.81809 193.471 6.98971C189.083 7.33295 185.163 8.54991 180.795 9.92288C166.241 14.9792 153.049 22.243 141.948 31.3131C136.721 35.6271 131.222 41.1501 126.346 45.8073C97.0255 74.1014 70.8347 103.948 38.8324 130.69C31.0318 136.728 23.0653 142.937 13.4802 147.594C11.7153 148.491 10.4282 147.454 11.335 146.245Z"
                        fill="black" />
                    <path d="M164.735 79.7025H115.143L118.136 75.7396H167.739L164.735 79.7025Z" fill="black" />
                    <path
                        d="M180.932 81.6059C200.326 54.3728 225.6 45.0116 239.612 45.0116C247.813 45.0116 252.971 47.0789 252.22 54.677C253.455 51.9155 254.401 49.4998 255.057 47.4299L276.305 45.8697L236.424 105.563C229.871 115.049 230.505 118.153 234.815 118.153C243.015 118.153 255.291 108.316 266.866 96.2406L269.167 97.6213C252.074 116.086 236.472 125.572 224.391 125.572C214.942 125.401 211.305 119.191 218.628 106.07C206.927 117.631 193.773 125.572 182.131 125.572C165.096 125.596 161.323 108.863 180.932 81.6059ZM232.016 85.7404L238.315 76.4261C250.631 57.1031 250.991 48.4752 241.894 48.4752C233.703 48.4752 215.469 58.1406 198.824 82.6357C181.965 107.138 181.507 119.386 189.707 119.386C198.112 119.386 216.493 109.034 232.016 85.7404Z"
                        fill="black" />
                    <path
                        d="M294.734 47.4455L315.981 45.8853L297.084 73.8752C314.206 55.2464 330.393 45.0662 340.963 45.0662C353.473 45.0662 351.971 58.1796 342.24 63.3517C334.439 67.494 325.81 65.5983 324.688 61.6276C324.055 58.5072 326.122 55.9329 330.685 55.7613C335.678 55.5897 338.486 49.7234 333.406 50.0666C325.927 50.7609 304.436 65.5983 281.58 96.9972L262.653 125.12L244.429 125.635L284.056 67.1273C289.497 59.8334 293.193 52.6175 294.734 47.4455Z"
                        fill="black" />
                    <path
                        d="M337.696 81.6059C357.305 54.3025 382.365 45.0272 396.377 45.0272C414.065 45.0272 416.2 56.245 409.053 63.4843C403.202 69.53 392.925 69.3506 389.961 64.0069C389.508 63.209 389.348 62.3247 389.499 61.4569C389.65 60.589 390.106 59.7734 390.814 59.1048C391.522 58.4362 392.453 57.9423 393.498 57.6805C394.543 57.4186 395.66 57.3996 396.718 57.6257C401.135 58.1406 405.416 56.245 406.264 53.3118C407.064 50.5503 405.289 47.9603 399.848 47.9603C388.849 47.9603 370.595 56.5882 353.765 81.0832C338.457 103.339 344.015 118.692 356.106 118.692C368.392 118.692 383.106 108.34 394.739 96.2639L396.815 97.6447C379.947 116.11 361.712 125.596 345.36 125.596C328.111 125.596 318.302 108.862 337.696 81.6059Z"
                        fill="black" />
                    <path
                        d="M461.737 1.38079L482.955 0L429.91 79.1876C449.665 58.3122 470.863 45.0272 483.54 45.0272C494.266 45.1988 503.431 49.856 483.676 77.7912L465.257 105.57C458.919 115.056 459.338 118.161 463.648 118.161C471.848 118.161 484.29 108.324 495.709 96.2483L498 97.6291C480.917 116.094 465.52 125.58 453.234 125.58C442.508 125.408 439.251 117.295 451.05 100.391L467.802 75.373C477.25 61.4014 480.312 53.1246 472.755 53.1246C458.958 53.1246 429.851 80.5528 415.752 100.047L399 125.065L380.775 125.58L451.313 21.203C456.471 13.9715 460.138 6.72445 461.737 1.38079Z"
                        fill="black" />
                </svg>

            </div>
            <p class="mt-4 text-[20px] md:text-[25px] text-[#830B00] font-[500] max-w-[500px] italic tracking-widest"
                data-aos="fade-up" data-aos-duration="1500">LIGHTING UP YOUR HOME WITH CHARMING LIGHTING
            </p>
        </div>
    </section>

    <section class="relative -top-[1rem] md:-top-[2rem] z-[1]">
        <div data-aos="fade-up" data-aos-duration="1700"
            class="w-full h-full overflow-visible flex items-end justify-center pointer-events-none">
            <img src="{{ asset($banners->image) }}" alt="" class="p-0 w-[20rem] sm:w-[30rem]">
        </div>
    </section>

    {{-- about us --}}
    <section id="about" class="w-full pb-10 bg-white">
        <div
            class="max-w-7xl mx-auto px-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 items-center overflow-hidden">

            <!-- LEFT IMAGE COLLAGE -->
            <div class="p-4 relative " data-aos="fade-right" data-aos-duration="1400">
                <div class="w-[100px] h-[2px] bg-[#830B00] border-0 absolute top-0 left-0"></div>
                <div class="w-[2px] h-[100px] bg-[#830B00] border-0 absolute top-0 left-0"></div>
                <div class="w-[100px] h-[2px] bg-[#830B00] border-0 absolute bottom-0 right-0"></div>
                <div class="w-[2px] h-[100px] bg-[#830B00] border-0 absolute bottom-0 right-0"></div>
                <div class="flex items-center gap-2">
                    <div class="flex flex-col gap-2">
                        <img src="{{ asset('assets/images/about/about-1.jpg') }}" class="w-52 h-40 object-cover">
                        <div class="flex gap-2 items-start">
                            <div class="w-8 h-8 bg-[#326BEA]"></div>
                            <img src="{{ asset('assets/images/about/about-3.jpg') }}"
                                class="w-[142px] sm:w-36 lg:w-[164px] h-40 object-cover" loading="lazy">
                        </div>
                    </div>

                    <div class="flex flex-col gap-2">
                        <div class="w-8 h-8 bg-[#830B00]"></div>
                        <img src="{{ asset('assets/images/about/about-2.jpg') }}" class="w-48 h-48 object-cover"
                            loading="lazy">
                    </div>
                </div>
            </div>

            <!-- RIGHT CONTENT -->
            <div data-aos="fade-left" data-aos-duration="1400" class="md:col-span-2 lg:pl-10">
                <h2 class="text-[20px] md:text-[30px] xl:text-[40px] flex items-end gap-4 font-bold text-[#830B00] mb-4">
                    <svg class="w-10 h-10 md:w-14 md:h-14" fill="none" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                        xmlns:svgjs="http://svgjs.dev/svgjs">
                        <g width="100%" height="100%" transform="matrix(1,0,0,1,0,0)">
                            <g fill="rgb(0,0,0)">
                                <path clip-rule="evenodd"
                                    d="m17 7c0 2.76142-2.2386 5-5 5-2.76142 0-5-2.23858-5-5s2.23858-5 5-5c2.7614 0 5 2.23858 5 5zm-2 0c0 1.65685-1.3431 3-3 3s-3-1.34315-3-3 1.3431-3 3-3 3 1.34315 3 3z"
                                    fill-rule="evenodd" fill="#830b00" fill-opacity="1" data-original-color="#000000ff"
                                    stroke="none" stroke-opacity="1" />
                                <path
                                    d="m18 4c-.5523 0-1 .44772-1 1s.4477 1 1 1c1.1046 0 2 .89543 2 2s-.8954 2-2 2c-.5523 0-1 .4477-1 1s.4477 1 1 1c2.2091 0 4-1.7909 4-4 0-2.20914-1.7909-4-4-4z"
                                    fill="#830b00" fill-opacity="1" data-original-color="#000000ff" stroke="none"
                                    stroke-opacity="1" />
                                <path
                                    d="m7 14c0-.5523-.44772-1-1-1h-1c-1.65685 0-3 1.3431-3 3v5c0 .5523.44772 1 1 1s1-.4477 1-1v-5c0-.5523.44772-1 1-1h1c.55228 0 1-.4477 1-1z"
                                    fill="#830b00" fill-opacity="1" data-original-color="#000000ff" stroke="none"
                                    stroke-opacity="1" />
                                <path
                                    d="m10 13c-1.65685 0-3 1.3431-3 3v4c0 .5523.44772 1 1 1s1-.4477 1-1v-4c0-.5523.44772-1 1-1h4c.5523 0 1 .4477 1 1v4c0 .5523.4477 1 1 1s1-.4477 1-1v-4c0-1.6569-1.3431-3-3-3z"
                                    fill="#830b00" fill-opacity="1" data-original-color="#000000ff" stroke="none"
                                    stroke-opacity="1" />
                                <path
                                    d="m18 13c-.5523 0-1 .4477-1 1s.4477 1 1 1h1c.5523 0 1 .4477 1 1v5c0 .5523.4477 1 1 1s1-.4477 1-1v-5c0-1.6569-1.3431-3-3-3z"
                                    fill="#830b00" fill-opacity="1" data-original-color="#000000ff" stroke="none"
                                    stroke-opacity="1" />
                                <path
                                    d="m7 5c0-.55228-.44772-1-1-1-2.20914 0-4 1.79086-4 4 0 2.2091 1.79086 4 4 4 .55228 0 1-.4477 1-1s-.44772-1-1-1c-1.10457 0-2-.89543-2-2s.89543-2 2-2c.55228 0 1-.44772 1-1z"
                                    fill="#830b00" fill-opacity="1" data-original-color="#000000ff" stroke="none"
                                    stroke-opacity="1" />
                            </g>
                        </g>
                    </svg>

                    <span class="leading-none">
                        {{ app()->getLocale() === 'en'
                            ? $aboutus->title_en
                            : (app()->getLocale() === 'km'
                                ? $aboutus->title_km
                                : $aboutus->title_ch) }}
                    </span>
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
    <section class="w-full pb-10 md:py-12 bg-white max-w-7xl mx-auto px-4">
        <h1 class="text-[20px] md:text-[30px] xl:text-[40px] font-bold text-[#830B00] flex items-end justify-center gap-2 px-2 pb-6 md:pb-10"
            data-aos="fade-right" data-aos-duration="1400">

            <svg class="w-10 h-10 md:w-14 md:h-14" id="Layer_1" viewBox="0 0 512 512"
                xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" version="1.1"
                xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev/svgjs">
                <g width="100%" height="100%" transform="matrix(1,0,0,1,0,0)">
                    <path
                        d="m244.36 48.49c53.19 0 66.07 1.55 85.56 3.88 5.18.62 11 1.33 18.07 2.06l.8.08a71.78 71.78 0 0 1 15.28 3.34l1 .34.76.28h.12l.13.05a71.39 71.39 0 0 1 45 50.75l.94 9c2.41 23.24 4.33 58.29 5.32 99.05a23.55 23.55 0 0 0 23.6 23 25.05 25.05 0 0 0 24.95-25.28c-.47-62-5.54-101.71-5.54-101.71a119.45 119.45 0 0 0 -77.65-99.83c-1.11-.41-2.22-.81-3.34-1.2a119.37 119.37 0 0 0 -25.58-5.57l-.83-.09c-33.23-3.41-38.56-6.15-108.59-6.15-70 0-81.33 2.74-114.54 6.19l-.83.09a119.18 119.18 0 0 0 -26.81 6v-.46a119.47 119.47 0 0 0 -80.38 100.8c-4.16 40-6.28 78.57-6.28 140.44s2.12 100.45 6.28 140.45a119.61 119.61 0 0 0 106.58 106.58l.83.08c28.93 3 36.7 5.48 84.55 6.06a24 24 0 0 0 24.29-23.72 24 24 0 0 0 -23.5-24.26c-31.15-.64-50-2.31-62.34-3.79-5.17-.62-11-1.32-18.06-2.05l-.8-.09a71.59 71.59 0 0 1 -63.81-63.81c-3.61-34.69-6-71-6-135.48s2.41-100.78 6-135.47a71.37 71.37 0 0 1 40.46-57.18l7.92-2.76a71.74 71.74 0 0 1 16-3.6l.86-.08c5.4-.57 10.13-1.1 14.7-1.61 23.19-2.61 38.51-4.33 94.87-4.33"
                        fill="#830b00" fill-opacity="1" data-original-color="#000000ff" stroke="none"
                        stroke-opacity="1" />
                    <path
                        d="m365.35 512.49c-72.31 0-131.13-58.82-131.13-131.12a131.27 131.27 0 0 1 131.13-131.13c72.3 0 131.13 58.82 131.13 131.13s-58.83 131.12-131.13 131.12zm0-214.25a83.13 83.13 0 1 0 83.13 83.13 83.22 83.22 0 0 0 -83.13-83.13z"
                        fill="#830b00" fill-opacity="1" data-original-color="#000000ff" stroke="none"
                        stroke-opacity="1" />
                    <path d="m131.63 133.64h218.26a23.83 23.83 0 0 1 0 47.65h-218.26a23.83 23.83 0 0 1 0-47.65z"
                        fill="#830b00" fill-opacity="1" data-original-color="#000000ff" stroke="none"
                        stroke-opacity="1" />
                    <path d="m131.63 283.21a23.82 23.82 0 0 1 0-47.64h124.46a23.82 23.82 0 1 1 0 47.64z" fill="#830b00"
                        fill-opacity="1" data-original-color="#000000ff" stroke="none" stroke-opacity="1" />
                    <path
                        d="m407.81 406h-44.59a21.77 21.77 0 0 1 -21.75-21.75v-53.5a21.75 21.75 0 1 1 43.5 0v31.75h22.84a21.75 21.75 0 0 1 0 43.5z"
                        fill="#830b00" fill-opacity="1" data-original-color="#000000ff" stroke="none"
                        stroke-opacity="1" />
                </g>
            </svg>
            <span class="leading-none">
                {{ app()->getLocale() === 'en' ? 'Firm History' : (app()->getLocale() === 'km' ? 'ប្រវត្តិក្រុមហ៊ុនរបស់យើងខ្ញុំ' : 'Firm History') }}
            </span>
        </h1>

        <div class="relative" id="timeline-wrapper">
            <div class="absolute left-1/2 top-0 w-1 bg-gradient transform -translate-x-1/2">
                <div id="timeline-line" class="w-full h-0 bg-gradient transition-all duration-500"></div>
            </div>

            @forelse ($histories as $index => $item)
                @php
                    $images = json_decode($item->image, true) ?? [];
                @endphp
                @if (($index + 1) % 2 === 1)
                    <div
                        class="mb-5 md:mb-32 flex flex-col md:flex-row justify-between items-center w-full relative overflow-hidden">
                        <div data-aos="fade-right" data-aos-duration="1000"
                            class="w-full order-1 md:order-1 md:w-5/12 px-2 md:px-4 py-4 bg-white rounded-lg shadow-xl mt-8 md:mt-0 mr-0 md:mr-8">
                            <h3 class="text-gradient font-[600] text-[20px] md:text-[30px] mt-1">{{ $item->year }}
                            </h3>
                            <div
                                class="prose mt-2 prose-p:text-[#000] text-justify prose-p:mx-0 prose-p:my-2 prose-h1:text-[#000] prose-h2:text-[#000] prose-h3:text-[#000] prose-ul:text-[#000] prose-ol:text-[#000] prose-ul:marker:text-[#000]">
                                {!! app()->getLocale() === 'en'
                                    ? $item->content_en
                                    : (app()->getLocale() === 'km'
                                        ? $item->content_km
                                        : $item->content_ch) !!}</div>
                        </div>

                        <div
                            class="absolute left-1/2 w-6 h-6 bg-gradient rounded-full transform -translate-x-1/2 border-4 border-white">
                        </div>

                        <div data-aos="fade-left" data-aos-duration="1000"
                            class="w-full order-1 md:order-2 mt-2 md:mt-0 px-2 md:px-0 md:w-5/12 flex justify-center md:justify-start mb-4 md:mb-0">
                            <div class="w-full h-full grid grid-cols-2 gap-2 rounded-md overflow-hidden">
                                @foreach ($images as $img)
                                    @if (!empty($img))
                                        <img src="{{ asset($img) }}" alt="" loading="lazy"
                                            class="w-full h-[300px] md:h-[400px] object-top {{ count(array_filter($images)) === 1 ? 'col-span-2 object-contain' : 'object-contain' }}">
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @else
                    <div
                        class="mb-5 md:mb-32 flex flex-col md:flex-row justify-between items-center w-full relative overflow-hidden">
                        <div data-aos="fade-right" data-aos-duration="1000"
                            class="w-full order-2 md:order-1 mt-2 md:mt-0 px-2 md:px-0 md:w-5/12 flex justify-center md:justify-end mb-4 md:mb-0">
                            <div class="w-full h-full grid grid-cols-2 gap-2 rounded-md overflow-hidden">
                                @foreach ($images as $img)
                                    @if (!empty($img))
                                        <img src="{{ asset($img) }}" alt="" loading="lazy"
                                            class="w-full h-[300px] md:h-[400px] object-top {{ count(array_filter($images)) === 1 ? 'col-span-2 object-contain' : 'object-contain' }}">
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div
                            class="absolute left-1/2 w-6 h-6 bg-gradient rounded-full transform -translate-x-1/2 border-4 border-white">
                        </div>

                        <div data-aos="fade-left" data-aos-duration="1000"
                            class="w-full order-1 md:w-5/12 px-2 md:px-4 py-4 bg-white rounded-lg shadow-xl mt-8 md:mt-0 ml-0 md:ml-8">
                            <h3 class="text-gradient font-[600]  text-[20px] md:text-[30px] mt-1">{{ $item->year }}
                            </h3>
                            <div
                                class="prose mt-2 text-justify prose-p:text-[#000] prose-p:mx-0 prose-p:my-2 prose-h1:text-[#000] prose-h2:text-[#000] prose-h3:text-[#000] prose-ul:text-[#000] prose-ol:text-[#000] prose-ul:marker:text-[#000]">
                                {!! app()->getLocale() === 'en'
                                    ? $item->content_en
                                    : (app()->getLocale() === 'km'
                                        ? $item->content_km
                                        : $item->content_ch) !!}</div>
                        </div>
                    </div>
                @endif
            @empty
                <!-- Content to show when $history is empty -->
                <div class="text-center py-8">
                    <p>No history items found</p>
                </div>
            @endforelse
        </div>
    </section>

    {{-- vision & mission & core value --}}
    <section class="w-full max-w-7xl mx-auto px-2 xl:px-4 pt-0 mb-10">
        {{-- vision & mission --}}
        <div class="relative grid grid-cols-1 md:grid-cols-2 gap-4 items-center z-20 overflow-hidden">
            <div data-aos="fade-right" data-aos-duration="1000"
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
            <div data-aos="fade-left" data-aos-duration="1000"
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
            <div class="absolute w-full h-full" data-aos="fade-up" data-aos-duration="800">
                <img src="{{ asset('assets/images/lamp-1.png') }}" alt=""
                    class="w-[40rem] lg:w-[50rem] mx-auto relative ">
            </div>
            <div class="relative pt-10 text-center">
                <h1 data-aos="fade-up" data-aos-duration="1400"
                    class="text-[20px] md:text-[30px] xl:text-[40px] font-bold text-[#830B00] pb-10 md:py-10 text-center px-2">
                    {{ app()->getLocale() === 'en'
                        ? $core->title_en
                        : (app()->getLocale() === 'km'
                            ? $core->title_km
                            : $core->title_ch) }}
                </h1>

                <div class="flex justify-between overflow-hidden">
                    <div class="w-[48%] flex items-center justify-end text-end pr-10 leading-none" data-aos="fade-right"
                        data-aos-duration="1400">
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
                    <div class="w-[48%] flex items-center justify-start text-start pl-10 leading-none"
                        data-aos="fade-left" data-aos-duration="1400">
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

                <div class="flex justify-between pt-20 xl:pt-32 overflow-hidden">
                    <div class="w-[48%] flex items-center justify-end text-end pr-40 lg:pr-52 leading-none"
                        data-aos="fade-right" data-aos-duration="1400">
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
                    <div class="w-[48%] flex items-center justify-start text-start pl-40 lg:pl-52 leading-none"
                        data-aos="fade-left" data-aos-duration="1400">
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
                    <div class="w-full flex items-center justify-center text-end pr-16 leading-none" data-aos="fade-up"
                        data-aos-duration="1400">
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
                <div class="flex items-center justify-start text-start leading-none" data-aos="fade-right"
                    data-aos-duration="1400">
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
                <div class="flex items-center justify-start text-start leading-none" data-aos="fade-right"
                    data-aos-duration="1400">
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
                <div class="flex items-center justify-start text-start leading-none" data-aos="fade-right"
                    data-aos-duration="1400">
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
                <div class="flex items-center justify-start text-start leading-none" data-aos="fade-right"
                    data-aos-duration="1400">
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
                <div class="flex items-center justify-start text-start leading-none" data-aos="fade-right"
                    data-aos-duration="1400">
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

        </div>
    </section>

    {{-- why choose us --}}
    <section class="relative w-full h-full py-16">
        <div class="absolute inset-0 w-full h-full z-10">
            <img src="{{ asset('assets/images/bg-1.png') }}" alt="" class="w-full h-full object-cover">
        </div>
        <div class="absolute inset-0 w-full h-full bg-[#fff]/80 z-20"></div>

        <div class="relative z-30 max-w-7xl mx-auto px-2 md:px-4">
            <h1 class="text-[20px] md:text-[30px] xl:text-[40px] font-bold text-[#830B00] flex items-end justify-center gap-2 px-2 pb-6 md:pb-10"
                data-aos="fade-right" data-aos-duration="1400">
                <svg class="w-10 h-10 md:w-14 md:h-14" id="Layer_1" enable-background="new 0 0 512 512"
                    viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" version="1.1"
                    xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev/svgjs">
                    <g width="100%" height="100%" transform="matrix(1,0,0,1,0,0)">
                        <path
                            d="m393.93 460.19c-2.5-12.81-11.54-22.44-24.18-25.76l-52.57-13.83c-3.33-.88-5.75-2.3-8.1-4.75l-11.92-12.45v-6.92c3.93-2.61 7.65-5.6 11.09-8.97 12.56-12.26 20.33-28.14 22.29-45.27 11.75-3.46 20.17-14.25 20.17-27.13 0-6.81-2.42-13.06-6.43-17.94v-26.73c0-41.15-33.48-74.64-74.64-74.64h-41.78c-16.26 0-29.84 11.73-32.72 27.17-15.88 2.51-28.06 16.29-28.06 32.87v41.32c-4.02 4.89-6.44 11.14-6.44 17.95 0 12.88 8.43 23.68 20.19 27.14 1.96 17.14 9.73 33.02 22.29 45.27 3.44 3.36 7.15 6.34 11.07 8.95v6.94l-11.92 12.44c-2.36 2.46-4.78 3.88-8.09 4.75l-52.58 13.83c-12.6 3.32-21.64 12.94-24.18 25.74l-4.82 24.44c-1.33 6.87.39 13.61 4.81 18.97 4.44 5.42 10.74 8.4 17.75 8.4h241.03c7.03 0 13.34-2.98 17.76-8.38 4.46-5.41 6.17-12.17 4.8-19.03zm-163.75-55.65c8.09 2.93 16.7 4.46 25.51 4.46s17.4-1.53 25.48-4.45v5.05c0 14.05-11.43 25.48-25.48 25.48-14.07 0-25.51-11.43-25.51-25.48zm-29.82-165.99h2.21c4.42 0 7.99-3.58 7.99-7.99v-1.47c0-9.53 7.76-17.29 17.29-17.29h41.78c32.34 0 58.65 26.31 58.65 58.65v16.98c-1.51-.32-3.06-.53-4.65-.6v-1.53c0-7.93-2.85-14.79-8.48-20.38-5.55-5.51-12.63-8.38-20.45-8.3-28.32.24-53.05-2.41-73.5-7.92-.48-.13-.97-.21-1.47-.25-20.31-1.59-26.21 21.61-29.34 38.39-.48-.02-.96-.04-1.44-.04-2.02 0-3.99.22-5.9.62v-31.58c.01-9.53 7.77-17.29 17.31-17.29zm-4 96.66c-.11-4.25-3.52-7.66-7.76-7.78-6.6-.19-11.96-5.71-11.96-12.31 0-6.8 5.53-12.33 12.33-12.33 1.67 0 3.28.32 4.77.94 2.23.93 4.77.81 6.9-.35 2.13-1.15 3.62-3.21 4.05-5.59.21-1.13.41-2.31.63-3.52 1.97-11.13 5.23-29.57 12.64-29.9 21.67 5.73 47.53 8.5 76.91 8.22h.16c3.53 0 6.35 1.17 8.87 3.66 2.57 2.55 3.76 5.42 3.76 9.04v10.63c0 2.59 1.25 5.01 3.36 6.51s4.81 1.89 7.25 1.04c1.33-.46 2.71-.69 4.13-.69 6.8 0 12.33 5.53 12.33 12.33 0 6.6-5.35 12.12-11.93 12.31-4.24.12-7.65 3.54-7.76 7.78-.82 31.87-27.44 57.81-59.33 57.81-31.92 0-58.53-25.93-59.35-57.8zm185.24 158.24c-1.42 1.73-3.14 2.54-5.41 2.54h-241.03c-2.25 0-3.96-.81-5.4-2.57-1.43-1.73-1.89-3.57-1.47-5.75l4.82-24.4c1.34-6.76 5.92-11.63 12.56-13.38l52.59-13.83c6.19-1.63 11.13-4.54 15.56-9.15l2.91-3.04c5.84 15.85 21.1 27.19 38.96 27.19 17.85 0 33.1-11.34 38.94-27.19l2.92 3.05c4.35 4.53 9.43 7.52 15.55 9.14l52.59 13.83c6.66 1.75 11.24 6.62 12.56 13.38l4.82 24.42c.43 2.19-.03 4.02-1.47 5.76zm-158.31-414.8c12.68 0 22.99-10.3 22.99-22.96 0-2.58 1.02-5.02 2.87-6.88 1.83-1.83 4.32-2.87 6.85-2.87 2.55 0 4.99 1.03 6.85 2.87 1.85 1.85 2.87 4.3 2.87 6.88 0 2-.62 3.93-1.78 5.58-.16.22-.31.43-.45.63-1.21 1.44-2.74 2.5-4.43 3.07-7.66 2.55-14.18 7.31-18.86 13.75-4.68 6.48-7.16 14.15-7.16 22.2v14.77c0 12.66 10.3 22.96 22.96 22.96s22.96-10.3 22.96-22.96l.01-2.2c0-1.95.01-4.74.01-7.2 8.27-3.76 15.47-9.47 21.08-16.74.38-.44.75-.93 1.1-1.45 6.88-9.53 10.51-20.73 10.51-32.42 0-14.84-5.8-28.82-16.34-39.36-10.52-10.51-24.49-16.3-39.33-16.3s-28.81 5.79-39.33 16.32c-10.54 10.54-16.34 24.52-16.34 39.36 0 12.65 10.3 22.95 22.96 22.95zm39.76 23.52c.11.69.32 1.35.59 1.97-.28-.64-.48-1.3-.59-1.97zm.63 2.05c.07.15.14.29.22.43-.08-.14-.15-.28-.22-.43zm.33.65c.06.11.13.21.2.31-.06-.1-.13-.21-.2-.31zm.38.59c.08.11.16.22.25.32-.08-.1-.17-.21-.25-.32zm.42.54c.13.15.26.29.39.43-.14-.14-.27-.28-.39-.43zm.44.49c1.12 1.14 2.58 1.93 4.2 2.24-1.69-.31-3.12-1.14-4.2-2.24zm4.37 2.26c.18.03.36.06.54.07-.19-.01-.37-.04-.54-.07zm-41.64-81.11c7.5-7.5 17.45-11.63 28.02-11.63s20.52 4.13 28.02 11.63c7.52 7.52 11.66 17.48 11.66 28.05 0 8.33-2.61 16.34-7.55 23.14-.06.09-.12.17-.18.26-.02.03-.06.09-.03.05-.14.16-.28.33-.41.5-4.88 6.4-11.49 11.12-19.1 13.65-3.52 1.17-5.75 4.59-5.45 8.24.04 1.55.02 9.04.01 11.93v2.24c0 3.85-3.13 6.97-6.97 6.97s-6.97-3.13-6.97-6.97v-14.77c0-4.66 1.43-9.1 4.12-12.82 2.7-3.72 6.49-6.48 10.97-7.97 4.74-1.58 8.93-4.54 12.1-8.55.18-.23.34-.45.5-.7l.09-.12c.03-.05.07-.09.1-.14 3.15-4.4 4.81-9.56 4.81-14.94 0-6.85-2.68-13.31-7.58-18.21-4.9-4.86-11.34-7.53-18.13-7.53-6.73 0-13.35 2.75-18.15 7.56-4.87 4.87-7.56 11.33-7.56 18.18 0 3.84-3.14 6.97-7 6.97-3.85 0-6.97-3.13-6.97-6.97-.02-10.57 4.13-20.53 11.65-28.05zm28.02 115.44c-12.68 0-22.99 10.31-22.99 22.99s10.31 22.99 22.99 22.99c12.66 0 22.96-10.31 22.96-22.99s-10.3-22.99-22.96-22.99zm0 29.99c-3.86 0-7-3.14-7-7s3.14-7 7-7c3.85 0 6.97 3.14 6.97 7s-3.13 7-6.97 7zm186.3-47.12c-10.54-10.54-24.51-16.34-39.33-16.34-14.84 0-28.82 5.8-39.36 16.34-10.52 10.52-16.32 24.49-16.32 39.33 0 12.66 10.3 22.96 22.96 22.96 12.68 0 22.99-10.3 22.99-22.96 0-2.58 1.01-5 2.9-6.87 1.82-1.84 4.25-2.85 6.82-2.85 2.56 0 5 1.02 6.85 2.87 1.83 1.83 2.87 4.32 2.87 6.85 0 2.55-.96 4.43-1.78 5.57-.15.21-.29.41-.43.61-1.19 1.45-2.73 2.52-4.5 3.11-7.71 2.58-14.22 7.36-18.82 13.78-4.7 6.5-7.18 14.17-7.18 22.17v14.77c0 12.68 10.31 22.99 22.99 22.99 12.66 0 22.96-10.31 22.96-22.99v-1.77c0-1.94.01-4.97 0-7.63 8.24-3.75 15.43-9.43 21.04-16.68.43-.5.82-.99 1.16-1.48 6.88-9.56 10.51-20.77 10.51-32.45.02-14.82-5.79-28.79-16.33-39.33zm-30.69 89.4c.21.27.43.53.67.78-.25-.25-.47-.51-.67-.78zm-.77-1.18c.19.36.4.7.64 1.03-.25-.33-.46-.68-.64-1.03zm1.69 2.17c.22.21.45.41.7.59-.26-.18-.48-.38-.7-.59zm22.58-27.88c-.06.08-.07.09-.12.18l-.08.09c-.15.17-.29.34-.43.52-4.89 6.39-11.49 11.1-19.09 13.63-3.07 1.02-5.22 3.79-5.45 7.02-.03.36-.03.72 0 1.08.03 1.46.02 9.74.01 12.52v1.79c0 3.86-3.13 7-6.97 7-3.86 0-7-3.14-7-7v-14.77c0-4.62 1.44-9.05 4.17-12.84 2.65-3.7 6.43-6.45 10.89-7.95 4.81-1.59 9.02-4.56 12.17-8.58.07-.09.15-.19.22-.29.1-.13.19-.27.29-.42l.05-.08c.03-.04.06-.08.08-.11 3.16-4.37 4.83-9.55 4.83-14.97 0-6.73-2.75-13.35-7.56-18.15-4.87-4.87-11.32-7.56-18.15-7.56-6.88 0-13.33 2.69-18.13 7.53-4.89 4.85-7.58 11.3-7.58 18.18 0 3.84-3.14 6.97-7 6.97-3.85 0-6.97-3.13-6.97-6.97 0-10.57 4.13-20.52 11.63-28.02 7.52-7.52 17.48-11.66 28.05-11.66 10.55 0 20.5 4.14 28.02 11.66s11.66 17.47 11.66 28.02c.01 8.33-2.6 16.34-7.54 23.18zm-24.83 24.37c-.18-.58-.29-1.16-.33-1.68.05.57.16 1.14.33 1.68zm-7.33 39.87c-12.66 0-22.96 10.3-22.96 22.96 0 12.68 10.3 22.99 22.96 22.99 12.68 0 22.99-10.31 22.99-22.99 0-12.66-10.32-22.96-22.99-22.96zm0 29.96c-3.85 0-6.97-3.14-6.97-7 0-3.84 3.13-6.97 6.97-6.97 3.86 0 7 3.13 7 6.97 0 3.86-3.14 7-7 7zm-303.65-117.38c0-2.58 1.01-5 2.87-6.85 1.85-1.85 4.29-2.87 6.85-2.87 2.58 0 5 1.01 6.87 2.9 1.84 1.82 2.85 4.24 2.85 6.82 0 2.06-.61 3.98-1.77 5.57-.12.16-.17.24-.28.41l-.12.17c-1.16 1.46-2.71 2.54-4.49 3.14-7.68 2.56-14.2 7.33-18.88 13.81-4.67 6.51-7.14 14.17-7.14 22.15v14.77c0 12.68 10.3 22.99 22.96 22.99 12.68 0 22.99-10.31 22.99-22.99v-1.3c0-1.89.01-5.22 0-8.1 8.29-3.77 15.52-9.5 21.14-16.81.3-.36.59-.73.89-1.13.03-.04.07-.09.1-.13 6.9-9.59 10.55-20.84 10.55-32.53 0-14.86-5.81-28.83-16.34-39.32-10.51-10.54-24.48-16.35-39.34-16.35s-28.83 5.81-39.32 16.34c-10.55 10.51-16.35 24.48-16.35 39.34 0 12.66 10.31 22.96 22.99 22.96 12.67-.03 22.97-10.33 22.97-22.99zm19.36 51.17c.59.52 1.26.96 1.99 1.29-.76-.34-1.42-.79-1.99-1.29zm-35.35-51.17c0 3.84-3.13 6.97-6.97 6.97-3.86 0-7-3.13-7-6.97 0-10.58 4.14-20.52 11.67-28.03 7.49-7.51 17.44-11.65 28.01-11.65s20.52 4.14 28.03 11.67c7.51 7.49 11.65 17.44 11.65 28.01 0 8.29-2.59 16.28-7.48 23.12-.17.22-.34.43-.51.64-.06.07-.11.14-.16.21-4.89 6.39-11.5 11.1-19.11 13.63-3.27 1.09-5.47 4.14-5.47 7.58 0 .23.01.45.03.67.03 1.11.04 5.42.03 12.84v1.32c0 3.86-3.14 7-7 7-3.84 0-6.97-3.14-6.97-7v-14.77c0-4.62 1.43-9.05 4.13-12.81 2.69-3.73 6.48-6.49 10.96-7.98 4.84-1.61 9.05-4.59 12.16-8.62.07-.09.13-.17.19-.26l.07-.1c.15-.21.31-.43.45-.65 3.09-4.3 4.72-9.42 4.72-14.82 0-6.88-2.69-13.33-7.53-18.13-4.85-4.89-11.3-7.58-18.18-7.58-6.83 0-13.28 2.68-18.13 7.53-4.89 4.84-7.59 11.3-7.59 18.18zm33 47.5c-.15-.48-.25-.96-.29-1.42.05.49.15.96.29 1.42zm15.67 62.88c0-12.66-10.3-22.96-22.96-22.96-12.68 0-22.99 10.3-22.99 22.96 0 12.68 10.31 22.99 22.99 22.99 12.66 0 22.96-10.32 22.96-22.99zm-22.96 7c-3.86 0-7-3.14-7-7 0-3.84 3.14-6.97 7-6.97 3.85 0 6.97 3.13 6.97 6.97.01 3.86-3.12 7-6.97 7z"
                            fill="#830b00" fill-opacity="1" data-original-color="#000000ff" stroke="none"
                            stroke-opacity="1" />
                    </g>
                </svg>
                <span
                    class="leading-none">{{ app()->getLocale() === 'en' ? 'Why Choose Us ?' : (app()->getLocale() === 'km' ? 'ហេតុអ្វីបានជាជ្រើសរើសយើងខ្ញុំ​ ?' : 'Why Choose Us ?') }}</span>
            </h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-10 xl:gap-16 px-4 md:px-0 overflow-hidden">
                @foreach ($whys as $item)
                    <div class="flex flex-col w-full" data-aos="fade-left" data-aos-duration="1400">
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
            </div>
        </div>
    </section>

    {{-- new product --}}
    <section class="relative w-full h-full py-16 overflow-hidden">
        <h1 class="text-[20px] md:text-[30px] xl:text-[40px] font-bold text-[#830B00] flex items-end justify-center gap-2 px-2 pb-6 md:pb-10"
            data-aos="fade-right" data-aos-duration="1400">
            <svg class="w-10 h-10 md:w-14 md:h-14" id="_27_Think_outside_the_box" viewBox="0 0 64 64"
                xmlns="http://www.w3.org/2000/svg" data-name="27 Think outside the box" version="1.1"
                xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev/svgjs">
                <g width="100%" height="100%" transform="matrix(1,0,0,1,0,0)">
                    <path
                        d="m63.894 42.553-5-10c-.17-.339-.516-.553-.894-.553h-20v-2c.553 0 1-.448 1-1 0-.518-.398-.929-.903-.98.217-.941.809-1.797 1.68-2.381 3.896-2.607 6.223-6.958 6.223-11.639 0-3.976-1.7-7.779-4.664-10.433-2.963-2.652-6.951-3.919-10.931-3.479-6.223.689-11.378 5.676-12.259 11.859-.772 5.421 1.557 10.668 6.078 13.693.871.583 1.462 1.439 1.679 2.379-.505.051-.903.462-.903.98 0 .552.447 1 1 1v2h-20c-.379 0-.725.214-.895.553l-5 10.001c-.155.31-.139.678.044.973s.504.475.851.475h4v19c0 .553.447 1 1 1h52c.553 0 1-.447 1-1v-19h4c.347 0 .668-.18.851-.475s.199-.663.044-.973zm-43.767-30.323c.754-5.293 5.169-9.563 10.499-10.153 3.469-.384 6.801.674 9.376 2.98 2.541 2.275 3.998 5.535 3.998 8.943 0 4.012-1.994 7.741-5.335 9.977-1.43.957-2.36 2.422-2.599 4.023h-1.066v-8h1c1.654 0 3-1.346 3-3s-1.346-3-3-3-3 1.346-3 3v1h-2v-1c0-1.654-1.346-3-3-3s-3 1.346-3 3 1.346 3 3 3h1v8h-1.066c-.239-1.602-1.169-3.066-2.598-4.022-3.876-2.594-5.872-7.095-5.209-11.748zm10.873 15.77v-8h2v8zm-2-10h-1c-.552 0-1-.449-1-1s.448-1 1-1 1 .449 1 1zm6 0v-1c0-.551.448-1 1-1s1 .449 1 1-.448 1-1 1zm-7 12h8v2h-8zm-21.382 4h23.764l-4 8h-23.764zm.382 10h20c.379 0 .725-.214.894-.553l3.106-6.211v24.764h-24zm50 18h-24v-24.764l3.105 6.211c.17.339.516.553.895.553h20zm-19.382-20-4-8h23.764l4 8z"
                        fill="#830b00" fill-opacity="1" data-original-color="#000000ff" stroke="none"
                        stroke-opacity="1" />
                    <path
                        d="m6 24c2.757 0 5 2.243 5 5 0 .552.447 1 1 1s1-.448 1-1c0-3.86-3.141-7-7-7-.553 0-1 .448-1 1s.447 1 1 1z"
                        fill="#830b00" fill-opacity="1" data-original-color="#000000ff" stroke="none"
                        stroke-opacity="1" />
                    <path
                        d="m52 30c.553 0 1-.448 1-1 0-2.757 2.243-5 5-5 .553 0 1-.448 1-1s-.447-1-1-1c-3.859 0-7 3.14-7 7 0 .552.447 1 1 1z"
                        fill="#830b00" fill-opacity="1" data-original-color="#000000ff" stroke="none"
                        stroke-opacity="1" />
                    <path
                        d="m48 25c.553 0 1-.448 1-1 0-1.654 1.346-3 3-3 .553 0 1-.448 1-1s-.447-1-1-1c-2.757 0-5 2.243-5 5 0 .552.447 1 1 1z"
                        fill="#830b00" fill-opacity="1" data-original-color="#000000ff" stroke="none"
                        stroke-opacity="1" />
                    <path
                        d="m12 21c1.654 0 3 1.346 3 3 0 .552.447 1 1 1s1-.448 1-1c0-2.757-2.243-5-5-5-.553 0-1 .448-1 1s.447 1 1 1z"
                        fill="#830b00" fill-opacity="1" data-original-color="#000000ff" stroke="none"
                        stroke-opacity="1" />
                </g>
            </svg>
            <span
                class="leading-none">{{ app()->getLocale() === 'en' ? 'New Product' : (app()->getLocale() === 'km' ? 'ផលិតផល​ ថ្មី' : 'New Product') }}</span>
        </h1>

        <div class="w-full pt-5 products_swiper px-2 md:px-10 xl:px-20" data-aos="fade-up" data-aos-duration="1400">
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
                                        <div class="w-full h-full">
                                            <img src="{{ asset($firstImage) }}"
                                                class="w-full h-[250px] md:h-[300px] xl:h-[400px] object-cover object-center rounded-xl transition-transform duration-300 group-hover:scale-105" />
                                        </div>
                                    @else
                                        <div class="w-full h-full">
                                            <img src="{{ asset('assets/images/default.jpg') }}"
                                                class="w-full h-[250px] md:h-[300px] xl:h-[400px] object-cover object-center rounded-xl transition-transform duration-300 group-hover:scale-105" />
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
                                            {{ app()->getLocale() === 'en' ? 'More Detail' : (app()->getLocale() === 'km' ? 'More Detail' : 'More Detail') }}
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

    {{-- our product --}}
    <section class="w-full pt-5 px-2 md:px-10 xl:px-20 overflow-hidden">
        <h1 class="text-[20px] md:text-[30px] xl:text-[40px] font-bold text-[#830B00] flex items-end justify-center gap-2 px-2 pb-6 md:pb-10"
            data-aos="fade-right" data-aos-duration="1400">
            <svg class="w-10 h-10 md:w-14 md:h-14" viewBox="-68 0 511 511.94546" xmlns="http://www.w3.org/2000/svg"
                version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev/svgjs">
                <g width="100%" height="100%" transform="matrix(1,0,0,1,0,0)">
                    <path
                        d="m154.046875 511.945312h68.269531c14.136719 0 25.597656-11.460937 25.597656-25.601562v-18.636719c10.191407-3.601562 17.023438-13.21875 17.066407-24.027343v-18.636719c10.191406-3.605469 17.023437-13.222657 17.066406-24.03125v-3.464844c-.132813-26.441406 11.046875-51.683594 30.722656-69.351563 58.328125-51.722656 78.621094-134.113281 50.988281-207.011718-27.636718-72.894532-97.449218-121.1289065-175.410156-121.183594-77.957031-.0546875-147.839844 48.074219-175.582031 120.933594-27.738281 72.855468-7.5625 155.277344 50.691406 207.085937 19.726563 17.71875 30.953125 43.011719 30.859375 69.527344v3.464844c.042969 10.808593 6.875 20.425781 17.066406 24.03125v18.636719c.042969 10.808593 6.875 20.425781 17.066407 24.027343v18.636719c0 6.792969 2.695312 13.300781 7.496093 18.105469 4.800782 4.800781 11.3125 7.496093 18.101563 7.496093zm76.800781-25.601562c0 4.714844-3.820312 8.535156-8.53125 8.535156h-68.269531c-4.710937 0-8.53125-3.820312-8.53125-8.535156v-17.066406h85.332031zm17.066406-42.664062c0 4.710937-3.820312 8.53125-8.53125 8.53125h-102.402343c-4.710938 0-8.53125-3.820313-8.53125-8.53125v-17.066407h119.464843zm-173.132812-128.410157c-36.398438-32.425781-57.234375-78.84375-57.265625-127.589843 0-94.222657 76.351563-170.617188 170.570313-170.667969 3.074218 0 6.152343.078125 9.242187.238281 89.265625 5.898438 159.308594 78.886719 161.519531 168.320312.605469 49.566407-20.347656 96.953126-57.421875 129.859376-23.316406 20.914062-36.578125 50.796874-36.445312 82.117187v3.464844c0 4.714843-3.820313 8.535156-8.53125 8.535156h-136.535157c-4.710937 0-8.53125-3.820313-8.53125-8.535156v-3.464844c.082032-31.386719-13.234374-61.320313-36.601562-82.277344zm0 0"
                        fill="#830b00" fill-opacity="1" data-original-color="#000000ff" stroke="none"
                        stroke-opacity="1" />
                    <path
                        d="m179.648438 51.394531h.511718c2.652344-.167969 5.324219-.25 8.019532-.25 4.714843 0 8.535156-3.820312 8.535156-8.53125 0-4.714843-3.820313-8.535156-8.535156-8.535156-3.027344 0-6.039063.09375-9.035157.265625-4.710937.136719-8.421875 4.066406-8.285156 8.78125.136719 4.710938 4.066406 8.421875 8.78125 8.285156zm0 0"
                        fill="#830b00" fill-opacity="1" data-original-color="#000000ff" stroke="none"
                        stroke-opacity="1" />
                    <path
                        d="m153.671875 46.496094c-.664063-2.164063-2.164063-3.976563-4.167969-5.035156-2.003906-1.058594-4.34375-1.277344-6.507812-.605469-51.730469 16.066406-91.253906 58.070312-104.148438 110.683593-1.109375 4.578126 1.703125 9.1875 6.28125 10.300782.664063.160156 1.339844.238281 2.023438.238281 3.933594-.007813 7.351562-2.703125 8.277344-6.527344 11.480468-46.777343 46.640624-84.117187 92.644531-98.378906 4.492187-1.410156 6.996093-6.183594 5.597656-10.675781zm0 0"
                        fill="#830b00" fill-opacity="1" data-original-color="#000000ff" stroke="none"
                        stroke-opacity="1" />
                    <path
                        d="m333.25 196.210938c4.710938 0 8.53125-3.820313 8.53125-8.53125 0-3.023438-.09375-6.035157-.265625-9.039063-.277344-4.710937-4.324219-8.304687-9.035156-8.027344-4.714844.277344-8.308594 4.324219-8.03125 9.035157.175781 2.664062.265625 5.339843.265625 8.03125 0 4.710937 3.820312 8.53125 8.535156 8.53125zm0 0"
                        fill="#830b00" fill-opacity="1" data-original-color="#000000ff" stroke="none"
                        stroke-opacity="1" />
                    <path
                        d="m239.800781 383.835938c.453125.074218.914063.109374 1.371094.109374 4.183594-.003906 7.746094-3.039062 8.414063-7.167968.882812-5.40625 2.105468-10.75 3.664062-16 6.609375-22.421875 19.363281-42.546875 36.820312-58.09375.34375-.308594.664063-.640625.953126-1 23.035156-20.640625 39.25-47.796875 46.492187-77.867188.824219-3-.050781-6.210937-2.28125-8.378906-2.230469-2.171875-5.464844-2.953125-8.441406-2.042969-2.976563.910157-5.222657 3.367188-5.859375 6.414063-6.769532 28.070312-22.3125 53.253906-44.371094 71.890625-.554688.464843-1.046875 1.003906-1.460938 1.597656-17.972656 17.179687-31.132812 38.769531-38.167968 62.617187-1.773438 5.949219-3.164063 12.003907-4.15625 18.132813-.753906 4.640625 2.386718 9.015625 7.023437 9.789063zm0 0"
                        fill="#830b00" fill-opacity="1" data-original-color="#000000ff" stroke="none"
                        stroke-opacity="1" />
                </g>
            </svg>
            <span
                class="leading-none">{{ app()->getLocale() === 'en' ? 'Our Products' : (app()->getLocale() === 'km' ? 'ផលិតផល​របស់យើងខ្ញុំ' : 'Our Products') }}</span>
        </h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @forelse ($products as $item)
                @php
                    $colors = is_array($item->color) ? $item->color : json_decode($item->color ?? '[]', true);
                @endphp
                <div class=" text-[#580B0C] h-full" data-aos="fade-right" data-aos-duration="1400">
                    <div class="">
                        @php
                            $colors = $item->color ?? [];
                            $firstColor = $colors[0] ?? null;
                            $firstCode = $firstColor['code'] ?? null;
                            $firstName = $firstColor['name'] ?? null;
                            $firstImage = $firstColor['images'][0] ?? null;
                        @endphp
                        <div class="relative w-full rounded-xl overflow-hidden">
                            <!-- Image -->
                            @if ($firstImage)
                                <div class="w-full h-full">
                                    <img src="{{ asset($firstImage) }}"
                                        class="w-full h-[250px] object-cover object-center rounded-xl" />
                                </div>
                            @else
                                <div class="w-full h-full">
                                    <img src="{{ asset('assets/images/default.jpg') }}"
                                        class="w-full h-[250px] object-cover object-center rounded-xl" />
                                </div>
                            @endif

                            <div class="bg-white p-4 text-[16px] md:text-[20px]">
                                <h1>{{ app()->getLocale() === 'en'
                                    ? $item->name_en
                                    : (app()->getLocale() === 'km'
                                        ? $item->name_km
                                        : $item->name_ch) }}
                                </h1>
                                <div class="text-[12px] md:text-[14px] text-[#000]">
                                    {!! app()->getLocale() === 'en'
                                        ? $item->content_en
                                        : (app()->getLocale() === 'km'
                                            ? $item->content_km
                                            : $item->content_ch) !!}
                                </div>

                                <div class="flex justify-end">
                                    <a href="{{ route('product') }}"
                                        class="inline-block px-3 py-1
                                                border border-[#830B00] rounded-full
                                                text-[12px] md:text-[14px] hover:bg-[#830B00] hover:text-[#fff] hover:translate-x-1
                                                transition-all duration-300">


                                        {{ app()->getLocale() === 'en'
                                            ? 'More Product'
                                            : (app()->getLocale() === 'km'
                                                ? 'More Product'
                                                : 'More Product') }}
                                    </a>
                                </div>


                            </div>

                            {{-- @if ($item->status)
                                        <span class="absolute top-2 right-2 bg-green-600 text-white text-[10px] px-2 py-1 rounded">
                                            New
                                        </span>
                                    @endif --}}

                            <!-- Hover button -->
                            {{-- <a href="{{ route('product.show', $item->id) }}"
                            class="absolute inset-0 flex items-center justify-center bg-white bg-opacity-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-xl">
                            <button class="p-10 bg-black/80 text-white">
                                More Detail
                            </button>
                        </a> --}}
                        </div>
                    </div>
                </div>
            @empty
                <p class="col-span-2 text-center text-gray-500 py-10">
                    No items available in this category.
                </p>
            @endforelse
        </div>

    </section>

    {{-- our project --}}
    <section class="relative w-full h-full bg-[#ede8e4] py-10 md:py-14 mt-5">
        <h1 class="text-[20px] md:text-[30px] xl:text-[40px] font-bold text-[#830B00] flex items-end justify-center gap-2 px-2 pb-6 md:pb-10"
            data-aos="fade-right" data-aos-duration="1400">

            <svg class="w-10 h-10 md:w-14 md:h-14" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 482.13 482.13"
                style="enable-background:new 0 0 482.13 482.13;" xml:space="preserve"
                xmlns:svgjs="http://svgjs.dev/svgjs">
                <g width="100%" height="100%" transform="matrix(1,0,0,1,0,0)">
                    <g>
                        <g>
                            <path
                                d="M475.266,126.603c-0.001,0-0.001,0-0.002,0l-0.016-0.016l-31.12-4.44c-4.374-0.623-7.415-4.674-6.792-9.048&#10;&#9;&#9;&#9;c0.299-2.102,1.422-3.998,3.12-5.272l25.152-18.864c3.535-2.651,4.251-7.665,1.6-11.2l-28.8-38.4&#10;&#9;&#9;&#9;c-2.651-3.535-7.665-4.251-11.2-1.6l-25.144,18.864c-3.52,2.671-8.538,1.983-11.209-1.537c-1.297-1.709-1.853-3.868-1.543-5.991&#10;&#9;&#9;&#9;l4.448-31.12c0.627-4.374-2.41-8.427-6.783-9.055c-0.003,0-0.006-0.001-0.009-0.001L339.48,2.139&#10;&#9;&#9;&#9;c-4.373-0.628-8.428,2.408-9.056,6.782c0,0.001,0,0.001,0,0.002l-4.448,31.12c-0.623,4.374-4.674,7.415-9.048,6.792&#10;&#9;&#9;&#9;c-2.102-0.299-3.998-1.422-5.272-3.12L292.8,18.563c-2.651-3.535-7.665-4.251-11.2-1.6l-24.04,18.04&#10;&#9;&#9;&#9;c-10.876-1.156-21.844-1.156-32.72,0C153.614,43.144,97.759,99.946,90.816,171.299c-0.216,2.264-0.296,4.512-0.408,6.76h-2.4&#10;&#9;&#9;&#9;c-3.796,0.007-7.065,2.681-7.824,6.4l-5.528,26.288l-22.144-15.272c-3.178-2.193-7.47-1.802-10.2,0.928l-24,24&#10;&#9;&#9;&#9;c-2.726,2.729-3.116,7.015-0.928,10.192l15.2,22.104l-26.296,5.528c-3.678,0.806-6.296,4.067-6.288,7.832v32&#10;&#9;&#9;&#9;c-0.002,3.784,2.649,7.052,6.352,7.832l26.296,5.528l-15.2,22.104c-2.188,3.177-1.798,7.463,0.928,10.192l24,24&#10;&#9;&#9;&#9;c2.73,2.73,7.022,3.121,10.2,0.928l22.104-15.24l5.528,26.296c0.759,3.719,4.028,6.393,7.824,6.4h32&#10;&#9;&#9;&#9;c3.784,0.002,7.052-2.649,7.832-6.352l5.528-26.296l22.104,15.2c3.177,2.188,7.463,1.798,10.192-0.928l12.424-12.464v22.8&#10;&#9;&#9;&#9;c0.036,11.381,6.133,21.88,16,27.552v44.448c0,17.673,14.327,32,32,32h32c17.673,0,32-14.327,32-32v-44.448&#10;&#9;&#9;&#9;c9.867-5.672,15.964-16.171,16-27.552v-31.664c0.217-13.323,7.187-25.623,18.504-32.656c6.639-4.307,12.935-9.122,18.832-14.4&#10;&#9;&#9;&#9;l-10.672-11.92c-5.275,4.728-10.911,9.037-16.856,12.888c-15.885,9.97-25.609,27.334-25.808,46.088v31.664c0,8.837-7.163,16-16,16&#10;&#9;&#9;&#9;h-64c-8.837,0-16-7.163-16-16v-32.328c-0.185-18.399-9.756-35.428-25.376-45.152c-63.407-39.842-82.511-123.541-42.669-186.948&#10;&#9;&#9;&#9;c24.72-39.341,67.862-63.286,114.325-63.452c-0.119,0.285-0.224,0.576-0.312,0.872c-0.297,2.1,0.253,4.233,1.528,5.928&#10;&#9;&#9;&#9;l18.856,25.144c1.988,2.573,2.179,6.107,0.48,8.88c-1.636,2.79-4.799,4.312-8,3.848l-31.12-4.448&#10;&#9;&#9;&#9;c-4.374-0.627-8.427,2.41-9.055,6.783c0,0.003-0.001,0.006-0.001,0.009l-6.792,47.512c-0.627,4.373,2.41,8.427,6.783,9.055&#10;&#9;&#9;&#9;c0.003,0,0.006,0.001,0.009,0.001l31.12,4.448c4.374,0.623,7.415,4.674,6.792,9.048c-0.299,2.102-1.422,3.998-3.12,5.272&#10;&#9;&#9;&#9;l-25.144,18.856c-3.535,2.651-4.251,7.665-1.6,11.2l28.8,38.4c2.651,3.535,7.665,4.251,11.2,1.6l25.152-18.856&#10;&#9;&#9;&#9;c3.538-2.646,8.552-1.923,11.198,1.616c1.266,1.693,1.811,3.819,1.514,5.912l-4.44,31.12c-0.628,4.373,2.408,8.428,6.782,9.056&#10;&#9;&#9;&#9;c0.001,0,0.001,0,0.002,0l47.52,6.792c0.374,0.048,0.751,0.072,1.128,0.072c3.983,0.005,7.362-2.921,7.928-6.864l4.44-31.12&#10;&#9;&#9;&#9;c0.623-4.374,4.674-7.415,9.048-6.792c2.102,0.299,3.998,1.422,5.272,3.12l18.864,25.144c2.651,3.535,7.665,4.251,11.2,1.6&#10;&#9;&#9;&#9;l38.4-28.8c3.535-2.651,4.251-7.665,1.6-11.2l-18.856-25.144c-1.979-2.577-2.17-6.105-0.48-8.88c1.601-2.827,4.793-4.359,8-3.84&#10;&#9;&#9;&#9;l31.12,4.44c4.373,0.628,8.428-2.409,9.056-6.782c0-0.001,0-0.001,0-0.002l6.784-47.52&#10;&#9;&#9;&#9;C482.676,131.285,479.64,127.231,475.266,126.603z M210.112,410.059h64v16h-64V410.059z M210.112,442.059h64v8&#10;&#9;&#9;&#9;c0,8.837-7.163,16-16,16h-32c-8.837,0-16-7.163-16-16V442.059z M146.424,304.099c4.368,3.572,8.932,6.898,13.672,9.96&#10;&#9;&#9;&#9;c7.559,4.777,13.249,12.004,16.12,20.472l-17.16,17.128l-16.616-11.456c-7.276-5.014-17.239-3.18-22.254,4.096&#10;&#9;&#9;&#9;c-1.202,1.745-2.046,3.711-2.482,5.784l-4.192,19.976H94.496l-4.192-19.944c-1.82-8.647-10.305-14.182-18.952-12.362&#10;&#9;&#9;&#9;c-2.073,0.436-4.039,1.28-5.784,2.482l-16.624,11.424l-14.576-14.544l11.448-16.608c5.019-7.273,3.191-17.237-4.082-22.256&#10;&#9;&#9;&#9;c-1.746-1.205-3.714-2.051-5.79-2.488L16,291.563v-19.008l19.944-4.2c8.644-1.833,14.166-10.326,12.333-18.971&#10;&#9;&#9;&#9;c-0.435-2.051-1.268-3.996-2.453-5.725l-11.456-16.656l14.576-14.544l16.632,11.456c7.279,5.009,17.242,3.169,22.251-4.11&#10;&#9;&#9;&#9;c1.2-1.743,2.042-3.707,2.477-5.778l1.4-6.656c1.282,9.218,3.405,18.298,6.344,27.128c-26.323,3.138-45.118,27.022-41.98,53.345&#10;&#9;&#9;&#9;c3.138,26.323,27.022,45.118,53.345,41.98C125.259,327.934,139.13,318.293,146.424,304.099z M134,292.827&#10;&#9;&#9;&#9;c-5.974,16.605-24.277,25.223-40.882,19.25c-16.605-5.974-25.223-24.277-19.25-40.882c4.57-12.703,16.631-21.164,30.131-21.136&#10;&#9;&#9;&#9;c0.104,0,0.2,0,0.304,0C111.66,265.922,121.707,280.391,134,292.827z M460.512,172.971l-23.2-3.312&#10;&#9;&#9;&#9;c-13.122-1.874-25.278,7.245-27.152,20.366c-0.9,6.301,0.74,12.702,4.56,17.794l14.056,18.744l-25.6,19.2l-14.064-18.736&#10;&#9;&#9;&#9;c-7.952-10.605-22.995-12.756-33.599-4.804c-5.092,3.818-8.459,9.503-9.361,15.804l-3.24,23.232l-31.672-4.528l3.312-23.2&#10;&#9;&#9;&#9;c1.879-13.121-7.235-25.281-20.356-27.159c-6.305-0.903-12.709,0.737-17.804,4.559l-18.744,14.056l-19.2-25.6l18.736-14.064&#10;&#9;&#9;&#9;c10.605-7.952,12.756-22.995,4.804-33.599c-3.818-5.092-9.503-8.459-15.804-9.361l-23.2-3.312l4.528-31.672l23.2,3.312&#10;&#9;&#9;&#9;c13.121,1.879,25.281-7.235,27.159-20.356c0.903-6.305-0.737-12.709-4.559-17.804l-14.104-18.76l25.6-19.2l14.064,18.744&#10;&#9;&#9;&#9;c7.952,10.605,22.995,12.756,33.599,4.804c5.092-3.818,8.459-9.503,9.361-15.804l3.312-23.2l31.672,4.52l-3.312,23.2&#10;&#9;&#9;&#9;c-1.874,13.122,7.244,25.278,20.366,27.152c6.301,0.9,12.702-0.74,17.794-4.56l18.744-14.056l19.2,25.6l-18.744,14.064&#10;&#9;&#9;&#9;c-10.605,7.952-12.756,22.995-4.804,33.599c3.818,5.092,9.503,8.459,15.804,9.361l23.2,3.312L460.512,172.971z"
                                fill="#830b00" fill-opacity="1" data-original-color="#000000ff" stroke="none"
                                stroke-opacity="1" />
                        </g>
                    </g>
                    <g>
                        <g>
                            <path
                                d="M344,76.171c-35.346,0-64,28.654-64,64c0,35.346,28.654,64,64,64c35.346,0,64-28.654,64-64&#10;&#9;&#9;&#9;C407.96,104.841,379.33,76.21,344,76.171z M344,188.171c-26.51,0-48-21.49-48-48s21.49-48,48-48c26.51,0,48,21.49,48,48&#10;&#9;&#9;&#9;C391.969,166.668,370.497,188.14,344,188.171z"
                                fill="#830b00" fill-opacity="1" data-original-color="#000000ff" stroke="none"
                                stroke-opacity="1" />
                        </g>
                    </g>
                    <g>
                        <g>
                            <rect x="234.112" y="354.059" width="16" height="24" fill="#830b00" fill-opacity="1"
                                data-original-color="#000000ff" stroke="none" stroke-opacity="1" />
                        </g>
                    </g>
                    <g>
                        <g>
                            <path
                                d="M207.12,275.491c-49.385-19.292-73.78-74.966-54.487-124.351c7.476-19.136,20.893-35.369,38.279-46.313l-8.552-13.536&#10;&#9;&#9;&#9;c-52.336,32.971-68.035,102.126-35.064,154.462c12.769,20.269,31.701,35.91,54.016,44.626c19.752,7.568,32.795,26.528,32.8,47.68&#10;&#9;&#9;&#9;h16C250.137,310.307,233.035,285.418,207.12,275.491z"
                                fill="#830b00" fill-opacity="1" data-original-color="#000000ff" stroke="none"
                                stroke-opacity="1" />
                        </g>
                    </g>
                    <g>
                        <g>
                            <rect x="394.112" y="298.059" width="56" height="16" fill="#830b00" fill-opacity="1"
                                data-original-color="#000000ff" stroke="none" stroke-opacity="1" />
                        </g>
                    </g>
                    <g>
                        <g>
                            <rect x="402.113" y="334.822"
                                transform="matrix(0.6401 -0.7683 0.7683 0.6401 -133.6437 446.8239)" width="16"
                                height="62.48" fill="#830b00" fill-opacity="1" data-original-color="#000000ff"
                                stroke="none" stroke-opacity="1" />
                        </g>
                    </g>
                    <g>
                        <g>
                            <rect x="346.112" y="362.059" width="16" height="56" fill="#830b00" fill-opacity="1"
                                data-original-color="#000000ff" stroke="none" stroke-opacity="1" />
                        </g>
                    </g>
                    <g>
                        <g>
                            <rect x="9.128" y="130.058" transform="matrix(0.9701 -0.2425 0.2425 0.9701 -32.2251 14.3351)"
                                width="65.968" height="15.992" fill="#830b00" fill-opacity="1"
                                data-original-color="#000000ff" stroke="none" stroke-opacity="1" />
                        </g>
                    </g>
                    <g>
                        <g>
                            <rect x="46.111" y="35.657" transform="matrix(0.5812 -0.8137 0.8137 0.5812 -34.3557 73.3688)"
                                width="15.992" height="68.816" fill="#830b00" fill-opacity="1"
                                data-original-color="#000000ff" stroke="none" stroke-opacity="1" />
                        </g>
                    </g>
                    <g>
                        <g>
                            <rect x="97.938" y="1.024" transform="matrix(0.9688 -0.2477 0.2477 0.9688 -5.133 27.2971)"
                                width="16" height="66.056" fill="#830b00" fill-opacity="1"
                                data-original-color="#000000ff" stroke="none" stroke-opacity="1" />
                        </g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                </g>
            </svg>
            <span
                class="leading-none">{{ app()->getLocale() === 'en' ? 'Our Projects' : (app()->getLocale() === 'km' ? 'គម្រោងរបស់យើងខ្ញុំ' : 'Our Projects') }}</span>
        </h1>

        <div class="pt-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-2 md:gap-4 px-2 md:px-10 xl:px-20"
            data-aos="fade-up" data-aos-duration="1400">
            @foreach ($project as $index => $item)
                @php
                    $images = json_decode($item->image, true);
                @endphp
                @if (($index + 1) % 2 === 1)
                    <div class="relative group w-full h-[250px] sm:h-[300px] xl:h-[400px] rounded-xl overflow-hidden">
                        <!-- Image -->
                        <img src="{{ asset($images[0]) }}"
                            class="w-full h-full object-cover object-center rounded-xl transition-transform duration-300 group-hover:scale-105"
                            alt="">

                        <div
                            class="text-[14px] xl:text-[16px] absolute right-4 top-4 rounded-full bg-white py-1 px-2 xl:px-4">
                            {{ app()->getLocale() === 'en'
                                ? $item->title_en
                                : (app()->getLocale() === 'km'
                                    ? $item->title_km
                                    : $item->title_ch) }}
                        </div>

                        <!-- Hover button -->
                        <a href="{{ route('project.show', $item->slug) }}"
                            class="absolute inset-0 flex items-center justify-center bg-white bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-xl">
                            <button class="p-4 sm:p-10 bg-black/70 text-white text-[14px] md:text-[16px]">
                                {{ app()->getLocale() === 'en' ? 'More Detail' : (app()->getLocale() === 'km' ? 'More Detail' : 'More Detail') }}
                            </button>
                        </a>
                    </div>
                @else
                    <div
                        class="relative group w-full h-[250px] sm:h-[300px] xl:h-[400px] rounded-xl overflow-hidden md:mt-10">
                        <!-- Image -->
                        <img src="{{ asset($images[0]) }}"
                            class="w-full h-full object-cover object-center rounded-xl transition-transform duration-300 group-hover:scale-105"
                            alt="">


                        <div
                            class="text-[14px] xl:text-[16px] absolute right-4 top-4 rounded-full bg-white py-1 px-2 xl:px-4">
                            {{ app()->getLocale() === 'en'
                                ? $item->title_en
                                : (app()->getLocale() === 'km'
                                    ? $item->title_km
                                    : $item->title_ch) }}
                        </div>

                        <!-- Hover button -->
                        <a href="{{ route('project.show', $item->slug) }}"
                            class="absolute inset-0 flex items-center justify-center bg-white bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-xl">
                            <button class="p-4 sm:p-10 bg-black/70 text-white text-[14px] md:text-[16px]">
                                More Detail
                            </button>
                        </a>
                    </div>
                @endif
            @endforeach

        </div>

        <div class="flex items-center justify-center mt-10 text-[#fff]" data-aos="fade-up" data-aos-duration="1400">
            <a href="{{ route('project') }}" class="px-8 py-4 bg-[#01014F] text-[16px] md:text-[20px]">See More
                Projects</a>
        </div>
    </section>

    {{-- client --}}
    <section class="w-full pt-5 px-2 md:px-10 xl:px-20 overflow-hidden pb-5 md:pb-10">
        <h1 class="text-[20px] md:text-[30px] xl:text-[40px] font-bold text-[#830B00] flex items-end justify-center gap-2 px-2 pb-6 md:pb-10"
            data-aos="fade-right" data-aos-duration="1400">

            <svg class="w-10 h-10 md:w-14 md:h-14" id="Layer_1" enable-background="new 0 0 512 512"
                viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" version="1.1"
                xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev/svgjs">
                <g width="100%" height="100%" transform="matrix(1,0,0,1,0,0)">
                    <path
                        d="m177.756 120.221c-1.471 4.527-.023 9.379 3.687 12.362l33.035 26.552-11.119 40.899c-1.248 4.592.433 9.368 4.286 12.17 3.854 2.796 8.913 2.919 12.896.313l35.461-23.213 35.462 23.214c1.912 1.251 4.071 1.873 6.226 1.873 2.336 0 4.667-.731 6.668-2.187 3.855-2.799 5.537-7.578 4.286-12.17l-11.119-40.898 33.033-26.551c3.713-2.982 5.161-7.835 3.689-12.364-1.471-4.53-5.495-7.605-10.25-7.835l-42.333-2.064-15.044-39.622c-1.689-4.451-5.858-7.328-10.619-7.328s-8.93 2.876-10.618 7.327l-15.045 39.624-42.33 2.063c-4.757.23-8.781 3.305-10.252 7.835zm56.396 5.934c4.512-.22 8.463-3.091 10.064-7.313l11.784-31.035 11.784 31.038c1.604 4.221 5.556 7.09 10.064 7.31l33.157 1.617-25.876 20.797c-3.521 2.831-5.029 7.476-3.844 11.832l8.709 32.034-27.776-18.183c-1.889-1.236-4.054-1.854-6.219-1.854s-4.332.619-6.222 1.855l-27.774 18.182 8.709-32.032c1.186-4.359-.323-9.005-3.845-11.834l-25.875-20.796zm13.848-88.797v-29.358c0-4.418 3.582-8 8-8s8 3.582 8 8v29.358c0 4.418-3.582 8-8 8s-8-3.582-8-8zm48.719 47.398c-2.956-3.283-2.691-8.342.592-11.298l32.715-29.458c3.284-2.957 8.342-2.692 11.299.592 2.956 3.283 2.691 8.342-.592 11.298l-32.716 29.458c-1.529 1.377-3.443 2.055-5.351 2.055-2.187 0-4.367-.892-5.947-2.647zm-126.044-40.164c2.956-3.284 8.014-3.549 11.299-.592l32.716 29.458c3.283 2.956 3.548 8.015.592 11.298-1.58 1.754-3.76 2.647-5.948 2.647-1.907 0-3.821-.678-5.351-2.055l-32.716-29.458c-3.284-2.956-3.548-8.015-.592-11.298zm187.959 87.991 33.035 26.552-11.119 40.899c-1.248 4.592.433 9.368 4.286 12.17 3.851 2.796 8.911 2.918 12.896.313l35.461-23.213 35.462 23.214c1.912 1.251 4.071 1.873 6.226 1.873 2.336 0 4.667-.731 6.668-2.187 3.853-2.797 5.535-7.574 4.286-12.17l-11.119-40.898 33.033-26.551c3.712-2.981 5.16-7.834 3.688-12.364-1.471-4.53-5.495-7.605-10.249-7.835l-42.333-2.064-15.043-39.622c-1.689-4.451-5.858-7.328-10.619-7.328-4.762 0-8.931 2.876-10.62 7.327l-15.043 39.623-42.33 2.063c-4.758.23-8.782 3.306-10.253 7.836-1.472 4.529-.024 9.382 3.687 12.362zm52.708-6.428c4.513-.22 8.465-3.091 10.067-7.314l11.783-31.035 11.782 31.034c1.603 4.224 5.555 7.095 10.066 7.314l33.157 1.617-25.873 20.795c-3.523 2.83-5.033 7.476-3.847 11.834l8.709 32.034-27.776-18.183c-1.89-1.236-4.055-1.854-6.22-1.854-2.166 0-4.332.619-6.221 1.855l-27.774 18.182 8.709-32.032c1.185-4.357-.323-9.002-3.845-11.834l-25.875-20.797zm-407.092 6.428 33.035 26.552-11.119 40.899c-1.248 4.592.433 9.368 4.286 12.17 3.854 2.796 8.913 2.919 12.896.313l35.461-23.213 35.462 23.214c1.912 1.251 4.071 1.873 6.226 1.873 2.336 0 4.667-.731 6.668-2.187 3.853-2.797 5.535-7.574 4.286-12.17l-11.119-40.898 33.033-26.551c3.71-2.979 5.159-7.831 3.688-12.369-1.474-4.527-5.498-7.601-10.249-7.831l-42.333-2.064-15.043-39.621c-1.689-4.451-5.858-7.328-10.619-7.328-4.762 0-8.931 2.876-10.62 7.327l-15.043 39.623-42.33 2.063c-4.757.23-8.781 3.306-10.251 7.831-1.475 4.531-.028 9.386 3.685 12.367zm52.708-6.428c4.513-.22 8.465-3.091 10.067-7.314l11.783-31.035 11.782 31.034c1.603 4.224 5.555 7.095 10.066 7.314l33.157 1.617-25.873 20.795c-3.523 2.83-5.033 7.476-3.847 11.834l8.709 32.034-27.776-18.183c-1.89-1.236-4.055-1.854-6.22-1.854-2.166 0-4.332.619-6.221 1.855l-27.774 18.182 8.709-32.032c1.185-4.357-.323-9.002-3.845-11.834l-25.875-20.797zm453.783 298.778c-5.629-18.178-17.158-34.5-32.465-45.962-7.328-5.487-15.308-9.761-23.726-12.787 11.671-9.16 19.191-23.38 19.191-39.333 0-27.566-22.427-49.992-49.992-49.992-27.566 0-49.993 22.426-49.993 49.992 0 15.934 7.502 30.14 19.15 39.301-15.611 5.572-29.441 15.362-40.032 28.554-4.95-6.925-10.66-13.357-17.079-19.162-12.934-11.697-28.113-20.287-44.46-25.364 17.335-11.492 28.795-31.169 28.795-53.48 0-35.36-28.769-64.128-64.129-64.128s-64.129 28.768-64.129 64.128c0 22.311 11.459 41.988 28.794 53.48-16.348 5.076-31.527 13.667-44.461 25.364-6.419 5.805-12.129 12.237-17.078 19.161-10.59-13.193-24.42-22.983-40.032-28.556 11.647-9.161 19.15-23.367 19.15-39.301 0-27.566-22.427-49.992-49.992-49.992-27.566 0-49.993 22.426-49.993 49.992 0 15.952 7.52 30.173 19.19 39.333-8.418 3.026-16.398 7.3-23.727 12.787-15.307 11.461-26.836 27.784-32.465 45.961-2.601 8.396-1.16 16.917 4.057 23.995 5.216 7.076 12.93 10.972 21.72 10.972h110.593v14.438c0 20.77 16.897 37.667 37.667 37.667h161.41c20.769 0 37.667-16.897 37.668-37.667v-14.434h110.592c8.791 0 16.505-3.897 21.72-10.972 5.216-7.078 6.657-15.6 4.056-23.995zm-86.992-132.074c18.743 0 33.992 15.249 33.992 33.992 0 18.744-15.249 33.993-33.992 33.993-18.744 0-33.993-15.249-33.993-33.993 0-18.743 15.249-33.992 33.993-33.992zm-215.877 3.841c0-26.538 21.591-48.128 48.129-48.128s48.129 21.59 48.129 48.128c0 26.53-21.577 48.114-48.103 48.128-.009 0-.019 0-.027 0s-.017 0-.026 0c-26.526-.015-48.102-21.599-48.102-48.128zm-119.619-3.845c18.743 0 33.992 15.249 33.992 33.992 0 18.744-15.249 33.993-33.992 33.993-18.744 0-33.993-15.249-33.993-33.993 0-18.743 15.249-33.992 33.993-33.992zm50.414 151.04h-111.631c-3.682 0-6.656-1.502-8.841-4.466-2.186-2.964-2.741-6.25-1.652-9.767 9.784-31.595 38.603-52.822 71.71-52.822 25.043 0 47.856 12.1 61.887 32.583-5.547 10.776-9.432 22.391-11.473 34.472zm219.706 30.438c-.001 11.947-9.721 21.667-21.668 21.667h-161.41c-11.947 0-21.667-9.72-21.667-21.667v-22.003c5.792-52.188 49.716-91.489 102.346-91.502.009 0 .018.001.027.001s.018-.001.026-.001c52.629.014 96.552 39.314 102.346 91.502zm135.433-34.899c-2.185 2.963-5.158 4.465-8.841 4.465h-111.63c-2.042-12.082-5.927-23.697-11.473-34.474 14.032-20.482 36.844-32.581 61.886-32.581 33.107 0 61.926 21.228 71.71 52.823 1.089 3.515.533 6.801-1.652 9.767z"
                        fill="#830b00" fill-opacity="1" data-original-color="#000000ff" stroke="none"
                        stroke-opacity="1" />
                </g>
            </svg>
            <span
                class="leading-none">{{ app()->getLocale() === 'en' ? 'Our Clients' : (app()->getLocale() === 'km' ? 'អតិថិជន​របស់យើងខ្ញុំ' : 'Our Clients') }}</span>
        </h1>

        <div class="overflow-hidden w-full">
            <div class="flex gap-6 animate-scroll">
                @foreach ($clients as $item)
                    <div
                        class="flex-shrink-0 relative w-[100px] h-[100px] sm:w-[150px] sm:h-[150px] md:w-[200px] md:h-[200px] border border-gray-400 rounded-full shadow overflow-hidden flex items-center justify-center">
                        <img src="{{ asset($item->image) }}" alt="Client {{ $item->order }}"
                            class="w-[80px] md:w-[120px] h-auto object-contain">
                    </div>
                @endforeach

                {{-- duplicate for seamless loop --}}
                @foreach ($clients as $item)
                    <div
                        class="flex-shrink-0 relative w-[100px] h-[100px] sm:w-[150px] sm:h-[150px] md:w-[200px] md:h-[200px] border border-gray-400 rounded-full shadow overflow-hidden flex items-center justify-center">
                        <img src="{{ asset($item->image) }}" alt="Client {{ $item->order }}"
                            class="w-[80px] md:w-[120px] h-auto object-contain">
                    </div>
                @endforeach
            </div>
        </div>

    </section>

    {{-- banner --}}
    <section class="relative w-full h-full py-12 md:py-16 mt-5">
        <div class="absolute inset-0 w-full h-full z-10">
            <img src="{{ asset('assets/images/bg-2.png') }}" alt="" class="w-full h-full object-cover">
        </div>
        <div class="absolute inset-0 w-full h-full bg-[#000]/50 z-20"></div>
        <div class="relative z-30 max-w-7xl mx-auto px-2 md:px-4 text-[#fff] text-center" data-aos="fade-up"
            data-aos-duration="1400">
            <img src="{{ asset('assets/images/logo.png') }}" alt=""
                class="w-24 md:w-32 mx-auto mb-6 object-cover object-center">
            <div class="flex items-center justify-center gap-4">
                <div class="w-24 md:w-32 h-[1px] bg-white"></div>
                <div class="text-[30px] md:text-[50px] font-[300]">
                    V-Arch
                </div>
                <div class="w-24 md:w-32 h-[1px] bg-white"></div>
            </div>
            <h1 class="text-[16px] md:text-[20px] font-[300] uppercase">
                {{ app()->getLocale() === 'en' ? 'LIGHTING UP YOUR HOME' : (app()->getLocale() === 'km' ? 'LIGHTING UP YOUR HOME' : 'LIGHTING UP YOUR HOME') }}
            </h1>
            <p class="text-[20px] md:text-[40px] font-[300] uppercase">
                {{ app()->getLocale() === 'en' ? 'WITH CHARMING LIGHTING' : (app()->getLocale() === 'km' ? 'WITH CHARMING LIGHTING' : 'WITH CHARMING LIGHTING') }}
            </p>
        </div>
    </section>

    {{-- contact form --}}
    <section class="w-full py-10" data-aos="fade-up" data-aos-duration="1400">
        <div x-data="contactForm()" class="w-full max-w-3xl mx-auto px-2">

            <form @submit.prevent="submitForm" class="space-y-4">
                @csrf
                <h2 class="text-[20px] md:text-[30px] xl:text-[40px] text-center font-bold text-[#830B00] mb-6">
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

                <button type="submit" class="w-full bg-[#830B00] text-white py-2 font-semibold hover:bg-red-900">
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

@section('js')
    <script>
        const timeline = document.getElementById('timeline-line');
        const wrapper = document.getElementById('timeline-wrapper');

        window.addEventListener('scroll', () => {
            const wrapperRect = wrapper.getBoundingClientRect();
            const windowHeight = window.innerHeight;

            // How much of timeline is visible
            const progress = Math.min(
                Math.max(windowHeight - wrapperRect.top, 0),
                wrapperRect.height
            );

            timeline.style.height = progress + 'px';
        });
    </script>
@endsection
