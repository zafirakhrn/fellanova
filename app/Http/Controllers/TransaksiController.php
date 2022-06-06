<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\AlamatPengiriman;
use App\Models\Order;
use App\Models\Pengiriman;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemuser = $request->user();
        if ($itemuser->role == 'Admin') {
            // kalo admin maka menampilkan semua cart
            $itemorder = Order::whereHas('cart', function($q) use ($itemuser) {
                        })
                        ->orderBy('created_at', 'desc')
                        ->paginate(20);
        } else if  ($itemuser->role == 'Manufacturer') {
           {
                // kalo admin maka menampilkan semua cart
                $itemorder = Order::whereHas('cart', function($q) use ($itemuser) {
                            })
                            ->orderBy('created_at', 'desc')
                            ->paginate(20);
                        }
         } else {
            // kalo member maka menampilkan cart punyanya sendiri
            $itemorder = Order::whereHas('cart', function($q) use ($itemuser) {
                            $q->where('status_cart', 'paid');
                            $q->where('user_id', $itemuser->id);
                        })
                        ->orderBy('created_at', 'desc')
                        ->paginate(20);
        }
        $data = array('title' => 'Data Transaksi',
                    'itemorder' => $itemorder,
                    'itemuser' => $itemuser);
        if ($itemuser->role == 'Admin'){
        return view('transaksi.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);
        }else if  ($itemuser->role == 'Manufacturer'){
            return view('transaksi.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);
        }else{
            return view('layouts.myorder', $data)->with('no', ($request->input('page', 1) - 1) * 20); 
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $itemuser = $request->user();
        $itemcart = Cart::where('status_cart', 'checkout')
                        ->where('user_id', $itemuser->id)
                        ->first();
        if ($itemcart) {
            $itemalamatpengiriman = AlamatPengiriman::where('user_id', $itemuser->id)
                                                    ->where('status', 'utama')
                                                    ->first();
            if ($itemalamatpengiriman) {
                // buat variabel inputan order
                $inputanorder['cart_id'] = $itemcart->id;
                $inputanorder['nama_penerima'] = $itemalamatpengiriman->nama_penerima;
                $inputanorder['no_tlp'] = $itemalamatpengiriman->no_tlp;
                $inputanorder['alamat'] = $itemalamatpengiriman->alamat;
                $inputanorder['kota'] = $itemalamatpengiriman->kota;
                $inputanorder['kodepos'] = $itemalamatpengiriman->kodepos;
                $itemcart->update(['status_cart' => 'checkout']);
                $itemorder = Order::create($inputanorder);//simpan order

                return redirect()->action('CartController@payment');
            } else {
                return back()->with('error', 'Alamat pengiriman belum diisi');
            }
        } else {
            return abort('404');//kalo ternyata ga ada shopping cart, maka akan menampilkan error halaman tidak ditemukan
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        $itemuser = $request->user();
        if ($itemuser->role == 'Admin') {
            $itemorder = Order::findOrFail($id);
            $data = array('title' => 'Detail Transaksi',
                        'itemorder' => $itemorder);
            return view('transaksi.show', $data)->with('no', 1);            
        } else {
            $itemorder = Order::where('id', $id)
                            ->whereHas('cart', function($q) use ($itemuser) {
                                $q->where('user_id', $itemuser->id);
                            })->first();
            $itempengiriman = Pengiriman::where('user_id', $itemuser->id)
                            ->where('status', 'Sudah')
                            ->first();
            if ($itemorder) {
                $data = array('title' => 'Detail Transaksi',
                            'itemorder' => $itemorder,
                            'itempengiriman' => $itempengiriman,
            );
             if ($itemuser->role == 'Admin'){
                return view('transaksi.show', $data)->with('no', 1);  
        }else{
            return view('layouts.tracking', $data)->with('no', 1);  
        }
          
        }
    }
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $itemuser = $request->user();
        if ($itemuser->role == 'Admin') {
            $itemorder = Order::findOrFail($id);
            $data = array('title' => 'Form Edit Transaksi',
                        'itemorder' => $itemorder);
            return view('transaksi.edit', $data)->with('no', 1);            
        } else if ($itemuser->role == 'Manufacturer') {
            $itemorder = Order::findOrFail($id);
            $data = array('title' => 'Form Edit Transaksi',
                        'itemorder' => $itemorder);
            return view('transaksi.edit', $data)->with('no', 1);   
        }else{
            return abort('404');//kalo bukan admin maka akan tampil error halaman tidak ditemukan
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'status_pembayaran' => 'required',
            'status_pengiriman' => 'required',
            'subtotal' => 'required|numeric',
            'ongkir' => 'required|numeric',
            'total' => 'required|numeric',
        ]);
        $inputan = $request->all();
        $inputan['status_pembayaran'] = $request->status_pembayaran;
        $inputan['status_pengiriman'] = $request->status_pengiriman;
        $inputan['subtotal'] = str_replace(',','',$request->subtotal);
        $inputan['ongkir'] = str_replace(',','',$request->total*5/100);
        $inputan['total'] = str_replace(',','',$request->total);
        $itemorder = Order::findOrFail($id);
        $itemorder->cart->update($inputan);
        return back()->with('success','Order berhasil diupdate');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}