@extends('adminlte::page')

@section('title', 'Pengiriman')

@section('content_header')
    <h1 class="m-0 text-dark">Data Pengiriman</h1>
@stop
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">

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
                  <th>No</th>
                  <th>Invoice</th>
                  <th>Sub Total</th>
                  <th>Ongkir</th>
                  <th>Total</th>
                  <th>Status Pembayaran</th>
                  <th>Status Pengiriman</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              @foreach($itemorder as $order)
                <tr>
                  <td>
                    {{ ++$no }}
                  </td>
                  <td>
                    {{ $order->cart->no_invoice }}
                  </td>
                  <td>
                    {{ number_format($order->cart->subtotal, 2) }}
                  </td>
                  <td>
                    {{ number_format($order->cart->ongkir, 2) }}
                  </td>
                  <td>
                    {{ number_format($order->cart->total, 2) }}
                  </td>                  
                  <td>
                    {{ $order->cart->status_pembayaran }}
                  </td>
                  <td>
                    {{ $order->cart->status_pengiriman }}
                  </td>
                  <td>
                    <a href="{{ route('pengiriman.edit', $order->id) }}" class="btn btn-sm btn-primary mb-2">
                      Isi form pengiriman
</a>     
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection