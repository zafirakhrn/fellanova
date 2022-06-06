@extends('layouts\base')

@section('head')
<link rel="stylesheet" type="text/css" href="{!! asset('/css/register.css') !!}">
@endsection

@section('body')
<div class="container-fluid">
    <div class="register">
    <div>   
        <img style=" width: 180px; height: 70px; margin-left : 100px;" src="https://media.discordapp.net/attachments/767049115808694343/963502725843263588/unknown.png">
        <h3 style="font-family: montserrat; font-weight: 1000; width: fit-content; margin: auto; margin-top: 20px; font-size: 20px;">Register</h3>
</div>
        <div class="input" style="border-radius: 25px">
            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{{$message}}</strong>
            </div>
            @endif

            @if(count($errors) > 0)
                <div>
                    <ul>
                    @foreach($errors-> all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif


            <form method="POST" action="{{ url('/register/check')}}">
                {{ csrf_field() }}
                <div class="isian">
                    <input name="name" class="baris1" type="text" placeholder="Name">
                    <input name="email" class="baris1" type="email" placeholder="Email">
                    <input name="role" class="baris1" type="hidden" value="pembeli">
                    <input  name="password"class="baris1" type="password" placeholder="Password">
                    <input name="password_confirm" class="baris1" type="password" placeholder="Confirm Password">
                </div>
                <div class="signup">
                    <button class="bt_signup"> <a href="/logincs/"> Register </a> </button>
                </div>
                <div class="login">
                    <p style="margin-left : 75px;"> Already have an account? </p>
                    <a href="/logincs/">
                        <p style="color: rgb(35, 120, 233); margin-left : 5px;"> Login</p>
                    </a>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection