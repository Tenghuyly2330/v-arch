@extends('layouts.master')
@section('title')
    <title>Our Project | V-arch</title>
@endsection
@section('content')
    {{-- <x-loading /> --}}
    <x-scroll-top-button />

    <section class="relative w-full min-h-screen bg-cover bg-center pb-10"
        style="background-image: url('{{ asset('assets/images/pro_bg.png') }}');">
        <div class="relative flex flex-col w-full h-full px-4 text-center text-white lg:pt-40 pb-10 ">
            <img src="{{ asset('assets/images/logo.png') }}" alt="" class="w-32 mx-auto">
            <p class="mt-4 text-[30px] md:text-[50px] text-white/50 font-[700] max-w-[500px] mx-auto">
                {{ app()->getLocale() === 'en' ? 'Our Projects' : (app()->getLocale() === 'km' ? 'គម្រោងរបស់យើងខ្ញុំ' : 'Our Projects') }}
            </p>
        </div>

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
                        <button class="p-4 md:p-10 bg-black/70 text-white">
                            More Detail
                        </button>
                    </a>
                </div>
            @endforeach

        </div>
    </section>
@endsection
