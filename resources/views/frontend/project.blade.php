@extends('layouts.master')
@section('title')
    <title>Our Project | V-arch</title>
@endsection
@section('content')
    {{-- <x-loading /> --}}
    <x-scroll-top-button />

    <section class="relative w-full min-h-screen bg-cover bg-center pb-10"
        style="background-image: url({{ asset($banners->image) }});">
        <div class="relative flex flex-col w-full h-full px-4 text-center text-[#000] pt-20 lg:pt-40 pb-10 ">
            <img src="{{ asset('assets/images/logo-black.png') }}" alt="" class="w-48 md:w-64 mx-auto" data-aos="fade-right" data-aos-duration="1200">
            <p class="mt-4 text-[30px] md:text-[50px] text-[#000] font-[700] max-w-[500px] mx-auto" data-aos="fade-right" data-aos-duration="1400">
                {{ app()->getLocale() === 'en' ? 'Our Projects' : (app()->getLocale() === 'km' ? 'គម្រោងរបស់យើងខ្ញុំ' : 'Our Projects') }}
            </p>
        </div>

        <div class="max-w-7xl mx-auto pt-5 grid grid-cols-2 lg:grid-cols-4 gap-2 md:gap-4 px-2 md:px-4" data-aos="fade-up" data-aos-duration="1200">
            @foreach ($project as $index => $item)
                @php
                    $images = json_decode($item->image, true);
                @endphp
                <div class="relative group w-full h-[200px] sm:h-[250px] md:h-[300px] rounded-xl overflow-hidden">
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
                        <button class="p-4 md:p-10 bg-black/70 text-white">
                            More Detail
                        </button>
                    </a>
                </div>
            @endforeach

        </div>
    </section>
@endsection
