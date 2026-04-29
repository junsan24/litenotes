<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notebooks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif
                <x-link-primary href="{{ route('notebooks.index') }}">Back</x-link-primary>
                <x-link-primary href="{{ route('notebooks.edit', $notebook) }}">Edit</x-link-primary>
                <form class="inline" acction="{{ route('notebooks.destroy', $notebook) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <x-primary-button  class="ml-auto bg-red-500 hover:bg-red-600">Delete</x-primary-button>
                </form>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mt-4">
                    <h1 class="font-bold text-lg">{{ $notebook->name }}</h1>
                    <p class="mt-2">{{ $notebook->description }}</p>
                    <ul class="mt-5">
                        @foreach ($notebook->notes as $note)
                            <li>
                                <a href="{{ route('notes.show', $note) }}"> - {{ $note->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
        </div>
    </div>
</x-app-layout>
