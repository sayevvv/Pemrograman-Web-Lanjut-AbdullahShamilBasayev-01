<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Models\LevelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    // JOBSHEET 5 Praktikum 3
    // Menampilkan halaman awal user
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar User',
            'list'  => ['Home', 'User']
        ];

        $page = (object) [
            'title' => 'Daftar user yang terdaftar dalam sistem'
        ];

        $activeMenu = 'user'; // set menu yang sedang aktif

        return view('user.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    // Ambil data user dalam bentuk json untuk datatables
    public function list(Request $request)
        {
            $users = UserModel::select('user_id', 'username', 'nama', 'level_id')->with('level');

            return DataTables::of($users)
                // Menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
                ->addIndexColumn()

                // Menambahkan kolom aksi
                ->addColumn('aksi', function ($user) {
                    $btn  = '<a href="' . url('/user/' . $user->user_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                    $btn .= '<a href="' . url('/user/' . $user->user_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                    $btn .= '<form class="d-inline-block" method="POST" action="' . url('/user/' . $user->user_id) . '">'
                          . csrf_field()
                          . method_field('DELETE')
                          . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button>'
                          . '</form>';
                    return $btn;
                })

                // Memberitahu bahwa kolom 'aksi' berisi HTML
                ->rawColumns(['aksi'])
                ->make(true);
        }
        // Menampilkan halaman form tambah user
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah User',
            'list'  => ['Home', 'User', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah user baru'
        ];

        $level = LevelModel::all(); // ambil data level untuk ditampilkan di form
        $activeMenu = 'user'; // set menu yang sedang aktif

        return view('user.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }
    // Menyimpan data user baru
    public function store(Request $request)
    {
        $request->validate([
            // username harus diisi, berupa string, minimal 3 karakter, dan bernilai unik di tabel m_user kolom username
            'username' => 'required|string|min:3|unique:m_user,username',
            'nama'     => 'required|string|max:100', // nama harus diisi, berupa string, dan maksimal 100 karakter
            'password' => 'required|min:5',          // password harus diisi dan minimal 5 karakter
            'level_id' => 'required|integer'         // level_id harus diisi dan berupa angka
        ]);

        UserModel::create([
            'username' => $request->username,
            'nama'     => $request->nama,
            'password' => bcrypt($request->password), // password dienkripsi sebelum disimpan
            'level_id' => $request->level_id
        ]);

        return redirect('/user')->with('success', 'Data user berhasil disimpan');
    }
    // Menampilkan detail user
    public function show(string $id)
    {
        $user = UserModel::with('level')->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail User',
            'list' => ['Home', 'User', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail user'
        ];

        $activeMenu = 'user'; // set menu yang sedang aktif

        return view('user.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
    }
    // Menampilkan halaman form edit user
    public function edit(string $id)
    {
        $user = UserModel::find($id);
        $level = LevelModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit User',
            'list' => ['Home', 'User', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit user'
        ];

        $activeMenu = 'user'; // set menu yang sedang aktif

        return view('user.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    // Menyimpan perubahan data user
    public function update(Request $request, string $id)
    {
        $request->validate([
            // username harus diisi, berupa string, minimal 3 karakter,
            // dan bernilai unik di tabel m_user kolom username kecuali untuk user dengan id yang sedang diedit
            'username' => 'required|string|min:3|unique:m_user,username,'.$id.',user_id',
            'nama' => 'required|string|max:100', // nama harus diisi, berupa string, dan maksimal 100 karakter
            'password' => 'nullable|min:5',      // password bisa diisi (minimal 5 karakter) dan bisa tidak diisi
            'level_id' => 'required|integer'     // level_id harus diisi dan berupa angka
        ]);

        UserModel::find($id)->update([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => $request->password ? bcrypt($request->password) : UserModel::find($id)->password,
            'level_id' => $request->level_id
        ]);

        return redirect('/user')->with('success', 'Data user berhasil diubah');
    }
    // Menghapus data user
    public function destroy(string $id)
    {
        $check = UserModel::find($id);
        if (!$check) {  // untuk mengecek apakah data user dengan id yang dimaksud ada atau tidak
            return redirect('/user')->with('error', 'Data user tidak ditemukan');
        }

        try{
            UserModel::destroy($id);  // Hapus data level

            return redirect('/user')->with('success', 'Data user berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e){
            // Jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/user')->with('error', 'Data user gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }


    // public function index()
    // {
    //     // Tambah data user dengan eloquent
    //     // $data = [
    //     //     'username' => 'customer-1',
    //     //     'nama' => 'Pelanggan Pertama',
    //     //     'password' => Hash::make('12345'),
    //     //     'level_id' => 4
    //     // ];
    //     // UserModel::insert($data); // Tambahkan data ke tabel m_user


    //     // Tambah data user dengan eloquent
    //     //

    //     // JOBSHEET 4

    //     // $data = [
    //     //     'level_id' => 2,
    //     //     // 'username' => 'manager_dua',
    //     //     // 'nama' => 'Manager Dua',
    //     //     'username' => 'manager_tiga',
    //     //     'nama' => 'Manager Tiga',
    //     //     'password' => Hash::make('12345'),
    //     // ];

    //     // UserModel::create($data);

    //     // $user = UserModel::all();

    //     // PRAKTIKUM 2.1
    //     // $user = UserModel::find(1);

    //     // $user = UserModel::where('level_id', 1)->first();
    //     // $user = UserModel::firstWhere('level_id', 1);

    //     // $user = UserModel::findOr(1, ['username', 'nama'], function () {
    //     //     abort(404);
    //     // });
    //     // $user = UserModel::findOr(20, ['username', 'nama'], function () {
    //     //     abort(404);
    //     // });

    //     // PRAKTIKUM 2.2
    //     // $user = UserModel::findOrFail(1);
    //     // $user = UserModel::where('username', 'manager9')->firstOrFail();

    //     // PRAKTIKUM 2.3
    //     // $user = UserModel::where('level_id', 2)->count();
    //     // dd($user);

    //     // PRAKTIKUM 2.4
    //     // $user = UserModel::firstOrCreate(
    //     //     [
    //     //         // 'username' => 'manager',
    //     //         // 'nama' => 'Manager',
    //     //         'username' => 'manager22',
    //     //         'nama' => 'Manager Dua Dua',
    //     //         'password' => Hash::make('12345'),
    //     //         'level_id' => 2
    //     //     ],
    //     // );

    //     // $user = UserModel::firstOrNew(
    //     //     [
    //     //         // 'username' => 'manager22',
    //     //         // 'nama' => 'Manager Dua Dua',
    //     //         'username' => 'manager33',
    //     //         'nama' => 'Manager Tiga Tiga',
    //     //         'password' => Hash::make('12345'),
    //     //         'level_id' => 2
    //     //     ],
    //     // );
    //     // $user->save();
    //     // return view('user', ['data' => $user]);

    //     // PRAKTIKUM 2.5
    //     // $user = UserModel::create([
    //     //     'username' => 'manager93',
    //     //     'nama' => 'Manager Lima Lima',
    //     //     'password' => Hash::make('12345'),
    //     //     'level_id' => 2
    //     // ]);

    //     // $user->username = 'manager56';

    //     // $user->isDirty();
    //     // $user->isDirty('username');
    //     // $user->isDirty('nama');
    //     // $user->isDirty(['nama', 'username']);

    //     // $user->isClean();
    //     // $user->isClean('username');
    //     // $user->isClean('nama');
    //     // $user->isClean(['nama', 'username']);

    //     // $user->save();

    //     // $user->isDirty();
    //     // $user->isClean();
    //     // dd($user->isDirty());

    //     // $user = UserModel::create([
    //     //         'username' => 'manager11',
    //     //         'nama' => 'Manager Sebelas',
    //     //         'password' => Hash::make('12345'),
    //     //         'level_id' => 2
    //     //     ]);

    //     // $user->username = 'manager12';
    //     // $user->save();

    //     // $user->wasChanged();
    //     // $user->wasChanged('username');
    //     // $user->wasChanged(['username', 'level_id']);
    //     // $user->wasChanged('nama');
    //     // dd($user->wasChanged(['nama', 'username']));

    //     // PRAKTIKUM 2.6
    //     // $user = UserModel::all();
    //     // return view('user', ['data' => $user]);

    //     // PRAKTIKUM 2.7
    //     // $user = UserModel::with('level')->get();
    //     // dd($user);

    //     $user = UserModel::with('level')->get();
    //     return view('user', ['data' => $user]);
    // }

    // public function tambah()
    // {
    //     return view('user_tambah');
    // }

    // public function ubah($id)
    // {
    //     $user = UserModel::find($id);
    //     return view('user_ubah', ['data' => $user]);
    // }

    // public function ubah_simpan(Request $request, $id)
    // {
    //     $user = UserModel::find($id);
    //     $user->username = $request->username;
    //     $user->nama = $request->nama;
    //     $user->password = Hash::make($request->password);
    //     $user->level_id = $request->level_id;
    //     $user->save();
    //     return redirect('/user');
    // }

    // public function tambah_simpan(Request $request)
    // {
    //     $data = [
    //         'username' => $request->username,
    //         'nama' => $request->nama,
    //         'password' => Hash::make($request->password),
    //         'level_id' => $request->level_id
    //     ];
    //     UserModel::create($data);
    //     return redirect('/user');
    // }
    // public function hapus($id) {
    //     $user = UserModel::find($id);
    //     $user->delete();
    //     return redirect('/user');
    // }
}
