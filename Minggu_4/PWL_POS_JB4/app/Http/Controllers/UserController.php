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
        //

        // JOBSHEET 4

        $data = [
            'level_id' => 2,
            // 'username' => 'manager_dua',
            // 'nama' => 'Manager Dua',
            'username' => 'manager_tiga',
            'nama' => 'Manager Tiga',
            'password' => Hash::make('12345'),
        ];

        UserModel::create($data);

        $user = UserModel::all();
        return view('user', ['data' => $user]);
    }
}
