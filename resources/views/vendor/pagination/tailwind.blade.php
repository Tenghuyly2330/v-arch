@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        <div class="flex items-center justify-between flex-1 sm:hidden px-2">
            @if ($paginator->onFirstPage())
                <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-[#a6a6a6] cursor-default leading-5 rounded-md">
                    <svg width="17" height="23" viewBox="0 0 17 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="6.53806" y="14.1578" width="6.31579" height="5.05264" transform="rotate(-180 6.53806 14.1578)" fill="#D9D9D9"/>
                        <rect x="16.2222" y="5.3158" width="5.89474" height="5.05264" transform="rotate(-180 16.2222 5.3158)" fill="#D9D9D9"/>
                        <rect x="16.2222" y="23" width="5.89474" height="5.05264" transform="rotate(-180 16.2222 23)" fill="#D9D9D9"/>
                        <rect x="10.3275" y="9.10522" width="3.78948" height="3.78948" transform="rotate(-180 10.3275 9.10522)" fill="#D9D9D9"/>
                        <rect x="10.3275" y="17.9473" width="3.78948" height="3.78948" transform="rotate(-180 10.3275 17.9473)" fill="#D9D9D9"/>
                    </svg>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-[#fff] leading-5 rounded-md focus:outline-none transition ease-in-out duration-150">
                    <svg width="17" height="23" viewBox="0 0 17 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="6.53806" y="14.1578" width="6.31579" height="5.05264" transform="rotate(-180 6.53806 14.1578)" fill="#DD483A"/>
                        <rect x="16.2222" y="5.3158" width="5.89474" height="5.05264" transform="rotate(-180 16.2222 5.3158)" fill="#DD483A"/>
                        <rect x="16.2222" y="23" width="5.89474" height="5.05264" transform="rotate(-180 16.2222 23)" fill="#DD483A"/>
                        <rect x="10.3275" y="9.10522" width="3.78948" height="3.78948" transform="rotate(-180 10.3275 9.10522)" fill="#DD483A"/>
                        <rect x="10.3275" y="17.9473" width="3.78948" height="3.78948" transform="rotate(-180 10.3275 17.9473)" fill="#DD483A"/>
                    </svg>
                </a>
            @endif

            <p class="text-sm text-[#DD483A] leading-5">
                {!! __('Showing') !!}
                <span class="font-medium">{{ $paginator->currentPage() }}</span>
                {!! __('of') !!}
                <span class="font-medium">{{ $paginator->lastPage() }}</span>
                {!! __('Page') !!}
            </p>

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-[#fff] leading-5 rounded-md focus:outline-none transition ease-in-out duration-150">
                    <svg width="16" height="23" viewBox="0 0 16 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="9.68423" y="8.84204" width="6.31579" height="5.05263" fill="#580B0C"/>
                        <rect y="17.6842" width="5.89474" height="5.05263" fill="#580B0C"/>
                        <rect width="5.89474" height="5.05263" fill="#580B0C"/>
                        <rect x="5.89474" y="13.8948" width="3.78947" height="3.78947" fill="#580B0C"/>
                        <rect x="5.89474" y="5.05261" width="3.78947" height="3.78947" fill="#580B0C"/>
                    </svg>
                </a>
            @else
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-[#a6a6a6] cursor-default leading-5 rounded-md">
                    <svg width="16" height="23" viewBox="0 0 16 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="9.68423" y="8.84204" width="6.31579" height="5.05263" fill="#D9D9D9"/>
                        <rect y="17.6842" width="5.89474" height="5.05263" fill="#D9D9D9"/>
                        <rect width="5.89474" height="5.05263" fill="#D9D9D9"/>
                        <rect x="5.89474" y="13.8948" width="3.78947" height="3.78947" fill="#D9D9D9"/>
                        <rect x="5.89474" y="5.05261" width="3.78947" height="3.78947" fill="#D9D9D9"/>
                    </svg>
                </span>
            @endif
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-end px-2">
            {{-- <div>
                <p class="text-sm text-[#580B0C] leading-5">
                    {!! __('Showing') !!}
                    <span class="font-medium">{{ $paginator->currentPage() }}</span>
                    {!! __('of') !!}
                    <span class="font-medium">{{ $paginator->lastPage() }}</span>
                    {!! __('Page') !!}
                </p>
            </div> --}}


            <div>
                <span class="relative z-0 inline-flex rtl:flex-row-reverse shadow-sm rounded-md">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span class="relative inline-flex items-center px-2 py-2 bg-white border border-[#DD483A] cursor-default rounded-l-md leading-5" aria-hidden="true">
                                <svg class="w-5 h-5"  viewBox="0 0 8 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="3.33337" y="6.11096" width="2.77778" height="2.22221" transform="rotate(-180 3.33337 6.11096)" fill="#D9D9D9"/>
                                    <rect x="7.59262" y="2.22217" width="2.5926" height="2.22221" transform="rotate(-180 7.59262 2.22217)" fill="#D9D9D9"/>
                                    <rect x="7.59262" y="10" width="2.5926" height="2.22221" transform="rotate(-180 7.59262 10)" fill="#D9D9D9"/>
                                    <rect x="5" y="3.88892" width="1.66667" height="1.66666" transform="rotate(-180 5 3.88892)" fill="#D9D9D9"/>
                                    <rect x="5" y="7.77771" width="1.66667" height="1.66666" transform="rotate(-180 5 7.77771)" fill="#D9D9D9"/>
                                </svg>
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-2 py-2 bg-white border border-[#DD483A] rounded-l-md leading-5 focus:z-10 focus:outline-none" aria-label="{{ __('pagination.previous') }}">
                            <svg class="w-5 h-5"  viewBox="0 0 8 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="3.33337" y="6.11096" width="2.77778" height="2.22221" transform="rotate(-180 3.33337 6.11096)" fill="#DD483A"/>
                                <rect x="7.59262" y="2.22217" width="2.5926" height="2.22221" transform="rotate(-180 7.59262 2.22217)" fill="#DD483A"/>
                                <rect x="7.59262" y="10" width="2.5926" height="2.22221" transform="rotate(-180 7.59262 10)" fill="#DD483A"/>
                                <rect x="5" y="3.88892" width="1.66667" height="1.66666" transform="rotate(-180 5 3.88892)" fill="#DD483A"/>
                                <rect x="5" y="7.77771" width="1.66667" height="1.66666" transform="rotate(-180 5 7.77771)" fill="#DD483A"/>
                            </svg>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-[#000] bg-white border border-[#DD483A] cursor-default leading-5">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span class="relative inline-flex items-center px-4 py-2 -ml-px text-[18px] text-[#DD483A] font-[700] bg-white border border-[#DD483A] cursor-default leading-5">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-[#000] bg-white border border-[#DD483A] leading-5 hover:text-gray-500 focus:z-10 focus:outline-none" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-2 py-2 -ml-px border border-[#DD483A   ] bg-white rounded-r-md leading-5 focus:z-10 focus:outline-none" aria-label="{{ __('pagination.next') }}">
                            <svg class="w-5 h-5" viewBox="0 0 8 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="4.25928" y="3.88879" width="2.77778" height="2.22223" fill="#DD483A"/>
                                <rect y="7.77771" width="2.59259" height="2.22223" fill="#DD483A"/>
                                <rect width="2.59259" height="2.22223" fill="#DD483A"/>
                                <rect x="2.59259" y="6.11108" width="1.66667" height="1.66667" fill="#DD483A"/>
                                <rect x="2.59259" y="2.22217" width="1.66667" height="1.66667" fill="#DD483A"/>
                             </svg>
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span class="relative inline-flex items-center px-2 py-2 -ml-px bg-white border border-[#DD483A] cursor-default rounded-r-md leading-5" aria-hidden="true">
                                <svg class="w-5 h-5" viewBox="0 0 8 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="4.25928" y="3.88879" width="2.77778" height="2.22223" fill="#D9D9D9"/>
                                    <rect y="7.77771" width="2.59259" height="2.22223" fill="#D9D9D9"/>
                                    <rect width="2.59259" height="2.22223" fill="#D9D9D9"/>
                                    <rect x="2.59259" y="6.11108" width="1.66667" height="1.66667" fill="#D9D9D9"/>
                                    <rect x="2.59259" y="2.22217" width="1.66667" height="1.66667" fill="#D9D9D9"/>
                                </svg>
                            </span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
