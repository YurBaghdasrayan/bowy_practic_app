{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <title>Document</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--<form action="{{route('verifycode')}}" method="post">--}}
{{--    @csrf--}}
{{--    <input type="number" name="user_code" placeholder="verify_code">--}}
{{--</form>--}}


{{--</body>--}}
{{--</html>--}}
@extends('layouts.app')
@section('title')
    <title>код верификации</title>
@endsection

@section('content')
    @include('includes_file.header')
    <main>
        <section class="login">
            <div class="login_wrapper">
                <div class="login_form_social_links_wrapper">
                    <form action="{{route

('verifycode')}}" class="login_form_wrapper" method="post">
                        @csrf
                        <h1 class="login_form_title">Введи ваш код верификации?</h1>
                        @if(session()->has('message'))
                            <div class="alert alert-danger">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        @if($errors->has('email'))
                            <div class="alert alert-danger" >{{ $errors->first('email') }}</div>
                        @endif
                        <div class="login_form_inputs_wrapper">
                            <div class="login_form_input">
                                <input type="number" class="login_form_input_field" name="user_code" placeholder="Код верификации">
                            </div>
                            <button style="width: 360px;" type="submit" value="save" class="login_form_btn">Верифицировать аккаунт</button>
                        </div>
                    </form>
                    <form action="{{route('coderepeat')}}" method="post">
                        @csrf
                        <div class="login_form_inputs_wrapper">
                            <button style="width:360px" type="submit" value="save" class="login_form_btn">Oтправить код повторно</button>
                        </div>
                    </form>
                </div>
                <div class="login_info_wrapper">
                    <p class="login_info">Аренда - это просто.</p>
                </div>
            </div>
        </section>
    </main>
    </div>
    @include('includes_file.footer')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/script.js">
    </script>
@endsection