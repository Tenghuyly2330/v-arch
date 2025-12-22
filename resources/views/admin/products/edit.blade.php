<x-app-layout>
    <div class="max-w-7xl mx-auto shadow-md rounded-lg p-6 my-2">
        <h2 class="text-2xl font-bold text-[#613bf1] mb-4">Edit Product</h2>
        <form action="{{ route('product_backend.update', $product_backend->id) }}" method="POST"
            enctype="multipart/form-data" class="space-y-6" id="itemEditForm">
            @csrf
            @method('PUT')
            @component('admin.components.alert')
            @endcomponent

            <input type="hidden" name="page" value="{{ request()->page }}">
            {{-- Basic Info --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#830B00] uppercase">English</h1>
                    <div>
                        <label for="name_en" class="block text-sm font-medium text-[#000] mb-2">Name</label>
                        <input value="{{ old('name_en', $product_backend->name_en) }}" name="name_en" id="name_en"
                            class="mt-1 block w-full p-2 border rounded-md text-black text-[12px]"></input>
                        <x-input-error class="mt-2" :messages="$errors->get('name_en')" />
                    </div>
                    <div>
                        <label for="content_en" class="block text-sm font-medium text-[#000] mb-2">Content</label>
                        <textarea name="content_en" id="content_en" rows="6"
                            class="mt-1 block w-full p-2 border rounded-md text-black text-[12px]">{{ $product_backend->content_en }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('content_en')" />
                    </div>
                </div>
                <div class="space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#830B00] uppercase">Khmer</h1>
                    <div>
                        <label for="name_km" class="block text-sm font-medium text-[#000] mb-2">Name</label>
                        <input value="{{ old('name_km', $product_backend->name_km) }}" name="name_km" id="name_km"
                            class="mt-1 block w-full p-2 border rounded-md text-black text-[12px]"></input>
                        <x-input-error class="mt-2" :messages="$errors->get('name_km')" />
                    </div>
                    <div>
                        <label for="content_km" class="block text-sm font-medium text-[#000] mb-2">Content</label>
                        <textarea name="content_km" id="content_km" rows="6"
                            class="mt-1 block w-full p-2 border rounded-md text-black text-[12px]">{{ $product_backend->content_km }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('content_km')" />
                    </div>
                </div>
                <div class="space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#830B00] uppercase">Chinese</h1>
                    <div>
                        <label for="name_ch" class="block text-sm font-medium text-[#000] mb-2">Name</label>
                        <input value="{{ old('name_ch', $product_backend->name_ch) }}" name="name_ch" id="name_ch"
                            class="mt-1 block w-full p-2 border rounded-md text-black text-[12px]"></input>
                        <x-input-error class="mt-2" :messages="$errors->get('name_ch')" />
                    </div>
                    <div>
                        <label for="content_ch" class="block text-sm font-medium text-[#000] mb-2">Content</label>
                        <textarea name="content_ch" id="content_ch" rows="6"
                            class="mt-1 block w-full p-2 border rounded-md text-black text-[12px]">{{ $product_backend->content_ch }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('content_ch')" />
                    </div>
                </div>
            </div>

            {{-- Status --}}
            <div class="flex flex-col gap-2">
                <label class="text-sm font-medium text-[#000]">Status</label>
                <div class="flex items-center gap-2">
                    <input type="hidden" name="status" value="0">
                    <input type="checkbox" id="status" name="status" value="1"
                        class="form-checkbox text-[#613bf1]" {{ $product_backend->status ? 'checked' : '' }}>
                    <label for="status" class="text-sm font-medium text-gray-700">New</label>
                </div>
            </div>


            <div class="flex flex-col gap-2">
                <label for="" class="text-sm font-medium text-[#000]">Best Pick</label>
                <div class="flex items-center gap-2">
                    <input type="hidden" name="best_pick" value="0">
                    <input type="checkbox" name="best_pick" value="1" id="best_pick"
                        class="form-checkbox text-[#613bf1]" {{ $product_backend->best_pick ? 'checked' : '' }}>
                    <label for="best_pick" class="text-sm font-medium text-gray-700">Best</label>
                </div>
            </div>

            {{-- Colors --}}
            <div>
                <label class="font-semibold">Colors</label>

                <div id="colorsWrapper" class="space-y-4">
                    @foreach ($product_backend->color as $i => $col)
                        <div class="color-block border p-3 rounded-md">
                            <div class="flex justify-between items-center mb-2">
                                <h4 class="font-semibold">Color #{{ $i + 1 }}</h4>
                                <button type="button" class="text-red-600 text-sm remove-color">✕</button>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                                <input type="text" name="colors[{{ $i }}][name]"
                                    value="{{ $col['name'] }}" placeholder="Color name" class="border p-2 rounded">
                                <input type="color" name="colors[{{ $i }}][code]"
                                    value="{{ $col['code'] }}" class="border rounded p-1 w-16 h-10">
                                <input type="file" name="colors[{{ $i }}][images][]" multiple
                                    class="color-image-input" data-index="{{ $i }}">
                            </div>

                            <div id="color-preview-{{ $i }}"
                                class="flex flex-wrap gap-2 mt-3 bg-gray-50 p-2 rounded min-h-[50px]">
                                @foreach ($col['images'] as $k => $img)
                                    @php $driveId = $col['drive_ids'][$k] ?? null; @endphp
                                    <div class="relative w-24 h-24 border rounded overflow-hidden">
                                        <img src="{{ asset($img) }}" class="w-full h-full object-cover">
                                        <button type="button"
                                            class="absolute hidden top-0 right-0 bg-red-600 text-white w-5 h-5 rounded-full text-xs flex items-center justify-center hover:bg-red-700 remove-existing"
                                            data-local="{{ $img }}"
                                            data-drive="{{ $driveId }}">✕</button>
                                        <input type="hidden" name="colors[{{ $i }}][existing_images][]"
                                            value="{{ $img }}">
                                        @if ($driveId)
                                            <input type="hidden"
                                                name="colors[{{ $i }}][existing_drive_ids][]"
                                                value="{{ $driveId }}">
                                        @endif
                                    </div>
                                @endforeach
                                @if (empty($col['images']))
                                    <p class="text-gray-400 text-sm">No images selected.</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <button type="button" id="addColorBtn" class="bg-[#613bf1] text-white px-3 py-1 rounded mt-2">+ Add
                    Color</button>
            </div>



            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700">Product Category</label>
                <select class="w-full rounded-md mt-1 focus:ring-[#FF3217] focus:border-[#FF3217] text-sm text-[#000]"
                    name="category_id" id="category_id">
                    <option value="">Select One</option>
                    @foreach ($cats as $c)
                        <option value="{{ $c->id }}"
                            {{ $c->id == $product_backend->category_id ? 'selected' : '' }}>
                            {{ $c->name_en ?? '' }}</option>
                    @endforeach
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
            </div>

            {{-- Submit --}}
            <div class="flex justify-between mt-6">
                <a href="{{ route('product_backend.index') }}"
                    class="border border-[#613bf1] hover:bg-[#613bf1] hover:text-white px-6 py-1 rounded">Back</a>
                <button type="submit" class="bg-[#613bf1] text-white px-6 py-1 rounded">Update</button>
            </div>
        </form>
    </div>

    {{-- ✅ CLEANED & FIXED JS --}}
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

        // Add new color
        document.getElementById('addColorBtn').addEventListener('click', () => {
            const index = document.querySelectorAll('.color-block').length;
            const wrapper = document.getElementById('colorsWrapper');
            const div = document.createElement('div');
            div.classList.add('color-block', 'border', 'p-3', 'rounded-md');
            div.innerHTML = `
        <div class="flex justify-between items-center mb-2">
            <h4 class="font-semibold">Color #${index + 1}</h4>
            <button type="button" class="text-red-600 text-sm remove-color">✕</button>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
            <input type="text" name="colors[${index}][name]" placeholder="Color name" class="border p-2 rounded text-sm">
            <input type="color" name="colors[${index}][code]" class="border rounded p-1 w-16 h-10">
            <input type="file" name="colors[${index}][images][]" multiple class="color-image-input" data-index="${index}">
        </div>
        <div id="color-preview-${index}" class="flex flex-wrap gap-2 mt-3 bg-gray-50 p-2 rounded min-h-[50px]">
            <p class="text-gray-400 text-sm">No images selected.</p>
        </div>
    `;
            wrapper.appendChild(div);
        });

        // Preview new images
        document.addEventListener('change', function(event) {
            if (!event.target.classList.contains('color-image-input')) return;
            const input = event.target;
            const index = input.dataset.index;
            const preview = document.getElementById(`color-preview-${index}`);
            const files = Array.from(input.files);
            preview.innerHTML = files.length ? '' : '<p class="text-gray-400 text-sm">No images selected.</p>';

            files.forEach((file, i) => {
                const wrapper = document.createElement('div');
                wrapper.className = 'relative w-24 h-24 border rounded overflow-hidden';
                const img = document.createElement('img');
                img.src = URL.createObjectURL(file);
                img.className = 'w-full h-full object-cover';

                const btn = document.createElement('button');
                btn.type = 'button';
                btn.innerHTML = '✕';
                btn.className =
                    'absolute top-0 right-0 bg-red-600 text-white w-5 h-5 rounded-full text-xs flex items-center justify-center hover:bg-red-700';
                btn.onclick = () => {
                    files.splice(i, 1);
                    const dt = new DataTransfer();
                    files.forEach(f => dt.items.add(f));
                    input.files = dt.files;
                    wrapper.remove();
                    if (files.length === 0)
                        preview.innerHTML = '<p class="text-gray-400 text-sm">No images selected.</p>';
                };

                wrapper.appendChild(img);
                wrapper.appendChild(btn);
                preview.appendChild(wrapper);
            });
        });

        // Remove existing images & color blocks
        document.addEventListener('click', function(e) {
            const form = document.getElementById('itemEditForm');

            // Remove single existing image
            if (e.target.classList.contains('remove-existing')) {
                const btn = e.target;
                const local = btn.dataset.local;
                const drive = btn.dataset.drive;

                btn.closest('.relative').remove();

                // Remove hidden inputs
                form.querySelectorAll(`input[value="${local}"]`).forEach(i => i.remove());
                if (drive) form.querySelectorAll(`input[value="${drive}"]`).forEach(i => i.remove());

                // Add to deleted_images
                const localInput = document.createElement('input');
                localInput.type = 'hidden';
                localInput.name = 'deleted_images[]';
                localInput.value = local;
                form.appendChild(localInput);

                if (drive) {
                    const driveInput = document.createElement('input');
                    driveInput.type = 'hidden';
                    driveInput.name = 'deleted_images[]';
                    driveInput.value = 'gdrive:' + drive;
                    form.appendChild(driveInput);
                }
            }

            // Remove entire color
            if (e.target.classList.contains('remove-color')) {
                const block = e.target.closest('.color-block');
                block.querySelectorAll('.remove-existing').forEach(btn => btn.click());
                block.remove();
            }
        });
    </script>
</x-app-layout>
