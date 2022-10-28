@extends('layouts.app')
@section('title')
    <title>Главная</title>
@endsection

@section('content')
    @include('includes_file.header')
    <main>
        <section class="login">
            <div class="login_wrapper">
                <div class="login_form_social_links_wrapper">
                    <form action="{{route('code.sending')}}" class="login_form_wrapper" method="post">
                        @csrf
                        <h1 class="login_form_title">Забыли пароль?</h1>
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
                                <input type="email" class="login_form_input_field" placeholder="Email" name="email" >
                            </div>
                            <button type="submit" value="save" class="login_form_btn">Восстановить</button>
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
