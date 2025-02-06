<?php

namespace App\Http\Controllers;

use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserInfoController extends Controller
{
    public function index(UserInfo $userInfo)
    {
        $user = Auth::user();
        $userInfo = $user->userInfo ?? new UserInfo();

        $userInfo->age ?? null;
        $userInfo->gender ?? 0;
        $userInfo->height ?? null;
        $userInfo->weight ?? null;

        return view('userInfo.index', compact('userInfo', 'user'));
    }

    public function edit()
    {
        $user = Auth::user();
        $userInfo = $user->userInfo;

        return view('userInfo.edit', compact('userInfo', 'user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $userInfo = $user->userInfo;

        $userInfo->user_id = $user->id;
        $userInfo->Fill($request->all());
        $userInfo->save();

        return redirect()->route('userInfo.index')->with('success', 'プロフィールが更新されました。');
    }
}
