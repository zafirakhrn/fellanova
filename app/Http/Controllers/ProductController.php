<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productList()
    {
        $products = Product::all();

        return view('layouts.product', compact('products'));

    }
  
    public function index()
    {{
        $products = product::all();
    
        return view('products.index', [
            'products' => $products
        ]);
        $itemkategori = Kategori::orderBy('nama_kategori', 'asc')->get();
        
    }}
    public function create()
        {
            $itemkategori = Kategori::orderBy('nama_kategori', 'asc')->get();
            $data = array('title' => 'Form Produk Baru',
                        'itemkategori' => $itemkategori);
            return view('products.create', $data);

        }
        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'nama' => 'required',
            'harga' => 'required',
            'stock' => 'required',
            'panjang' => 'required',
            'lebar' => 'required',
            'tinggi' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $input = $request->all();
  
        if ($gambar = $request->file('gambar')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $gambar->getClientOriginalExtension();
            $gambar->move($destinationPath, $profileImage);
            $input['gambar'] = "$profileImage";
        }
    
        Product::create($input);
        
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function shows(Product $product)
    {
        return view('layouts.show', [
            'product' => $product]);
    
        
    }
    public function sofa(Product $product)
    {
        $products = Product::all();

        return view('layouts.sofa', compact('products'));
        
    }
    public function terrace(Product $product)
    {
        $products = Product::all();

        return view('layouts.terrace', compact('products'));
        
    }
    public function dining(Product $product)
    {
        $products = Product::all();

        return view('layouts.dining', compact('products'));
        
    }
    public function daybed(Product $product)
    {
        $products = Product::all();

        return view('layouts.daybed', compact('products'));
        
    }
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
        
    }
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'nama' => 'required',
            'harga' => 'required',
            'stock' => 'required',
            'deskripsi' => 'required',
            'panjang' => 'required',
            'lebar' => 'required',
            'tinggi' => 'required',
        ]);
  
        $input = $request->all();
  
        if ($gambar = $request->file('gambar')) {
            $destinationPath = 'gambar/';
            $profileImage = date('YmdHis') . "." . $gambar->getClientOriginalExtension();
            $gambar->move($destinationPath, $profileImage);
            $input['gambar'] = "$profileImage";
        }else{
            unset($input['gambar']);
        }
          
        $product->update($input);
    
        return redirect()->route('products.index')
                        ->with('success','Produk berhasil diupdate');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
     
        return redirect()->route('products.index')
                        ->with('success','Produk berhasil dihapus');
    }
    
    
}