@extends('layouts.frontend')
<title>Produk</title>
@section('content')

    <div class="container px-6 mx-auto">
        <div>
        <ul class="nav nav-pills">
  <li class="active">
    <a href="product">Semua Produk</a>
  </li>
  <li><a href="{{ route('sofa') }}">Sofa</a></li>
  <li><a href="{{ route('terrace') }}">Kursi Teras</a></li>
  <li><a href="{{ route('dining') }}">Meja & Kursi Makan</a></li>
  <li><a href="{{ route('daybed') }}">Daybed</a></li>
</ul>
</div>

        <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            
            @foreach ($products as $product)
            <a href ="{{ route('shows', $product->id ) }}">
            <div class="w-full max-w-sm mx-auto overflow-hidden rounded-md shadow-md">
                <img src="/image/{{ $product->gambar }}" alt="" class="w-full">
                <div class="flex items-end justify-end w-full bg-cover">
                    
                </div>
                <div class="px-5 py-3">
                    <h3 class="text-gray-700 uppercase">{{ $product->nama }}</h3>
                    <span class="mt-2 text-gray-500">Rp.{{ $product->harga }}</span>
                    <form action="{{ route('cartdetail.store') }}" method="POST">
                       @csrf
                     <input type="hidden" name="product_id" value={{$product->id}}>
                     @if(isset(Auth::user()->email))
                        <button class="px-4 py-2 text-white bg-blue-800 rounded">Add To Cart</button>
                        @endif
                    </form>
                </div>
                
            </div>
</a>
            @endforeach
        </div>
    </div>
@endsection
            
