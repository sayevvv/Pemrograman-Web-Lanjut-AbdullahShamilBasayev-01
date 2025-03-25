<?php

namespace App\Http\Controllers;

use App\Models\SupplierModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SupplierController extends Controller
{
    // Menampilkan halaman awal supplier
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Data Supplier',
            'list' => ['Home', 'Supplier']
        ];

        $page = (object) [
            'title' => 'Daftar data supplier'
        ];

        $activeMenu = 'supplier';

        return view('supplier.index', compact('breadcrumb', 'page', 'activeMenu'));
    }

    // Ambil data supplier dalam bentuk json untuk datatables
    public function list()
    {
        $supplier = SupplierModel::all();

        return DataTables::of($supplier)
            ->addIndexColumn()
            ->addColumn('aksi', function ($s) {
                // $btn  = '<a href="' . url('/supplier/' . $s->supplier_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                // $btn .= '<a href="' . url('/supplier/' . $s->supplier_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                // $btn .= '<form class="d-inline-block" method="POST" action="' . url('/supplier/' . $s->supplier_id) . '">' .
                //     csrf_field() .
                //     method_field('DELETE') .
                //     '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\');">Hapus</button>' .
                //     '</form>';
                // return $btn;
            $btn  = '<button onclick="modalAction(\'' . url('/supplier/' . $s->supplier_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
            $btn .= '<button onclick="modalAction(\'' . url('/supplier/' . $s->supplier_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
            $btn .= '<button onclick="modalAction(\'' . url('/supplier/' . $s->supplier_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button> ';
            return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    // Menampilkan form tambah supplier
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Supplier',
            'list' => ['Home', 'Supplier', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah data supplier baru'
        ];

        $activeMenu = 'supplier';

        return view('supplier.create', compact('breadcrumb', 'page', 'activeMenu'));
    }

    // Simpan data supplier baru
    public function store(Request $request)
    {
        $request->validate([
            'supplier_kode' => 'required|string|max:10|unique:m_supplier,supplier_kode',
            'supplier_nama' => 'required|string|max:100',
            'supplier_alamat' => 'required|string|max:255',
        ]);

        SupplierModel::create($request->all());

        return redirect('/supplier')->with('success', 'Data supplier berhasil disimpan');
    }

    // Tampilkan detail supplier
    public function show($id)
    {
        $supplier = SupplierModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Supplier',
            'list' => ['Home', 'Supplier', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail data supplier'
        ];

        $activeMenu = 'supplier';

        return view('supplier.show', compact('breadcrumb', 'page', 'supplier', 'activeMenu'));
    }

    // Tampilkan form edit supplier
    public function edit($id)
    {
        $supplier = SupplierModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Edit Supplier',
            'list' => ['Home', 'Supplier', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit data supplier'
        ];

        $activeMenu = 'supplier';

        return view('supplier.edit', compact('breadcrumb', 'page', 'supplier', 'activeMenu'));
    }

    // Simpan perubahan data supplier
    public function update(Request $request, $id)
    {
        $request->validate([
            'supplier_kode' => 'required|string|max:10|unique:m_supplier,supplier_kode,' . $id . ',supplier_id',
            'supplier_nama' => 'required|string|max:100',
            'supplier_alamat' => 'required|string|max:255',
        ]);

        SupplierModel::find($id)->update($request->all());

        return redirect('/supplier')->with('success', 'Data supplier berhasil diubah');
    }

    // Hapus data supplier
    public function destroy($id)
    {
        $check = SupplierModel::find($id);

        if (!$check) {
            return redirect('/supplier')->with('error', 'Data supplier tidak ditemukan');
        }

        try {
            SupplierModel::destroy($id);
            return redirect('/supplier')->with('success', 'Data supplier berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/supplier')->with('error', 'Gagal menghapus data supplier karena data masih terhubung dengan tabel lain');
        }
    }
     // Tampilkan form input supplier (create)
     public function create_ajax()
     {
         return view('supplier.create_ajax');
     }

     // Simpan data supplier baru
     public function store_ajax(Request $request)
     {
         if ($request->ajax() || $request->wantsJson()) {
             $rules = [
                 'supplier_kode'  => 'required|string|max:50|unique:m_supplier,supplier_kode',
                 'supplier_nama'  => 'required|string|max:100',
                 'supplier_alamat' => 'nullable|string|max:255',
             ];

             $validator = Validator::make($request->all(), $rules);

             if ($validator->fails()) {
                 return response()->json([
                     'status'   => false,
                     'message'  => 'Validasi gagal.',
                     'msgField' => $validator->errors(),
                 ]);
             }

             SupplierModel::create($request->all());

             return response()->json([
                 'status'  => true,
                 'message' => 'Data supplier berhasil disimpan.',
             ]);
         }

         return redirect('/');
     }

     // Form edit data supplier
     public function edit_ajax(string $id)
     {
         $supplier = SupplierModel::find($id);
         return view('supplier.edit_ajax', ['supplier' => $supplier]);
     }

     // Update data supplier
     public function update_ajax(Request $request, $id)
     {
         if ($request->ajax() || $request->wantsJson()) {
             $rules = [
                 'supplier_kode'  => 'required|string|max:50|unique:m_supplier,supplier_kode,' . $id . ',supplier_id',
                 'supplier_nama'  => 'required|string|max:100',
                 'supplier_alamat' => 'nullable|string|max:255',
             ];

             $validator = Validator::make($request->all(), $rules);

             if ($validator->fails()) {
                 return response()->json([
                     'status'   => false,
                     'message'  => 'Validasi gagal.',
                     'msgField' => $validator->errors(),
                 ]);
             }

             $supplier = SupplierModel::find($id);
             if ($supplier) {
                 $supplier->update($request->all());
                 return response()->json([
                     'status'  => true,
                     'message' => 'Data supplier berhasil diupdate.',
                 ]);
             }

             return response()->json([
                 'status'  => false,
                 'message' => 'Data tidak ditemukan.',
             ]);
         }

         return redirect('/');
     }

     // Konfirmasi hapus data supplier
     public function confirm_ajax(string $id)
     {
         $supplier = SupplierModel::find($id);
         return view('supplier.confirm_ajax', ['supplier' => $supplier]);
     }

     // Hapus data supplier
     public function delete_ajax(Request $request, $id)
     {
         if ($request->ajax() || $request->wantsJson()) {
             $supplier = SupplierModel::find($id);
             if ($supplier) {
                 $supplier->delete();
                 return response()->json([
                     'status' => true,
                     'message' => 'Data supplier berhasil dihapus.',
                 ]);
             }
             return response()->json([
                 'status' => false,
                 'message' => 'Data tidak ditemukan.',
             ]);
         }

         return redirect('/');
     }
}
