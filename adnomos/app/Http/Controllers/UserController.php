<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function changeTheme(Request $request)
    {
        $request->validate([
            'prefer_dark' => 'required|in:0,1',
        ]);

        $user = Auth::user();
        if ($user) {
            $user->prefer_dark = $request->prefer_dark == '1';
            $user->save();
        }

        return redirect()->back();
    }
}
