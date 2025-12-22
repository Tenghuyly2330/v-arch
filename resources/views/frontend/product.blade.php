@extends('layouts.master')
@section('title')
    <title>Our Product | V-arch</title>
@endsection
@section('css')
    <style>
        .active {
            background-color: #DD483A !important;
            color: white !important;
        }
    </style>
@endsection
@section('content')
    {{-- <x-loading /> --}}
    <x-scroll-top-button />

    <section class="relative w-full min-h-screen bg-cover bg-center pb-10"
        style="background-image: url('{{ asset('assets/images/pro_bg.png') }}');">
        <div class="relative flex flex-col w-full h-full px-4 text-center text-white pt-20 lg:pt-40">
            <img src="{{ asset('assets/images/logo.png') }}" alt="" class="w-16 md:w-32 mx-auto">
            <p class="mt-4 text-[30px] md:text-[50px] text-white/50 font-[700] max-w-[500px] mx-auto">
                Product Category
            </p>

            <div class="w-full overflow-x-auto overflow-y-visible">
                <div
                    class="max-w-7xl mx-auto mt-10
               cursor-pointer text-[14px] md:text-[16px] font-[500]
               flex flex-nowrap md:flex-wrap
               items-center justify-start md:justify-center
               gap-3
               py-3">

                    <div
                        class="cursor-pointer text-[14px] md:text-[16px] font-[500] flex flex-nowrap md:flex-wrap items-center justify-start md:justify-center space-x-4 space-y-4 overflow-x-auto py-2">
                        <!-- "All" button -->
                        <p class="filter-btn border border-[#DD483A] rounded-[5px] px-4 py-1 flex-shrink-0 mt-4 {{ request('category') === null || request('category') === 'all' ? 'active' : '' }}"
                            data-category="all" onclick="filterProducts('all')"> {{ __('message.all') }} </p>
                        @foreach ($categories as $c)
                            <p class="filter-btn border border-[#DD483A] rounded-[5px] px-4 py-1 mt-0 flex-shrink-0 {{ request('category') === $c->slug ? 'active' : '' }}"
                                data-category="{{ $c->slug }}" onclick="filterProducts('{{ $c->slug }}')">
                                {{ app()->getLocale() === 'en' ? $c->name_en : (app()->getLocale() === 'km' ? $c->name_km : $c->name_ch) }}
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>

        <div id="product_in_stock"
            class="max-w-7xl mx-auto grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-2 md:gap-4 pt-6 md:pt-10 px-2 xl:px-0">
            @forelse ($products as $item)
                @php
                    $colors = is_array($item->color) ? $item->color : json_decode($item->color ?? '[]', true);
                @endphp
                <div class="relative text-[#580B0C] text-[16px] xl:text-[20px] text-center flex flex-col items-center justify-start"
                    data-category="{{ $item->slug }}">
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
                            <div class="w-full h-[200px] sm:h-[250px] md:h-[300px]">
                                <img src="{{ asset($firstImage) }}" class="w-full h-full object-cover object-center rounded-xl transition-transform duration-300 group-hover:scale-105" />
                            </div>
                        @else
                            <div class="w-full h-[200px] sm:h-[250px] md:h-[300px]">
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
                        <a href="{{ route('product.show', $item->id) }}"
                            class="absolute inset-0 flex items-center justify-center bg-white bg-opacity-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-xl">
                            <button class="p-4 md:p-10 bg-black/80 text-white">
                                More Detail
                            </button>
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-center text-white py-10">
                    No Products available in this category.
                </p>
            @endforelse
        </div>
        <div class="max-w-7xl mx-auto pagination-links py-5">
            {{ $products->appends(['category' => request('category')])->links() }}
        </div>

        <div class="w-full max-w-7xl mx-auto px-4" id="customized_products">
            <p class="mt-4 text-[30px] md:text-[50px] text-white/50 font-[700] text-center">
                Customized Products
            </p>
            <div class="mt-6 md:mt-10">
                <img src="{{ asset('assets/images/customize.png') }}" alt="">
            </div>
        </div>

        <section class="w-full py-10">
            <div x-data="contactForm()" class="w-full max-w-3xl mx-auto px-2">

                <form @submit.prevent="submitForm" class="space-y-4">
                    @csrf
                    <h2 class="text-center text-[30px] md:text-[50px] font-bold text-[#fff] mb-6 md:mb-10">
                        {{ app()->getLocale() === 'en'
                            ? 'Request Quotation'
                            : (app()->getLocale() === 'km'
                                ? 'Request Quotation'
                                : 'Request Quotation') }}
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
                            <p class="text-xs text-[#5796FF]">
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
    </section>
@endsection
@section('js')
    <script>
        function filterProducts(category) {
            let url = new URL(window.location.href);
            url.searchParams.set('category', category); // Update the category in the URL
            url.searchParams.set('page', 1); // Always reset to page 1

            // Update the URL and reload the page
            window.location.href = url.toString();
        }
    </script>
@endsection
