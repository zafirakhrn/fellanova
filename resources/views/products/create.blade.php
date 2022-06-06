@extends('adminlte::page')

@section('title', 'Tambah Produk')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Produk</h1>
@stop
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
        </div>
    </div>
</div>
     

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
            <div class="form-group">
              <label for="kategori_id">Kategori Produk</label>
              <select name="kategori_id" id="kategori_id" class="form-control">
                <option value="">Pilih Kategori</option>
                @foreach($itemkategori as $kategori)
                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                @endforeach
              </select>
            </div>
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                <input type="text" name="nama" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                        <label for="InputHarga">Harga</label>
                        <input type="text" class="form-control @error('harga') is-invalid @enderror" id="InputHarga" placeholder="Masukkan Harga" name="harga" >
                        @error('harga') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                        <label for="InputStock">Stock</label>
                        <input type="number" class="form-control @error('number') is-invalid @enderror" id="InputStock" placeholder="Masukkan Stock" name="stock" >
                        @error('stock') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Deskripsi:</strong>
                <textarea class="form-control" style="height:150px" name="deskripsi" placeholder="Detail"></textarea>
            </div>
        </div>
    <div class="col">
        <strong> panjang </strong>
      <input type="text" class="form-control" placeholder="panjang (cm)" name="panjang">
    </div>
    <div class="col">
    <strong> lebar </strong>
      <input type="text" class="form-control" placeholder="lebar (cm)" name="lebar">
    </div>
    <div class="col">
    <strong> tinggi </strong>
      <input type="text" class="form-control" placeholder="tinggi(cm)" name="tinggi">
    </div>
    <br>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gambar :</strong>
                <input type="file" name="gambar" class="form-control" placeholder="image">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
</div>
</div>
</form>
@endsection
