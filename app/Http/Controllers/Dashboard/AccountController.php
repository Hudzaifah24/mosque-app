<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $roles = Role::get();

        return view('pages.dashboard.contents.account.index', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:30',
            'email' => 'required|email|unique:'.User::class.',email,'.$id,
            'role_id' => 'required',
        ]);

        $user->update($data);

        return redirect()->route('account')->with('success', 'Berhasil ubah data!');
    }
}
