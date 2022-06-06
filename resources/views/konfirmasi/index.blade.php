@extends('adminlte::page')

@section('title', 'Konfirmasi Pembayaran')
<link rel="stylesheet" type="text/css" href="{!! asset('/css/about.css') !!}">
@section('content_header')
    <h1 class="m-0 text-dark">Data Konfirmasi</h1>
@stop
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            Data Konfirmasi
          </h3>
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
                  <th>Receipt</th>
                  <th>Invoice</th>
                  <th>Nama</th>
                  <th>Bank</th>
                  <th>Total</th>
                  <th>Status Pembayaran</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              @foreach($itemkonfirmasi as $key => $confirm)
                <tr>
                  <td>
                  {{$key+1}}
                  </td>
                  <td>
 <!-- Trigger the Modal -->
<img id="myImg" src="/image/{{ $confirm->bukti_transfer }}"  alt="bukti" style="width:100px;max-width:200px">

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- The Close Button -->
  <span class="close">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="modal-content" id="img01">
</td>
                  <td>
                    {{ $confirm->no_invoice }}
                  </td>
                  <td>
                  {{ $confirm->atas_nama }}
                  </td>
                  <td>
                  {{ $confirm->bank }}
                  </td>
                  <td>
                  {{ number_format($confirm->total, 2) }}
                  </td>                  
                  <td>
                  {{ $confirm->status }}
                  </td>
                  <form action="{{ route('konfirmasi.update', $confirm->id) }}" method='post'>
              @csrf
              {{ method_field('patch') }}
                  <td>
                    @if($confirm->status == 'belum divalidasi')
                      <input type="hidden" name="status" id="status" class="form-control" value='Sudah divalidasi'>
                    <button type="submit" class="btn btn-sm btn-primary mb-2">
                    Validasi Pembayaran
                    </a>
                    @else
                    <button type="secondary" class="btn btn-sm btn-secondary mb-2" disabled>
                    Validasi Pembayaran
                    </a>
</form>
                   @endif
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
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>
@endsection
