<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Checkout;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user = auth()->user()->id;
        $cart = Cart::where('user_id', $user)->where('status', 1)->get();
        // dd(length($cart));
        if (empty($cart)) {
            # code...
            return redirect('/cart')->with(['sucsess', 'Tidak ada pesanan']);
        }
        $checkout = new Checkout;
        $checkout->name = auth()->user()->name;
        
        $pesanan = Cart::where('user_id', $user)->count('id');
        $checkout->jumlah_pesanan = $pesanan;

        $quan = Cart::where('user_id', $user)->sum('quantity');
        $checkout->quantity = $quan;
        
        $sub = Cart::where('user_id', $user)->sum('subtotal');
        $checkout->subtotal = $sub;
        
        $checkout->status = 1;
        $checkout->user_id = $user;
        $checkout->save();
        
        foreach ($cart as $carts) {
            $carts->status = 0;
            $carts->update();
        }
        
        return redirect('/summary')->with(['sucsess', 'Pesanan Berhasil Di Checkout']);
    }

    public function tampilan_data()
    {
        $user = auth()->user()->id;
        $summary = Checkout::where('user_id', $user)->get();

        return view('layouts.summary', compact('summary'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkout $checkout)
    {
        //
    }
}
