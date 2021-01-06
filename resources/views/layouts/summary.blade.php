@extends('layouts/base')

@section('head')
<link rel="stylesheet" type="text/css" href="{!! asset('/css/cart.css') !!}">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
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
  <a href="/payment"><div class='steps'></a>
    <span style="font-family:montserrat;font-size:20px;font-weight:700">PAYMENT</span>
  </div>
</div>
    <br>
    <div class="content-wrapper">
    <table id="cart" class="table table-hover table-condensed">

        <thead style="font-family:montserrat;">
            <tr>
                <br>
                <th class="text-center">ORDER SUMMARY</th>
            </tr>
            
        </thead>
</table>
<a href ="/payment/">
        <div class="btn btn-success pull-right btn-fyi" style="font-family:montserrat;font-size:15px;font-weight:700;margin-right:395px;" >PAYMENT<span class="glyphicon glyphicon-chevron-right"></span></div></a>
</div>
</div>
</div>
@endsection