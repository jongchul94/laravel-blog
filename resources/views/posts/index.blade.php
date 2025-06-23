<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Index
        </h2>
    </x-slot>
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
        <form method="GET" action="{{ route('posts.index') }}" class="mt-3 mb-6 flex items-center gap-2">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}" 
                placeholder="제목 또는 내용을 검색하세요"
                class="flex-1 border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
            <button 
                type="submit"
                class="bg-green-500 text-white rounded px-4 py-2 hover:bg-green-600 transition"
            >
                검색
            </button>
        </form>

        <table class="min-w-full bg-white dark:bg-gray-800 overflow-x-auto">
            <thead class="w-full bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300 uppercase text-sm leading-normal">
                <tr>
                    <th class="py-3 px-6">제목</th>
                    <th class="py-3 px-6">작성일</th>
                    <th class="py-3 px-6">작성자</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 dark:text-gray-200 text-sm">
            @foreach($posts as $post)
                <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700">
                    <td class="py-3 px-6 text-center truncate"><a href="{{route('posts.show', [$post->id])}}">{{$post->title}}</a></td>
                    <td class="py-3 px-6 text-center">{{$post->created_at->format('Y-m-d H:i')}}</td>
                    <td class="py-3 px-6 text-center truncate">{{$post->user->name}}</td>
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
    <div class="mt-6">
        <div class="flex justify-center">
            {{ $posts->links('pagination::tailwind') }}
        </div>
    </div>
</x-app-layout>