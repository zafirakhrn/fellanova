<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\Konfirmasi;

class KonfirmasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemkonfirmasi = konfirmasi::all();
    
        return view('konfirmasi.index', [
            'itemkonfirmasi' => $itemkonfirmasi
        ]);

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
        $this->validate($request, [
            'atas_nama' => 'required',
            'bank' => 'required',
            'bukti_transfer' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $input = $request->all();
  
        if ($bukti_transfer = $request->file('bukti_transfer')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $bukti_transfer->getClientOriginalExtension();
            $bukti_transfer->move($destinationPath, $profileImage);
            $input['bukti_transfer'] = "$profileImage";
        }
        $itemuser = $request->user();
        $itemcart = Cart::where('status_cart', 'checkout')
        ->where('user_id', $itemuser->id)
        ->first();

            $input['user_id'] = $itemuser->id;
            $input['cart_id'] = $itemcart->id;
            $input['no_invoice'] = $itemcart->no_invoice;
            $input['status'] = 'belum divalidasi';
            $input['total'] = $itemcart->total;
            $itemcart->update(['status_cart' => 'paid']);
            $itemkonfirmasi = Konfirmasi::create($input);

            return view('layouts.waiting');
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
        $itemkonfirmasi = Konfirmasi::findOrFail($id);
        $itemcart = Cart::where('status_cart', 'paid')
        ->where('id', $itemkonfirmasi->cart_id)
        ->first();
        $itemkonfirmasi->update(['status' => ('Sudah divalidasi')]);
        $itemcart->update(['status_pembayaran' => ('Sudah divalidasi')]);
        
        return redirect()->route('konfirmasi.index')->with('success','Pembayaran berhasil dikonfirmasi');
    }

}