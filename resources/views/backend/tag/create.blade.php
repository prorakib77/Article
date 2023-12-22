<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Tag') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('tag.store') }}" method="POST">
                        @csrf
                        
                        <label class="form-control w-full max-w-xs">
                            <div class="label">
                              <span class="label-text">Tag name</span>
                            </div>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Type here" class="input input-accent  w-full max-w-xs" />
                            @error('name')
                                
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
</x-app-layout>