<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif
                <x-link-primary href="{{ route('notes.create') }}">Add Note</x-link-primary>
                @forelse ($notes as $note)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mt-4">
                        <h1 class="font-bold text-lg">{{ $note->title }}</h1>
                        <p class="mt-4">{{ Str::limit($note->content, 200, '...'); }}</p>
                        <span class="inline-block mt-4 opacity-60">{{ $note->updated_at->diffForHumans() }}</span>
                    </div>
                @empty
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                        <h1 class="p-6">No notes.</h1>
                    </div>
                @endforelse
        </div>
    </div>
</x-app-layout>
