@extends('dashboard.partials.main')

@section('container')
    <div class="col-lg-8 mt-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Buat Produk</h5>
                <form action="/dashboard/produk/{{ $product->id }}" method="post" ">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    placeholder="Masukan Nama barang" name="name" value="{{ old('name', $product->name) }}"
                                    required>
                                @error('name')
        <p class="text-danger">{{ $message }}</p>
    @enderror
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Harga</label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                                    placeholder="Masukan Harga barang" name="price" value="{{ old('price', $product->price) }}"
                                    required>
                                @error('price')
        <p class="text-danger">{{ $message }}</p>
    @enderror
                            </div>

                            <div class="mb-3">
                                <label for="stock" class="form-label">Stok Barang</label>
                                <input type="number" name="stock" id="stock" class="form-control"
                                    placeholder="Masukan jumlah stock" value="{{ old('stock', $product->stock) }}" required>
                                @error('stock')
        <p class="text-danger">{{ $message }}</p>
    @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <input type="text" name="description" id="description" class="form-control"
                                    placeholder="Masukan deskripsi barang" value="{{ old('description', $product->description) }}"
                                    required>
                                @error('description')
        <p class="text-danger">{{ $message }}</p>
    @enderror
                            </div>

                            <button type="submit" class="btn btn-primary mt-2 mb-4">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
@endsection
