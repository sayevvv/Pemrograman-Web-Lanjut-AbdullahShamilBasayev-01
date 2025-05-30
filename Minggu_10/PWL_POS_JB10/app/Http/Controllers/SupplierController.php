<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupplierModel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Barryvdh\DomPDF\Facade\Pdf;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

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
     public function show_ajax(string $id)
     {
         $supplier = SupplierModel::find($id);
         return view('supplier.show_ajax', ['supplier' => $supplier]);
     }
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
     public function import()
     {
         return view('supplier.import');
     }
     public function import_ajax(Request $request)
     {
         if ($request->ajax() || $request->wantsJson()) {
             $rules = ['file_supplier' => 'required|mimes:xlsx|max:1024'];
             $validator = Validator::make($request->all(), $rules);

             if ($validator->fails()) {
                 return response()->json([
                     'status' => false,
                     'message' => 'Validasi Gagal',
                     'msgField' => $validator->errors()
                 ]);
             }

             $file = $request->file('file_supplier'); // Ambil file dari request
             $reader = IOFactory::createReader('Xlsx'); // Load reader file Excel
             $reader->setReadDataOnly(true); // Hanya membaca data
             $spreadsheet = $reader->load($file->getRealPath()); // Load file Excel
             $sheet = $spreadsheet->getActiveSheet(); // Ambil sheet yang aktif
             $data = $sheet->toArray(null, false, true, true);

             $insert = [];
             if (count($data) > 1) { // Jika data lebih dari 1 baris
                 foreach ($data as $baris => $value) {
                     if ($baris > 1) { // Baris ke-1 adalah header, maka lewati
                         $insert[] = [
                             'supplier_kode' => $value['A'],
                             'supplier_nama' => $value['B'],
                             'supplier_alamat' => $value['C'],
                             'created_at'  => now(),
                         ];
                     }
                 }

                 if (count($insert) > 0) {
                     // Insert data ke database, jika data sudah ada, maka diabaikan
                     SupplierModel::insertOrIgnore($insert);
                 }

                 return response()->json([
                     'status' => true,
                     'message' => 'Data berhasil diimport'
                 ]);
             } else {
                 return response()->json([
                     'status' => false,
                     'message' => 'Tidak ada data yang diimport'
                 ]);
             }
         }

         return redirect('/');
     }
     public function export_excel()
        {
            // Ambil data supplier dari database
            $supplier = SupplierModel::select('supplier_kode', 'supplier_nama', 'supplier_alamat')
                ->orderBy('supplier_nama')
                ->get();

            // Buat objek Spreadsheet baru
            $spreadsheet = $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Set judul kolom
            $sheet->setCellValue('A1', 'No');
            $sheet->setCellValue('B1', 'Kode Supplier');
            $sheet->setCellValue('C1', 'Nama Supplier');
            $sheet->setCellValue('D1', 'Alamat Supplier');

            // Buat header menjadi bold
            $sheet->getStyle('A1:D1')->getFont()->setBold(true);

            // Isi data
            $no = 1;
            $baris = 2;

            foreach ($supplier as $item) {
                $sheet->setCellValue('A' . $baris, $no);
                $sheet->setCellValue('B' . $baris, $item->supplier_kode);
                $sheet->setCellValue('C' . $baris, $item->supplier_nama);
                $sheet->setCellValue('D' . $baris, $item->supplier_alamat);
                $no++;
                $baris++;
            }

            // Set auto width kolom
            foreach (range('A', 'D') as $kolom) {
                $sheet->getColumnDimension($kolom)->setAutoSize(true);
            }

            // Set judul sheet
            $sheet->setTitle('Data Supplier');

            // Siapkan file untuk diunduh
            $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
            $filename = 'Data Supplier ' . date('Y-m-d H-i-s') . '.xlsx';

            // Header response
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . '"');
            header('Cache-Control: max-age=0');
            header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
            header('Cache-Control: cache, must-revalidate');
            header('Pragma: public');

            // Simpan ke output
            $writer->save('php://output');
            exit;
        }
        public function export_pdf()
    {
        $supplier = SupplierModel::select('supplier_kode', 'supplier_nama', 'supplier_alamat')
            ->orderBy('supplier_kode')
            ->get();

        $pdf = Pdf::loadView('supplier.export_pdf', ['supplier' => $supplier]);
        $pdf->setPaper('a4', 'portrait'); // set ukuran kertas dan orientasi
        $pdf->setOption("isRemoteEnabled", true); // set true jika ada gambar dari url
        $pdf->render();

        return $pdf->stream('Data Supplier ' . date('Y-m-d H:i:s') . '.pdf');
    }
}
