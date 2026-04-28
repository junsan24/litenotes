<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <x-link-primary href="{{ route('notes.index') }}">Back</x-link-primary>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mt-4">
                    <x-text-input name="title" placeholder="Title" class="w-full"></x-text-input>
                    <x-textarea-input name="content" class="w-full mt-4" rows="4" placeholder="Content"></x-textarea-input>
                    <x-select-input name="status" class="mt-5"></x-select-input>
                    <x-primary-button class="mt-4">Save</x-primary-button>
                </div>
        </div>
    </div>
</x-app-layout>
