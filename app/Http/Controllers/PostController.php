<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|string',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            // 'user_id' => auth()->id(),
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('posts.index')->with('success', '게시물이 등록되었습니다.');
    }

    public function show($id){
        $post = Post::with('comments.user')->findOrFail($id);

        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function edit($id){
        $post = Post::findOrFail($id);

        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    public function update(Request $request, $id){
        $post = Post::findOrFail($id);

        $validate = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|string',
        ]);

        $post->update($validate);
        
        return redirect()->route('posts.index')->with('success', '게시물이 수정되었습니다.');
    }

    public function destroy($id){
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect() -> route('posts.index');
    }
}
