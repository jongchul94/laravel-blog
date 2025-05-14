<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Index
        </h2>
    </x-slot>
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full bg-white">
            <thead class="w-full bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <tr>
                    <th class="py-3 px-6"></th>
                    <th class="py-3 px-6">제목</th>
                    <th class="py-3 px-6">작성일</th>
                    <th class="py-3 px-6">작성자</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm">
            @foreach($posts as $post)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-center"></td>
                    <td class="py-3 px-6 text-center"><a href="{{route('posts.show', [$post->id])}}">{{$post->title}}</a></td>
                    <td class="py-3 px-6 text-center">{{$post->created_at}}</td>
                    <td class="py-3 px-6 text-center"></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4 text-right">
        <button class="bg-blue-400 text-white px-4 py-2 rounded hover:bg-blue-500 transition" type="button" onclick="location.href='{{route('posts.create')}}'">
            작성
        </button>
    </div>
</x-app-layout>