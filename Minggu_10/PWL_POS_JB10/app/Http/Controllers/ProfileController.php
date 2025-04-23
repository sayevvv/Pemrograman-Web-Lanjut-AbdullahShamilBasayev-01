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
    $validator = \Validator::make($request->all(), [
        'username' => 'required|string|max:100',
        'nama' => 'required|string|max:100',
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => false,
            'message' => 'Validasi gagal.',
            'msgField' => $validator->errors()
        ]);
    }

    $user = Auth::user();
    $user->username = $request->username;
    $user->nama = $request->nama;

    if ($request->hasFile('profile_picture')) {
        $filename = 'pfp_' . $user->user_id . '.' . $request->file('profile_picture')->getClientOriginalExtension();
        $path = $request->file('profile_picture')->storeAs('public/uploads/profile_images', $filename);
        $user->profile_picture = $filename;
    }

    $user->save();

    return response()->json([
        'status' => true,
        'message' => 'Profil berhasil diperbarui.',
        'new_profile_picture_url' => asset('storage/uploads/profile_images/' . $user->profile_picture)
    ]);
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
