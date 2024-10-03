<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Owners Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('owners.store') }}" method="POST">
                        @csrf
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="contactInfo" :value="__('Contact Info')" />
                            <x-text-input id="contactInfo" class="block mt-1 w-full" type="text" name="contactInfo"
                                :value="old('contactInfo')" required autofocus autocomplete="contactInfo" />
                            <x-input-error :messages="$errors->get('contactInfo')" class="mt-2" />
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
