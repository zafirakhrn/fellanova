@extends('layouts/base')

@section('head')
<link rel="stylesheet" type="text/css" href="{!! asset('/css/cart.css') !!}">
@endsection

@section('body')
<div class="container-fluid">
  <p> <br> <br> </p>
  <div class="back">
    <a href="/menu/">
      <i class="fa fa-arrow-left"></i><i style="font-family:montserrat;">Continue Shopping</i>
    </a>
  </div>
  <div class='steps-container' style="margin-left:410px;position:relative;">
    <div class='steps active'>
      <a href="/cart/"><span style="font-family:montserrat;font-size:20px;font-weight:700">CART</span></a>
    </div>
    <div class='steps active'>
      <a href="/summary/"><span style="font-family:montserrat;font-size:20px;font-weight:700">CHECKOUT</span></a>
    </div>
    <a href="/payment">
      <div class='steps'>
    </a>
    <span style="font-family:montserrat;font-size:20px;font-weight:700">PAYMENT</span>
  </div>
</div>
<br>
<div class="content-wrapper">
        <table id="cart" class="table table-hover table-condensed">
            <thead style="font-family:montserrat;">
              <h4 class="text-center"style="font-family:montserrat;">ORDER SUMMARY</H4>
            <!-- @if($carts != null) -->
</table>
            @foreach ($carts as $item)
            <div style="margin-left:100px;">
            <table class="table summary"style="font-family:montserrat;">
        <tbody>
        <tr style="font-weight:600;font-size:20px;" >
            <td>{{$item->jenis_makananMinuman}} <b style="margin-left:10px;"> X </b> {{$item->quantity}}</td>
            <td class="text-align-right">Rp. {{number_format($item->total)}}</td>
        </tr>
            @endforeach
            <!-- @endif -->
            
        <tr>
            <td>Subtotal</td>
            <td class="text-align-right">Rp.{{number_format($subtotal)}}</td>
        </tr>
        <tr>
            <td>Delivery fee</td>
            <td class="text-align-right">Rp.15,000</td>
        </tr>
        <tr>
            <td>PPN 10%</td>
            <td class="text-align-right">Rp.{{number_format($subtotal * 10 / 100)}}</td>
        </tr>
        <tr>
            <td style="font-size:30px;"> TOTAL</td>
            <td class="text-align-right" style="font-size:30px;">Rp.{{number_format($subtotal + 15000 + $subtotal * 10 / 100)}}</td>
        </tr>
       
    </tbody></table>
</div>
<div style="margin-left:350px;">
<input type="text" id="promotion-code" name="promotion_code" value="" placeholder="Promo code">

<button class="btn btn-success" onclick="myFunction()">Apply</button>
</div>
<div style="margin-left:330px;">
<p id="demo" style="font-family:roboto;font-size:15px;color:#008000;"></p>
</div>
<br>
<div style="margin-left:400px;">
<a href="/payment/"><div class="btn btn-success" style="font-family:montserrat;font-size:15px;font-weight:700;">PAYMENT<span class="glyphicon glyphicon-chevron-right"></span></a></div>
</div>
</div>
</div>
<script>
      function myFunction() {
        document.getElementById("demo").innerHTML = "Selamat, anda mendapat potongan harga!";
      }
    </script>
@endsection
