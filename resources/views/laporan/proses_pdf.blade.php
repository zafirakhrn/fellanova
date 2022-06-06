<html>
<head>
	<title>Laporan Transaksi Fellanova Furniture</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
              <h4 class="text-center">Laporan Transaksi</h4>
              <h6 class="text-center">Fellanova Furniture</h6>
              <div class="table-responsive">
                <table class="table table-stripped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Invoice</th>
                      <th>Subtotal</th>
                      <th>Ongkir</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                      @php $i=1 @endphp
                  @foreach($itemtransaksi as $transaksi)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>
                      {{ $transaksi->cart->no_invoice }}
                      </td>
                      <td>
                      {{ number_format($transaksi->cart->subtotal, 2) }}
                      </td>
                      <td>
                      {{ number_format($transaksi->cart->ongkir, 2) }}
                      </td>                      
                      <td>
                      {{ number_format($transaksi->cart->total, 2) }}
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
</body>
</html>