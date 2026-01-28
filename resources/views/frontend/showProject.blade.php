@extends('layouts.master')
@section('title')
    <title>Project Detail | V-arch</title>
@endsection
@section('css')
    <style>
        .active {
            background-color: #580B0C !important;
            color: white !important;
        }
    </style>
@endsection
@section('content')
    {{-- <x-loading /> --}}
    <x-scroll-top-button />

    <section class="relative w-full min-h-screen bg-cover bg-center pb-10 px-2"
        style="background-image: url({{ asset($banners->image) }});">
        <div class="relative flex flex-col w-full h-full px-4 text-center text-white pt-20 lg:pt-40" data-aos="fade-right"
            data-aos-duration="1200">
            <img src="{{ asset('assets/images/logo-black.png') }}" alt="" class="w-48 md:w-64 mx-auto">
            {{-- <p class="mt-4 text-[30px] md:text-[50px] text-[#000] font-[700] max-w-[500px] mx-auto">
                Our Project
            </p> --}}
        </div>

        <div class="w-full max-w-7xl mx-auto bg-white/40 backdrop-blur-md mt-10 px-2 py-6 lg:p-20 rounded-md eb" data-aos="fade-up"
            data-aos-duration="1400">
            @php
                $project_image = json_decode($project->image, true) ?? [];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 items-center relative w-full">
                {{-- Image --}}
                <div class="w-full h-full px-4 py-10 md:p-4">
                    <div class="swiper ProjectSwiper w-full h-full">
                        <div class="swiper-wrapper w-full h-full">
                            @foreach ($project_image as $img)
                                <div class="swiper-slide w-full h-full">
                                    <img src="{{ asset($img) }}" alt="" loading="lazy"
                                        class="w-full h-[350px] md:h-[400px] object-cover object-center cursor-pointer">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                {{-- Text --}}
                <div class="w-full h-full px-4 pt-10 pb-20 md:p-10">
                    <h1 class="text-[20px] lg:text-[30px] font-semibold text-[#DD483A] mb-4">
                        {{ app()->getLocale() === 'en' ? $project->title_en : (app()->getLocale() === 'km' ? $project->title_km : $project->title_ch) }}
                    </h1>
                    <hr class="h-[1px] my-4 lg:my-8 bg-black border-none">
                    <div>
                        <h1 class="text-[16px] md:text-[20px] font-[500] mb-2">Project Details :</h1>
                        <div class="prose prose-p:m-0 prose-p:text-[#000] text-[#000] font-[300]">
                            {!! app()->getLocale() === 'en' ? $project->content_en : (app()->getLocale() === 'km' ? $project->content_km : $project->content_ch) !!}
                        </div>
                    </div>
                </div>


            </div>

            <div class="absolute right-4 top-4">
                <a href="{{ route('project') }}" class="cursor-pointer">
                    <svg class="w-6 h-6 lg:w-8 lg:h-8" viewBox="0 0 75 75" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect x="16.9707" y="20.5061" width="5" height="53" transform="rotate(-45 16.9707 20.5061)"
                            fill="#000" />
                        <rect x="54.4473" y="16.9706" width="5" height="53" transform="rotate(45 54.4473 16.9706)"
                            fill="#000" />
                    </svg>
                </a>
            </div>

            <div class="absolute right-4 bottom-6">
                <a href="https://t.me/limvandara_lighting"
                    class="cursor-pointer px-8 py-2 text-[14px] md:text-[16px] bg-white">
                    Contact
                </a>
            </div>
        </div>
    </section>
@endsection
