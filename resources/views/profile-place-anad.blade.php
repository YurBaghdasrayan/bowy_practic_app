@extends('layouts.app')

@section('content')
    <div class="bowy_mian_wrapper" id="active_inactive_ads_page">
    @include('includes_file.header')
        <main>

{{--            @dd($json)--}}
            <section class="place_an_ad">
                <div class="place_an_ad_wrapper">
                    <div class="place_an_ad_items_wrapper">
                        @include('includes_file.user')
                        <form action="{{route('profile-place-anad')}}" class="place_an_ad_form top" method="post">
                            @csrf
                            <div class="alert_none alert-danger-headline alert-danger-price alert-danger-category_id alert-danger-region
                             alert-danger-car_model alert-danger-description alert-danger-city alert-danger-transmission
                             alert-danger-rudder alert-danger-year_of_issue  alert-danger-address alert-danger-body_type alert-danger-files0 "></div>
{{--                            <div class="alert_none alert-danger-price"></div>--}}
{{--                            <div class="alert_none alert-danger-category_id"></div>--}}
{{--                            <div class="alert_none alert-danger-region"></div>--}}
{{--                            <div class="alert_none alert-danger-car_model"></div>--}}
{{--                            <div class="alert_none alert-danger-description"></div>--}}
{{--                            <div class="alert_none alert-danger-body_type"></div>--}}
{{--                            <div class="alert_none alert-danger-rudder"></div>--}}
{{--                            <div class="alert_none alert-danger-year_of_issue"></div>--}}
{{--                            <div class="alert_none alert-danger-transmission"></div>--}}
{{--                            <div class="alert_none alert-danger-address"></div>--}}

                            <div class="place_an_ad_form_inputs_wrapper">
                                <div class="place_an_ad_form_inputs_first_wrapper">
                                    <div class="place_an_ad_form_input_field_wrapper">
                                        <input type="text" placeholder="Заголовок объявления" class="place_an_ad_form_input_field" name="headline" value="">
                                    </div>
                                    <div class="place_an_ad_form_input_field_wrapper price_input_field">
                                        <input type="text" placeholder="Стоимость" name="price" class="place_an_ad_form_input_field">

                                    </div>
                                </div>
                                <div class="place_an_ad_form_inputs_first_wrapper">
                                    <div class="find_transport_form_select_wrapper">
                                        <div class="find_transport_form_select_title_wrappers">
                                            <input type="hidden" class="hidden_category_data" name="category_id" value="">
                                            <p class="find_transport_form_select_title">Выберите категорию</p>
                                        </div>

                                        <div class="find_transport_form_select_hidden_wrapper">
                                            @foreach($categories as $category)
                                               <p class="find_transport_form_select_hidden_info add_category_data" data-id="{{$category->id}}" data-info="{{$category->name}}">{{$category->name}}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="place_an_ad_form_inputs_first_wrapper">
{{--                                    <div class="place_an_ad_form_input_field_wrapper">--}}
{{--                                        <input type="text" placeholder="Город" name="city" class="place_an_ad_form_input_field">--}}
{{--                                        <div class="alert_none alert-danger-city" ></div>--}}
{{--                                    </div>--}}
                                    <div class="place_an_ad_form_inputs_first_wrapper">
                                        <div class="find_transport_form_select_wrapper">
                                            <div class="find_transport_form_select_title_wrappers">
                                                <input type="hidden" class="hidden_category_data" id="region_input" name="region" value="">
                                                <p class="find_transport_form_select_title">Выберите область</p>
                                            </div>
                                            <div class="find_transport_form_select_hidden_wrapper">
                                                @foreach($regions as $val)
                                                    <p class="find_transport_form_select_hidden_info set_city_data" data-id="{{$val->id}}" data-info="{{$val->name}}">{{$val->name}}</p>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="place_an_ad_form_inputs_first_wrapper">
                                        <div class="place_an_ad_form_input_field_wrapper">
                                            <input type="text" placeholder="Адрес" class="place_an_ad_form_input_field" name="address">
                                        </div>
                                    </div>
                                </div>

                                <div class="place_an_ad_form_inputs_first_wrapper">
                                    <div class="find_transport_form_select_wrapper">
                                        <div class="find_transport_form_select_title_wrappers">
                                            <input type="hidden" class="hidden_category_data" name="city" value="">
                                            <p class="find_transport_form_select_title">Выберите город</p>
                                        </div>
                                        <div class="find_transport_form_select_hidden_wrapper" id="divCity">
                                            <p class="find_transport_form_select_hidden_info" >Выберите область</p>
                                            {{--                                                @foreach($cities as $val)--}}
                                            {{--                                                    <p class="find_transport_form_select_hidden_info" data-id="{{$val->id}}" data-info="{{$val->name}}">{{$val->name}}</p>--}}
                                            {{--                                                @endforeach--}}
                                        </div>
                                        {{--                                            <div class="alert_none" id="regionError">Город должен совподать соответствующему региону</div>--}}
                                    </div>
                                </div>

