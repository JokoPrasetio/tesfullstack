<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Http\Requests\UpdateproductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.produk.index',[
            'produk' => product::all(),
            'produk' => product::latest()->paginate(7)->withQueryString()
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
        $validate = $request->validate([
            'name' => 'required|max:30',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'description' => 'required'
        ]);
        product::create($validate);
        return redirect('dashboard/produk')->with('success', 'data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {   
        $product = product::findOrFail($id);
        return view('dashboard.produk.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         $validate = $request->validate([
            'name' => 'required|max:30',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'description' => 'required'
        ]);
        $product=product::findOrFail($id);
        $product->update($validate);
        return redirect('dashboard/produk')->with('success', 'data berhasil perbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        product::destroy($id);
        return redirect('/dashboard/produk')->with('success', 'data Berhasil dihapus');
    }
  public function search(Request $request)
{
    $search = $request->query('search');
    $produk = Product::where('name', 'like', '%'.$search.'%')
                        ->orWhere('description', 'like', '%'.$search.'%')
                        ->orWhere('price', 'like', '%'.$search.'%')
                        ->orWhere('stock', 'like', '%'.$search.'%')
                        ->paginate(7);

    if ($produk->isEmpty()) {
        return view('dashboard.produk.index', compact('produk'))->with('failed', 'Tidak ada data yang ditemukan');
    } else {
        return view('dashboard.produk.index', compact('produk'))->with('search', $search);
    }
}


}
