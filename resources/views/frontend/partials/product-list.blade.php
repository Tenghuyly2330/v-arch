<div id="product_in_stock" data-aos="fade-up" data-aos-duration="1400"
    class="max-w-7xl mx-auto grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-2 md:gap-4 pt-6 md:pt-10 px-2 xl:px-0 ">
    @forelse ($products as $item)
        @php
            $colors = is_array($item->color) ? $item->color : json_decode($item->color ?? '[]', true);
        @endphp
        <div class="relative text-[#580B0C] text-[16px] xl:text-[20px] flex flex-col items-center justify-start"
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
                        <img src="{{ asset($firstImage) }}"
                            class="w-full h-full object-cover object-center rounded-xl transition-transform duration-300 group-hover:scale-105" />
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

                <div
                    class="text-[14px] xl:text-[16px] absolute right-4 top-4 rounded-full bg-white py-1 px-2 xl:px-4">
                    {{ app()->getLocale() === 'en'
                        ? $item->name_en
                        : (app()->getLocale() === 'km'
                            ? $item->name_km
                            : $item->name_ch) }}
                </div>

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
