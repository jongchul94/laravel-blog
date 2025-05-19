<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Show
        </h2>
    </x-slot>
    <div class="container mx-auto p-6">
        <div class="bg-white shadow rounded-lg p-6 mb-4">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold">{{ $post->title }}</h1>
            </div>
            <div class="text-sm text-gray-500 mt-2">
                <!-- <span>작성자: {{ $post->user_id}}</span> -->
                <span class="ml-4">{{ $post->created_at->format('Y-m-d H:i') }}</span>
            </div>
            <div class="mt-4 text-gray-700 leading-relaxed">
                {!! nl2br($post->content) !!}
            </div>
        </div>
        <div class="mt-4 flex justify-end gap-2">
            <button class="bg-blue-400 text-gray px-4 py-2 rounded hover:bg-blue-500 transition" type="button" onclick="location.href='{{route('posts.edit', [$post->id])}}'">수정</button>
            <form method="post" action="{{route('posts.destroy', [$post->id])}}" class="inline-block">
                @method('DELETE')
                @csrf
                <button class="bg-red-400 text-gray px-4 py-2 rounded hover:bg-red-500 transition" type="submit">삭제</button>
            </form>
            <button class="bg-stone-200 text-gray px-4 py-2 rounded hover:bg-stone-300 transition" type="button" onclick="location.href='{{route('posts.index')}}'">목록</button>
        </div>
    </div>
</x-app-layout>