<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vehicles Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('vehicles.store') }}" method="POST">
                        @csrf
                        <div>
                            <x-input-label for="licensePlate" :value="__('License Plate')" />
                            <x-text-input id="licensePlate" class="block mt-1 w-full" type="text" name="licensePlate"
                                :value="old('licensePlate')" required autofocus autocomplete="licensePlate" />
                            <x-input-error :messages="$errors->get('licensePlate')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="model" :value="__('Model')" />
                            <x-text-input id="model" class="block mt-1 w-full" type="text" name="model"
                                :value="old('model')" required autofocus autocomplete="model" />
                            <x-input-error :messages="$errors->get('model')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="year" :value="__('Year')" />
                            <x-text-input id="year" class="block mt-1 w-full" type="text" name="year"
                                :value="old('year')" required autofocus autocomplete="year" />
                            <x-input-error :messages="$errors->get('year')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="status" :value="__('Status')" />
                            <x-text-input id="status" class="block mt-1 w-full" type="text" name="status"
                                :value="old('status')" required autofocus autocomplete="status" />
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="owner_id" :value="__('Owner')" />
                            <select id="owner_id" type="text" name="owner_id"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                                @foreach ($owners as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('owner_id')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="location_id" :value="__('Location')" />
                            <select id="location_id" type="text" name="location_id"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                                @foreach ($locations as $item)
                                    <option value="{{ $item->id }}">{{ $item->location }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('location_id')" class="mt-2" />
                        </div>
                        <x-primary-button class="mt-4">
                            {{ __('Save') }}
                        </x-primary-button>
                    </form>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
