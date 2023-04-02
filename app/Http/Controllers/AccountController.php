<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function edit(User $user)
    {
        return view('pages.account.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if($request->password !== $request->confirm_password) return back()->with('error', 'Password not match');

        $user->update([
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('dashboard')->with('success', 'Password updated successfully');
    }
}
