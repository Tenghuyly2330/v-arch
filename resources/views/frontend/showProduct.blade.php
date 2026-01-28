@extends('layouts.master')
@section('title')
    <title>Product Detail | V-arch</title>
@endsection
@section('css')
    <style>
        .content-text strong {
            font-size: 16px;
            color: #000;
        }

        .content-text p {
            font-size: 16px;
            font-weight: 300;
        }

        .content-text ul {
            list-style-type: disc;
            padding-left: 1.25rem;
            font-size: 14px;
            font-weight: 300;
        }

        @media (max-width: 767px) {
            .content-text strong {
                font-size: 14px;
                color: #000;
            }

            .content-text p {
                font-size: 14px;
            }


            .content-text ul {
                list-style-type: disc;
                padding-left: 1.25rem;
                font-size: 12px;
            }
        }
    </style>
@endsection
@section('content')
    {{-- <x-loading /> --}}
    <x-scroll-top-button />

    <section class="relative w-full min-h-screen bg-cover bg-center pb-10 px-2"
        style="background-image: url({{ asset($banners->image) }});">

        <div class="relative flex flex-col w-full h-full px-4 text-center text-white pt-20 lg:pt-40" data-aos="fade-up"
            data-aos-duration="1400">
            <img src="{{ asset('assets/images/logo-black.png') }}" alt="" class="w-48 md:w-64 mx-auto">
        </div>

        <section class="px-4 py-4 2xl:py-10" data-aos="fade-up" data-aos-duration="1400" x-data="{
            colors: {{ json_encode(is_array($product->color) ? $product->color : json_decode($product->color ?? '[]', true)) }},
            selectedColorIndex: 0,
            selectedSize: null,
            slideIndex: 0,
            interval: null,
            startX: 0,
            endX: 0,
            qty: 1,
            lightboxOpen: false,
            lightboxIndex: 0,

            showToast: false,
            toastMessage: '',


            get selectedColor() {
                return this.colors?.[this.selectedColorIndex] || null;
            },

            resetSlide() {
                this.slideIndex = 0;
            },

            nextSlide() {
                if (this.selectedColor?.images?.length > 1) {
                    this.slideIndex = (this.slideIndex + 1) % this.selectedColor.images.length;
                }
            },

            prevSlide() {
                if (this.selectedColor?.images?.length > 1) {
                    this.slideIndex = (this.slideIndex - 1 + this.selectedColor.images.length) % this.selectedColor.images.length;
                }
            },

            startAutoSlide() {
                if (this.interval) clearInterval(this.interval);
                if (this.selectedColor?.images?.length > 1) {
                    this.interval = setInterval(() => this.nextSlide(), 4000);
                }
            },

            handleTouchStart(e) {
                this.startX = e.touches ? e.touches[0].clientX : e.clientX;
            },

            handleTouchMove(e) {
                this.endX = e.touches ? e.touches[0].clientX : e.clientX;
            },

            handleTouchEnd() {
                const diff = this.endX - this.startX;
                if (Math.abs(diff) > 50) {
                    diff > 0 ? this.prevSlide() : this.nextSlide();
                }
            },

            openLightbox(index) {
                this.lightboxIndex = index;
                this.lightboxOpen = true;
            },

            closeLightbox() {
                this.lightboxOpen = false;
            }
        }"
            x-init="startAutoSlide();
            $watch('selectedColorIndex', () => {
                resetSlide();
                startAutoSlide();
            })">
            <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-4 px-2 py-6 lg:p-20 bg-white/40 backdrop-blur-md rounded-md relative drop-shadow-xl eb">
                <!-- IMAGE SLIDER -->
                <div class="relative flex flex-col items-center select-none pt-10 md:p-4">
                    <div class="relative w-full overflow-hidden cursor-pointer"
                        @mouseenter="if (interval) clearInterval(interval)" @mouseleave="startAutoSlide()"
                        @mousedown="handleTouchStart($event)" @mousemove="handleTouchMove($event)"
                        @mouseup="handleTouchEnd()" @touchstart="handleTouchStart($event)"
                        @touchmove="handleTouchMove($event)" @touchend="handleTouchEnd()">

                        <!-- Images -->
                        <template x-if="selectedColor && selectedColor.images && selectedColor.images.length > 0">
                            <div class="relative w-full h-[350px] md:h-[500px] overflow-hidden">
                                <template x-for="(img, i) in selectedColor.images" :key="i">
                                    <img :src="img.startsWith('http') ? img : '{{ asset('') }}' + (img.startsWith('/') ? img
                                        .substring(1) : img)"
                                        :alt="selectedColor.name"
                                        class="absolute inset-0 w-full h-full object-cover transition-opacity duration-700"
                                        :class="i === slideIndex ? 'opacity-100' : 'opacity-0'" @click="openLightbox(i)">
                                </template>
                            </div>
                        </template>


                        <!-- Fallback -->
                        <template x-if="!selectedColor || !selectedColor.images || selectedColor.images.length === 0">
                            <img src="{{ asset('assets/images/default.jpg') }}"
                                class="w-full h-[350px] lg:h-[500px] object-cover rounded">
                        </template>
                    </div>

                    <!-- Pagination -->
                    <template x-if="selectedColor && selectedColor.images && selectedColor.images.length > 1">
                        <div class="flex justify-center gap-2 mt-4">
                            <template x-for="(img, i) in selectedColor.images" :key="i">
                                <div @click="slideIndex = i"
                                    class="h-[3px] rounded-full cursor-pointer transition-all duration-300"
                                    :class="i === slideIndex ? 'bg-black w-4' : 'bg-gray-300 w-2 hover:bg-gray-400'"></div>
                            </template>
                        </div>
                    </template>
                </div>

                <!-- LIGHTBOX POPUP -->
                {{-- <div x-show="lightboxOpen" x-transition.opacity x-cloak
                    class="fixed inset-0 z-50 bg-black/80 flex flex-col justify-center items-centera"
                    @click.self="closeLightbox()">

                    <button @click="closeLightbox()" class="absolute top-4 right-4 text-white text-3xl">&times;</button>

                    <div class="max-w-4xl w-full">
                        <img :src="selectedColor.images[lightboxIndex]" class="w-full h-[500px] object-contain mb-4">

                        <!-- Thumbnails -->
                        <div class="flex gap-2 justify-center overflow-x-auto">
                            <template x-for="(img, i) in selectedColor.images" :key="i">
                                <img :src="img" class="w-20 h-20 object-cover border-2 cursor-pointer"
                                    :class="i === lightboxIndex ? 'border-white' : 'border-gray-400'"
                                    @click="lightboxIndex = i">
                            </template>
                        </div>
                    </div>
                </div> --}}

                <!-- ITEM DETAILS -->
                <div class="text-center px-4 pt-10 pb-20 md:p-10">
                    @if ($product->status)
                        <p class="text-[14px] lg:text-[16px] text-[#DD483A] font-[300] mb-2">
                            {{ app()->getLocale() === 'en' ? 'New Product' : (app()->getLocale() === 'km' ? 'ផលិតផល​ ថ្មី' : 'New Product') }}
                        </p>
                    @endif
                    <h1 class="text-[30px] lg:text-[40px] font-[600] capitalize text-[#000]">
                        {{ app()->getLocale() === 'en' ? $product->name_en : (app()->getLocale() === 'km' ? $product->name_km : $product->name_ch) }}
                    </h1>

                    <hr class="h-[1px] my-4 lg:my-8 bg-black border-none">

                    <!-- Color Options -->
                    <div class="text-[#000] text-center">
                        <p class="text-[16px] md:text-[20px] font-[400] mb-2">Colors :</p>
                        <div class="flex gap-3 flex-wrap justify-center">
                            <template x-for="(color, index) in colors" :key="index">
                                <button class="flex items-center gap-1 rounded-full border text-sm transition-all"
                                    :class="index === selectedColorIndex ? 'border-black border-2 text-white' :
                                        'hover:border-black'"
                                    @click="selectedColorIndex = index; resetSlide();">
                                    <span class="w-8 h-8 border rounded-full"
                                        :style="`background-color: ${color.code}`"></span>
                                </button>
                            </template>
                        </div>
                    </div>

                    <hr class="h-[1px] my-4 lg:my-8 bg-black border-none">

                    @if (!empty($product->content_en))
                        <div class="text-[#000]">
                            <h1 class="text-[16px] md:text-[20px] font-[500] mb-2">Description :</h1>
                            <div class="text-[#000] mt-2 content-text font-[300]">
                                {!! app()->getLocale() === 'en' ? $product->content_en : (app()->getLocale() === 'km' ? $product->content_km : $product->content_ch) !!}
                            </div>
                        </div>
                    @endif

                </div>

                <div class="absolute right-4 top-4 ">
                    <a href="{{ route('product') }}" class="cursor-pointer">
                        <svg class="w-6 h-6 lg:w-8 lg:h-8" viewBox="0 0 75 75" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="16.9707" y="20.5061" width="5" height="53"
                                transform="rotate(-45 16.9707 20.5061)" fill="#000" />
                            <rect x="54.4473" y="16.9706" width="5" height="53"
                                transform="rotate(45 54.4473 16.9706)" fill="#000" />
                        </svg>
                    </a>
                </div>

                <div class="absolute right-4 bottom-6 hover:-translate-x-2 transition-all duration-300">
                    <a href="https://t.me/limvandara_lighting" class="cursor-pointer px-8 py-2 text-[14px] md:text-[16px] bg-white">
                        Contact
                    </a>
                </div>
            </div>
        </section>
    </section>

    <!-- RELATED ITEMS -->
    <section class="px-4 py-12 border-t">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-[20px] md:text-[30px] xl:text-[40px] font-bold text-[#830B00] mb-6 text-center"
                data-aos="fade-right" data-aos-duration="1400">
                {{ app()->getLocale() === 'en'
                    ? 'Similar Products'
                    : (app()->getLocale() === 'km'
                        ? 'Similar Products'
                        : 'Similar Products') }}
            </h2>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6" data-aos="fade-up" data-aos-duration="1400">
                @forelse ($relatedItems as $related)
                    @php
                        $colors = is_array($related->color)
                            ? $related->color
                            : json_decode($related->color ?? '[]', true);
                    @endphp


                    <div class="border rounded overflow-hidden relative">
                        @php
                            $colors = $related->color ?? [];
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
                                        class="w-full h-full object-cover object-center rounded-xl transition-transform duration-300 group-hover:scale-105" />
                                </div>
                            @else
                                <div class="w-full h-52 lg:h-64">
                                    <img src="{{ asset('assets/images/default.jpg') }}"
                                        class="w-full h-full object-cover object-center rounded-xl transition-transform duration-300 group-hover:scale-105" />
                                </div>
                            @endif
                            {{-- @if ($item->status)
                            <span class="absolute top-2 right-2 bg-green-600 text-white text-[10px] px-2 py-1 rounded">
                                New
                            </span>
                        @endif --}}

                            <!-- Hover button -->
                            <a href="{{ route('product.show', $related->id) }}"
                                class="absolute inset-0 flex items-center justify-center bg-white bg-opacity-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-xl">
                                <button class="p-10 bg-black/80 text-white">
                                    More Detail
                                </button>
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="col-span-2 text-center text-gray-500 py-10">
                        No related Products available in this category.
                    </p>
                @endforelse
            </div>
        </div>
    </section>
@endsection
