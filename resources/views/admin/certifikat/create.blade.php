<x-admin-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold">Create Project</h1>
    </x-slot>
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <form action="{{ route('admin.certificates.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Judul</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                    required>
                @error('title')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="issuer" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Issuer</label>
                <input type="text" id="issuer" name="issuer" value="{{ old('issuer') }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                    required>
                @error('issuer')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
           <div class="mb-4">
    <label for="year" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Year</label>
    <input type="number" id="year" name="year" min="1900" max="2100" step="1"
    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
    required
    value="{{ old('year') }}">
    @error('year')
        <span class="text-red-600 text-sm">{{ $message }}</span>
    @enderror
</div>

<div class="mb-4">
<label for="file" class="block text-sm font-medium text-gray-700 dark:text-gray-200">File</label>
<input type="file" id="file" name="file"  class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white"
 required>
 @error('file')
 <span class="text-red-600 text-sm">{{ $message }}</span>
   @enderror
 </div>

 <div class="flex items-center justify-between">
 <a href="{{ route('admin.certificates.index') }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">
Back to Users List
 </a>
 <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white text-xs uppercase tracking-widest shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Create Projects
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
