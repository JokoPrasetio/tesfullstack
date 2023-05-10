@extends('dashboard.partials.main')
@section('container')
    <div class="dflex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-3 border-bottom">
        <h2>Data Transaksi</h2>
    </div>
    <div class="col-lg-10 table-responsive">
        <form action="{{ route('transaksi.search') }}" method="get" class="d-flex">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari produk">
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>
        <table class="table table-striped table-sm mt-4">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Referensi No</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah Pembayaran</th>
                    <th scope="col">Nama Barang</th>
                </tr>
            </thead>
            <tbody>
                @if ($transaksi->isEmpty())
                    <tr>
                        <td colspan="6">Tidak ada data</td>
                    </tr>
                @else
                    @foreach ($transaksi as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->reference_no }}</td>
                            <td>{{ 'Rp ' . number_format($item->price, 0, ',', '.') }}</td>
                            <td>{{ 'Rp ' . number_format($item->payment_amount, 0, ',', '.') }}</td>
                            <td>{{ $item->product->name }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center mt-5">
        {{ $transaksi->links() }}
    </div>
@endsection
