<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('pages.landingPage.contents.account.account', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        $data = $request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|email|unique:'.User::class.',email,'.$user->id,
        ]);

        $user->update($data);

        return redirect()->route('account.landing')->with('success', 'Berhasil ubah data!');
    }

    public function change_password_page()
    {
        return view('pages.landingPage.contents.account.change_password');
    }

    public function change_password_update(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        $data = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        if (!Hash::check($data['old_password'], $user->password)) {
            return back()->with('danger', 'Password tidak sesuai');
        }

        $user->update([
            'password' => Hash::make($request['new_password'])
        ]);

        return redirect()->route('account.landing')->with('success', 'Berhasil ubah password');
    }
}
