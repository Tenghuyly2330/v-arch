@extends('admin.layouts.app')
@section('header')
    Product
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
        <form method="GET" id="filterForm" class="my-4 flex flex-wrap items-center gap-4 justify-between">

            <div class="flex flex-wrap gap-3 items-center">
                <!-- Search -->
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name..."
                    class="border rounded px-3 py-2 text-sm w-[220px]" onkeyup="submitFilter()" />

                <!-- Category -->
                <select name="category" class="border rounded px-3 py-2 text-sm w-[200px]" onchange="submitFilter()">
                    <option value="">All Categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name_en }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Add New -->
            <a href="{{ route('product_backend.create') }}"
                class="bg-[#613bf1] text-white flex items-center gap-2 px-4 py-2 rounded text-sm">
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="#fff">
                    <path d="M6 12H18M12 6V18" stroke-width="2" stroke-linecap="round" />
                </svg>
                Add new
            </a>
        </form>



        @component('admin.components.alert')
        @endcomponent

        <div class="overflow-x-auto h-full md:max-h-[70vh] overflow-y-auto my-scroll">
            <table class="min-w-[800px] md:min-w-full border border-gray-200">
                <thead class="text-white sticky top-0 z-10 bg-white">
                    <tr>
                        <th class="text-left py-3 px-4 text-[12px] text-gray-500 w-2/6">Product Image</th>
                        <th class="text-left py-3 px-4 text-[12px] text-gray-500 w-1/6">Color</th>
                        <th class="text-left py-3 px-4 text-[12px] text-gray-500 w-1/6">Status</th>
                        <th class="text-left py-3 px-4 text-[12px] text-gray-500 w-1/6">Best Pick</th>
                        <th class="text-left py-3 px-4 text-[12px] text-gray-500 w-1/6">Action</th>
                    </tr>
                </thead>

                <tbody class="text-gray-700 h-full md:max-h-[40vh] overflow-y-auto">
                    @forelse ($products as $item)
                        @php
                            $colors = is_array($item->color) ? $item->color : json_decode($item->color ?? '[]', true);

                        @endphp

                        <tr>
                            {{-- Product Info --}}
                            <td class="py-3 px-4 flex gap-4">
                                <div>
                                    @if (!empty($colors))
                                        @php
                                            $firstColor = $colors[0];
                                            $firstImage = $firstColor['images'][0] ?? null;
                                        @endphp

                                        <div class="flex items-center gap-3">
                                            @if ($firstImage)
                                                <img src="{{ $firstImage }}" alt="{{ $firstColor['name'] ?? 'Color' }}"
                                                    class="w-12 h-14 object-cover rounded">
                                            @else
                                                <img src="{{ asset('assets/images/default.jpg') }}" alt=""
                                                    class="w-12 h-14 object-cover rounded">
                                            @endif
                                        </div>
                                    @else
                                        <span class="text-gray-400 text-[12px]">—</span>
                                    @endif
                                </div>

                                <div>
                                    <p class="uppercase text-[12px] md:text-[16px]">{{ $item->name_en }}</p>
                                    <p class="text-[10px] md:text-[12px] text-gray-500">
                                        {{ $item->category->name_en ?? '' }}
                                    </p>
                                </div>
                            </td>

                            {{-- Colors --}}
                            <td class="py-3 px-4">
                                <div class="flex gap-2">
                                    @foreach ($colors as $color)
                                        <span class="inline-block w-8 h-4 rounded"
                                            style="background-color: {{ $color['code'] ?? '#000' }}"></span>
                                    @endforeach
                                </div>
                            </td>

                            {{-- Status --}}
                            <td class="py-3 px-4">
                                @if ($item->status)
                                    <span class="bg-green-500 text-[14px] text-white px-2 py-1 rounded">New</span>
                                @else
                                    -
                                @endif
                            </td>

                            {{-- Best Pick --}}
                            <td class="py-3 px-4">
                                @if ($item->best_pick)
                                    <span class="bg-green-500 text-[14px] text-white px-2 py-1 rounded">Best</span>
                                @else
                                    -
                                @endif
                            </td>

                            {{-- Actions --}}
                            <td class="text-left py-3 px-4">
                                <div class="flex items-center gap-2">
                                    <a class="flex items-center gap-2 bg-[#613bf1] text-white px-3 py-1 text-[12px] rounded-md"
                                        href="{{ route('product_backend.edit', $item->id) }}" title="Edit">
                                        <img src="{{ asset('assets/images/icons/edit.svg') }}" alt=""
                                            class="w-4 h-4">
                                        <p>Edit</p>
                                    </a>

                                    <a href="{{ route('product_backend.delete', $item->id) }}" title="Delete"
                                        onclick="event.preventDefault(); deleteRecord('{{ route('product_backend.delete', $item->id) }}')">
                                        <img src="{{ asset('assets/images/icons/trash.svg') }}" alt=""
                                            class="w-5 h-5">
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-6 text-gray-500">
                                No items available.
                            </td>
                        </tr>
                    @endforelse



                </tbody>
            </table>
        </div>
        {{-- <hr class="border-2 border-b-[#000] my-3"> --}}
        <div class="pt-2 pb-4">
            {{ $products->links('vendor.pagination.custom') }}
        </div>


    </div>

    <script>
        let timer;

        function submitFilter() {
            clearTimeout(timer);
            timer = setTimeout(() => {
                document.getElementById('filterForm').submit();
            }, 400); // delay while typing
        }
    </script>

@endsection
