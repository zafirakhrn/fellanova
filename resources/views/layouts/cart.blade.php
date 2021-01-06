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
                    <th style="width:50%">Menu Item</th>
                    <th style="width:10%">Price</th>
                    <th style="width:5%">Quantity</th>
                    <th style="width:22%" class="text-center">Subtotal</th>
                    <th style="width:10%"></th>
                </tr>
            </thead>
            <!-- @if($carts != null) -->
            @foreach ($carts as $item)
            <tbody>
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{$item->image}}" alt="..." class="img-responsive" /></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{$item->jenis_makananMinuman}}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">{{number_format($item->harga)}}</td>
                    <td data-th="Quantity">
                        <input type="number" class="form-control text-center" value="{{$item->quantity}}">
                    </td>
                    <td data-th="Subtotal" class="text-center">{{number_format($item->total)}}</td>
                    <td class="actions" data-th="">
                        <a href="/cart_delete/{{$item->id}}"><button style="background-color: #B81900; color:white;" class="btn btn-sm"><i class="fa fa-trash-o"></i></button></a>
                    </td>
                </tr>
            </tbody>
            @endforeach
            <!-- @endif -->
            <tfoot>
                <tr>
                    <td colspan="3"></td>
                    <td class="hidden-xs text-center"><strong style="font-family:montserrat;">Total {{number_format($subtotal)}}</strong></td>
                    <td>
                        <<<<<<< Updated upstream <button type="submit" class="btn btn-success pull-right btn-fyi" style="padding: 5px;font-family:montserrat;"><a href="/summary/"> Check Out </button> </a>
                            =======
                            <<<<<<< HEAD <button type="submit" class="btn btn-sm" style="background-color: #B81900; color:white; padding: 5px;"> Check Out </button>
                                =======
                                <button type="submit" class="btn btn-success pull-right btn-fyi" style="padding: 5px;font-family:montserrat;"><a href="/summary/"> Check Out </button> </a>
                                >>>>>>> 2f337c8a61c7caed64a65bbdbba0360118762cad
                                >>>>>>> Stashed changes
                    </td>

                </tr>

            </tfoot>
        </table>
    </div>
</div>
@endsection