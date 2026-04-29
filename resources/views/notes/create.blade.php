<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <x-link-primary href="{{ route('notes.index') }}">Back</x-link-primary>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mt-4">
                    <form method="POST" action="{{ route('notes.store') }}">
                        @csrf
                        <x-text-input name="title" placeholder="Title" class="w-full" value="{{ @old('title') }}"></x-text-input>
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <x-textarea-input name="content" class="w-full mt-4" rows="4" placeholder="Content">{{ @old('content') }}</x-textarea-input>
                        @error('content')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <select name="notebook"
                            class="w-full mt-5 bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-gray-300 rounded pl-3 pr-8 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md appearance-none cursor-pointer">
                            <option selected disabled value="">Select a notebook...</option>
                            @foreach ($notebooks as $notebook)
                                <option value="{{ $notebook->id }}">{{ $notebook->name }}</option>
                            @endforeach
                        </select>
                        @error('notebook')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <x-select-input class="mt-5"></x-select-input>
                        <x-primary-button class="mt-4">Save</x-primary-button>
                    </form>
                </div>
        </div>
    </div>
</x-app-layout>
