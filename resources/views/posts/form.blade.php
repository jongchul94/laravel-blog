@csrf

<div class="mb-4">
    <label for="title" class="block text-gray-700 font-bold mb-2">제목</label>
    <input type="text" name="title" id="title"
           value="{{ old('title', $post->title ?? '') }}"
           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
           required>
</div>

<div class="mb-4">
    <label for="content" class="block text-gray-700 font-bold mb-2">내용</label>
    <textarea name="content" id="content" rows="6"
              class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
              required>{{ old('content', $post->content ?? '') }}</textarea>
</div>

<div class="text-right">
    <button type="submit" class="bg-blue-500 text-gray px-4 py-2 rounded hover:bg-blue-600 transition">저장</button>
    <button type="button" onclick="location.href='{{url()->previous()}}'">취소</button>
</div>
