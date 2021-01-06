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
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
            <div class='steps active'>
        </a>
        <span style="font-family:montserrat;font-size:20px;font-weight:700">PAYMENT</span>
    </div>
</div>
<div class="content-wrapper">
    <table id="checkout" class="table table-hover table-condensed">

        <thead style="font-family:montserrat;">
            <tr>
                <br>
                <th class="text-center">PAYMENT METHOD</th>
            </tr>
        </thead>
    </table>
    <div class="container">
        <div class="row">
            <div class="paymentCont" style="margin-left:15px;">
                <div class="paymentWrap">
                    <div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
                        <label class="btn paymentMethod active">
                            <div class="method visa"></div>
                            <input type="radio" name="payment" value="dana" checked>
                        </label>
                        <label class="btn paymentMethod">
                            <div class="method master-card"></div>
                            <input type="radio" name="payment" value="gopay">
                        </label>
                        <label class="btn paymentMethod">
                            <div class="method amex"></div>
                            <input type="radio" name="payment" value="ovo">
                        </label>
                        <label class="btn paymentMethod">
                            <div class="method vishwa"></div>
                            <input type="radio" name="payment" value="linkaja">
                        </label>
                    </div>
                </div>
                <div class="btn btn-success pull-right btn-fyi" style="font-family:montserrat;font-size:15px;font-weight:700;margin-right:420px;">PROCEED<span class="glyphicon glyphicon-chevron-right"></span></div>
            </div>

        </div>
    </div>
</div>
@endsection