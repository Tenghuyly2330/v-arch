<x-app-layout>
    <div class="max-w-7xl mx-auto shadow-md rounded-lg p-6 my-2">
        <h2 class="text-2xl font-bold text-[#401457]">Edit About</h2>
        <form action="{{ route('about_backend.update', $about->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-4">
            @csrf
            @method('PATCH')
            @component('admin.components.alert')
            @endcomponent

            <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                <div class="space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#830B00] uppercase">English</h1>

                    <div>
                        <label for="title_en" class="block text-sm font-medium text-[#000] mb-2">Title</label>
                        <input value="{{ old('title_en', $about->title_en) }}" name="title_en" id="title_en"
                            class="mt-1 block w-full p-2 border rounded-md text-black text-[12px]"></input>
                        <x-input-error class="mt-2" :messages="$errors->get('title_en')" />
                    </div>
                    <div>
                        <label for="content1_en" class="block text-sm font-medium text-[#000] mb-2">Content 1</label>
                        <textarea name="content1_en" id="content1_en" rows="6"
                            class="mt-1 block w-full p-2 border rounded-md text-black text-[12px]">{{ old('content1_en', $about->content1_en) }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('content1_en')" />
                    </div>
                    @if ($about->id == 4)
                        <div>
                            <label for="content2_en" class="block text-sm font-medium text-[#000] mb-2">Content
                                2</label>
                            <textarea name="content2_en" id="content2_en" rows="6"
                                class="mt-1 block w-full p-2 border rounded-md text-black text-[12px]">{{ old('content2_en', $about->content2_en) }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('content2_en')" />
                        </div>
                        <div>
                            <label for="content3_en" class="block text-sm font-medium text-[#000] mb-2">Content
                                3</label>
                            <textarea name="content3_en" id="content3_en" rows="6"
                                class="mt-1 block w-full p-2 border rounded-md text-black text-[12px]">{{ old('content3_en', $about->content3_en) }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('content3_en')" />
                        </div>
                        <div>
                            <label for="content4_en" class="block text-sm font-medium text-[#000] mb-2">Content
                                4</label>
                            <textarea name="content4_en" id="content4_en" rows="6"
                                class="mt-1 block w-full p-2 border rounded-md text-black text-[12px]">{{ old('content4_en', $about->content4_en) }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('content4_en')" />
                        </div>
                        <div>
                            <label for="content5_en" class="block text-sm font-medium text-[#000] mb-2">Content
                                5</label>
                            <textarea name="content5_en" id="content5_en" rows="6"
                                class="mt-1 block w-full p-2 border rounded-md text-black text-[12px]">{{ old('content5_en', $about->content5_en) }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('content5_en')" />
                        </div>
                    @endif
                </div>

                <div class="space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#830B00] uppercase">Khmer</h1>
                    <div>
                        <label for="title_km" class="block text-sm font-medium text-[#000] mb-2">Title</label>
                        <input value="{{ old('title_km', $about->title_km) }}" name="title_km" id="title_km"
                            class="mt-1 block w-full p-2 border rounded-md text-black text-[12px]"></input>
                        <x-input-error class="mt-2" :messages="$errors->get('title_km')" />
                    </div>
                    <div>
                        <label for="content1_km" class="block text-sm font-medium text-[#000] mb-2">Content 1</label>
                        <textarea name="content1_km" id="content1_km" rows="6"
                            class="mt-1 block w-full p-2 border rounded-md text-black text-[12px]">{{ old('content1_km', $about->content1_km) }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('content1_km')" />
                    </div>
                    @if ($about->id == 4)
                        <div>
                            <label for="content2_km" class="block text-sm font-medium text-[#000] mb-2">Content
                                2</label>
                            <textarea name="content2_km" id="content2_km" rows="6"
                                class="mt-1 block w-full p-2 border rounded-md text-black text-[12px]">{{ old('content2_km', $about->content2_km) }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('content2_km')" />
                        </div>
                        <div>
                            <label for="content3_km" class="block text-sm font-medium text-[#000] mb-2">Content
                                3</label>
                            <textarea name="content3_km" id="content3_km" rows="6"
                                class="mt-1 block w-full p-2 border rounded-md text-black text-[12px]">{{ old('content3_km', $about->content3_km) }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('content3_km')" />
                        </div>
                        <div>
                            <label for="content4_km" class="block text-sm font-medium text-[#000] mb-2">Content
                                4</label>
                            <textarea name="content4_km" id="content4_km" rows="6"
                                class="mt-1 block w-full p-2 border rounded-md text-black text-[12px]">{{ old('content4_km', $about->content4_km) }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('content4_km')" />
                        </div>
                        <div>
                            <label for="content5_km" class="block text-sm font-medium text-[#000] mb-2">Content
                                5</label>
                            <textarea name="content5_km" id="content5_km" rows="6"
                                class="mt-1 block w-full p-2 border rounded-md text-black text-[12px]">{{ old('content5_km', $about->content5_km) }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('content5_km')" />
                        </div>
                    @endif
                </div>
                <div class="space-y-4">
                    <h1 class="text-[20px] font-[600] text-[#830B00] uppercase">Chinese</h1>
                    <div>
                        <label for="title_ch" class="block text-sm font-medium text-[#000] mb-2">Title</label>
                        <input value="{{ old('title_ch', $about->title_ch) }}" name="title_ch" id="title_ch"
                            class="mt-1 block w-full p-2 border rounded-md text-black text-[12px]"></input>
                        <x-input-error class="mt-2" :messages="$errors->get('title_ch')" />
                    </div>
                    <div>
                        <label for="content1_ch" class="block text-sm font-medium text-[#000] mb-2">Content 1</label>
                        <textarea name="content1_ch" id="content1_ch" rows="6"
                            class="mt-1 block w-full p-2 border rounded-md text-black text-[12px]">{{ old('content1_ch', $about->content1_ch) }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('content1_ch')" />
                    </div>
                    @if ($about->id == 4)
                        <div>
                            <label for="content2_ch" class="block text-sm font-medium text-[#000] mb-2">Content
                                2</label>
                            <textarea name="content2_ch" id="content2_ch" rows="6"
                                class="mt-1 block w-full p-2 border rounded-md text-black text-[12px]">{{ old('content2_ch', $about->content2_ch) }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('content2_ch')" />
                        </div>
                        <div>
                            <label for="content3_ch" class="block text-sm font-medium text-[#000] mb-2">Content
                                3</label>
                            <textarea name="content3_ch" id="content3_ch" rows="6"
                                class="mt-1 block w-full p-2 border rounded-md text-black text-[12px]">{{ old('content3_ch', $about->content3_ch) }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('content3_ch')" />
                        </div>
                        <div>
                            <label for="content4_ch" class="block text-sm font-medium text-[#000] mb-2">Content
                                4</label>
                            <textarea name="content4_ch" id="content4_ch" rows="6"
                                class="mt-1 block w-full p-2 border rounded-md text-black text-[12px]">{{ old('content4_ch', $about->content4_ch) }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('content4_ch')" />
                        </div>
                        <div>
                            <label for="content5_ch" class="block text-sm font-medium text-[#000] mb-2">Content
                                5</label>
                            <textarea name="content5_ch" id="content5_ch" rows="6"
                                class="mt-1 block w-full p-2 border rounded-md text-black text-[12px]">{{ old('content5_ch', $about->content5_ch) }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('content5_ch')" />
                        </div>
                    @endif
                </div>

            </div>

            <div class="flex justify-between">
                <a href="{{ route('about_backend.index') }}"
                    class="border border-[#1e1e1e] hover:!bg-[#1e1e1e] hover:!text-[#ffffff] px-4 py-1 md:px-6 rounded-[5px] text-[#1e1e1e]">
                    Back
                </a>

                <button type="submit" class="bg-[#1e1e1e] text-white px-4 py-1 md:px-6 rounded-[5px]">Submit</button>
            </div>
        </form>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#content1_en'), {
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
            .create(document.querySelector('#content2_en'), {
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
            .create(document.querySelector('#content3_en'), {
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
            .create(document.querySelector('#content4_en'), {
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
            .create(document.querySelector('#content5_en'), {
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
            .create(document.querySelector('#content1_km'), {
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
            .create(document.querySelector('#content2_km'), {
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
            .create(document.querySelector('#content3_km'), {
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
            .create(document.querySelector('#content4_km'), {
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
            .create(document.querySelector('#content5_km'), {
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
            .create(document.querySelector('#content1_ch'), {
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
            .create(document.querySelector('#content2_ch'), {
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
            .create(document.querySelector('#content3_ch'), {
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
            .create(document.querySelector('#content4_ch'), {
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
            .create(document.querySelector('#content5_ch'), {
                toolbar: [
                    'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList',
                    'undo', 'redo', 'code', 'codeBlock'
                ],
                removePlugins: ['Heading']
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</x-app-layout>
