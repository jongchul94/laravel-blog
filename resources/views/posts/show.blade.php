<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Show
        </h2>
    </x-slot>
    <div class="mb-4">
        제목 : {{$post->title}}
    </div>
    <div class="mb-4">
        내용 : {{$post->content}}
    </div>
    <div>
        <button type="button" onclick="location.href='{{route('posts.edit', [$post->id])}}'">수정</button>
        <form method="post" action="{{route('posts.destroy', [$post->id])}}">
            @method('DELETE')
            @csrf
            <button type="submit">삭제</button>
        </form>
        <button type="button" onclick="location.href='{{route('posts.index')}}'">목록</button>
    </div>
</x-app-layout>