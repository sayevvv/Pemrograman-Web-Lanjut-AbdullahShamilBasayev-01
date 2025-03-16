{{-- Tugas Praktikum Nomer 3 --}}
<div class="d-flex gap-3 align-items-center">
    <a href="{{ route('kategori.edit', $kategori_id) }}" style="color: blue; font-weight: bold; text-decoration: none;">
        Edit
    </a>

    <form action="{{ route('kategori.destroy', $kategori_id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')" style="margin: 0;">
        @csrf
        @method('DELETE')
        <button type="submit" style="background: none; border: none; color: red; font-weight: bold; cursor: pointer; padding: 0;">
            Delete
        </button>
    </form>
</div>
