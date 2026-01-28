<x-app-layout>
    <div class="max-w-7xl mx-auto shadow-md rounded-lg p-6 my-2">
        <h2 class="text-2xl font-bold text-[#1e1e1e]">Create Banner</h2>

        <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            {{-- Alert component for success/errors --}}
            @component('admin.components.alert') @endcomponent

            {{-- Media (Image or Video) --}}
            <input type="text" name="name" id="name">

            <div>
                <label for="dropzone-file" id="drop-area"
                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">

                    <div id="img-preview"
                        class="flex flex-col items-center justify-center w-full h-full bg-contain bg-center bg-no-repeat rounded-md text-center">
                        <svg class="w-8 h-8 mb-4 text-[#000]" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <p class="mb-2 text-[12px] sm:text-[14px] text-[#000]"><span class="font-semibold">Click to
                                upload</span> or drag and drop</p>
                        <p class="text-xs text-[#000]">SVG, PNG, JPG, GIF, MP4, WEBM (MAX. 20MB)</p>
                    </div>

                    <input id="dropzone-file" type="file" class="hidden" name="media" accept="image/*,video/*"
                        onchange="uploadMedia(event)" />
                </label>
                <x-input-error class="mt-2" :messages="$errors->get('media')" />
            </div>

            {{-- Image Only --}}
            <div>
                <label for="image-file" id="image-drop-area"
                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">

                    <div id="image-preview"
                        class="flex flex-col items-center justify-center w-full h-full bg-contain bg-center bg-no-repeat rounded-md text-center">
                        <svg class="w-8 h-8 mb-4 text-black" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <p class="mb-2 text-sm text-black"><span class="font-semibold">Click to upload</span> image</p>
                        <p class="text-xs text-black">JPG, PNG, GIF, SVG (MAX 5MB)</p>
                    </div>

                    <input id="image-file" type="file" class="hidden" name="image" accept="image/*"
                        onchange="previewImageOnly(event)" />
                </label>
                <x-input-error class="mt-2" :messages="$errors->get('image')" />
            </div>

            {{-- Form Actions --}}
            <div class="flex justify-between mt-6">
                <a href="{{ route('banner.index') }}" class="border border-[#4FC9EE] hover:bg-[#4FC9EE] hover:text-white px-4 py-1 md:px-6 rounded-[5px] text-[#4FC9EE]">
                    Back
                </a>

                <button type="submit" class="bg-[#4FC9EE] text-white px-4 py-1 md:px-6 rounded-[5px]">Submit</button>
            </div>
        </form>
    </div>

    {{-- Preview scripts --}}
    <script>
        function uploadMedia(event) {
            const file = event.target.files[0];
            if (!file) return;

            if (!file.type.startsWith('image/') && !file.type.startsWith('video/')) {
                alert('Invalid file type. Only images and videos are allowed.');
                event.target.value = '';
                return;
            }

            if (file.size > 20 * 1024 * 1024) { // 20MB
                alert('File too large. Max 20MB allowed.');
                event.target.value = '';
                return;
            }

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
                video.className = 'w-full h-full object-cover rounded-md';
                preview.appendChild(video);
            }
        }

        function previewImageOnly(event) {
            const file = event.target.files[0];
            if (!file) return;

            if (!file.type.startsWith('image/')) {
                alert('Only image files are allowed');
                event.target.value = '';
                return;
            }

            if (file.size > 10 * 1024 * 1024) { // 5MB
                alert('Image too large. Max 10MB allowed.');
                event.target.value = '';
                return;
            }

            const preview = document.getElementById('image-preview');
            preview.innerHTML = '';

            const img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            img.className = 'w-full h-full object-cover rounded-md';
            preview.appendChild(img);
        }
    </script>
</x-app-layout>
