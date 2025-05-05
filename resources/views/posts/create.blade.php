<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create
        </h2>
    </x-slot>
    <form method="POST" action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}">
        @if(isset($post))
            @method('PUT')
        @endif

        @include('posts.form')
    </form>
</x-app-layout>