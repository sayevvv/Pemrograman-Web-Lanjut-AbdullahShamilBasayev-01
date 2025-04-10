<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profil()
    {
        $user = Auth::user(); // ambil user yang sedang login
        $activeMenu = 'profil'; // set menu yang aktif
        $breadcrumb = (object) [
            'title' => 'Profil Saya',
            'list'  => ['Home', 'Profil Saya']
        ];

        $page = (object) [
            'title' => 'Daftar user yang terdaftar dalam sistem'
        ];

        return view('profile.index', compact('user', 'activeMenu', 'breadcrumb', 'page'));
    }
    public function editPfp()
    {
        $user = Auth::user();
        return view('profile.edit_pfp', compact('user'));
    }
    public function updatePfp(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $user = Auth::user();

        // Simpan file baru
        if ($request->hasFile('profile_picture')) {
            $filename = 'pfp_' . $user->user_id . '.' . $request->file('profile_picture')->getClientOriginalExtension();
            $path = $request->file('profile_picture')->storeAs('public/uploads/profile_images', $filename);

            // Simpan path ke database (jika kamu simpan path-nya)
            $user->profile_picture = $filename;
            $user->save();
        }

        return redirect()->back()->with('success', 'Foto profil berhasil diperbarui.');
    }
}
