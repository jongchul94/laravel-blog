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
                <span>작성자: {{ $post->user->name}}</span>
                <span class="ml-4">{{ $post->created_at->format('Y-m-d H:i') }}</span>
            </div>
            <div class="mt-4 text-gray-700 leading-relaxed">
                {!! nl2br($post->content) !!}
            </div>
        </div>
        <div class="mt-4 flex justify-end gap-2">
            @auth
                @if (auth()->id() === $post->user_id || auth()->user()->is_admin)
                    <button class="bg-blue-400 text-gray px-4 py-2 rounded hover:bg-blue-500 transition" type="button" onclick="location.href='{{route('posts.edit', [$post->id])}}'">수정</button>
                    <form method="post" action="{{route('posts.destroy', [$post->id])}}" class="inline-block">
                        @method('DELETE')
                        @csrf
                        <button class="bg-red-400 text-gray px-4 py-2 rounded hover:bg-red-500 transition" type="submit">삭제</button>
                    </form>
                @endif
            @endauth
            <button class="bg-stone-200 text-gray px-4 py-2 rounded hover:bg-stone-300 transition" type="button" onclick="location.href='{{route('posts.index')}}'">목록</button>
        </div>

        <div class="mt-4 bg-white shadow rounded-lg p-6">
            <h2 class="text-lg font-semibold mb-4">댓글</h2>
            @foreach ($post->comments as $comment)
                <div class="border-b py-3 flex justify-between items-center">
                    <div class="text-gray-500 text-sm">
                        <span class="font-semibold">{{ $comment->user->name }}</span> ·
                        <span class="text-gray-500">{{ $comment->created_at->format('Y-m-d H:i') }}</span><br>
                        <span>{{ $comment->content }}</span>
                    </div>
                    @auth
                        @if (auth()->id() === $comment->user_id || auth()->user()->is_admin)
                            <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="ml-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="삭제" class="text-red-400 hover:text-red-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </form>
                        @endif
                    @endauth
                </div>
            @endforeach

            @auth
            <form method="POST" action="{{ route('comments.store') }}">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <textarea name="content" class="w-full border rounded p-2 mb-2" placeholder="댓글을 입력하세요"></textarea>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    댓글 작성
                </button>
            </form>
            @endauth
        </div>
    </div>
</x-app-layout>