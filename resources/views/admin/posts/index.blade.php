<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Admin - Posts
        </h2>
    </x-slot>
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full bg-white dark:bg-gray-800">
            <thead class="w-full bg-gray-200 dark:bg-gray-700 text-gray-600 dark:text-gray-300 uppercase text-sm leading-normal">
                <tr>
                    <th class="px-4 py-2">제목</th>
                    <th class="px-4 py-2">작성자</th>
                    <th class="px-4 py-2">작성일</th>
                    <th class="px-4 py-2">관리</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 dark:text-gray-200 text-sm">
                @foreach ($posts as $post)
                    <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <td class="px-4 py-2 text-center">{{ $post->title }}</td>
                        <td class="px-4 py-2 text-center">{{ $post->user->name }}</td>
                        <td class="px-4 py-2 text-center">{{ $post->created_at->format('Y-m-d H:i') }}</td>
                        <td class="px-4 py-2 text-center">
                            <form method="POST" action="{{ route('admin.posts.destroy', $post) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 text-sm">
                                    삭제
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>