<div class="modal-dialog">
    <div class="modal-content">
        <form action="{{ route('user.updatePfp') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="modal-header">
                <h5 class="modal-title">Ubah Foto Profil</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body text-center">
                <img src="{{ url('/user/profile-picture/' . Auth::id()) }}"
                     class="img-circle mb-3"
                     style="width: 80px; height: 80px; object-fit: cover; border-radius: 50%;">
                <div class="form-group">
                    <input type="file" name="profile_picture" class="form-control" accept="image/*" required>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </form>
    </div>
</div>
