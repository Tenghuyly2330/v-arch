@extends('admin.layouts.app')
@section('header')
    <h1>Banner Page</h1>
@endsection
@section('content')
    <style>
        .my-scroll::-webkit-scrollbar {
            width: 4px;
         height: 4px;
        }

        .my-scroll::-webkit-scrollbar-track {
            background: #fff;
        }

        .my-scroll::-webkit-scrollbar-thumb {
            background: #64748b;
            border-radius: 10px;
        }
    </style>
    <div class="">
        {{-- <div class="my-4 flex items-center gap-4 justify-end">

            <a href="{{ route('banner.create') }}"
                class="bg-[#613bf1] text-[#fff] flex items-center gap-4 px-4 py-2 rounded-[5px] text-[12px] sm:text-[14px]">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#fff">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M6 12H18M12 6V18" stroke="#fff" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                    </g>
                </svg>
                <span class="">Add new</span>
            </a>
        </div> --}}

        @component('admin.components.alert')
        @endcomponent

        <div class="overflow-x-auto w-full h-full md:max-h-[70vh] overflow-y-auto my-scroll">
            <table class="w-full min-w-[600px] md:min-w-full border border-gray-200">
                <thead class="text-white sticky top-0 z-10 bg-white">
                    <tr>
                        <th class="text-left py-3 px-4 text-[12px] text-gray-500 w-1/4 md:w-2/5">Name</th>
                        <th class="text-left py-3 px-4 text-[12px] text-gray-500 w-1/4 md:w-1/5">Image</th>
                        <th class="text-left py-3 px-4 text-[12px] text-gray-500 w-1/4 md:w-1/5">Media</th>
                        <th class="text-left py-3 px-4 text-[12px] text-gray-500 w-1/4 md:w-1/5">Action</th>
                    </tr>
                </thead>

                <tbody class="text-gray-700 h-full md:max-h-[40vh] overflow-y-auto">
                    @forelse ($banners as $banner)
                        @php
                            $media = $banner->media;
                        @endphp
                        <tr>
                            <td class="text-left py-3 px-4 text-[12px] md:text-[14px]">
                                {{ $banner->name }}
                            </td>
                            {{-- Image Only --}}
                            <td class="text-left py-3 px-4 text-[12px] md:text-[14px]">
                                @if ($banner->image)
                                    <img src="{{ asset($banner->image) }}" alt="Banner Image"
                                        class="w-12 h-12 md:w-20 md:h-20 object-cover rounded-md">
                                @else
                                    <span class="text-gray-400">No image</span>
                                @endif
                            </td>

                            {{-- Media (Image or Video) --}}
                            <td class="text-left py-3 px-4 text-[12px] md:text-[14px]">
                                @if ($media && isset($media['type'], $media['path']))
                                    @if ($media['type'] === 'image')
                                        <img src="{{ asset($media['path']) }}" class="w-12 h-12 md:w-20 md:h-20 object-cover rounded-md"
                                            alt="Media">
                                    @elseif ($media['type'] === 'video')
                                        <video controls class="w-12 h-12 md:w-20 md:h-20 rounded-md">
                                            <source src="{{ asset($media['path']) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @endif
                                @else
                                    <span class="text-gray-400">No media</span>
                                @endif
                            </td>


                            <td class="text-left py-3 px-4">
                                <div class="flex items-center gap-2">

                                    <a class="flex items-center gap-2 bg-[#613bf1] text-[#fff] px-3 py-1 text-[12px] rounded-md"
                                        href="{{ route('banner.edit', $banner->id) }}" title="Edit">
                                        <img src="{{ asset('assets/images/icons/edit.svg') }}" alt=""
                                            class="w-4 h-4">
                                        <p>Edit</p>
                                    </a>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-6 text-gray-500 text-[14px]">
                                No items available.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
