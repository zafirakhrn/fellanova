@extends('layouts\base')

@section('head')
<link rel="stylesheet" type="text/css" href="{!! asset('/css/login.css') !!}">
@endsection

@section('body')

<div class="container-fluid">
    <div class="login">
    <div>   
        <img style=" width: 180px; height: 70px; margin-left : 100px;" src="https://media.discordapp.net/attachments/767049115808694343/963502725843263588/unknown.png">
        <h3 style="font-family: montserrat; font-weight: 1000; width: fit-content; margin: auto; margin-top: 20px; font-size: 20px;">Login</h3>
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

            <form method="POST" action="{{ url('/login/check')}}">
                {{ csrf_field() }}
                <div class="isian">
                    <input name="email" class="baris1" type="text" placeholder="Username or Email" style="border-radius: 25px">
                    <input name="password" class="baris1" type="password" placeholder="Password" style="border-radius: 25px">
                </div>
                <div class="signup">
                    <button type="submit" name="login" class="bt_signup" value="login"> Login </button>
                </div>
                <div class="register">
                    <p> Don't have an account? </p>
                    <a href="/registercs/">
                        <p style="margin-left: 5px; color: rgb(35, 120, 233);"> Register</p>
                    </a>
                    </div>
            </form>
        </div>
        </div>
</div>
@endsection