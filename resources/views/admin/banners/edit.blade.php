<x-app-layout>
    <div class="max-w-7xl mx-auto shadow-md rounded-lg p-6 my-2">
        <h2 class="text-2xl font-bold text-[#613bf1]">Edit Banner</h2>

        <form action="{{ route('banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-4">
            @csrf
            @method('PATCH')

            {{-- Alert component for success/errors --}}
            @component('admin.components.alert')
            @endcomponent

            <input type="text" name="name" id="name" class="hidden" value="{{ $banner->name }}">


            {{-- Media (Image or Video) --}}
            @if ($banner->id == '4')
                <div>
                    <label class="block mb-2 font-semibold">Media (Image or Video)</label>

                    <div class="relative w-full h-64 border-2 border-dashed rounded-lg overflow-hidden cursor-pointer">
                        {{-- Preview --}}
                        <div id="img-preview" class="w-full h-full flex items-center justify-center">
                            @if ($banner->media)
                                @if ($banner->media['type'] === 'image')
                                    <img src="{{ asset($banner->media['path']) }}"
                                        class="w-full h-full object-cover rounded-md">
                                @else
                                    <video controls class="w-full h-full rounded-md">
                                        <source src="{{ asset($banner->media['path']) }}">
                                    </video>
                                @endif
                            @else
                                <p class="text-gray-400 text-center">No media</p>
                            @endif
                        </div>

                        {{-- Hidden file input --}}
                        <input type="file" name="media" class="hidden" accept="image/*,video/*"
                            onchange="uploadMedia(event)">

                        {{-- Button overlay --}}
                        <button type="button" onclick="this.previousElementSibling.click()"
                            class="absolute bottom-2 right-2 bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600">
                            Upload
                        </button>
                    </div>

                    <x-input-error :messages="$errors->get('media')" />
                </div>


            @endif

            {{-- Image Only --}}
            <div>
                <label class="block mt-6 mb-2 font-semibold">Image</label>

                <label
                    class="flex items-center justify-center w-full h-64 border-2 border-dashed rounded-lg cursor-pointer">
                    <div id="image-preview"
                        class="w-full h-64 bg-contain bg-center bg-no-repeat rounded-md flex items-center justify-center">
                        @if ($banner->image)
                            <img src="{{ asset($banner->image) }}" class="w-full h-full object-contain rounded-md">
                        @else
                            <p class="text-gray-400">No image</p>
                        @endif
                    </div>
                    <input type="file" name="image" class="hidden" accept="image/*"
                        onchange="previewImageOnly(event)">
                </label>
                <x-input-error :messages="$errors->get('image')" />
            </div>

            {{-- Form actions --}}
            <div class="flex justify-between mt-6">
                <a href="{{ route('banner.index') }}"
                    class="border border-[#613bf1] hover:bg-[#613bf1] hover:text-white px-4 py-1 md:px-6 rounded-[5px] text-[#613bf1]">
                    Back
                </a>

                <button type="submit" class="bg-[#613bf1] text-white px-4 py-1 md:px-6 rounded-[5px]">
                    Submit
                </button>
            </div>
        </form>
    </div>

    {{-- Preview scripts --}}
    <script>
        function uploadMedia(event) {
            const file = event.target.files[0];
            if (!file) return;

            const preview = document.getElementById('img-preview');
            preview.innerHTML = '';

            const url = URL.createObjectURL(file);

            if (file.type.startsWith('image/')) {
                const img = document.createElement('img');
                img.src = url;
                img.className = 'w-full h-full object-cover rounded-md';
                preview.appendChild(img);
            } else if (file.type.startsWith('video/')) {
                const video = document.createElement('video');
                video.src = url;
                video.controls = true;
                video.className = 'w-full h-full rounded-md';
                preview.appendChild(video);
            }
        }

        function previewImageOnly(event) {
            const file = event.target.files[0];
            if (!file) return;

            const preview = document.getElementById('image-preview');
            preview.innerHTML = '';

            const img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            img.className = 'w-full h-64 object-contain rounded-md';
            preview.appendChild(img);
        }
    </script>
</x-app-layout>
