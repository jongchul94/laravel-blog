<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'content' => 'required|string|max:1000',
        ]);

        Comment::create([
            'post_id' => $request->post_id,
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        return back()->with('success', '댓글이 등록되었습니다.');
    }

    public function destroy(Comment $comment){
        $user = Auth::user();

        if ($comment->user_id !== $user->id && !$user->is_admin) {
            abort(403, '삭제 권한이 없습니다.');
        }

        $comment->delete();

        return back()->with('success', '댓글이 삭제되었습니다.');
    }
}
