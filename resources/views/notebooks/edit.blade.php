<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Notebook') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <x-link-primary href="{{ route('notebooks.index') }}">Back</x-link-primary>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mt-4">
                    <form method="POST" action="{{ route('notebooks.update', $notebook) }}">
                        @method('PUT')
                        @csrf
                        <x-text-input class="md-5" name="name" placeholder="Name" class="w-full" value="{{ @old('name', $notebook->name) }}"></x-text-input>
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror 
                        <x-textarea-input rows="4" class="mt-5" name="description" placeholder="Description" class="w-full" value="{{ @old('description', $notebook->description) }}"></x-textarea-input>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror 
                        <x-select-input></x-select-input>
                        <x-primary-button class="mt-4">Save</x-primary-button>
                    </form>
                </div>
        </div>
    </div>
</x-app-layout>
