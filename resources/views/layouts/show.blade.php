@extends('layouts.frontend')

<title>Detail Produk</title>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="{!! asset('/css/detail.css') !!}">
@section('content')

<div class="container">
  

    <div class="product-content product-wrap clearfix product-deatil">
    <div class="row">
            <div class="col-md-5 col-sm-12 col-xs-12">
                <div class="product-image">
                <img src="/image/{{ $product->gambar }}" alt="" class="w-full"> 
                </div>
            </div>
            <div class="col-md-6 col-md-offset-1 col-sm-12 col-xs-12">
                <h2 class="name"style="font-family:poppins">
                {{ $product->nama }}
                </h2>
                
                <hr />
                
                <h3 class="price-container"style="font-family:poppins">
                Rp.{{ $product->harga }}
</h3>
                <hr />
                <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                            <br />
                            <strong style="font-family:poppins">Deskripsi</strong>
                            <p> <h4 style="font-family:poppins">
                            {{ $product->deskripsi }}
</h4>
                            </p>
                        </div>
                        
                    </div>
                <hr />
               
                <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">

                   <strong style="font-family:poppins">Ukuran Produk</strong>
                   <br>
                   <br>
                   <div class="row">
                   <div class="col">
                   <strong> panjang </strong>
                   <strong style="font-family:poppins">{{ $product->panjang }}cm</strong>
                    </div>
                    <div class="col">
                   <strong> lebar </strong>
                   <strong style="font-family:poppins">{{ $product->lebar }}cm</strong>
                    </div>
                    <div class="col">
                   <strong> tinggi </strong>
                   <strong style="font-family:poppins">{{ $product->tinggi }}cm</strong>
                    </div>
</div>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                <form action="{{ route('cartdetail.store') }}" method="POST">
                       @csrf
                     <input type="hidden" name="product_id" value={{$product->id}}>
                     @if(isset(Auth::user()->email))
                        <button class="btn btn-info btn-lg btn-block"style="font-family:poppins">Add To Cart</button>
                        @endif
                        </div>
                </div>
               
</form>
            </div>
        </div>
        
    </div>

</div>

@endsection
