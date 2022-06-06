@extends('layouts.base')
<title>Cart</title>
@section('head')
<link rel="stylesheet" type="text/css" href="{!! asset('/css/cart.css') !!}">
@endsection

@section('body')

<div class="container-fluid">
    <p> <br> <br> </p>
    <div class="back">
        <a href="/product/">
            <i class="fa fa-arrow-left"></i><i style="font-family:montserrat;">Continue Shopping</i>
        </a>
    </div>
    <div class='steps-container' style="margin-left:410px;position:relative;">
        <div class='steps active'>
            <span style="font-family:montserrat;font-size:20px;font-weight:700">CART</span>
        </div>
        <div class='steps'>
            <span style="font-family:montserrat;font-size:20px;font-weight:700">CHECKOUT</span>
        </div>
        <div class='steps'>
            <span style="font-family:montserrat;font-size:20px;font-weight:700">PAYMENT</span>
        </div>
    </div>
    <br>
    <div class="content-wrapper">
        <table id="cart" class="table table-hover table-condensed">
            <thead style="font-family:montserrat;">
                <tr>
                    <br>
                    <th style="width:40%">Produk</th>
                    <th style="width:20%">Harga</th>
                    <th style="width:30%">Jumlah</th>
                    <th style="width:5%"> </th>
                    <th style="width:22%" >Subtotal</th>
                    <th style="width:10%"> </th>
                </tr>
            </thead>
            @foreach($itemcart->detail as $detail)
            <tbody>
                <tr>
                    <td data-th="Produk">
                        <div class="row">
                            <div class="col-sm-5 hidden-xs"><img src="/image/{{ $detail->gambar }}" class="img-thumbnail" width="200" height="200"></div>
                            <div class="col-sm-5">
                            <b> {{ $detail->product->nama }} </b>
                            </div>
                        </div>
                    </td>
                    <td data-th="Harga">Rp.{{ number_format($detail->harga, 2) }}</td>
                    <td data-th="Jumlah">
                    <form action="{{ route('cartdetail.update',$detail->id) }}" method="post">
                    @method('patch')
                    @csrf()
                    <div class="btn-group" role="group">
                    <button type="submit" class="btn btn-primary" value="kurang" name="param">
                    -</button>
                    </form>
                    <button class="btn btn-outline-primary btn-sm" disabled="true">
                    {{ number_format($detail->quantity)}}
                    
                    </button>
                    <button type="submit" class="btn btn-primary" value="tambah" name="param">
                    +</button>
                   
                    </form>
                  </div>
                </td>
                <td>
                </tb>
                <td>
                Rp.{{ number_format($detail->subtotal, 2) }}
                </td>
                <td>
                <form action="{{ route('cartdetail.destroy', $detail->id) }}" method="post" style="display:inline;">
                  @csrf
                  {{ method_field('delete') }}
                  <button type="submit" class="btn btn-sm btn-danger mb-2">
                    Hapus
                  </button>                    
                </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
         
            <tfoot>
                <tr>
                    <td colspan="3"></td>
                    <td class="text-center"><h4><strong style="font-family:montserrat;">Total</strong></h4></td>
                    <td><h4><strong style="font-family:montserrat;">Rp.{{ number_format($itemcart->total, 2) }}</strong></h4>
</td>
<td>
                    <a href="{{ URL::to('checkout') }}"><button type="submit" class="btn btn-success btn-fyi" style="font-family:montserrat;"> <b> Checkout </b></button></a>
                    </td>
                </form>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection



