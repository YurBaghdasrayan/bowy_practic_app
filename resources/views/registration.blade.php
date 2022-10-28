@extends('layouts.app')
@section('title')
    <title>Главная</title>
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}
@endsection
@section('content')
    <div class="bowy_mian_wrapper">
        @include('includes_file.header')
        <main>
            <section class="registration">
                <div class="registration_wrapper">
                    <div class="registration_form_links_wrapper">
                        <h1 class="registration_form_title">Регистрация</h1>
                        <form action="{{route('create_user')}}" class="registration_form_wrapper" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="registration_form_inputs_wrapper">

                                <!--<div class="registration_form_input">-->
                                <!--    <input type="text" class="registration_form_input_field" name="Имя" placeholder="Имя">-->
                                <!--</div>-->
                                <!--  <div class="registration_form_input">-->
                                <!--      <input type="text" class="registration_form_input_field" name="Фамилия" placeholder="Фамилия">-->
                                <!--  </div>-->
                                <div class="registration_form_input">
                                    <input type="email" id="demo" value="{{old('email')}}"
                                           class="registration_form_input_field" placeholder="Email" name="email" >
                                    @if($errors->has('email'))
                                        <div class="alert alert-danger" >{{ $errors->first('email') }}</div>
                                    @endif
                                </div>

                                <div class="registration_form_input">
                                    <div style="position:relative;" class="password_group">
                                        <img class="password_visibility show_icon active_show_icon" src="{{asset('images/icons/view.png')}}" alt="">
                                        <img class="password_visibility hide_icon" src="{{asset('images/icons/hide.png')}}" alt="">
                                        <input type="password" id="passwordInp" value="{{old('password')}}" class="registration_form_input_field" placeholder="Пароль" name="password" >
                                    </div>
                                    @if($errors->has('password'))
                                        <div class="alert alert-danger" role="alert">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>
                                <div class="registration_form_input">
                                    <input type="password" value="{{old('password_confirmation')}}" class="registration_form_input_field" placeholder="Повторить пароль" name="password_confirmation">
                                    @if($errors->has('password_confirmation'))
                                        <div class="alert alert-danger" role="alert"> {{ $errors->first('password_confirmation') }}</div>
                                    @endif
                                </div>
                                <button class="registration_form_btn desktop_form_btn">Регистрация</button>
                            </div>
                            <div class="registration_input_type_files_wrapper">
                                <p class="registration_input-type_files_title">Фото профиля</p>
                                <div class="registration_input_type_files_label_img_wrapper">
                                    <label for="fileinput_form2" class="registration_input_type_file file_label">
                                        <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.36" d="M0.52 21V15.4H15.56V0.119998H21.56V15.4H36.84V21H21.56V36.44H15.56V21H0.52Z" fill="black"/>
                                        </svg>
                                        <span class="file_span"></span>
                                        <input type="file" id="fileinput_form2" hidden name="image">

                                    </label>
                                    <div class="registration_input-type_file_img_wrapper" style="display:none">
                                        <img src="" alt="" id="registration_input-type_file_img">
                                        <div  class="registration_input-type_file_img_delete_btn">
                                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.20898 2.5H10.9173V3.5H9.83398V10C9.83398 10.1326 9.77692 10.2598 9.67533 10.3536C9.57375 10.4473 9.43598 10.5 9.29232 10.5H1.70898C1.56533 10.5 1.42755 10.4473 1.32597 10.3536C1.22439 10.2598 1.16732 10.1326 1.16732 10V3.5H0.0839844V2.5H2.79232V1C2.79232 0.867392 2.84939 0.740215 2.95097 0.646447C3.05255 0.552678 3.19033 0.5 3.33398 0.5H7.66732C7.81098 0.5 7.94875 0.552678 8.05033 0.646447C8.15192 0.740215 8.20898 0.867392 8.20898 1V2.5ZM8.75065 3.5H2.25065V9.5H8.75065V3.5ZM3.87565 5H4.95898V8H3.87565V5ZM6.04232 5H7.12565V8H6.04232V5ZM3.87565 1.5V2.5H7.12565V1.5H3.87565Z" fill="white"/></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button id="button" class="registration_form_btn mobile_form_btn second">Регистрация</button>
                        </form>
                    </div>
                    <div class="login_info_wrapper">
                        <p class="login_info">Аренда - это просто.</p>
                    </div>
                </div>
            </section>
        </main>
        @include('includes_file.footer')
    </div>
@endsection

