@extends('layouts/base')

@section('head')
<link rel="stylesheet" type="text/css" href="{!! asset('/css/cart.css') !!}">
@endsection

@section('body')
<div class="container-fluid">
  <p> <br> <br> </p>
 
  <div class='steps-container' style="margin-left:410px;position:relative;">
        <div class='steps active'>
            <span style="font-family:montserrat;font-size:20px;font-weight:700">CART</span>
        </div>
        <div class='steps active'>
            <span style="font-family:montserrat;font-size:20px;font-weight:700">CHECKOUT</span>
        </div>
        <div class='steps active'>
            <span style="font-family:montserrat;font-size:20px;font-weight:700">PAYMENT</span>
        </div>
</div>
<br>
<div class="container">
  <div class="row">
  <div class="col col-4">
      <div class="card">
        <div class="card-header">
        INVOICE
        </div>
        <div class="card-body">
          <table class="table">
              <tr>
            <td>Total</td>
            <td class="text-right" style="font-family:montserrat;font-size:15px;font-weight:700">
               Rp. {{ number_format( $itemcart->total, 2) }}
              </td>
            <tr>
              <td>No Invoice</td>
              <td class="text-right">
                {{ $itemcart->no_invoice }}
              </td>
            </tr>
            <tr>
              <td>Subtotal</td>
              <td class="text-right">
                {{ number_format($itemcart->subtotal, 2) }}
              </td>
            </tr>
            <tr>
              <td>Total</td>
              <td class="text-right">
                {{ number_format($itemcart->total, 2) }}
              </td>
            </tr>
            @if($itemalamatpengiriman)
            <tr>
              <td>Nama <br />
              <p style="font-family:montserrat;font-size:15px;font-weight:700"> {{ $itemalamatpengiriman->nama_penerima }} </p>
            
                No.Telepon<br />
                <p style="font-family:montserrat;font-size:15px;font-weight:700"> {{ $itemalamatpengiriman->no_tlp }} </p>
            </td>
              <td class="text-left">
              Alamat <br />
              <p style="font-family:montserrat;font-size:15px;font-weight:700"> {{ $itemalamatpengiriman->alamat }} <br />
                        {{ $itemalamatpengiriman->kota}} - {{ $itemalamatpengiriman->kodepos}}</p></td>
              </td>
            </tr>
            @endif
            <tr>
              <td><b>Pembayaran</b> <br>
            Silahkan lakukan pembayaran ke : <br>
           
            </td>
              <td>
                 BCA 6801001162 <br>
            a/n Zulfan Syafaruddin 
</td>
            </tr>
          </table>
        </div>
        <div class="card-footer">
        </div>
      </div>
    </div>
    <div class="col col-8">
      @if(count($errors) > 0)
      @foreach($errors->all() as $error)
          <div class="alert alert-warning">{{ $error }}</div>
      @endforeach
      @endif
      @if ($message = Session::get('error'))
          <div class="alert alert-warning">
              <p>{{ $message }}</p>
          </div>
      @endif
      @if ($message = Session::get('success'))
          <div class="alert alert-success">
              <p>{{ $message }}</p>
          </div>
      @endif
      <div class="row mb-2">
        <div class="col col-12 mb-2">
          <div class="card">
            <div class="card-header">
            Pembayaran
            </div>
            <div class="card-body">
            <form action="{{ route('konfirmasi.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label for="formGroupExampleInput">Nama Bank Asal</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="(contoh : BCA)" name="bank">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Nama Pemilik Rekening</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="(contoh : Budi Prasetyo))"name="atas_nama">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Bukti Transfer</label>
    <input type="file" class="form-control" placeholder="image" name="bukti_transfer">
  </div>
  <button type="submit" class="btn btn-success btn-fyi" style="font-family:montserrat;"> <b> I have completed my payment </b></button>

</form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection