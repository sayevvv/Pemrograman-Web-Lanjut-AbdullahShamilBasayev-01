<form action="{{ url('/penjualan_detail/' . $penjualan_detail->detail_id . '/update_ajax') }}" method="POST" id="form-edit">
    @csrf
    @method('PUT')
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Detail Penjualan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Barang</label>
                    <select name="barang_id" id="barang_id" class="form-control" required>
                        <option value="">Pilih Barang</option>
                        @foreach ($barangs as $barang)
                            <option value="{{ $barang->barang_id }}" data-harga="{{ $barang->harga_jual }}"
                                {{ $penjualan_detail->barang_id == $barang->barang_id ? 'selected' : '' }}>
                                {{ $barang->barang_nama }}
                            </option>
                        @endforeach
                    </select>
                    <small id="error-barang_id" class="form-text text-danger"></small>
                </div>

                <div class="form-group">
                    <label>Harga Jual</label>
                    <input type="number" class="form-control" name="harga" id="harga"
                        value="{{ $penjualan_detail->harga }}" readonly>
                </div>

                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" id="jumlah"
                        value="{{ $penjualan_detail->jumlah }}" min="1" required>
                    <small id="error-jumlah" class="form-text text-danger"></small>
                </div>

                <div class="form-group">
                    <label>Total Harga</label>
                    <input type="text" class="form-control" id="total_harga"
                        value="{{ $penjualan_detail->subtotal }}" readonly>
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
    function updateHargaDanTotal() {
        const selectedBarang = $('#barang_id option:selected');
        const harga = selectedBarang.data('harga') || 0;
        const jumlah = parseInt($('#jumlah').val()) || 0;
        const total = harga * jumlah;

        $('#harga').val(harga);
        $('#total_harga').val(total);
    }

    $('#barang_id, #jumlah').on('change keyup', updateHargaDanTotal);
    updateHargaDanTotal(); // Inisialisasi awal

    $(document).ready(function() {
        $("#form-edit").validate({
            rules: {
                barang_id: { required: true },
                jumlah: { required: true, min: 1 },
            },
            submitHandler: function(form) {
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),
                    success: function(response) {
                        if (response.status) {
                            $('#myModal').modal('hide');
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message
                            });
                            dataPenjualanDetail.ajax.reload();
                        } else {
                            $('.error-text').text('');
                            $.each(response.msgField, function(prefix, val) {
                                $('#error-' + prefix).text(val[0]);
                            });
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: response.message
                            });
                        }
                    }
                });
                return false;
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
