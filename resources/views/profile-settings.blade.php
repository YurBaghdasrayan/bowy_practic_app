@extends('layouts.app')
@section('title')
    <title>Главная</title>
@endsection
@section('content')
    <div class="bowy_mian_wrapper" id="profile_settings_page">
        @include('includes_file.header')
        <main>
            <section class="profile_settings">
                <div class="profile_settings_wrapper">
                    <div class="profile_settings_items_wrapper">
                        @include('includes_file.user')
                        <form action="{{route('profile-settings')}}" class="profile_settings_form" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            @if (session('status'))
                                <div class="alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @if (session('emailerror'))
                                <div class="alert alert-danger">
                                    {{ session('emailerror') }}
                                </div>
                            @endif
                            <div class="profile_settings_form_textarea">
                                <input type="text" class="profile_settings_form_input_field"  onfocus="this.value=''" placeholder="Имя" name="name" value="{{auth()->user()->name}}">
                                <div class="profile_settings_form_textarea_icon">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.796 5.2645L8.7355 4.204L1.75 11.1895V12.25H2.8105L9.796 5.2645ZM10.8565 4.204L11.917 3.1435L10.8565 2.083L9.796 3.1435L10.8565 4.204ZM3.4315 13.75H0.25V10.5678L10.3263 0.491502C10.4669 0.350898 10.6576 0.271912 10.8565 0.271912C11.0554 0.271912 11.2461 0.350898 11.3868 0.491502L13.5085 2.61325C13.6491 2.7539 13.7281 2.94463 13.7281 3.1435C13.7281 3.34237 13.6491 3.53311 13.5085 3.67375L3.43225 13.75H3.4315Z" fill="black"/>
                                    </svg>
                                </div>
                            </div>
                            @if($errors->has('name'))
                                <div class="alert alert-danger" >{{ $errors->first('name') }}</div>
                            @endif
                            <div class="profile_settings_form_textarea">
                                <input type="text" class="profile_settings_form_input_field" onfocus="this.value=''" placeholder="Фамилия"   name="surname" value="{{auth()->user()->surname}}">
                                <div class="profile_settings_form_textarea_icon">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.796 5.2645L8.7355 4.204L1.75 11.1895V12.25H2.8105L9.796 5.2645ZM10.8565 4.204L11.917 3.1435L10.8565 2.083L9.796 3.1435L10.8565 4.204ZM3.4315 13.75H0.25V10.5678L10.3263 0.491502C10.4669 0.350898 10.6576 0.271912 10.8565 0.271912C11.0554 0.271912 11.2461 0.350898 11.3868 0.491502L13.5085 2.61325C13.6491 2.7539 13.7281 2.94463 13.7281 3.1435C13.7281 3.34237 13.6491 3.53311 13.5085 3.67375L3.43225 13.75H3.4315Z" fill="black"/>
                                    </svg>
                                </div>
                            </div>
                            @if($errors->has('surname'))
                                <div class="alert alert-danger" >{{ $errors->first('surname') }}</div>
                            @endif
                            <div class="profile_settings_form_textarea">
                                <input type="text" class="profile_settings_form_input_field" onfocus="this.value=''" placeholder="Электронная почта" value="{{auth()->user()->email}}" name="email" >
                                <div class="profile_settings_form_textarea_icon">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.796 5.2645L8.7355 4.204L1.75 11.1895V12.25H2.8105L9.796 5.2645ZM10.8565 4.204L11.917 3.1435L10.8565 2.083L9.796 3.1435L10.8565 4.204ZM3.4315 13.75H0.25V10.5678L10.3263 0.491502C10.4669 0.350898 10.6576 0.271912 10.8565 0.271912C11.0554 0.271912 11.2461 0.350898 11.3868 0.491502L13.5085 2.61325C13.6491 2.7539 13.7281 2.94463 13.7281 3.1435C13.7281 3.34237 13.6491 3.53311 13.5085 3.67375L3.43225 13.75H3.4315Z" fill="black"/>
                                    </svg>
                                </div>
                            </div>
                            @if($errors->has('email'))
                                <div class="alert alert-danger" >{{ $errors->first('email') }}</div>
                            @endif
                            <div class="profile_settings_form_textarea">
                                <input type="text" class="profile_settings_form_input_field" onfocus="this.value=''" placeholder="Номер телефона" name="number" value="{{auth()->user()->number}}">
                                <div class="profile_settings_form_textarea_icon">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.796 5.2645L8.7355 4.204L1.75 11.1895V12.25H2.8105L9.796 5.2645ZM10.8565 4.204L11.917 3.1435L10.8565 2.083L9.796 3.1435L10.8565 4.204ZM3.4315 13.75H0.25V10.5678L10.3263 0.491502C10.4669 0.350898 10.6576 0.271912 10.8565 0.271912C11.0554 0.271912 11.2461 0.350898 11.3868 0.491502L13.5085 2.61325C13.6491 2.7539 13.7281 2.94463 13.7281 3.1435C13.7281 3.34237 13.6491 3.53311 13.5085 3.67375L3.43225 13.75H3.4315Z" fill="black"/>
                                    </svg>
                                </div>
                            </div>
                            @if($errors->has('number'))
                                <div class="alert alert-danger" >{{ $errors->first('number') }}</div>
                            @endif
                            <div class="profile_settings_form_textarea">
                                <input type="text" class="profile_settings_form_input_field" onfocus="this.value=''" placeholder="Город" name="city" value="{{auth()->user()->city}}">
                                <div class="profile_settings_form_textarea_icon">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.796 5.2645L8.7355 4.204L1.75 11.1895V12.25H2.8105L9.796 5.2645ZM10.8565 4.204L11.917 3.1435L10.8565 2.083L9.796 3.1435L10.8565 4.204ZM3.4315 13.75H0.25V10.5678L10.3263 0.491502C10.4669 0.350898 10.6576 0.271912 10.8565 0.271912C11.0554 0.271912 11.2461 0.350898 11.3868 0.491502L13.5085 2.61325C13.6491 2.7539 13.7281 2.94463 13.7281 3.1435C13.7281 3.34237 13.6491 3.53311 13.5085 3.67375L3.43225 13.75H3.4315Z" fill="black"/>
                                    </svg>
                                </div>
                            </div>
                            @if($errors->has('city'))
                                <div class="alert alert-danger">{{ $errors->first('city') }}</div>
                            @endif
                            <div class="registration_input_type_files_label_img_wrapper place_an_ad_form_input_type_file_img_wrapper ">
                                <label for="fileinput_form2" class="registration_input_type_file file_label place_an_ad_form_input_label">
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
                            <button type="submit" class="profile_settings_form_btn" value="save">Сохранить</button>
                        </form>
                    </div>
                </div>
            </section>
        </main>
@include('includes_file.footer')
    </div>
@endsection
