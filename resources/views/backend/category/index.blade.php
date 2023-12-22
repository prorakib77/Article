<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="headers flex  justify-between align-middle items-center">
                        <h3>{{ __("Category List") }} </h3> 
                    <a href="{{ route('category.create') }}" class="btn btn-accent">Add Category</a>
                    </div>

                    {{-- category list  --}}
                    <div class="overflow-x-auto">
                        <table class="table">
                          <!-- head -->
                          <thead>
                            <tr>
                              <th>SL NO</th>
                              <th>Name</th>
                              <th>Description</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <!-- row 1 -->
                            @foreach ($categories as $category)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $category->name }}</td>
                                <td>{{ Str::limit($category->description, 10) }}</td>
                                <td class="flex gap-2">
                                  <a href="{{ route('category.edit',$category->id) }}" class="btn btn-outline btn-primary">Edit</a>
                                  <form action="{{ route('category.destroy',$category->id) }}" method="POST">
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
                    {{-- category list  --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>