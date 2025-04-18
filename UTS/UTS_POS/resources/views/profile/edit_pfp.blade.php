<form action="{{ route('profile.updatePfp') }}" method="POST" id="form-edit-pfp" enctype="multipart/form-data">
    @csrf
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Foto Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="form-group text-center">
                    <img id="preview-pfp"
                        src="{{ asset('storage/uploads/profile_images/' . ($user->profile_picture ?? 'default-profile.png')) }}"
                        class="img-thumbnail mb-3"
                        style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;">

                    <div class="mt-2">
                        <label for="profile_picture">Pilih Foto Profil Baru</label>
                        <input type="file" name="profile_picture" id="profile_picture" class="form-control-file">
                        <small id="error-profile_picture" class="error-text form-text text-danger"></small>
                    </div>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" value="{{ $user->username }}">
                    <small id="error-username" class="error-text form-text text-danger"></small>
                </div>

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ $user->nama }}">
                    <small id="error-nama" class="error-text form-text text-danger"></small>
                </div>

            </div>



            <div class="modal-footer d-flex justify-content-between">
                <div>
                    @if ($user->profile_picture && $user->profile_picture !== 'default-profile.png')
                        <button type="button" class="btn btn-danger" id="btn-delete-pfp">Hapus Foto Profil</button>
                    @endif
                </div>
                <div>
                    <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    $(document).ready(function() {
        // Validasi dan submit form
        $("#form-edit-pfp").validate({
            rules: {
                username: {
                    required: true
                },
                nama: {
                    required: true
                },
                profile_picture: {
                    extension: "jpg|jpeg|png"
                },
            },
            submitHandler: function(form) {
                var formData = new FormData(form);

                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#modal-edit-pfp').modal('hide');
                        if (response.new_profile_picture_url) {
                            $('#preview-pfp').attr('src', response
                                .new_profile_picture_url + '?t=' + new Date()
                                .getTime());
                        }
                        if (response.status) {
                            $('#myModal').modal('hide');
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message
                            });
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

                    },
                    error: function(xhr) {
                        $('.error-text').text('');
                        if (xhr.responseJSON?.errors) {
                            $.each(xhr.responseJSON.errors, function(key, val) {
                                $('#error-' + key).text(val[0]);
                            });
                        }
                    }
                });

                return false;
            }
        });

        // Hapus foto profil
        $('#btn-delete-pfp').on('click', function() {
            $.ajax({
                url: "{{ route('profile.deletePfp') }}",
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    _method: "DELETE"
                },
                success: function(response) {
                    $('#modal-edit-pfp').modal('hide');
                    if (response.new_profile_picture_url) {
                        $('#preview-pfp').attr('src', response.new_profile_picture_url +
                            '?t=' + new Date().getTime());
                    }
                },
                error: function() {
                    console.error('Gagal menghapus foto profil.');
                }
            });
        });

    });
</script>
