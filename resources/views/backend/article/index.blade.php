<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="headers flex  justify-between align-middle items-center">
                        <h3>{{ __('Tags List') }} </h3>
                        <a href="{{ route('article.create') }}" class="btn btn-accent">Add Article</a>
                    </div>

                    {{-- Tags list  --}}
                    <div class="overflow-x-auto">
                        <table class="table">
                            <!-- head -->
                            <thead>
                                <tr>
                                    <th>SL NO</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Tags</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- row 1 -->
                                @foreach ($articles as $article)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $article->title }}</td>
                                        <td>{!!Str::limit($article->description, 20) !!}</td>
                                        <td><img style="height: 50px" src="{{ asset($article->image) }}" alt=""></td>
                                        <td>{{ $article->category->name }}</td>
                                        <td>
                                            @foreach ($article->tags as $tag)
                                            <span class="badge badge-primary">{{ $tag->name }}</span>
                                            @endforeach
                                        </td>
                                        <td class="flex gap-2">
                                            <a href="{{ route('article.edit', $article->id) }}"
                                                class="btn btn-outline btn-primary">Edit</a>
                                            <form action="{{ route('article.destroy', $article->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-outline btn-error" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    {{-- Tags list  --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
