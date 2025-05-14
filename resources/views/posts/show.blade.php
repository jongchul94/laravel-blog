<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Show
        </h2>
    </x-slot>
    <div class="">
        <div>
            제목 : {{$post->title}}
        </div>
        <div>
            내용 : {!! $post->content !!}
        </div>
        <div class="mt-4 text-right">
            <button class="bg-blue-400 text-gray px-4 py-2 rounded hover:bg-blue-500 transition" type="button" onclick="location.href='{{route('posts.edit', [$post->id])}}'">수정</button>
            <form method="post" action="{{route('posts.destroy', [$post->id])}}">
                @method('DELETE')
                @csrf
                <button class="bg-red-400 text-gray px-4 py-2 rounded hover:bg-red-500 transition" type="submit">삭제</button>
            </form>
            <button class="bg-stone-200 text-gray px-4 py-2 rounded hover:bg-stone-300 transition" type="button" onclick="location.href='{{route('posts.index')}}'">목록</button>
        </div>
    </div>
</x-app-layout>