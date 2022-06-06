@extends('layouts/index')

@section('head')
<link rel="stylesheet" href="{ 'css/dashboard.css' %}" />
<link href="css/bootstrap.css" rel="stylesheet">
@endsection


@section('body')
<img class src="/image/image 27 (4).png">
    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="4000">

        <!-- Indicators -->
        <ol class="carousel-indicators"style="margin-top:20px">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active" >
            <a href="/sofa">
                <img class 
                    src="/image/sofaheader.png"
                    alt="Fellanova Sofa"
                   >
</a>
            </div>

            <div class="item">
            <a href="/daybed">
                <img 
                src="/image/frame.png"
                    alt="Daybed">
</a>
            </div>

            <div class="item">
            <a href="/dining">
                <img
                src="/image/diningheader.png"
                    alt="Dining Set">
</a>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
@endsection