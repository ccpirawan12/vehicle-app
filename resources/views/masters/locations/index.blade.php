<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Locations') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 relative overflow-x-auto shadow-md sm:rounded-lg">
                    <a href="{{ route('locations.create') }}"
                        class="px-4 py-2 rounded-lg bg-slate-900 text-white font-semibold text-sm">Add location</a>

                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-8">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">No.</th>
                                <th scope="col" class="px-6 py-3">Location</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($locations as $location)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4">{{ $location->location }}</td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('locations.destroy', $location->id) }}" method="POST">
                                            <a href="{{ route('locations.edit', $location->id) }}"
                                                class="btn btn-sm btn-inverse-success">
                                                <i class="mdi mdi-table-edit" ></i>
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-inverse-danger" type="submit">
                                            <i class="mdi mdi-delete-forever" ></i>
                                            </button>
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
