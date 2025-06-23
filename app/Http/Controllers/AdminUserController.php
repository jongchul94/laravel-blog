<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10)->withQueryString();
        return view('admin.users.index', compact('users'));
    }

    public function block(User $user)
    {
        $user->is_blocked = !$user->is_blocked;
        $user->save();

        return back()->with('success', $user->name . '님의 계정 상태가 변경되었습니다.');
    }
}
