<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Tambah data user dengan eloquent
        // $data = [
        //     'username' => 'customer-1',
        //     'nama' => 'Pelanggan Pertama',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 4
        // ];
        // UserModel::insert($data); // Tambahkan data ke tabel m_user


        // Tambah data user dengan eloquent
        $data = [
            'nama' => 'Pelanggan Pertama Udah Di Ganti'
        ];

        UserModel::where('username', 'customer-1')->update($data);

        $user = UserModel::all();
        return view('user', ['data' => $user]);
    }
}
