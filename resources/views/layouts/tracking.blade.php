@extends('layouts/base')

@section('head')
<link rel="stylesheet" type="text/css" href="{!! asset('/css/waiting.css') !!}">
@endsection

@section('body')
@section('content')
<div class="container-fluid">
<div class="content-wrapper"> 

<div class="track">
@if($itemorder->cart->status_pengiriman == 'belum')
                <div class="step activne"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pembayaran Berhasil</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-archive"></i> </span> <span class="text">Pesananmu sedang disiapkan</span> </div>
                <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Pesanan dikirim </span> </div>
           
@elseif($itemorder->cart->status_pengiriman == 'sudah')
                <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Pembayaran Berhasil</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-archive"></i> </span> <span class="text">Pesananmu sedang disiapkan</span> </div>
                <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> Pesanan dikirim </span> </div>
            
@endif </div>
  <div class="row">
    <div class="col col-lg-8 col-md-8 mb-2">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Item</h3>
        </div>
        <div class="card-body">
          <!-- digunakan untuk menampilkan pesan error atau sukses -->
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
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>
                    No
                  </th>
                  <th>
                    Nama
                  </th>
                  <th>
                    Harga
                  </th>
                  <th>
                  </th>
                  <th>
                  </th>
                  <th>
                    Qty
                  </th>
                  <th>
                    Subtotal
                  </th>
                </tr>
              </thead>
              <tbody>
              @foreach($itemorder->cart->detail as $detail)
                <tr>
                  <td>
                  {{ $no++ }}
                  </td>
                  <td>
                  {{ $detail->product->nama }}
                  </td>
                  <td>
                  {{ number_format($detail->harga, 2) }}
                  </td>
                  <td>
</td>
<td>
</td>
                  <td>
                  {{ $detail->quantity }}
                  </td>
                  <td>
                  {{ number_format($detail->subtotal, 2) }}
                  </td>
                </tr>
              @endforeach
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>
                    <b>Total</b>
                  </td>
                  <td>
                    <b>
                    {{ number_format($itemorder->cart->total, 2) }}
                    </b>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer">
          <a href="{{ route('transaksi.index') }}" class="btn btn-sm btn-danger">Tutup</a>
        </div>
      </div>
      <div class="card">
        <div class="card-header">Alamat Pengiriman</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-stripped">
              <thead>
                <tr>
                  <th>Nama Penerima</th>
                  <th>Alamat</th>
                  <th>No tlp</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    {{ $itemorder->nama_penerima }}
                  </td>
                  <td>
                    {{ $itemorder->alamat }}<br />
                    {{ $itemorder->kelurahan}}, {{ $itemorder->kecamatan}}<br />
                    {{ $itemorder->kota}}, {{ $itemorder->provinsi}} - {{ $itemorder->kodepos}}
                  </td>
                  <td>
                    {{ $itemorder->no_tlp }}
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col col-lg-4 col-md-4">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Ringkasan</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <td>
                    Total
                  </td>
                  <td class="text-right">
                    {{ number_format($itemorder->cart->total, 2) }}
                  </td>
                </tr>
                <tr>
                  <td>
                    Subtotal
                  </td>
                  <td class="text-right">
                  {{ number_format($itemorder->cart->subtotal, 2) }}
                  </td>
                </tr>
                <tr>
                  <td>
                    Ongkir
                  </td>
                  <td class="text-right">
                  {{ number_format($itemorder->cart->ongkir, 2) }}
                  </td>
                </tr>

                <tr>
                  <td>
                    Status Pembayaran
                  </td>
                  <td class="text-right">
                  {{ $itemorder->cart->status_pembayaran }}
                  </td>
                </tr>
                <tr>
                  <td>
                    Status Pengiriman
                  </td>
                  <td class="text-right">
                  {{ $itemorder->cart->status_pengiriman }}
                  </td>
                </tr>
                <tr>
                  <td>
                    Estimasi
                  </td>
                  <td class="text-right">
                  {{ $itempengiriman->estimasi }}
                  </td>
                </tr>
                <tr>
                  <td>
                    Tanggal Pengiriman
                  </td>
                  <td class="text-right">
                  {{ $itempengiriman->tgl_pengiriman }}
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection