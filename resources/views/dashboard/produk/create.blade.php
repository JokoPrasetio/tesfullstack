<div class="modal" id="produkCreate">
    <div class="modal-content">
        <span class="close" onclick="hideModal()">&times;</span>
        <h3>Tambah Data Produk</h3>
        <form action="{{ route('produk.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Nama Produk</label>
                <input type="text" name="name" id="name" class="form-control mt-1" value="{{ old('name') }}"
                    required>
            </div>
            <div class="form-group">
                <label for="price">Harga Produk</label>
                <input type="number" name="price" id="price" class="form-control mt-1"
                    value="{{ old('price') }}" required>
            </div>
            <div class="form-group">
                <label for="stock">Stok Produk</label>
                <input type="number" name="stock" id="stock" class="form-control mt-1"
                    value="{{ old('stock') }}" required>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi Produk</label>
                <input type="text" name="description" id="description" class="form-control mt-1"
                    value="{{ old('description') }}" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Buat Data</button>

        </form>
    </div>
</div>
