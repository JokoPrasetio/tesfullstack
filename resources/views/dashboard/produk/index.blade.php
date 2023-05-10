@extends('dashboard.partials.main')
@section('container')
    @if (session()->has('success'))
        <div class="alert alert-success text-center col-lg-8 mt-2" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="dflex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-3 border-bottom">
        <h2>Data Produk</h2>
    </div>
    <div class="col-lg-10 table-responsive">
        <form action="{{ route('produk') }}" method="get" class="d-flex">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari produk">
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>
        <button class="btn btn-primary btn-sm mb-3 mt-2" onclick="showModal()">
            Tambah data produk
        </button>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Deskripsi</th>
                    <th scopr="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($produk->isEmpty())
                    <tr>
                        <td colspan="6">Tidak ada data</td>
                    </tr>
                @else
                    @foreach ($produk as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ 'Rp ' . number_format($item->price, 0, ',', '.') }}</td>
                            <td>{{ $item->stock }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <a href="/dashboard/produk/{{ $item->id }}/edit"
                                    class="badge bg-warning text-decoration-none">Edit</a>
                                <form action="/dashboard/produk/{{ $item->id }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="badge bg-danger border-0"
                                        onclick="return confirm('apakah kamu yakin')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        @include('dashboard.produk.create')
    </div>
    <div class="d-flex justify-content-center mt-5">
        {{ $produk->links() }}
    </div>
    <script>
        function showModal() {
            document.getElementById('produkCreate').style.display = 'block';
        }

        function hideModal() {
            document.getElementById('produkCreate').style.display = 'none';
        }
        @if ($errors->any())
            showModal();
        @endif
    </script>
@endsection
