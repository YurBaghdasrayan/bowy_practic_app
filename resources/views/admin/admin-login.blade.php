@extends('layouts.app')
@section('title')
    <title>Главная</title>
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}
@endsection

{{--{{session()->get('login_error')}}--}}
@section('content')
    @include('includes_file.header')
    <main>
        <section class="login">
            <div class="login_wrapper">
                <div class="login_form_social_links_wrapper">

                    <form action="{{route('admin.auth')}}" class="login_form_wrapper" method="post">
                        @csrf
                        @if(session()->has('messages'))
                            <div class="alert alert-danger">
                                {{ session()->get('messages') }}
                            </div>
                        @endif
                        {{--                        @if(session()->has('success'))--}}
                        {{--                            <div class="succses1">--}}
                        {{--                                <img class="succsesimg" src="{{asset('images/emoji.png')}}"/>--}}
                        {{--                                <p>Вы успешно прошли регистрацию</p>--}}
                        {{--                            </div>--}}
                        {{--                        @endif--}}
                        <h1 class="login_form_title">Войдите или зарегистрируйтесь</h1>
                        <div class="login_form_inputs_wrapper">
                            <div class="login_form_input">
                                <input type="email" class="login_form_input_field" placeholder="Email" name="email">
                                @if($errors->has('email'))
                                    <div class="alert alert-danger">{{$errors->first('email') }}</div>
                                @endif
                            </div>

                            <div class="login_form_input">
                                <div style="position:relative;" class="password_group">
                                    <img class="password_visibility show_icon active_show_icon"
                                         src="{{asset('images/icons/view.png')}}" alt="">
                                    <img class="password_visibility hide_icon" src="{{asset('images/icons/hide.png')}}"
                                         alt="">
                                    <input id="passwordInp" type="password" class="login_form_input_field"
                                           placeholder="Пароль" name="password">
                                </div>
                                                                @if($errors->has('password'))
                                                                    <div class="alert alert-danger" >{{ $errors->first('password') }}</div>
                                                                @endif
                                {{--                                @if(session()->has('login_error'))--}}
                                {{--                                    <div class="alert alert-danger">--}}
                                {{--                                        {{ session()->get('login_error') }}--}}
                                {{--                                    </div>--}}
                                {{--                                @endif--}}

                            </div>
                            <div class="chekdiv">
                                <label for="rememberme" class="rememberme">
                                    <input type="checkbox" id="rememberme" name="rememberme" class="chek">
                                    <p class="">Запомните меня</p>
                                </label>
                            </div>
                            <div class="forgot-password">
                                <a href="{{route('forgot-password')}}">Забыли пароль</a>
                            </div>
                            <button type="submit" value="save" class="login_form_btn">Войти</button>
                        </div>
                    </form>
                    <div class="login_social_links_title_wrapper">
                        <p class="login_social_links_title">Войти через социальные сети</p>
                        <div class="login_social_links_wrapper">
                            <a href="" class="footer_social_link">
                                <a href="{{route('auth.vk')}}" class="footer_social_link">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="48px" height="48px"><path fill="#1976d2" d="M42,37c0,2.762-2.238,5-5,5H11c-2.761,0-5-2.238-5-5V11c0-2.762,2.239-5,5-5h26c2.762,0,5,2.238,5,5 V37z"/><path fill="#fff" d="M35.937,18.041c0.046-0.151,0.068-0.291,0.062-0.416C35.984,17.263,35.735,17,35.149,17h-2.618 c-0.661,0-0.966,0.4-1.144,0.801c0,0-1.632,3.359-3.513,5.574c-0.61,0.641-0.92,0.625-1.25,0.625C26.447,24,26,23.786,26,23.199 v-5.185C26,17.32,25.827,17,25.268,17h-4.649C20.212,17,20,17.32,20,17.641c0,0.667,0.898,0.827,1,2.696v3.623 C21,24.84,20.847,25,20.517,25c-0.89,0-2.642-3-3.815-6.932C16.448,17.294,16.194,17,15.533,17h-2.643 C12.127,17,12,17.374,12,17.774c0,0.721,0.6,4.619,3.875,9.101C18.25,30.125,21.379,32,24.149,32c1.678,0,1.85-0.427,1.85-1.094 v-2.972C26,27.133,26.183,27,26.717,27c0.381,0,1.158,0.25,2.658,2c1.73,2.018,2.044,3,3.036,3h2.618 c0.608,0,0.957-0.255,0.971-0.75c0.003-0.126-0.015-0.267-0.056-0.424c-0.194-0.576-1.084-1.984-2.194-3.326 c-0.615-0.743-1.222-1.479-1.501-1.879C32.062,25.36,31.991,25.176,32,25c0.009-0.185,0.105-0.361,0.249-0.607 C32.223,24.393,35.607,19.642,35.937,18.041z"/></svg>
                                </a>
                                <a href="" class="footer_social_link">
                                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="48px" height="48px"><path fill="#FF9800" d="M42,37c0,2.8-2.2,5-5,5H11c-2.8,0-5-2.2-5-5V11c0-2.8,2.2-5,5-5h26c2.8,0,5,2.2,5,5V37z"/><path fill="#FFF" d="M26.9,30.4c1.5-0.3,2.9-0.9,4.1-1.7c1-0.6,1.3-1.9,0.7-2.9c-0.6-1-1.9-1.3-2.9-0.7c-2.9,1.8-6.7,1.8-9.6,0c-1-0.6-2.3-0.3-2.9,0.7c-0.6,1-0.3,2.3,0.7,2.9c1.3,0.8,2.7,1.4,4.1,1.7l-4,4c-0.8,0.8-0.8,2.1,0,3c0.4,0.4,0.9,0.6,1.5,0.6c0.5,0,1.1-0.2,1.5-0.6l3.9-3.9l3.9,3.9c0.8,0.8,2.1,0.8,3,0c0.8-0.8,0.8-2.1,0-3C30.9,34.4,26.9,30.4,26.9,30.4z M24,10c-3.9,0-7,3.1-7,7c0,3.9,3.1,7,7,7c3.9,0,7-3.1,7-7C31,13.1,27.9,10,24,10z M24,20c-1.7,0-3-1.3-3-3c0-1.7,1.3-3,3-3c1.7,0,3,1.3,3,3C27,18.7,25.7,20,24,20z"/></svg>
                                </a>
                                <a href="{{route('auth.google')}}" class="footer_social_link">
                                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="48px" height="48px"><path fill="#fbc02d" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12	s5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24s8.955,20,20,20	s20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"/><path fill="#e53935" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039	l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"/><path fill="#4caf50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36	c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"/><path fill="#1565c0" d="M43.611,20.083L43.595,20L42,20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571	c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"/></svg>
                                </a>
                        </div>
                    </div>
                    <div class="login_registration_link_wrapper">
                        <p class="login_registration_link_title">Еще нет аккаунта?</p>
                        <a href="{{route('registration')}}" class="login_registration_link">Зарегистрироваться</a>
                    </div>
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
    <script src="{{ asset('js/script.js') }}">
    </script>
@endsection
