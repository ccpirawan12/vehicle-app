<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Owners') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 relative overflow-x-auto shadow-md sm:rounded-lg">
                    <a href="{{ route('owners.create') }}"
                        class="px-4 py-2 rounded-lg bg-slate-900 text-white font-semibold text-sm">Add owner</a>

                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-8">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">No.</th>
                                <th scope="col" class="px-6 py-3">Name</th>
                                <th scope="col" class="px-6 py-3">Contact Info</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($owners as $owner)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4">{{ $owner->name }}</td>
                                    <td class="px-6 py-4">{{ $owner->contactInfo }}</td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('owners.destroy', $owner->id) }}" method="POST">
                                            <a href="{{ route('owners.edit', $owner->id) }}"
                                                class="py-2 px-4 bg-blue-700 text-white font-semibold text-xs rounded-lg">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="py-2 px-4 bg-red-700 text-white font-semibold text-xs rounded-lg">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
