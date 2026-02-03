@extends('layouts.master')
@section('title')
    <title>Contact | V-arch</title>
@endsection
@section('content')
    {{-- <x-loading /> --}}
    <x-scroll-top-button />

    <section class="relative w-full min-h-screen bg-cover bg-center pb-10 px-2"
        style="background-image: url({{ asset($banners->image) }});">
        {{-- <div class="relative flex flex-col w-full h-full px-4 text-center text-white lg:pt-40">
            <img src="{{ asset('assets/images/logo.png') }}" alt="" class="w-32 mx-auto">
            <p class="mt-4 text-[30px] md:text-[50px] text-white/50 font-[700] max-w-[500px] mx-auto">
                Our Project
            </p>
        </div> --}}

        <div class="pt-32 lg:pt-40">
            <div
                class="relative flex flex-col w-full max-w-7xl mx-auto h-full px-4 text-center mt-10 p-4 lg:p-10 bg-[#01014F] rounded-[30px]">
                <img src="{{ asset('assets/images/logo.png') }}" alt=""
                    class="w-48 md:w-64 mx-auto relative mb-10" data-aos="fade-up" data-aos-duration="1400">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 text-white overflow-hidden">
                    <div class="text-[12px] md:text-[14px] text-start lg:text-end" data-aos="fade-right" data-aos-duration="1400">
                        <h1 class="text-[16px] font-[600] mb-4">V-Arch Lighting</h1>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt
                            ut
                            laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
                            tation
                            ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>
                        <div class="flex items-center justify-start lg:justify-end gap-4 pt-4">
                            <a href="https://www.facebook.com/varch.lighting.52">
                                <img src="{{ asset('assets/images/icons/fb.png') }}" alt="" class="w-6 md:w-8">
                            </a>
                            <a href="https://t.me/limvandara_lighting">
                                <img src="{{ asset('assets/images/icons/telegram.png') }}" alt="" class="w-6 md:w-8">
                            </a>
                            <a href="#">
                                <img src="{{ asset('assets/images/icons/whatapp.png') }}" alt="" class="w-6 md:w-8">
                            </a>
                            <a href="https://www.instagram.com/varch_lighting?igsh=MXYzMGdidHJidjd5Ng==">
                                <img src="{{ asset('assets/images/icons/ig.png') }}" alt="" class="w-6 md:w-8">
                            </a>
                        </div>
                    </div>
                    <div class="text-[12px] md:text-[14px] text-start lg:text-end" data-aos="fade-right" data-aos-duration="1400">
                        <h1 class="text-[16px] font-[600] mb-4">{{ app()->getLocale() === 'en' ? 'Information' : (app()->getLocale() === 'km' ? 'ព័ត៌មាន' : 'Information') }}</h1>
                        <ul class="space-y-1">
                            <li><a class="hover:underline transition-all duration-300" href="{{ route('home') }}">{{ app()->getLocale() === 'en' ? 'Home' : (app()->getLocale() === 'km' ? 'ទំព័រដើម' : 'Home') }}</a></li>
                            <li><a class="hover:underline transition-all duration-300" href="{{ route('about') }}">{{ app()->getLocale() === 'en' ? 'About Us' : (app()->getLocale() === 'km' ? 'អំពីយើងខ្ញុំ' : 'About Us') }}</a></li>
                            <li><a class="hover:underline transition-all duration-300" href="{{ route('product') }}">{{ app()->getLocale() === 'en' ? 'Our Products' : (app()->getLocale() === 'km' ? 'ផលិតផលរបស់យើងខ្ញុំ' : 'Our Products') }}</a></li>
                            <li><a class="hover:underline transition-all duration-300" href="{{ route('project') }}">{{ app()->getLocale() === 'en' ? 'Our Projects' : (app()->getLocale() === 'km' ? 'គម្រោងរបស់យើងខ្ញុំ' : 'Our Projects') }}</a></li>
                            <li><a class="hover:underline transition-all duration-300" href="{{ route('store') }}">{{ app()->getLocale() === 'en' ? 'Store Location' : (app()->getLocale() === 'km' ? 'ទីតាំងហាង' : 'Store Location') }}</a></li>
                            <li><a class="hover:underline transition-all duration-300" href="{{ route('contact') }}">{{ app()->getLocale() === 'en' ? 'Contact Us' : (app()->getLocale() === 'km' ? 'ទំនាក់ទំនងមកយើង' : 'Contact Us') }}</a></li>
                        </ul>
                    </div>
                    <div class="text-start" data-aos="fade-left" data-aos-duration="1400">
                        <h1 class="text-[16px] font-[600] mb-4">V-Arch Lighting</h1>
                        <div class="text-[12px] md:text-[14px] flex flex-col space-y-3">
                            <p>Our Factory is located in Kompong Cham Province</p>
                            <p>Office Address: #7D, ST.70, Sangkat Srah Chork, Khan Daun Penh, Phnom Penh</p>
                            <p>(+855) 87 68 67 68</p>
                            <a href="" class="underline">info@v-archlighting.com</a>
                            {{-- <a href="">www.lehsekmeasrice.com</a> --}}
                        </div>
                    </div>

                    <div class="text-[12px] md:text-[14px] text-start" data-aos="fade-left" data-aos-duration="1400">
                        <h1 class="text-[16px] font-[600] mb-4">{{ app()->getLocale() === 'en' ? 'Working Time' : (app()->getLocale() === 'km' ? 'ម៉ោងធ្វើការ' : 'Working Time') }}  </h1>
                        <div class="text-[12px] md:text-[14px] flex flex-col space-y-3 mb-4">
                            <p>{{ app()->getLocale() === 'en' ? 'Monday - Sunday' : (app()->getLocale() === 'km' ? 'ច័ន្ទ – អាទិត្យ' : 'Monday - Sunday') }}</p>
                            <p>{{ app()->getLocale() === 'en' ? '8AM - 5PM' : (app()->getLocale() === 'km' ? '៨ព្រឹក – ៥ល្ងាច' : '8AM - 5PM') }}</p>
                        </div>
                        <h1 class="text-[16px] font-[600] mb-4">{{ app()->getLocale() === 'en' ? 'Map' : (app()->getLocale() === 'km' ? 'ទីតាំង' : 'Map') }}</h1>
                        <div class="pt-2">
                            <iframe class="w-full h-[100px]"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3741.4436291086704!2d104.920699!3d11.5212099!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310950bf57e61dff%3A0x1cd908096238297a!2sV-Arch%20Lighting!5e1!3m2!1sen!2skh!4v1766195511008!5m2!1sen!2skh"
                                style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </section>
@endsection
