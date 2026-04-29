<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-alert-success>{{ session('success') }}</x-alert-success>

            <x-link-primary href="{{ route('notes.index') }}">Back</x-link-primary>

            <x-link-primary href="{{ route('notes.edit', $note) }}" class="ml-auto">Edit</x-link-primary>

            <form class="inline" acction="{{ route('notes.destroy', $note) }}" method="POST">
                @method('DELETE')
                @csrf
                <x-primary-button  class="ml-auto bg-red-500 hover:bg-red-600">Delete</x-primary-button>
            </form>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mt-4">
                <h1 class="font-bold text-lg">{{ $note->title }}</h1>
                <p class="mt-4">{!! nl2br(e($note->content)) !!}</p>
                <span class="inline-block mt-4 opacity-60 text-sm">Notebook: {{ $note->notebook->name }}</span>
                <br>
                <span class="inline-block mt-4 opacity-60 text-sm">Created: {{ $note->created_at->diffForHumans() }}</span>
                <br>
                <span class="inline-block mt-4 opacity-60 text-sm">Updated: {{ $note->updated_at->diffForHumans() }}</span>
            </div>
        </div>
    </div>
</x-app-layout>
