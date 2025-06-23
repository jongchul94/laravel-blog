<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->paginate(10)->withQueryString();
        return view('admin.posts.index', compact('posts'));
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts')->with('success', '게시글이 삭제되었습니다.');
    }
}
