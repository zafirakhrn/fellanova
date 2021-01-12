<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Burger;
use App\Models\Cart;
use App\Models\Drink;
use App\Models\Pizza;
use App\Models\Checkout;

class CartController extends Controller
{
    //
    public function create()
    {
        $cart = Cart::where('user_id', auth()->user()->id)->where('status', 1)->get();
        $subtotal = Cart::where('user_id', auth()->user()->id)->where('status', 1)->sum('subtotal');
        return view('layouts/cart', ['carts' => $cart, 'subtotal' => $subtotal]);
        return view('layouts/summary', ['carts' => $cart, 'subtotal' => $subtotal]);
        // $user = auth()->user()->id;
        // $cart = Cart::where('user_id',$user)->where('status', null)->get();
        // $subtotal = Cart::where('user_id',$user)->get()->sum('subtotal');
        // return view ('layouts/cart', ['carts' => $cart, 'subtotal' => $subtotal])
    }

 