@extends('admin.layouts.app')
@section('header')
    Project
@endsection
@section('content')
    <div class="">
        <div class="my-4 flex items-center gap-4 justify-end">
            <a href="{{ route('project_backend.create') }}"
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
        </div>
        @component('admin.components.alert')
        @endcomponent

        <div class="overflow-x-auto h-full md:max-h-[70vh] overflow-y-auto my-scroll">
            <table class="w-full table-fixed min-w-[600px] md:min-w-full border border-gray-200">
                <thead class="text-white sticky top-0 z-10 bg-white">
                    <tr>
                        <th class="text-left py-3 px-4 text-[12px] text-gray-500 w-1/3 md:w-2/5">Image</th>
                        <th class="text-left py-3 px-4 text-[12px] text-gray-500 w-1/3 md:w-2/5">Name</th>
                        <th class="text-left py-3 px-4 text-[12px] text-gray-500 w-1/3 md:w-1/5">Action</th>
                    </tr>
                </thead>

                <tbody class="text-gray-700 h-full md:max-h-[40vh] overflow-y-auto">
                    @forelse ($projects as $index => $item)
                        <tr class="">
                            <td class="text-left py-3 px-4 text-[12px] md:text-[14px]">
                                <div class="flex items-center h-full w-full">
                                    @php
                                        $images = json_decode($item->image, true); // decode to array
                                    @endphp
                                    @if (!empty($images) && isset($images[0]))
                                        <img src="{{ asset($images[0]) }}" alt=""
                                            class="w-20 h-12 object-contain object-center">
                                    @endif
                                </div>
                            </td>
                            <td class="py-3 px-4 text-xs max-w-[200px]">
                                <div class="flex flex-col truncate">
                                    <p>{{ $item->title_en ?? '' }}</p>
                                </div>
                            </td>

                            <td class="text-left py-3 px-4">
                                <div class="flex items-center gap-2">

                                    <a class="flex items-center gap-2 bg-[#613bf1] text-[#fff] px-3 py-1 text-[12px] rounded-md"
                                        href="{{ route('project_backend.edit', $item->id) }}" title="Edit">
                                        <img src="{{ asset('assets/images/icons/edit.svg') }}" alt=""
                                            class="w-4 h-4">
                                        <p>Edit</p>
                                    </a>
                                    <a href="{{ route('project_backend.delete', $item->id) }}" title="Delete"
                                        onclick="event.preventDefault(); deleteRecord('{{ route('project_backend.delete', $item->id) }}')">
                                        <img src="{{ asset('assets/images/icons/trash.svg') }}" alt=""
                                            class="w-5 h-5">
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
