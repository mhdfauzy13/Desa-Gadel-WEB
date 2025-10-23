<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Exception;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('Admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = ['admin', 'operator'];
        return view('Admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role'     => 'required|in:admin,operator',
        ]);

        try {
            User::create([
                'name'     => $validated['name'],
                'email'    => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role'     => $validated['role'],
            ]);

            return redirect()->route('admin.users.index')
                ->with('success', 'User berhasil dibuat!');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal membuat user: ' . $e->getMessage());
        }
    }

    public function edit(User $user)
    {
        $roles = ['admin', 'operator'];
        return view('Admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
            'role'     => 'required|in:admin,operator',
        ]);

        try {
            $user->update([
                'name'     => $validated['name'],
                'email'    => $validated['email'],
                'password' => $validated['password'] ? Hash::make($validated['password']) : $user->password,
                'role'     => $validated['role'],
            ]);

            return redirect()->route('admin.users.index')
                ->with('success', 'User berhasil diperbarui!');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal memperbarui user: ' . $e->getMessage());
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('admin.users.index')
                ->with('success', 'User berhasil dihapus!');
        } catch (Exception $e) {
            return redirect()->route('admin.users.index')
                ->with('error', 'Gagal menghapus user: ' . $e->getMessage());
        }
    }
}
