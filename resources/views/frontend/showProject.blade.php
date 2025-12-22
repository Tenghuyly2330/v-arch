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

    <section class="relative w-full min-h-screen bg-cover bg-center pb-10 px-2  "
        style="background-image: url('{{ asset('assets/images/pro_bg.png') }}');">
        <div class="relative flex flex-col w-full h-full px-4 text-center text-white pt-20 lg:pt-40">
            <img src="{{ asset('assets/images/logo.png') }}" alt="" class="w-16 md:w-32 mx-auto">
            <p class="mt-4 text-[30px] md:text-[50px] text-white/50 font-[700] max-w-[500px] mx-auto">
                Our Project
            </p>
        </div>

        <div class="w-full max-w-7xl mx-auto p-4 bg-white mt-10">
            @php
                $project_image = json_decode($project->image, true) ?? [];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-12 items-center gap-6 md:gap-x-20 w-full">
                {{-- Image --}}
                <div class="md:col-span-6 w-full h-full">
                    <div class="swiper ProjectSwiper w-full h-full">
                        <div class="swiper-wrapper w-full h-full">
                            @foreach ($project_image as $img)
                                <div class="swiper-slide w-full h-full">
                                    <img src="{{ asset($img) }}" alt="" loading="lazy"
                                        class="w-full h-[350px] md:h-[400px] object-contain object-center cursor-pointer">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                {{-- Text --}}
                <div class="md:col-span-6 w-full p-2">
                    <h1 class="text-[20px] md:text-[25px] font-semibold text-gradient mb-4">
                        {{ app()->getLocale() === 'en'
                            ? $project->title_en
                            : (app()->getLocale() === 'km'
                                ? $project->title_km
                                : $project->title_ch) }}
                    </h1>
                    <div class="prose prose-p:m-0 prose-p:text-[#000]">
                        {!! app()->getLocale() === 'en'
                            ? $project->content_en
                            : (app()->getLocale() === 'km'
                                ? $project->content_km
                                : $project->content_ch ) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
