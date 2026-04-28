<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <x-link-primary href="{{ route('notes.create') }}">Add Note</x-link-primary>
                @forelse ($notes as $note)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mt-4">
                        <h1>{{ $note->title }}</h1>
                        <p>{{ Str::limit($note->content, 200, '...'); }}</p>
                        <span>{{ $note->updated_at->diffForHumans() }}</span>
                    </div>
                @empty
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <h1 class="p-6">No notes.</h1>
                    </div>
                @endforelse
        </div>
    </div>
</x-app-layout>
