<x-admin-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold">Edit Projects</h1>
    </x-slot>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <form action="{{ route('admin.projects.update', $project) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Judul</label>
                <input type="text" id="title" name="title" value="{{ old('title', $project->title) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                    required>
                @error('title')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

              <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Deskripsi</label>
            <textarea id="description" name="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" rows="6">{{ $project->description }}</textarea>
            @error('description')
             <span class="text-red-600 text-sm">{{ $message }}</span>
              @enderror
                </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Gambar</label>
                <input type="file" id="image" name="image"
                     class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">
                @if($project->image)
                    <img src="{{ asset('storage/' . $project->image) }}" width="100px" class="mt-2">
                @endif
                @error('image')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>


            <div class="mb-4">
                <label for="link" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Link</label>
                <input type="text" id="link" name="link" value="{{ old('link', $project->link) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                    required>
                @error('link')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror

            <div class="flex items-center justify-between">
                <a href="{{ route('admin.projects.index') }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">
                    Back to Project List
                </a>

                <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white text-xs uppercase tracking-widest shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Update Project
                </button>
            </div>
        </form>
    </div>

    {{-- CKEditor JS --}}
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
</x-admin-layout>
