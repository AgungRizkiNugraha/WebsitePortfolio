<x-admin-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold">Projects List</h1>
    </x-slot>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <!-- Desktop View -->
        <div class="overflow-x-auto">
            <div class="mb-4 flex justify-between items-center">
                <a href="{{ route('admin.certificates.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white text-xs uppercase tracking-widest shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Add New Certificate
                </a>
            </div>

            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-1000">
                <thead class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Judul</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Isuer</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Tahun terbit</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">sertifikat </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-700">
                    @forelse($certificates as $certificate )
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{ $certificate->title}}</td>
                            <td class="max-w-[250px] truncate whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{ $certificate->issuer }}</td>
                            <td class="max-w-[250px] truncate whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{ $certificate->year }}</td>
                             <td class="text-sm text-gray-500 dark:text-gray-400"><img src="{{asset('storage/'. $certificate->file)}}"width="48px"></td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300">View</a>
                                <a href="" class="ml-4 text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300">Edit</a>
                                <form action="{{ route('admin.certificates.destroy', $certificate) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="ml-4 text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                No Certicate found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Mobile View -->
        <div class="block md:hidden space-y-4">
            @forelse($certificates as $certificate)
                <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md">
                    <div class="flex justify-between items-center mb-4">
                        <div class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $certificate->title }}</div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">{{ $certificate->issuer }}</div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">{{ $certificate->year }}</div>
                         <div class="text-sm text-gray-500 dark:text-gray-400"><img src="{{ asset('files/' . $certificate->file) }}"></div>

                    </div>
                    <div class="flex space-x-4">
                        <a href="" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300">View</a>
                        <a href="" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300">Edit</a>
                        <form action="{{ route('admin.projects.destroy', $certificate) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300">Delete</button>

                        </form>
                    </div>
                </div>
            @empty
                <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md text-center text-gray-500 dark:text-gray-400">
                    No certificate found.
                </div>
            @endforelse
        </div>
    </div>
</x-admin-layout>
