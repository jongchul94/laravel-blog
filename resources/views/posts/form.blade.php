@csrf
<x-head.tinymce-config/>

<div class="mb-4">
    <label for="title" class="block text-gray-700 dark:text-gray-200 font-bold mb-2">제목</label>
    <input type="text" name="title" id="title"
           value="{{ old('title', $post->title ?? '') }}"
           class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 
               bg-white dark:bg-gray-700 text-gray-900 dark:text-white 
               rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
           required>
</div>

<div class="mb-4">
    <label for="tinymcecontent" class="block text-gray-700 dark:text-gray-200 font-bold mb-2">내용</label>
    <textarea name="content" id="tinymcecontent" rows="6"
              class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
        {{ old('content', $post->content ?? '') }}
    </textarea>
</div>

<div class="text-right">
    <button type="submit" class="bg-blue-400 text-gray px-4 py-2 rounded hover:bg-blue-500 transition">저장</button>
    <button type="button" class="bg-red-400 text-gray px-4 py-2 rounded hover:bg-red-500 transition" onclick="location.href='{{url()->previous()}}'">취소</button>
</div>
