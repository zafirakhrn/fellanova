<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\Pengiriman;

class PengirimanController extends Controller
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
                $q->where('status_pengiriman', 'sudah');
                        })
                        ->orderBy('created_at', 'desc')
                        ->paginate(20);
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
        return view('pengiriman.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);
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
        $this->validate($request, [
            'estimasi' => 'required',
            'tgl_pengiriman' => 'required',
            'status' => 'required',
            'cart_id' => 'required',
            'user_id' => 'required',
            

        ]);
        $input = $request->all();
        $itemuser = $request->user();
        $itemcart = Cart::where('status_cart', 'paid')
        ->where('user_id', $itemuser->id)
        ->first();


            $itempengiriman = Pengiriman::create($input);

            return redirect()->route('pengiriman.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        {
            $itempengiriman = Pengiriman::all();
    
            return view('layouts.tracking');
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
            return view('pengiriman.edit', $data)->with('no', 1);            
        } else {
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

        $itempengiriman->validate($request,[
            'status' => 'required',
            'estimasi' => 'required',
            'tgl_pengiriman' => 'required',

        ]);

        $inputan = $request->all();
        $inputan['status'] = $request->status;
        $inputan['tgl_pengiriman'] = $request->tgl_pengiriman;
        $inputan['estimasi'] = $request->estimasi;
        $itemorder = Order::findOrFail($id);
        
        $itempengiriman->update($inputan);
        
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