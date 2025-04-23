<div id="modal-master" class="modal-dialog modal-md" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Detail Data Penjualan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            @empty($detail)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
            @else
                <table class="table table-bordered table-striped table-hover table-sm">
                    <tr>
                        <th>ID Detail</th>
                        <td>{{ $detail->detail_id }}</td>
                    </tr>
                    <tr>
                        <th>Barang</th>
                        <td>{{ $detail->barang->barang_nama ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td>Rp {{ number_format($detail->harga, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td>{{ $detail->jumlah }}</td>
                    </tr>
                    <tr>
                        <th>Subtotal</th>
                        <td>Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>ID Penjualan</th>
                        <td>{{ $detail->penjualan->penjualan_id ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Penjualan</th>
                        <td>{{ $detail->penjualan->penjualan_tanggal ?? '-' }}</td>
                    </tr>
                </table>
            @endempty
        </div>
    </div>
</div>
