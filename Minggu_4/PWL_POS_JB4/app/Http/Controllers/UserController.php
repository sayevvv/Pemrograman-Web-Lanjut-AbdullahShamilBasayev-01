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

        // $data = [
        //     'level_id' => 2,
        //     // 'username' => 'manager_dua',
        //     // 'nama' => 'Manager Dua',
        //     'username' => 'manager_tiga',
        //     'nama' => 'Manager Tiga',
        //     'password' => Hash::make('12345'),
        // ];

        // UserModel::create($data);

        // $user = UserModel::all();

        // PRAKTIKUM 2.1
        // $user = UserModel::find(1);

        // $user = UserModel::where('level_id', 1)->first();
        // $user = UserModel::firstWhere('level_id', 1);

        // $user = UserModel::findOr(1, ['username', 'nama'], function () {
        //     abort(404);
        // });
        // $user = UserModel::findOr(20, ['username', 'nama'], function () {
        //     abort(404);
        // });

        // PRAKTIKUM 2.2
        // $user = UserModel::findOrFail(1);
        // $user = UserModel::where('username', 'manager9')->firstOrFail();

        // PRAKTIKUM 2.3
        // $user = UserModel::where('level_id', 2)->count();
        // dd($user);

        // PRAKTIKUM 2.4
        // $user = UserModel::firstOrCreate(
        //     [
        //         // 'username' => 'manager',
        //         // 'nama' => 'Manager',
        //         'username' => 'manager22',
        //         'nama' => 'Manager Dua Dua',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ],
        // );

        // $user = UserModel::firstOrNew(
        //     [
        //         // 'username' => 'manager22',
        //         // 'nama' => 'Manager Dua Dua',
        //         'username' => 'manager33',
        //         'nama' => 'Manager Tiga Tiga',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ],
        // );
        // $user->save();
        // return view('user', ['data' => $user]);

        // PRAKTIKUM 2.5
        // $user = UserModel::create([
        //     'username' => 'manager93',
        //     'nama' => 'Manager Lima Lima',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 2
        // ]);

        // $user->username = 'manager56';

        // $user->isDirty();
        // $user->isDirty('username');
        // $user->isDirty('nama');
        // $user->isDirty(['nama', 'username']);

        // $user->isClean();
        // $user->isClean('username');
        // $user->isClean('nama');
        // $user->isClean(['nama', 'username']);

        // $user->save();

        // $user->isDirty();
        // $user->isClean();
        // dd($user->isDirty());

        $user = UserModel::create([
                'username' => 'manager11',
                'nama' => 'Manager Sebelas',
                'password' => Hash::make('12345'),
                'level_id' => 2
            ]);

        $user->username = 'manager12';
        $user->save();

        $user->wasChanged();
        $user->wasChanged('username');
        $user->wasChanged(['username', 'level_id']);
        $user->wasChanged('nama');
        dd($user->wasChanged(['nama', 'username']));
    }
}
