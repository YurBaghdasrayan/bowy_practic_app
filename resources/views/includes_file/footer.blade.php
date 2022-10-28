<footer class="footer">
    <div class="footer_wrapper">
        <div class="footer_items_wrapper">
            <div class="footer_item">
                <div class="footer_logo_link_wrapper">
                    <a href="" class="footer_logo_link">
                        <img src="{{asset('images/new_logo.svg')}}" alt="">
                    </a>
                </div>
                <div class="footer_registration_log_in_btn_link_wrapper">
                    @if(auth()->check())
                        <a href="{{route('login')}}"
                           class="footer_registration_log_in_btn {{ Request::path() == 'login' ? 'active' : '' }}"></a>
                    @else
                        <a href="{{route('login')}}"
                           class="footer_registration_log_in_btn {{ Request::path() == 'login' ? 'active' : '' }}">Вход
                            и
                            регистрация</a>
                    @endif
                    <a href="{{route('profile-place-anad')}}" class="footer_link">Разместить объявление</a>
                </div>
            </div>
            <nav class="footer_nav_wrapper first_nav">

                <ul class="footer_ul_list">

                    <li class="footer_ul_li">
                        <a href="{{route('search.results',1)}}" class="footer_ul_link">Автомобили</a>
                    </li>
                    <li class="footer_ul_li">
                        <a href="{{route('search.results',4)}}" class="footer_ul_link">Водный транспорт</a>
                    </li>
                    <li class="footer_ul_li">
                        <a href="{{route('search.results',6)}}" class="footer_ul_link">Велосипеды</a>
                    </li>
                    <li class="footer_ul_li">
                        <a href="{{route('search.results',6)}}" class="footer_ul_link">Малогабаритный <br> транспорт</a>
                    </li>
                    <!-- <li class="footer_ul_li">
                       <a href="" class="footer_ul_link">Мотоциклы</a>
                   </li>
                   <li class="footer_ul_li">
                       <a href="" class="footer_ul_link">Специальный <br>
                          и грузовой транспорт</a>
                   </li>
                   <li class="footer_ul_li">
                       <a href="" class="footer_ul_link">Прицепы</a>
                   </li>  -->

                </ul>

            </nav>


            <nav class="footer_nav_wrapper second_nav">
                <ul class="footer_ul_list2">

                    <li class="footer_ul_li">
                        <a href="{{route('search.results',2)}}" class="footer_ul_link">Мотоциклы</a>
                    </li>
                    <li class="footer_ul_li">
                        <a href="{{route('search.results',3)}}" class="footer_ul_link">Специальный <br>
                            и грузовой транспорт</a>
                    </li>
                    <li class="footer_ul_li">
                        <a href="{{route('search.results',5)}}" class="footer_ul_link">Прицепы</a>
                    </li>
                    <li class="footer_ul_li">
                        <a href="{{route('search.results',7)}}" class="footer_ul_link">Другой транспорт</a>
                    </li>
                </ul>
            </nav>


            <div class="footer_social_links_wrapper">
                <a href="https://vk.com/bowy_ru" class="footer_social_link">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="30px" height="30px">
                        <path fill="#1976d2"
                              d="M42,37c0,2.762-2.238,5-5,5H11c-2.761,0-5-2.238-5-5V11c0-2.762,2.239-5,5-5h26c2.762,0,5,2.238,5,5 V37z"/>
                        <path fill="#fff"
                              d="M35.937,18.041c0.046-0.151,0.068-0.291,0.062-0.416C35.984,17.263,35.735,17,35.149,17h-2.618 c-0.661,0-0.966,0.4-1.144,0.801c0,0-1.632,3.359-3.513,5.574c-0.61,0.641-0.92,0.625-1.25,0.625C26.447,24,26,23.786,26,23.199 v-5.185C26,17.32,25.827,17,25.268,17h-4.649C20.212,17,20,17.32,20,17.641c0,0.667,0.898,0.827,1,2.696v3.623 C21,24.84,20.847,25,20.517,25c-0.89,0-2.642-3-3.815-6.932C16.448,17.294,16.194,17,15.533,17h-2.643 C12.127,17,12,17.374,12,17.774c0,0.721,0.6,4.619,3.875,9.101C18.25,30.125,21.379,32,24.149,32c1.678,0,1.85-0.427,1.85-1.094 v-2.972C26,27.133,26.183,27,26.717,27c0.381,0,1.158,0.25,2.658,2c1.73,2.018,2.044,3,3.036,3h2.618 c0.608,0,0.957-0.255,0.971-0.75c0.003-0.126-0.015-0.267-0.056-0.424c-0.194-0.576-1.084-1.984-2.194-3.326 c-0.615-0.743-1.222-1.479-1.501-1.879C32.062,25.36,31.991,25.176,32,25c0.009-0.185,0.105-0.361,0.249-0.607 C32.223,24.393,35.607,19.642,35.937,18.041z"/>
                    </svg>
                </a>
                <a href="https://ok.ru/group/54385351983275" class="footer_social_link">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="30px" height="30px">
                        <path fill="#FF9800"
                              d="M42,37c0,2.8-2.2,5-5,5H11c-2.8,0-5-2.2-5-5V11c0-2.8,2.2-5,5-5h26c2.8,0,5,2.2,5,5V37z"/>
                        <path fill="#FFF"
                              d="M26.9,30.4c1.5-0.3,2.9-0.9,4.1-1.7c1-0.6,1.3-1.9,0.7-2.9c-0.6-1-1.9-1.3-2.9-0.7c-2.9,1.8-6.7,1.8-9.6,0c-1-0.6-2.3-0.3-2.9,0.7c-0.6,1-0.3,2.3,0.7,2.9c1.3,0.8,2.7,1.4,4.1,1.7l-4,4c-0.8,0.8-0.8,2.1,0,3c0.4,0.4,0.9,0.6,1.5,0.6c0.5,0,1.1-0.2,1.5-0.6l3.9-3.9l3.9,3.9c0.8,0.8,2.1,0.8,3,0c0.8-0.8,0.8-2.1,0-3C30.9,34.4,26.9,30.4,26.9,30.4z M24,10c-3.9,0-7,3.1-7,7c0,3.9,3.1,7,7,7c3.9,0,7-3.1,7-7C31,13.1,27.9,10,24,10z M24,20c-1.7,0-3-1.3-3-3c0-1.7,1.3-3,3-3c1.7,0,3,1.3,3,3C27,18.7,25.7,20,24,20z"/>
                    </svg>
                </a>
                </a>
                <a href="https://t.me/bowy_ru" class="footer_social_link">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="30px" height="30px">
                        <path fill="#29b6f6" d="M24 4A20 20 0 1 0 24 44A20 20 0 1 0 24 4Z"/>
                        <path fill="#fff"
                              d="M33.95,15l-3.746,19.126c0,0-0.161,0.874-1.245,0.874c-0.576,0-0.873-0.274-0.873-0.274l-8.114-6.733 l-3.97-2.001l-5.095-1.355c0,0-0.907-0.262-0.907-1.012c0-0.625,0.933-0.923,0.933-0.923l21.316-8.468 c-0.001-0.001,0.651-0.235,1.126-0.234C33.667,14,34,14.125,34,14.5C34,14.75,33.95,15,33.95,15z"/>
                        <path fill="#b0bec5"
                              d="M23,30.505l-3.426,3.374c0,0-0.149,0.115-0.348,0.12c-0.069,0.002-0.143-0.009-0.219-0.043 l0.964-5.965L23,30.505z"/>
                        <path fill="#cfd8dc"
                              d="M29.897,18.196c-0.169-0.22-0.481-0.26-0.701-0.093L16,26c0,0,2.106,5.892,2.427,6.912 c0.322,1.021,0.58,1.045,0.58,1.045l0.964-5.965l9.832-9.096C30.023,18.729,30.064,18.416,29.897,18.196z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</footer>
