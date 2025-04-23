<form action="{{ url('/penjualan_detail/ajax') }}" method="POST" id="form-tambah">
    @csrf
    <div id="modal-master" class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Detail Penjualan</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">

                {{-- Dropdown pembelian_id --}}
                <div class="form-group">
                    <label>Pilih ID Penjualan</label>
                    <select name="penjualan_id" id="penjualan_id" class="form-control" required>
                        <option value="">-- Pilih Penjualan --</option>
                        @foreach ($penjualans as $penjualan)
                            <option value="{{ $penjualan->penjualan_id }}">
                                {{ $penjualan->penjualan_id }}
                            </option>
                        @endforeach
                    </select>
                    <small id="error-penjualan_id" class="error-text form-text text-danger"></small>

                </div>

                {{-- Dropdown nama barang --}}
                <div class="form-group">
                    <label>Barang</label>
                    <select name="barang_id" id="barang_id" class="form-control" required>
                        <option value="">-- Pilih Barang --</option>
                        @foreach ($barangs as $barang)
                            <option value="{{ $barang->barang_id }}" data-harga="{{ $barang->harga_jual }}">
                                {{ $barang->barang_nama }}
                            </option>
                        @endforeach
                    </select>
                    <small id="error-barang_id" class="error-text form-text text-danger"></small>
                </div>

                {{-- Harga otomatis --}}
                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" name="harga" id="harga" class="form-control" readonly>
                    <small id="error-harga" class="error-text form-text text-danger"></small>
                </div>

                {{-- Jumlah --}}
                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" id="jumlah" class="form-control" required>
                    <small id="error-jumlah" class="error-text form-text text-danger"></small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</form>

<script>
    // Ketika barang dipilih, ambil harga
    $('#barang_id').on('change', function () {
        const harga = $(this).find(':selected').data('harga') || 0;
        $('#harga').val(harga);
    });

    $("#form-tambah").validate({
        rules: {
            pembelian_id: { required: true },
            barang_id: { required: true },
            jumlah: { required: true, min: 1 }
        },
        submitHandler: function(form) {
            $.ajax({
                url: form.action,
                type: form.method,
                data: $(form).serialize(),
                success: function(response) {
                    if (response.status) {
                        $('#myModal').modal('hide');
                        Swal.fire({ icon: 'success', title: 'Berhasil', text: response.message });
                        dataPenjualanDetail.ajax.reload();
                    } else {
                        $('.error-text').text('');
                        $.each(response.msgField, function(prefix, val) {
                            $('#error-' + prefix).text(val[0]);
                        });
                        Swal.fire({ icon: 'error', title: 'Error', text: response.message });
                    }
                }
            });
            return false;
        }
    });
</script>
