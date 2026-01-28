<nav class="w-full max-w-7xl mx-auto px-2 absolute top-0 left-0 right-0 z-20 flex items-center justify-between lg:block">

    {{-- <div x-data="{ open: false }" class="relative text-[14px] py-4">

        <!-- Current Language Button -->
        <button @click="open = !open" class="flex items-center gap-1 text-white px-4">
            <img src="{{ $locale === 'en'
                ? asset('assets/images/icons/usa-flag.png')
                : ($locale === 'km'
                    ? asset('assets/images/icons/kh-flag.png')
                    : asset('assets/images/icons/cn-flag.png')) }}"
                class="w-6 h-6 rounded-full">

            <span>
                {{ $locale === 'en' ? 'English' : ($locale === 'km' ? 'ភាសាខ្មែរ' : '中文') }}
            </span>

            <svg class="w-3 h-3 transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        <!-- Dropdown -->
        <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 translate-y-2 scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
            x-transition:leave-end="opacity-0 translate-y-2 scale-95"
            class="absolute right-0 mt-2 w-44 bg-white rounded shadow-lg py-2 z-50" style="display: none;">

            <!-- EN -->
            @if ($locale !== 'en')
                <a href="{{ route('lang.switch', 'en') }}" class="flex items-center gap-2 px-3 py-2 hover:bg-gray-100">
                    <img src="{{ asset('assets/images/icons/usa-flag.png') }}" class="w-5 h-5 rounded-full">
                    <span>
                        {{ $locale === 'km' ? 'ភាសាអង់គ្លេស' : ($locale === 'cn' ? '英语' : 'English') }}
                    </span>
                </a>
            @endif

            <!-- KM -->
            @if ($locale !== 'km')
                <a href="{{ route('lang.switch', 'km') }}" class="flex items-center gap-2 px-3 py-2 hover:bg-gray-100">
                    <img src="{{ asset('assets/images/icons/kh-flag.png') }}" class="w-5 h-5 rounded-full">
                    <span>
                        {{ $locale === 'en' ? 'Khmer' : ($locale === 'cn' ? '高棉语' : 'ភាសាខ្មែរ') }}
                    </span>
                </a>
            @endif

            <!-- CN -->
            @if ($locale !== 'ch')
                <a href="{{ route('lang.switch', 'ch') }}" class="flex items-center gap-2 px-3 py-2 hover:bg-gray-100">
                    <img src="{{ asset('assets/images/icons/ch-flag.png') }}" class="w-5 h-5 rounded-full">
                    <span>
                        {{ $locale === 'en' ? 'Chinese' : ($locale === 'km' ? 'ភាសាចិន' : '中文') }}
                    </span>
                </a>
            @endif

        </div>
    </div> --}}

    <div class="flex lg:hidden" x-data="{ menuOpen: false }">
        <button @click="menuOpen = true" class="lg:hidden flex items-center p-2 rounded-md bg-[#000]">
            <!-- Hamburger Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 text-[#fff]">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.75h16.5M3.75 12h16.5M3.75 18.25h16.5" />
            </svg>
        </button>

        <div x-show="menuOpen" x-cloak x-transition:enter="transform transition ease-out duration-300"
            x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transform transition ease-in duration-200" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
            class="fixed inset-y-0 right-0 w-full md:w-72 bg-[#fff] shadow-xl z-50">
            <div class="flex justify-between items-center p-4">
                <img src="{{ asset('assets/images/logo-black.png') }}" alt="" class="w-10">
                <button @click="menuOpen = false" class="text-2xl text-[#000]">&times;</button>
            </div>

            <hr class="h-1 bg-[#830B00]">

            <ul class="space-y-2 p-4">
                <li>
                    <a href="{{ route('home') }}"
                        class="block p-2 hover:bg-gray-100 rounded {{ Route::is('home') ? 'bg-[#000] text-[#fff]' : 'text-[#000]' }}">
                        {{ app()->getLocale() === 'en' ? 'Home' : (app()->getLocale() === 'km' ? 'ទំព័រដើម' : 'Home') }}
                    </a>
                </li>

                <li>
                    <a href="{{ route('home') }}#about"
                        class="block p-2 hover:bg-gray-100 rounded {{ Route::is('about') ? 'bg-[#000] text-[#fff]' : 'text-[#000]' }}">
                        {{ app()->getLocale() === 'en' ? 'About Us' : (app()->getLocale() === 'km' ? 'អំពីយើងខ្ញុំ' : 'About Us') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('product') }}"
                        class="block p-2 hover:bg-gray-100 rounded {{ Route::is('product') ? 'bg-[#000] text-[#fff]' : 'text-[#000]' }}">
                        {{ app()->getLocale() === 'en' ? 'Our Products' : (app()->getLocale() === 'km' ? 'ផលិតផលរបស់យើងខ្ញុំ' : 'Our Products') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('project') }}"
                        class="block p-2 hover:bg-gray-100 rounded {{ Route::is('project') ? 'bg-[#000] text-[#fff]' : 'text-[#000]' }}">
                        {{ app()->getLocale() === 'en' ? 'Our Projects' : (app()->getLocale() === 'km' ? 'គម្រោងរបស់យើងខ្ញុំ' : 'Our Projects') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('store') }}"
                        class="block p-2 hover:bg-gray-100 rounded {{ Route::is('store') ? 'bg-[#000] text-[#fff]' : 'text-[#000]' }}">
                        {{ app()->getLocale() === 'en' ? 'Store Location' : (app()->getLocale() === 'km' ? 'ទីតាំងហាង' : 'Store Location') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('contact') }}"
                        class="block p-2 hover:bg-gray-100 rounded {{ Route::is('contact') ? 'bg-[#000] text-[#fff]' : 'text-[#000]' }}">
                        {{ app()->getLocale() === 'en' ? 'Contact Us' : (app()->getLocale() === 'km' ? 'ទំនាក់ទំនងមកយើង' : 'Contact Us') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div x-data="{ open: false }" class="relative text-[14px] py-4">

        <!-- Current Language Button -->
        <button @click="open = !open" class="w-full flex items-center justify-end gap-1 text-white px-4">
            <svg class="w-6 h-6" viewBox="0 0 17 17" version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" fill="#fff">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path
                        d="M8.516 0c-4.687 0-8.5 3.813-8.5 8.5s3.813 8.5 8.5 8.5 8.5-3.813 8.5-8.5-3.814-8.5-8.5-8.5zM1.041 9h2.937c0.044 1.024 0.211 2.031 0.513 3h-2.603c-0.481-0.906-0.776-1.923-0.847-3zM3.978 8h-2.937c0.071-1.077 0.366-2.094 0.847-3h2.6c-0.301 0.969-0.467 1.976-0.51 3zM5.547 5h5.896c0.33 0.965 0.522 1.972 0.569 3h-7.034c0.046-1.028 0.239-2.035 0.569-3zM4.978 9h7.035c-0.049 1.028-0.241 2.035-0.572 3h-5.891c-0.331-0.965-0.524-1.972-0.572-3zM13.013 9h2.978c-0.071 1.077-0.366 2.094-0.847 3h-2.644c0.302-0.969 0.469-1.976 0.513-3zM13.013 8c-0.043-1.024-0.209-2.031-0.51-3h2.641c0.48 0.906 0.775 1.923 0.847 3h-2.978zM14.502 4h-2.354c-0.392-0.955-0.916-1.858-1.55-2.7 1.578 0.457 2.938 1.42 3.904 2.7zM9.074 1.028c0.824 0.897 1.484 1.9 1.972 2.972h-5.102c0.487-1.071 1.146-2.073 1.97-2.97 0.199-0.015 0.398-0.030 0.602-0.030 0.188 0 0.373 0.015 0.558 0.028zM6.383 1.313c-0.629 0.838-1.151 1.737-1.54 2.687h-2.314c0.955-1.267 2.297-2.224 3.854-2.687zM2.529 13h2.317c0.391 0.951 0.915 1.851 1.547 2.689-1.561-0.461-2.907-1.419-3.864-2.689zM7.926 15.97c-0.826-0.897-1.488-1.899-1.978-2.97h5.094c-0.49 1.072-1.152 2.075-1.979 2.972-0.181 0.013-0.363 0.028-0.547 0.028-0.2 0-0.395-0.015-0.59-0.030zM10.587 15.703c0.636-0.842 1.164-1.747 1.557-2.703h2.358c-0.968 1.283-2.332 2.247-3.915 2.703z"
                        fill="#000"></path>
                </g>
            </svg>

            <svg class="w-3 h-3 transition-transform duration-300" :class="{ 'rotate-180': open }" viewBox="0 0 24 24"
                fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path
                        d="M17.9188 8.17969H11.6888H6.07877C5.11877 8.17969 4.63877 9.33969 5.31877 10.0197L10.4988 15.1997C11.3288 16.0297 12.6788 16.0297 13.5088 15.1997L15.4788 13.2297L18.6888 10.0197C19.3588 9.33969 18.8788 8.17969 17.9188 8.17969Z"
                        fill="#000"></path>
                </g>
            </svg>
        </button>

        <!-- Dropdown -->
        <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 translate-y-2 scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
            x-transition:leave-end="opacity-0 translate-y-2 scale-95"
            class="absolute right-0 mt-2 w-44 bg-white rounded shadow-lg py-2 z-50" style="display: none;">

            <!-- EN -->
            @if ($locale !== 'en')
                <a href="{{ route('lang.switch', 'en') }}"
                    class="flex items-center gap-2 px-3 py-2 hover:bg-red-500 hover:text-white">
                    <img src="{{ asset('assets/images/icons/usa-flag.png') }}" class="w-5 h-5 rounded-full">
                    <span>
                        {{ $locale === 'km' ? 'ភាសាអង់គ្លេស' : ($locale === 'cn' ? '英语' : 'English') }}
                    </span>
                </a>
            @endif

            <!-- KM -->
            @if ($locale !== 'km')
                <a href="{{ route('lang.switch', 'km') }}"
                    class="flex items-center gap-2 px-3 py-2 hover:bg-red-500 hover:text-white">
                    <img src="{{ asset('assets/images/icons/kh-flag.png') }}" class="w-5 h-5 rounded-full">
                    <span>
                        {{ $locale === 'en' ? 'Khmer' : ($locale === 'cn' ? '高棉语' : 'ភាសាខ្មែរ') }}
                    </span>
                </a>
            @endif

            <!-- CN -->
            @if ($locale !== 'ch')
                <a href="{{ route('lang.switch', 'ch') }}"
                    class="flex items-center gap-2 px-3 py-2 hover:bg-red-500 hover:text-white">
                    <img src="{{ asset('assets/images/icons/ch-flag.png') }}" class="w-5 h-5 rounded-full">
                    <span>
                        {{ $locale === 'en' ? 'Chinese' : ($locale === 'km' ? 'ភាសាចិន' : '中文') }}
                    </span>
                </a>
            @endif

        </div>
    </div>

    <div class="relative w-full bg-[#fff] hidden lg:flex items-center justify-center drop-shadow-xl" data-aos="fade-right" data-aos-duration="1500">
        <div class="absolute left-0 w-2 h-full bg-[#01014F]"></div>
        <ul class="flex items-center justify-center bg-[#ffffff] space-x-1 px-3 py-4 xl:px-10 rounded-full">
            <li class="relative group">
                <a href="{{ route('home') }}"
                    class="px-8 xl:px-8 py-5 text-[14px] xl:text-[19px] {{ Route::is('home') ? 'px-8 text-[#fff] bg-[#01014F]' : 'hover:bg-[#01014F] hover:text-[#fff] transition-all duration-150' }}">
                    {{ app()->getLocale() === 'en' ? 'Home' : (app()->getLocale() === 'km' ? 'ទំព័រដើម' : 'Home') }}
                </a>
            </li>
            <li class="relative group">
                <a href="{{ route('home') }}#about" class="px-8 xl:px-8 py-5 text-[14px] xl:text-[19px] ">
                    {{ app()->getLocale() === 'en' ? 'About Us' : (app()->getLocale() === 'km' ? 'អំពីយើងខ្ញុំ' : 'About Us') }}
                </a>
            </li>
            <li class="relative group">
                <a href="{{ route('product') }}"
                    class="px-8 xl:px-8 py-5 text-[16px] xl:text-[19px] {{ Route::is('product') ? 'px-8 text-[#fff] bg-[#01014F]' : 'hover:bg-[#01014F] hover:text-[#fff] transition-all duration-150' }}">
                    {{ app()->getLocale() === 'en' ? 'Our Products' : (app()->getLocale() === 'km' ? 'ផលិតផលរបស់យើងខ្ញុំ' : 'Our Products') }}
                </a>
                <ul
                    class="absolute left-1/2 transform -translate-x-1/2 hidden mt-4 py-2 w-44 bg-[#FFFFFF] shadow-lg group-hover:block z-50">
                    <li class="hover:bg-[#01014F] ">
                        <a href="{{ route('product') }}#product_in_stock"
                            class="block px-2 py-2 text-[14px] text-[#000] hover:text-[#fff]">Products
                            in Stock</a>
                    </li>
                    <li class="hover:bg-[#01014F] ">
                        <a href="{{ route('product') }}#customized_products"
                            class="block px-2 py-2 text-[14px] text-[#000] hover:text-[#fff]">Customized
                            Products</a>
                    </li>
                </ul>
            </li>
            <li class="relative group">
                <a href="{{ route('project') }}"
                    class="px-8 xl:px-8 py-5 text-[14px] xl:text-[19px] {{ Route::is('project') ? 'px-8 text-[#fff] bg-[#01014F]' : 'hover:bg-[#01014F] hover:text-[#fff] transition-all duration-150' }}">
                    {{ app()->getLocale() === 'en' ? 'Our Projects' : (app()->getLocale() === 'km' ? 'គម្រោងរបស់យើងខ្ញុំ' : 'Our Projects') }}
                </a>
            </li>
            <li class="relative group">
                <a href="{{ route('store') }}"
                    class="px-8 xl:px-8 py-5 text-[14px] xl:text-[19px] {{ Route::is('store') ? 'px-8 text-[#fff] bg-[#01014F]' : 'hover:bg-[#01014F] hover:text-[#fff] transition-all duration-150' }}">
                    {{ app()->getLocale() === 'en' ? 'Store Location' : (app()->getLocale() === 'km' ? 'ទីតាំងហាង' : 'Store Location') }}
                </a>
            </li>
            <li class="relative group">
                <a href="{{ route('contact') }}"
                    class="px-8 xl:px-8 py-5 text-[14px] xl:text-[19px] {{ Route::is('contact') ? 'px-8 text-[#fff] bg-[#01014F]' : 'hover:bg-[#01014F] hover:text-[#fff] transition-all duration-150' }}">
                    {{ app()->getLocale() === 'en' ? 'Contact Us' : (app()->getLocale() === 'km' ? 'ទំនាក់ទំនងមកយើង' : 'Contact Us') }}
                </a>
            </li>

        </ul>
        <div class="absolute right-0 w-2 h-full bg-[#01014F]"></div>

    </div>

</nav>
