<?php

namespace App\Http\Controllers;


use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.transaksi.index', [
            'transaksi' => transaksi::all(),
            'transaksi' => transaksi::with('produk')->latest()->paginate(7)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $response = Http::withHeaders([
            'X-API-KEY' => 'DATAUTAMA',
        ])->get('https://pay.saebo.id/test-dau/api/v1/products/'.$request->product_id);

        $product = $response->json()['data'];

        $price = $product['price'];
        $payment_amount = $price * $request->quantity;
        
        $transaction = new transaksi();
        $transaction->product_id = $product['id'];
        $transaction->quantity = $request->quantity;
        $transaction->price = $price;
        $transaction->payment_amount = $payment_amount;
        $transaction->reference_no = $this->getReferenceNo();
        $transaction->save();

        return response()->json([
            'code' => '20000',
            'reference_no' => $transaction->reference_no,
            'product_id' => $product['id'],
            'quantity' => $request->quantity,
            'price' => $price,
            'payment_amount' => $payment_amount,
        ]);
    }

    private function getReferenceNo()
{
        // Generate reference number using timestamp
        return 'REF' . time();
    }
    /**
     * Display the specified resource.
     */
public function search(Request $request){
    $search = $request->query('search');
    $transaksi = transaksi::whereHas('product', function($query) use ($search){
        $query->where('name', 'like', '%'.$search.'%');
    })->latest()->paginate(7)->withQueryString();
    return view('dashboard.transaksi.index', compact('transaksi'));
}

}
