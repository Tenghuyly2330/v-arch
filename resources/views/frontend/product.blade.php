@extends('layouts.master')
@section('title')
    <title>Our Product | V-arch</title>
@endsection
@section('css')
    <style>
        .active {
            background-color: #830B00 !important;
            color: white !important;
        }
    </style>
@endsection
@section('content')
    {{-- <x-loading /> --}}
    <x-scroll-top-button />

    <section class="relative w-full min-h-screen bg-cover bg-center pb-10"
        style="background-image: url({{ asset($banners->image) }});">
        <div class="relative flex flex-col w-full h-full px-4 text-center text-[#000] pt-20 lg:pt-40">
            <img src="{{ asset('assets/images/logo-black.png') }}" alt="" class="w-48 md:w-64 mx-auto"
                data-aos="fade-up" data-aos-duration="1200">
            <p class="mt-4 text-[30px] md:text-[50px] text-black font-[700] max-w-[500px] mx-auto" data-aos="fade-right"
                data-aos-duration="1400">
                Product Category
            </p>

            <div class="w-full overflow-x-auto overflow-y-visible eb" data-aos="fade-up" data-aos-duration="1400">
                <div
                    class="max-w-7xl mx-auto mt-10
                        cursor-pointer text-[14px] lg:text-[16px] font-[500]
                        flex flex-nowrap md:flex-wrap
                        items-center justify-start md:justify-center
                        gap-3
                        py-3">

                    <div
                        class="cursor-pointer text-[16px] lg:text-[18px] font-[500] flex flex-nowrap md:flex-wrap items-center justify-start md:justify-center space-x-4 space-y-4 overflow-x-auto py-2">
                        <!-- "All" button -->
                        <p class="filter-btn border border-[#830B00] rounded-[5px] px-6 py-1 flex-shrink-0 mt-4 {{ request('category') === null || request('category') === 'all' ? 'active' : '' }}"
                            data-category="all" onclick="filterProducts(event)">
                            {{ __('message.all') }}
                        </p>

                        @foreach ($categories as $c)
                            <p class="filter-btn border border-[#830B00] rounded-[5px] px-6 py-1 mt-0 flex-shrink-0 {{ request('category') === $c->slug ? 'active' : '' }}"
                                data-category="{{ $c->slug }}" onclick="filterProducts(event)">
                                {{ app()->getLocale() === 'en' ? $c->name_en : (app()->getLocale() === 'km' ? $c->name_km : $c->name_ch) }}
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>

        <div id="product-list">
            @include('frontend.partials.product-list', ['products' => $products])
        </div>


        <div class="w-full max-w-7xl mx-auto px-4" id="customized_products" data-aos="fade-right" data-aos-duration="1400">
            <p class="mt-4 text-[30px] md:text-[50px] text-[#000] font-[700] text-center">
                Customized Products
            </p>
            <div class="mt-6 md:mt-10">
                <img src="{{ asset('assets/images/customize-1.png') }}" alt="">
            </div>
        </div>

        <section class="w-full py-10" data-aos="fade-up" data-aos-duration="1400">
            <div x-data="contactForm()" class="w-full max-w-3xl mx-auto px-2">

                <form @submit.prevent="submitForm" class="space-y-4">
                    @csrf
                    <h2 class="text-center text-[30px] md:text-[50px] font-bold text-[#000] mb-6 md:mb-10">
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
        function filterProducts(event) {
            event.preventDefault();

            const category = event.currentTarget.dataset.category;

            // Update active class
            document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
            event.currentTarget.classList.add('active');

            // Fetch products
            fetch(`?category=${category}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(res => res.text())
                .then(html => {
                    document.getElementById('product-list').innerHTML = html;
                    history.pushState(null, '', `?category=${category}&page=1`);
                    window.scrollTo({
                        // top: 0,
                        behavior: 'smooth'
                    });
                })
                .catch(err => console.error(err));
        }

        // Handle AJAX pagination
        document.addEventListener('click', function(e) {
            const link = e.target.closest('.pagination a');
            if (!link) return;

            e.preventDefault();

            fetch(link.href, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(res => res.text())
                .then(html => {
                    document.getElementById('product-list').innerHTML = html;
                    history.pushState(null, '', link.href);
                    window.scrollTo({
                        // top: 0,
                        behavior: 'smooth'
                    });

                    // Update active category after pagination
                    const urlParams = new URL(link.href).searchParams;
                    const category = urlParams.get('category') || 'all';
                    document.querySelectorAll('.filter-btn').forEach(btn => {
                        btn.classList.toggle('active', btn.dataset.category === category);
                    });
                })
                .catch(err => console.error(err));
        });

        // Optional: handle browser back/forward buttons
        window.addEventListener('popstate', function() {
            const url = window.location.href;
            fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(res => res.text())
                .then(html => {
                    document.getElementById('product-list').innerHTML = html;

                    // Update active category
                    const urlParams = new URL(url).searchParams;
                    const category = urlParams.get('category') || 'all';
                    document.querySelectorAll('.filter-btn').forEach(btn => {
                        btn.classList.toggle('active', btn.dataset.category === category);
                    });
                });
        });
    </script>
@endsection