{{--                                <div class="place_an_ad_form_input_field_wrapper field_box">--}}
{{--                                    <input type="text" placeholder="Марка автомобиля" class="place_an_ad_form_input_field" name="car_model">--}}
{{--                                    <div class="alert_none alert-danger-car_model" ></div>--}}
{{--                                </div>--}}
                                <div class="place_an_ad_form_inputs_first_wrapper">
                                    <div class="find_transport_form_select_wrapper">
                                        <div class="find_transport_form_select_title_wrappers">
                                            <input type="hidden" class="hidden_category_data" name="car_model" value="">
                                            <p class="find_transport_form_select_title" >Марка автомобиля</p>
                                        </div>
                                        <div class="find_transport_form_select_hidden_wrapper">
                                            @foreach($cars_models as $cars_model)
                                                <p class="find_transport_form_select_hidden_info add_cars_models_data" data-id="{{$cars_model->id}}" data-info="{{$cars_model->name}}">{{$cars_model->name}}</p>
                                            @endforeach
                                        </div>
{{--                                        <div class="alert_none" id="regionError">Город должен совподать соответствующему региону</div>--}}
                                    </div>
                                </div>
                                <div class="place_an_ad_form_input_field_wrapper field_box">
                                    <input type="text" placeholder="Описание объявления" name="description" class="place_an_ad_form_input_field">
                                </div>
                            </div>
                            <div class="place_an_ad_form_inputs_wrapper">
                                <p class="place_an_ad_form_inputs_title">Характеристики</p>
                                <div class="place_an_ad_form_inputs_first_wrapper">
{{--                                    <div class="place_an_ad_form_input_field_wrapper">--}}
{{--                                        <input type="text" placeholder="Тип кузова" class="place_an_ad_form_input_field" name="body_type">--}}
{{--                                        <div class="alert_none alert-danger-body_type" ></div>--}}
{{--                                    </div>--}}
                                    <div class="place_an_ad_form_inputs_first_wrapper" style="width: 350px">
                                        <div class="find_transport_form_select_wrapper">
                                            <div class="find_transport_form_select_title_wrappers">
                                                <input type="hidden" class="hidden_category_data" name="rudder" value="">
                                                <p class="find_transport_form_select_title " ><span>Руль</span></p>
                                            </div>
                                            <div class="find_transport_form_select_hidden_wrapper">
                                                <p class="find_transport_form_select_hidden_info add_rudder_data" data-id="Левый" data-info="Левый">левый</p>
                                                <p class="find_transport_form_select_hidden_info add_rudder_data" data-id="Правый" data-info="Правый">правый</p>
                                            </div>
                                            {{--                                        <div class="alert_none" id="regionError">Город должен совподать соответствующему региону</div>--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="place_an_ad_form_inputs_first_wrapper">
                                    <div class="find_transport_form_select_wrapper">
                                        <div class="find_transport_form_select_title_wrappers">
                                            <input type="hidden" class="hidden_category_data" name="transmission" value="">
                                            <p class="find_transport_form_select_title">Коробка передач</p>
                                        </div>
                                        <div class="find_transport_form_select_hidden_wrapper">
                                            <p class="find_transport_form_select_hidden_info add_transmission_data" data-id="Автоматическая" data-info="Автоматическая">Автоматическая</p>
                                            <p class="find_transport_form_select_hidden_info add_transmission_data" data-id="Механическая" data-info="Механическая">Механическая</p>
                                        </div>
                                        {{--                                        <div class="alert_none" id="regionError">Город должен совподать соответствующему региону</div>--}}
                                    </div>
                                </div>
                                <div class="find_transport_form_select_wrapper">
                                    <div class="find_transport_form_select_title_wrappers">
                                        <input type="hidden" class="hidden_category_data" name="year_of_issue" value="">
                                        <p class="find_transport_form_select_title">Год выпуска</p>
                                    </div>
                                    <div class="find_transport_form_select_hidden_wrapper">
                                        @for($i = 1930; $i <= \Carbon\Carbon::now()->year; $i++)
                                            <p class="find_transport_form_select_hidden_info add_transmission_data" data-id="{{$i}}" data-info="{{$i}}">{{$i}}</p>
                                        @endfor
                                    </div>
                                </div>

                                <div class="find_transport_form_select_wrapper">
                                    <div class="find_transport_form_select_title_wrappers">
                                        <input type="hidden" class="hidden_category_data" name="body_type" value="">
                                        <p class="find_transport_form_select_title">Тип кузова</p>
                                    </div>
                                    <div class="find_transport_form_select_hidden_wrapper">
                                        <p class="find_transport_form_select_hidden_info add_body_type" data-info="Седан">Седан</p>
                                        <p class="find_transport_form_select_hidden_info add_body_type" data-info="Универсал">Универсал</p>
                                        <p class="find_transport_form_select_hidden_info add_body_type" data-info="Хэтчбэк">Хэтчбэк</p>
                                        <p class="find_transport_form_select_hidden_info add_body_type" data-info="Купе">Купе</p>
                                        <p class="find_transport_form_select_hidden_info add_body_type" data-info="Лимузин">Лимузин</p>
                                        <p class="find_transport_form_select_hidden_info add_body_type" data-info="Микроавтобус">Микроавтобус</p>
                                        <p class="find_transport_form_select_hidden_info add_body_type" data-info="Минивэн">Минивэн</p>
                                        <p class="find_transport_form_select_hidden_info add_body_type" data-info="Хардтоп">Хардтоп</p>
                                        <p class="find_transport_form_select_hidden_info add_body_type" data-info="Таун-кар">Таун-кар</p>
                                        <p class="find_transport_form_select_hidden_info add_body_type" data-info="Лифтбэк">Лифтбэк</p>
                                        <p class="find_transport_form_select_hidden_info add_body_type" data-info="Фастбэк">Фастбэк</p>
                                        <p class="find_transport_form_select_hidden_info add_body_type" data-info="Кабриолет">Кабриолет</p>
                                        <p class="find_transport_form_select_hidden_info add_body_type" data-info="Родстер">Родстер</p>
                                        <p class="find_transport_form_select_hidden_info add_body_type" data-info="Ландо">Ландо</p>
                                        <p class="find_transport_form_select_hidden_info add_body_type" data-info="Брогам">Брогам</p>
                                        <p class="find_transport_form_select_hidden_info add_body_type" data-info="Тарга">Тарга</p>
                                        <p class="find_transport_form_select_hidden_info add_body_type" data-info="Спайдер">Спайдер</p>
                                        <p class="find_transport_form_select_hidden_info add_body_type" data-info="Шутингбрейк">Шутингбрейк</p>
                                        <p class="find_transport_form_select_hidden_info add_body_type" data-info="Пикап">Пикап</p>
                                        <p class="find_transport_form_select_hidden_info add_body_type" data-info="Фургон">Фургон</p>
                                    </div>
                                </div>
                                <div class="registration_input_type_files_label_img_wrapper place_an_ad_form_input_type_file_img_wrapper ">
                                    <label for="fileinput_form2" class="registration_input_type_file file_label place_an_ad_form_input_label">
                                        <svg width="37" height="37" viewBox="0 0 37 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.36" d="M0.52 21V15.4H15.56V0.119998H21.56V15.4H36.84V21H21.56V36.44H15.56V21H0.52Z" fill="black"/>
                                        </svg>
                                        <span class="file_span"></span>
                                        <input type="file" id="fileinput_form2" name="image[]" multiple hidden>
                                    </label>
                                    <div class="registration_input-type_file_img_wrapper" style="display:none">
                                        <img src="" alt="" id="registration_input-type_file_img">
                                        <div  class="registration_input-type_file_img_delete_btn">
                                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.20898 2.5H10.9173V3.5H9.83398V10C9.83398 10.1326 9.77692 10.2598 9.67533 10.3536C9.57375 10.4473 9.43598 10.5 9.29232 10.5H1.70898C1.56533 10.5 1.42755 10.4473 1.32597 10.3536C1.22439 10.2598 1.16732 10.1326 1.16732 10V3.5H0.0839844V2.5H2.79232V1C2.79232 0.867392 2.84939 0.740215 2.95097 0.646447C3.05255 0.552678 3.19033 0.5 3.33398 0.5H7.66732C7.81098 0.5 7.94875 0.552678 8.05033 0.646447C8.15192 0.740215 8.20898 0.867392 8.20898 1V2.5ZM8.75065 3.5H2.25065V9.5H8.75065V3.5ZM3.87565 5H4.95898V8H3.87565V5ZM6.04232 5H7.12565V8H6.04232V5ZM3.87565 1.5V2.5H7.12565V1.5H3.87565Z" fill="white"/></svg>
                                        </div>
                                    </div>
                                </div>
                                <button class="place_an_ad_form_btn" type="submit">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </main>

    @include('includes_file.footer')
@endsection

