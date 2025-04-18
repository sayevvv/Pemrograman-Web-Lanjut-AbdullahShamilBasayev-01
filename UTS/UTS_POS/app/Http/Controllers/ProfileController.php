<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        // Hapus foto lama jika bukan default
        if ($user->profile_picture && $user->profile_picture !== 'default-profile.png') {
            Storage::delete('public/uploads/profile_images/' . $user->profile_picture);
        }

        if ($request->hasFile('profile_picture')) {
            $filename = 'pfp_' . $user->user_id . '.' . $request->file('profile_picture')->getClientOriginalExtension();
            $request->file('profile_picture')->storeAs('public/uploads/profile_images', $filename);

            $user->profile_picture = $filename;
            $user->save();

            return response()->json([
                'message' => 'Foto profil berhasil diperbarui.',
                'new_profile_picture_url' => asset('storage/uploads/profile_images/' . $filename)
            ]);
        }

        return response()->json(['message' => 'Tidak ada foto yang dipilih.'], 400);
    }

    public function deletePfp(Request $request)
    {
        $user = Auth::user();

        if ($user->profile_picture && $user->profile_picture !== 'default-profile.png') {
            Storage::delete('public/uploads/profile_images/' . $user->profile_picture);
            $user->profile_picture = 'default-profile.png';
            $user->save();
        }

        return response()->json([
            'message' => 'Foto profil berhasil dihapus.',
            'new_profile_picture_url' => asset('storage/uploads/profile_images/default-profile.png')
        ]);
    }



}
