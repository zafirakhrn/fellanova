@extends('layouts/index')

@section('head')
<link rel="stylesheet" type="text/css" href="{!! asset('/css/about.css') !!}">

@endsection
@section('body')

<div class="container-fluid">
  <h1 style="font-family: Poppins;font-weight: 500;font-size: 60px;color :#B81900; margin: auto;width: 326px;">About Us</h1>
  <div class="row">
    <P class="isi">
    Fellanova Furniture hadir untuk memenuhi kebutuhan dan kepuasan besar anda semua akan furnitur yang terbuat dari rotan sintetik/plastik. 
    Furniture buatan asli Indonesia (Cirebon) yang sudah mendunia.<br><br> <br>
      ✆ : 08122853636 <br>  ✉ : <a href=mailto:fellanov@gmail.com> fellanov@gmail.com </a></P>

    <div class="column" style="background-color:white;padding-left:60px;">
      <div id="myCarousel" class="carousel-fade" data-ride="carousel" data-interval="4000">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="container">
          <div class="carousel-inner" style="margin-left:60px;">
            <div class="item active">
              <img src="/image/brown sofa.png" alt="about us" style="width:35%;border-radius:30px;">
            </div>

            <div class="item">
              <img src="/image/dining round.png" alt="about us" style="width:35%;border-radius:30px;">
            </div>

            <div class="item">
              <img src="/image/L sofa.png" alt="about us" style="width:35%;border-radius:30px;">
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection