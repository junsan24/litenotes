<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Trashed') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <x-alert-success>{{ session('success') }}</x-alert-success>

                <x-link-primary href="{{ route('notes.create') }}">Add Note</x-link-primary>
                @forelse ($notes as $note)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mt-4">
                        <a href="{{ route('notes.show', $note) }}"><h1 class="font-bold text-lg">{{ $note->title }}</h1></a>
                        <p class="mt-4">{{ Str::limit($note->content, 200, '...'); }}</p>
                        <span class="inline-block mt-4 opacity-60 text-sm">Notebook: {{ $note->notebook->name }}</span>
                        <br>
                        <span class="inline-block mt-4 opacity-60">{{ $note->updated_at->diffForHumans() }}</span>
                    </div>
                @empty
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                        <h1 class="p-6">No trashed notes.</h1>
                    </div>
                @endforelse
        </div>
    </div>
</x-app-layout>
