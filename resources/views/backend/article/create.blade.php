<x-app-layout>
    @push('custom_css')
        <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
    @endpush
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">Article Title</span>
                            </div>
                            <input type="text" name="title" value="{{ old('title') }}" placeholder="Type here"
                                class="input input-accent  w-full" />
                            @error('title')
                                <div class="label">
                                    <span class="label-text-alt text-error">
                                        {{ $message }}
                                    </span>
                                </div>
                            @enderror
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">Article Category</span>
                            </div>
                            <select class="select select-accent w-full " name="category_id">
                                <option value="">Select Category</option>
                                @foreach ($categories as $categorie)
                                <option @selected(old('category_id')== $categorie->id) value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                @endforeach
                              </select>
                            @error('category_id')
                                <div class="label">
                                    <span class="label-text-alt text-error">
                                        {{ $message }}
                                    </span>
                                </div>
                            @enderror
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text">Article Tags</span>
                            </div>
                            <select multiple class="select select-accent w-full " name="tags[]">
                                <option value="">Select Tags</option>
                                @foreach ($tags as $tag)
                                <option @selected(collect(old('tags'))->contains($tag->id))
                                    value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                              </select>
                            @error('tags')
                                <div class="label">
                                    <span class="label-text-alt text-error">
                                        {{ $message }}
                                    </span>
                                </div>
                            @enderror
                        </label>


                        <label class="form-control w-full ">
                            <div class="label">
                                <span class="label-text">Description</span>
                            </div>
                            <div class="prose lg:prose-xl">
                                <textarea id="editor" type="text" class="text-black" name="description"placeholder="Description" class="">{{ old('description') }}</textarea>
                            </div>
                            @error('description')
                                <div class="label">
                                    <span class="label-text-alt text-error">
                                        {{ $message }}
                                    </span>
                                </div>
                            @enderror
                        </label>
                        <label class="form-control w-full ">
                            <div class="label">
                                <span class="label-text">Thumbnail Image</span>
                            </div>
                            <input type="file" class="file-input file-input-bordered file-input-accent w-full max-w-xs" name="image"/>
                            @error('image')
                                <div class="label">
                                    <span class="label-text-alt text-error">
                                        {{ $message }}
                                    </span>
                                </div>
                            @enderror
                        </label>
                        <button class="btn btn-active mt-3 btn-secondary" type="submit">Create</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @push('custom_js')
        <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

        <script>
            ClassicEditor
                .create(document.querySelector('#editor'))
                .catch(error => {
                    console.error(error);
                });

        </script>
    @endpush
</x-app-layout>
