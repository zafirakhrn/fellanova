@extends('layouts/base')

@section('head')
<link rel="stylesheet" type="text/css" href="{!! asset('/css/waiting.css') !!}">
@endsection

@section('body')
<div class="container-fluid">
<div class="content-wrapper">
<img src="/image/waiting.png" alt="Paris" class="center">
  <p class="textcenter" style="font-family:poppins;font-size:20px;font-weight:700"> Pembayaran sedang dalam proses validasi</p>
  <a href="/"><button class="btn btn-success btn-block" style="font-family:poppins" >Back to Home</button></a>


</div>
</div>
@endsection