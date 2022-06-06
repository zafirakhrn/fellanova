@extends('adminlte::page')

@section('title', 'Edit Produk')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Produk</h1>
@stop

@section('content')
@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif


{!! Form::model($product, ['method' => 'PATCH','route' => ['products.update', $product->id]]) !!}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="InputNama">Nama</label>
                        <input type="text" class="form-control" id="InputNama" placeholder="Nama Produk" name="nama" value="{{$product->nama ?? old('nama')}}">
                    </div>

                    <div class="form-group">
                        <label for="InputHarga">Harga</label>
                        <input type="text" name="harga" id="harga" value={{ $product->harga }} class="form-control">
                       
                    </div>
                    <div class="form-group">
                        <label for="InputStock">Stock</label>
                        <input type="number" name="stock" id="stock" value={{ $product->stock }} class="form-control">
                       
                    </div>
                    <div class="form-group">
                        <label for="InputDesc">Deskripsi</label>
                        <input type="text" class="form-control" id="InputDeskripsi" placeholder="Password" name="deskripsi" value="{{$product->deskripsi ?? old('deskripsi')}}">

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
                    <div class="form-group">
                    <strong>Gambar:</strong>
                    <input type="file" name="gambar" class="form-control" placeholder="gambar">
                    <img src="/image/{{$product->gambar ?? old('gambar')}}" width="300px">
                </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"  class="btn btn-default" >Simpan</button>
                    <button> <a href="{{route('products.index')}}"> Batal
                    </a></button>
                </div>
            </div>
        </div>
    </div>
@stop