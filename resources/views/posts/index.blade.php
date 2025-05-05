<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Index
        </h2>
    </x-slot>
    <div class="mb-4">
        <tr>
            <td></td>
            <td>제목</td>
            <td>작성일</td>
        </tr>
    </div>
    <div class="mb-4">
        @foreach($posts as $post)
            <tr>
                <td></td>
                <td><a href="{{route('posts.show', [$post->id])}}">{{$post->title}}</a></td>
                <td>{{$post->created_at}}</td>
            </tr>
        @endforeach
    </div>
    <div class="mb-4">
        <button type="button" onclick="location.href='{{route('posts.create')}}'">
            작성
        </button>
    </div>
</x-app-layout>