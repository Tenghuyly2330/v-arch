<x-app-layout>
    <div class="max-w-7xl mx-auto shadow-md rounded-lg p-6 my-2">
        <h2 class="text-2xl font-bold text-[#1e1e1e] mb-4">Create Product</h2>
        <form action="{{ route('product_backend.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @component('admin.components.alert')
            @endcomponent

            {{-- =============== BASIC INFO =============== --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#830B00] uppercase">English</h1>
                    <div>
                        <label for="name_en" class="block text-sm font-medium text-[#000] mb-2">Name</label>
                        <input value="{{ old('name_en') }}" name="name_en" id="name_en"
                            class="mt-1 block w-full p-2 border rounded-md text-black text-[12px]"></input>
                        <x-input-error class="mt-2" :messages="$errors->get('name_en')" />
                    </div>
                    <div>
                        <label for="content_en" class="block text-sm font-medium text-[#000] mb-2">Content</label>
                        <textarea name="content_en" id="content_en" rows="6"
                            class="mt-1 block w-full p-2 border rounded-md text-black text-[12px]"></textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('content_en')" />
                    </div>
                </div>
                <div class="space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#830B00] uppercase">Khmer</h1>
                    <div>
                        <label for="name_km" class="block text-sm font-medium text-[#000] mb-2">Name</label>
                        <input value="{{ old('name_km') }}" name="name_km" id="name_km"
                            class="mt-1 block w-full p-2 border rounded-md text-black text-[12px]"></input>
                        <x-input-error class="mt-2" :messages="$errors->get('name_km')" />
                    </div>
                    <div>
                        <label for="content_km" class="block text-sm font-medium text-[#000] mb-2">Content</label>
                        <textarea name="content_km" id="content_km" rows="6"
                            class="mt-1 block w-full p-2 border rounded-md text-black text-[12px]"></textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('content_km')" />
                    </div>
                </div>
                <div class="space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#830B00] uppercase">Chinese</h1>
                    <div>
                        <label for="name_ch" class="block text-sm font-medium text-[#000] mb-2">Name</label>
                        <input value="{{ old('name_ch') }}" name="name_ch" id="name_ch"
                            class="mt-1 block w-full p-2 border rounded-md text-black text-[12px]"></input>
                        <x-input-error class="mt-2" :messages="$errors->get('name_ch')" />
                    </div>
                    <div>
                        <label for="content_ch" class="block text-sm font-medium text-[#000] mb-2">Content</label>
                        <textarea name="content_ch" id="content_ch" rows="6"
                            class="mt-1 block w-full p-2 border rounded-md text-black text-[12px]"></textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('content_ch')" />
                    </div>
                </div>
            </div>

            {{-- =============== STATUS =============== --}}
            <div class="flex items-center gap-2">
                <input type="hidden" name="status" value="0">
                <input type="checkbox" name="status" value="1" id="status_new"
                    class="form-checkbox text-[#613bf1]">
                <label for="status_new" class="text-sm font-medium text-gray-700">New</label>
            </div>

            <div class="flex items-center gap-2">
                <input type="hidden" name="best_pick" value="0">
                <input type="checkbox" name="best_pick" value="1" id="best_pick"
                    class="form-checkbox text-[#613bf1]">
                <label for="best_pick" class="text-sm font-medium text-gray-700">Best Pick</label>
            </div>

            {{-- =============== DYNAMIC COLORS (WITH IMAGE PREVIEW) =============== --}}
            <div>
                <label class="block text-sm font-medium text-[#000]">Colors</label>
                <div id="colorsWrapper" class="space-y-4"></div>
                <button type="button" id="addColorBtn" class="bg-[#613bf1] text-white px-3 py-1 rounded-md mt-2">+ Add
                    Color</button>
            </div>

            {{-- CATEGORY --}}
            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700">Product
                    Category</label>
                <select
                    class="w-full rounded-md mt-1 focus:ring-[#1e1e1e] focus:border-[#1e1e1e] text-sm text-[#1e1e1e]"
                    name="category_id" id="category_id">
                    <option value="">Select One</option>
                    @foreach ($cats as $c)
                        <option value="{{ $c->id }}">{{ $c->name_en }}</option>
                    @endforeach
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
            </div>


            {{-- =============== SUBMIT ACTIONS =============== --}}
            <div class="flex justify-between mt-6">
                <a href="{{ route('product_backend.index') }}"
                    class="border border-[#613bf1] hover:bg-[#613bf1] hover:text-white px-6 py-1 rounded">Back</a>
                <button type="submit" class="bg-[#613bf1] text-white px-6 py-1 rounded">Submit</button>
            </div>
        </form>
    </div>

    {{-- ================= JAVASCRIPT ================= --}}
    <script>
        ClassicEditor
            .create(document.querySelector('#content_en'), {
                toolbar: [
                    'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList',
                    'undo', 'redo', 'code', 'codeBlock'
                ],
                removePlugins: ['Heading']
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#content_km'), {
                toolbar: [
                    'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList',
                    'undo', 'redo', 'code', 'codeBlock'
                ],
                removePlugins: ['Heading']
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#content_ch'), {
                toolbar: [
                    'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList',
                    'undo', 'redo', 'code', 'codeBlock'
                ],
                removePlugins: ['Heading']
            })
            .catch(error => {
                console.error(error);
            });

        // ---------------- COLORS ----------------
        document.getElementById('addColorBtn').addEventListener('click', () => {
            const index = document.querySelectorAll('.color-block').length;
            const wrapper = document.getElementById('colorsWrapper');

            const div = document.createElement('div');
            div.classList.add('color-block', 'border', 'p-3', 'rounded-md');
            div.innerHTML = `
                <div class="flex justify-between items-center mb-2">
                    <h4 class="font-semibold text-[#000]">Color #${index + 1}</h4>
                    <button type="button" class="text-red-600 text-sm" onclick="this.closest('.color-block').remove()">✕</button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    <input type="text" name="colors[${index}][name]" placeholder="Color name"
                        class="border rounded p-2 text-sm">
                    <input type="color" name="colors[${index}][code]" class="border rounded p-1 w-16 h-10">
                    <input type="file" name="colors[${index}][images][]" multiple accept="image/*"
                        class="block border rounded p-1 text-sm color-image-input"
                        data-index="${index}">
                </div>

                <div id="color-preview-${index}"
                    class="flex flex-wrap gap-2 mt-3 bg-gray-50 p-2 rounded-md min-h-[50px] justify-start items-start">
                    <p class="text-gray-400 text-sm">No images selected.</p>
                </div>
            `;
            wrapper.appendChild(div);
        });

        // ---------------- COLOR IMAGE PREVIEW & REMOVE ----------------
        document.addEventListener('change', (event) => {
            if (event.target.classList.contains('color-image-input')) {
                const input = event.target;
                const index = input.dataset.index;
                const preview = document.getElementById(`color-preview-${index}`);
                const files = Array.from(input.files);

                if (files.length === 0) {
                    preview.innerHTML = '<p class="text-gray-400 text-sm">No images selected.</p>';
                    return;
                }

                preview.innerHTML = '';

                files.forEach((file, i) => {
                    const imgURL = URL.createObjectURL(file);
                    const wrapper = document.createElement('div');
                    wrapper.className = 'relative w-24 h-24 border rounded overflow-hidden';

                    const img = document.createElement('img');
                    img.src = imgURL;
                    img.className = 'w-full h-full object-cover';

                    const btn = document.createElement('button');
                    btn.type = 'button';
                    btn.innerHTML = '✕';
                    btn.className =
                        'absolute top-0 right-0 bg-red-600 text-white w-5 h-5 rounded-full text-xs flex items-center justify-center hover:bg-red-700';
                    btn.onclick = () => {
                        files.splice(i, 1);
                        updateColorInputFiles(input, files);
                        wrapper.remove();
                        if (files.length === 0) {
                            preview.innerHTML =
                                '<p class="text-gray-400 text-sm">No images selected.</p>';
                        }
                    };

                    wrapper.appendChild(img);
                    wrapper.appendChild(btn);
                    preview.appendChild(wrapper);
                });
            }
        });

        function updateColorInputFiles(input, files) {
            const dataTransfer = new DataTransfer();
            files.forEach(file => dataTransfer.items.add(file));
            input.files = dataTransfer.files;
        }
    </script>
</x-app-layout>
