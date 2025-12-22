@extends('layouts.master')
@section('title')
    <title>Store Location | V-arch</title>
@endsection
@section('content')
    {{-- <x-loading />    --}}
    <x-scroll-top-button />

    <section class="relative w-full min-h-screen bg-cover bg-center pb-10"
        style="background-image: url('{{ asset('assets/images/pro_bg.png') }}');">
        <div class="relative flex flex-col w-full h-full px-4 text-center text-white pt-20 lg:pt-40">
            <img src="{{ asset('assets/images/logo.png') }}" alt="" class="w-16 md:w-32 mx-auto">
        </div>
        <div
            class="relative flex flex-col w-full max-w-7xl mx-auto h-full px-4 text-center  mt-10 p-4 lg:p-10 bg-white rounded-[30px]">
            <h1 class="text-[30px] md:text-[50px] text-[#DD483A] font-thin max-w-[500px] mx-auto mb-4 md:mb-10">
                {{ app()->getLocale() === 'en'
                    ? 'Store Location'
                    : (app()->getLocale() === 'km'
                        ? 'ទីតាំងហាង'
                        : 'Store Location') }}
            </h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:gap-10 text-white font-thin">
                <div class="">
                    <div class="">
                        <iframe class="w-full h-[200px] lg:h-[300px] rounded-t-[30px]"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3741.4436291086704!2d104.920699!3d11.5212099!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310950bf57e61dff%3A0x1cd908096238297a!2sV-Arch%20Lighting!5e1!3m2!1sen!2skh!4v1766195243263!5m2!1sen!2skh"
                            style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="bg-[#830B00] py-4 rounded-b-[30px]">
                        {{ app()->getLocale() === 'en'
                            ? 'Our Store ( 371 )'
                            : (app()->getLocale() === 'km'
                                ? 'ទីតាំងហាងរបស់យើងខ្ញុំ ( 371 )'
                                : 'Our Store ( 371 )') }}

                    </div>
                </div>
                <div class="">
                    <div class="">
                        <iframe class="w-full h-[200px] lg:h-[300px] rounded-t-[30px]"
                            src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3739.7541533883877!2d104.91306967505483!3d11.64745368855933!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTHCsDM4JzUwLjgiTiAxMDTCsDU0JzU2LjMiRQ!5e1!3m2!1sen!2skh!4v1766195304082!5m2!1sen!2skh"
                            style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="bg-[#01014F] py-4 rounded-b-[30px]">
                        {{ app()->getLocale() === 'en'
                            ? 'Our Store ( 6A )'
                            : (app()->getLocale() === 'km'
                                ? 'ទីតាំងហាងរបស់យើងខ្ញុំ ( 6A )'
                                : 'Our Store ( 6A )') }}
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
