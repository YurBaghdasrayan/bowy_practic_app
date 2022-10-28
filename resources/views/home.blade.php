@extends('layouts.app')
@section('title')
    <title>Главная</title>
@endsection
@section('map-data')
    <script src="https://api-maps.yandex.ru/2.1/?apikey=fef7e3c9-583a-4e95-a050-8cee33b80427&lang=ru_RU" type="text/javascript"></script>
    <script type="text/javascript">
        ymaps.ready(function () {
            var myMap = new ymaps.Map('map', {
                    center: [55.64239903922247, 37.92069505372031],
                    zoom: 15
                }, {
                    searchControlProvider: 'yandex#search'
                }),

                // Создаём макет содержимого.
                MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
                    '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
                ),

                myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
                    hintContent: 'Собственный значок метки',
                    balloonContent: 'Это красивая метка'
                }, {
                    // Опции.
                    // Необходимо указать данный тип макета.
                    iconLayout: 'default#image',
                    // Своё изображение иконки метки.
                    iconImageHref: '../images/map_mark.png',
                    // Размеры метки.
                    iconImageSize: [82, 93],
                    // Смещение левого верхнего угла иконки относительно
                    // её "ножки" (точки привязки).
                    iconImageOffset: [-5, -38]
                }),

                myPlacemarkWithContent = new ymaps.Placemark([55.64239903922247, 37.92069505372031], {
                    hintContent: 'Собственный значок метки с контентом',
                    balloonContent: 'А эта — новогодняя',
                    iconContent: '12'
                }, {
                    // Опции.
                    // Необходимо указать данный тип макета.

                    iconLayout: 'default#imageWithContent',
                    // Своё изображение иконки метки.
                    // iconImageHref: 'images/ball.png',
                    // Размеры метки.
                    iconImageSize: [48, 48],
                    // Смещение левого верхнего угла иконки относительно
                    // её "ножки" (точки привязки).
                    iconImageOffset: [-24, -24],
                    // Смещение слоя с содержимым относительно слоя с картинкой.
                    iconContentOffset: [15, 15],
                    // Макет содержимого.
                    iconContentLayout: MyIconContentLayout
                });

            myMap.geoObjects
                .add(myPlacemark)
                .add(myPlacemarkWithContent);
        });
    </script>

@endsection
@section('content')
<div class="bowy_mian_wrapper">
    @include('includes_file.header')
    <main>
        <section class="top">
            <div class="top_wrapper">
                <h1 class="top_title"> <span>BOWY</span>  аренда всех видов транспорта</h1>
                <p class="top_info">Более 2000 актуальных объявлений! </p>
                <form action="{{route('search.results')}}" method="get" class="find_transport_form">
                    <div class="find_transport_form_select_wrapper first_find_transport_wrapper">
                        <div class="find_transport_form_select_title_wrapper">
                            <input type="hidden" class="hidden_category_data check_search_category" name="category" value="">
                            <p class="find_transport_form_select_title">Выберите категорию</p>
                        </div>
                        <div class="find_transport_form_select_hidden_wrapper home_find_transport_wrapper">
                            @foreach($categories as $category)
                                <p class="find_transport_form_select_hidden_info add_category_data"  data-id="{{$category->id}}" data-info="{{$category->name}}">{{$category->name}}</p>
                            @endforeach
                        </div>
                    </div>
                    <div class="find_transport_form_select_wrapper">
                        <div class="find_transport_form_select_title_wrapper">
                            <input type="hidden" class="hidden_category_data" id="region_input" name="region" value="">
                            <p class="find_transport_form_select_title">Выберите регион</p>
                        </div>
                        <div class="find_transport_form_select_hidden_wrapper home_find_transport_wrappers">
                            @foreach($regions as $region)
                            <p class="find_transport_form_select_hidden_info add_region_data" data-id="{{$region->id}}" data-info="{{$region->name}}">{{$region->name}}</p>
                            @endforeach
                        </div>
                    </div>
                    <div class="find_transport_form_select_wrapper">
                        <div class="find_transport_form_select_title_wrapper">
                            <input type="hidden" class="hidden_category_data" name="city" value="">
                            <p class="find_transport_form_select_title">Выберите город</p>
                        </div>
                        <div class="find_transport_form_select_hidden_wrapper home_find_transport_wrappers" id="divCity">
                            @foreach($cities as $city)
                            <p class="find_transport_form_select_hidden_info" data-id="{{$city->id}}" data-info="{{$city->name}}">{{$city->name}}</p>
                            @endforeach
                        </div>
                    </div>
                    <button type="button" class="find_transport_form_btn">Найти транспорт</button>
                </form>
            </div>
        </section>
        <section class="types_of_transport">
            <div class="types_of_transport_wrapper">
                <div class="types_of_transport_link_title_wrapper">
                    <h1 class="types_of_transport_title">Виды транспорта</h1>
                </div>
                <div class="types_of_transport_links_wrapper">
                    @foreach($categories as $category )
                        <a href="{{route('search.results',$category->id)}}" class="types_of_transport_link">
                            <div class="types_of_transport_link_img">
                                <img src="{{asset('images/'.$category->image)}}" alt="">
                            </div>
                            <div class="types_of_transport_link_info_parent">
                                <span class="types_of_transport_link_info">{{$category->name}}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="cars_on_the_map">
            <div class="cars_on_the_map_wrapper">
                <h1 class="cars_on_the_map_title">Автомобили на карте</h1>
                <div class="cars_on_the_map_img">
                    <div id="map" style=" width: 100%;  height: 290px"></div>
                </div>
            </div>
        </section>
        <section class="recent_announcements">
            <div class="recent_announcements_wrapper">
                <div class="recent_announcements_title_sort_btns_wrapper">
                    <h1 class="recent_announcements_title">Недавние объявления</h1>
                    <div class="recent_announcements_sort_btns_wrapper">
                        <button class="sort_btn active" data-id="open_div1">
                            <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 0C19.2652 0 19.5196 0.105357 19.7071 0.292893C19.8946 0.48043 20 0.734784 20 1V17C20 17.2652 19.8946 17.5196 19.7071 17.7071C19.5196 17.8946 19.2652 18 19 18H1C0.734784 18 0.48043 17.8946 0.292893 17.7071C0.105357 17.5196 0 17.2652 0 17V1C0 0.734784 0.105357 0.48043 0.292893 0.292893C0.48043 0.105357 0.734784 0 1 0H19ZM9 10H2V16H9V10ZM18 10H11V16H18V10ZM9 2H2V8H9V2ZM18 2H11V8H18V2Z" fill="url(#paint0_linear_30_8)"/>
                                <defs>
                                    <linearGradient id="paint0_linear_30_8" x1="0" y1="0" x2="21.4561" y2="1.94613" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#B7B7B7"/>
                                        <stop offset="1" stop-color="#B7B7B7"/>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </button>
                        <button class="sort_btn" data-id="open_div2">
                            <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 0H18V2H0V0ZM0 7H18V9H0V7ZM0 14H18V16H0V14Z" fill="#B7B7B7"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="recent_announcements_items_wrapper">
                    <div class="recent_announcements_item open" id="open_div1">
                        <div class="recent_announcements_item_parent1">
                            @foreach($product as $products)
                            <div class="recent_announcements_item_child">
                                <a href="{{route('announcement-unlogged-user',['status'=>'active','id'=>$products->id])}}">
                                    <div class="recent_announcements_item_child_link_img1">
                                        @if(!$products->image->isEmpty())
                                            @foreach($products->image as $image_data)
                                               <img src="{{asset('storage/uploads/' . $image_data->image)}}" alt="">
                                               @break
                                            @endforeach
                                        @else    
                                            <img src="{{asset('storage/uploads/photo.jpg')}}" alt="">
                                        @endif                                  
                                    </div>
                                </a>
                                    @if(auth()->check())
                                    @if($products->user_id != Auth::user()->id)
                                    @if(App\Models\Favourites::where(['user_id' => auth()->user()->id,'product_id' => $products->id])->get()->count() < 1)
                                    <div style="max-height: 250px" class="recent_announcements_item_child_link_favourite_img add-favorite" data-id="{{ $products->id }}">
                                            <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.001 1.52898C12.35 -0.58002 15.98 -0.51002 18.243 1.75698C20.505 4.02498 20.583 7.63698 18.479 9.99298L9.99901 18.485L1.52101 9.99298C-0.582994 7.63698 -0.503994 4.01898 1.75701 1.75698C4.02201 -0.50702 7.64501 -0.58302 10.001 1.52898ZM16.827 3.16998C15.327 1.66798 12.907 1.60698 11.337 3.01698L10.002 4.21498L8.66601 3.01798C7.09101 1.60598 4.67601 1.66798 3.17201 3.17198C1.68201 4.66198 1.60701 7.04698 2.98001 8.62298L10 15.654L17.02 8.62398C18.394 7.04698 18.319 4.66498 16.827 3.16998Z" fill="white"/>
                                            </svg>
                                    </div>
                                    <div class="recent_announcements_item_child_link_exist_favourite_img">
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.001 1.52898C12.35 -0.58002 15.98 -0.51002 18.243 1.75698C20.505 4.02498 20.583 7.63698 18.479 9.99298L9.99901 18.485L1.52101 9.99298C-0.582994 7.63698 -0.503994 4.01898 1.75701 1.75698C4.02201 -0.50702 7.64501 -0.58302 10.001 1.52898Z" fill="white"></path>
                                        </svg>
                                    </div>
                                    @else
                                    <div class="recent_announcements_item_child_link_exist_favourite_post remove-favourites" data-id="{{ $products->id }}">
                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.001 1.52898C12.35 -0.58002 15.98 -0.51002 18.243 1.75698C20.505 4.02498 20.583 7.63698 18.479 9.99298L9.99901 18.485L1.52101 9.99298C-0.582994 7.63698 -0.503994 4.01898 1.75701 1.75698C4.02201 -0.50702 7.64501 -0.58302 10.001 1.52898Z" fill="white"></path>
                                        </svg>
                                    </div>
                                    <div class="recent_announcements_item_child_link_favourite_img delete_favorite_show"></div>
                                   @endif
                                 @endif
                                @endif
                                <div class="recent_announcements_item_child_info_box">
                                    <h1 class="recent_announcements_item_child_title">{{$products->headline}}</h1>
                                    <h1 class="recent_announcements_item_child_price">{{$products->price  . " " . "₽"}} </h1>
                                    <p class="recent_announcements_item_child_info1">{{$products->address}}</p>
                                    <p class="recent_announcements_item_child_info2">{{$products->description}} </p>
                                    <div class="recent_announcements_items_child_call_message_btns_wrapper">
                                        <a class="recent_announcements_items_child_call_btn call user-number" data-id="{{$products->id}}">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.366 7.682C7.30434 9.33048 8.66952 10.6957 10.318 11.634L11.202 10.396C11.3442 10.1969 11.5543 10.0569 11.7928 10.0023C12.0313 9.94779 12.2814 9.98254 12.496 10.1C13.9103 10.8729 15.4722 11.3378 17.079 11.464C17.3298 11.4839 17.5638 11.5975 17.7345 11.7823C17.9052 11.9671 18 12.2094 18 12.461V16.923C18.0001 17.1706 17.9083 17.4094 17.7424 17.5932C17.5765 17.777 17.3483 17.8927 17.102 17.918C16.572 17.973 16.038 18 15.5 18C6.94 18 0 11.06 0 2.5C0 1.962 0.027 1.428 0.082 0.898C0.107255 0.651697 0.222984 0.423521 0.40679 0.257634C0.590595 0.0917472 0.829406 -5.33578e-05 1.077 2.32673e-08H5.539C5.79056 -3.15185e-05 6.0329 0.0947515 6.21768 0.265451C6.40247 0.43615 6.51613 0.670224 6.536 0.921C6.66222 2.52779 7.12708 4.08968 7.9 5.504C8.01746 5.71856 8.05221 5.96874 7.99767 6.2072C7.94312 6.44565 7.80306 6.65584 7.604 6.798L6.366 7.682ZM3.844 7.025L5.744 5.668C5.20478 4.50409 4.83535 3.26884 4.647 2H2.01C2.004 2.166 2.001 2.333 2.001 2.5C2 9.956 8.044 16 15.5 16C15.667 16 15.834 15.997 16 15.99V13.353C14.7312 13.1646 13.4959 12.7952 12.332 12.256L10.975 14.156C10.4287 13.9437 9.89801 13.6931 9.387 13.406L9.329 13.373C7.36758 12.2567 5.74328 10.6324 4.627 8.671L4.594 8.613C4.30691 8.10199 4.05628 7.57134 3.844 7.025Z" fill="white"/>
                                            </svg>
                                        </a>
                                        @if(auth()->check())
                                        <a href="{{route('announcement-unlogged-user',['status'=>'active','id'=>$products->id])}}" class="recent_announcements_items_child_message_btn open_users_chat">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.29101 18.824L1.12865e-05 20L1.17601 14.709C0.401543 13.2604 -0.00246185 11.6426 1.12865e-05 10C1.12865e-05 4.477 4.47701 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20C8.35737 20.0025 6.73963 19.5985 5.29101 18.824V18.824ZM5.58101 16.711L6.23401 17.061C7.39256 17.6801 8.6864 18.0027 10 18C11.5823 18 13.129 17.5308 14.4446 16.6518C15.7602 15.7727 16.7855 14.5233 17.391 13.0615C17.9965 11.5997 18.155 9.99113 17.8463 8.43928C17.5376 6.88743 16.7757 5.46197 15.6569 4.34315C14.538 3.22433 13.1126 2.4624 11.5607 2.15372C10.0089 1.84504 8.40035 2.00346 6.93854 2.60896C5.47674 3.21447 4.22731 4.23984 3.34825 5.55544C2.4692 6.87103 2.00001 8.41775 2.00001 10C2.00001 11.334 2.32501 12.618 2.94001 13.766L3.28901 14.419L2.63401 17.366L5.58101 16.711V16.711Z" fill="white"/>
                                            </svg>
                                        </a>
                                        @else
                                            <a href="{{route('login')}}" class="recent_announcements_items_child_message_btn open_users_chat">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.29101 18.824L1.12865e-05 20L1.17601 14.709C0.401543 13.2604 -0.00246185 11.6426 1.12865e-05 10C1.12865e-05 4.477 4.47701 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20C8.35737 20.0025 6.73963 19.5985 5.29101 18.824V18.824ZM5.58101 16.711L6.23401 17.061C7.39256 17.6801 8.6864 18.0027 10 18C11.5823 18 13.129 17.5308 14.4446 16.6518C15.7602 15.7727 16.7855 14.5233 17.391 13.0615C17.9965 11.5997 18.155 9.99113 17.8463 8.43928C17.5376 6.88743 16.7757 5.46197 15.6569 4.34315C14.538 3.22433 13.1126 2.4624 11.5607 2.15372C10.0089 1.84504 8.40035 2.00346 6.93854 2.60896C5.47674 3.21447 4.22731 4.23984 3.34825 5.55544C2.4692 6.87103 2.00001 8.41775 2.00001 10C2.00001 11.334 2.32501 12.618 2.94001 13.766L3.28901 14.419L2.63401 17.366L5.58101 16.711V16.711Z" fill="white"/>
                                                </svg>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
{{--                                {{dd($products->image[0])}}--}}
                            @endforeach
                        </div>
                    </div>
                    <div class="recent_announcements_item" id="open_div2">
                        <div class="recent_announcements_item_parent2">

                            @foreach($product as $products)
                            <div class="recent_announcements_item_child">
                                <a href="{{route('announcement-unlogged-user',['status'=>'active','id'=>$products->id])}}" class="recent_announcements_item_child_link">
                                    <div class="recent_announcements_item_child_link_img1">
                                    @if(!$products->image->isEmpty())
                                            @foreach($products->image as $image_data)
                                               <img src="{{asset('storage/uploads/' . $image_data->image)}}" alt="">
                                               @break
                                            @endforeach
                                        @else    
                                            <img src="{{asset('storage/uploads/photo.jpg')}}" alt="">
                                        @endif    
                                    </div>
{{--                                    @dd($products->image[0]->image)--}}
                                </a>
                                @if(auth()->check())
                                    @if($products->user_id != Auth::user()->id)
                                       @if(App\Models\Favourites::where(['user_id' => auth()->user()->id,'product_id' => $products->id])->get()->count() < 1)
                                        <div class="recent_announcements_item_child_link_favourite_img" data-id="{{ $products->id }}">
                                            <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.001 1.52898C12.35 -0.58002 15.98 -0.51002 18.243 1.75698C20.505 4.02498 20.583 7.63698 18.479 9.99298L9.99901 18.485L1.52101 9.99298C-0.582994 7.63698 -0.503994 4.01898 1.75701 1.75698C4.02201 -0.50702 7.64501 -0.58302 10.001 1.52898ZM16.827 3.16998C15.327 1.66798 12.907 1.60698 11.337 3.01698L10.002 4.21498L8.66601 3.01798C7.09101 1.60598 4.67601 1.66798 3.17201 3.17198C1.68201 4.66198 1.60701 7.04698 2.98001 8.62298L10 15.654L17.02 8.62398C18.394 7.04698 18.319 4.66498 16.827 3.16998Z" fill="white"/>
                                            </svg>
                                        </div>
                                        <!--<div class="recent_announcements_item_child_link_exist_favourite_img">-->
                                        <!--    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                                        <!--        <path d="M10.001 1.52898C12.35 -0.58002 15.98 -0.51002 18.243 1.75698C20.505 4.02498 20.583 7.63698 18.479 9.99298L9.99901 18.485L1.52101 9.99298C-0.582994 7.63698 -0.503994 4.01898 1.75701 1.75698C4.02201 -0.50702 7.64501 -0.58302 10.001 1.52898Z" fill="white"></path>-->
                                        <!--    </svg>-->
                                        <!--</div>-->
                                            @else
                                        <div class="recent_announcements_item_child_link_exist_favourite_post remove-favourites" data-id="{{$products->id}}">
                                            <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.001 1.52898C12.35 -0.58002 15.98 -0.51002 18.243 1.75698C20.505 4.02498 20.583 7.63698 18.479 9.99298L9.99901 18.485L1.52101 9.99298C-0.582994 7.63698 -0.503994 4.01898 1.75701 1.75698C4.02201 -0.50702 7.64501 -0.58302 10.001 1.52898Z" fill="white"></path>
                                            </svg>
                                        </div>
                                        @endif
                                    @endif
                                @endif
                                <div class="recent_announcements_item_child_info_box">
                                    <h1 class="recent_announcements_item_child_title">{{$products->headline}}</h1>
                                    <h1 class="recent_announcements_item_child_price">{{$products->price  . " " . "₽"}}</h1>
                                    <p class="recent_announcements_item_child_info1">{{$products->address}}</p>
                                    <p class="recent_announcements_item_child_info2">{{$products->description}}</p>
                                    <div class="recent_announcements_items_child_call_message_btns_wrapper">
                                        <button class="recent_announcements_items_child_call_btn  call user-number" data-id="{{$products->id}}">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.366 7.682C7.30434 9.33048 8.66952 10.6957 10.318 11.634L11.202 10.396C11.3442 10.1969 11.5543 10.0569 11.7928 10.0023C12.0313 9.94779 12.2814 9.98254 12.496 10.1C13.9103 10.8729 15.4722 11.3378 17.079 11.464C17.3298 11.4839 17.5638 11.5975 17.7345 11.7823C17.9052 11.9671 18 12.2094 18 12.461V16.923C18.0001 17.1706 17.9083 17.4094 17.7424 17.5932C17.5765 17.777 17.3483 17.8927 17.102 17.918C16.572 17.973 16.038 18 15.5 18C6.94 18 0 11.06 0 2.5C0 1.962 0.027 1.428 0.082 0.898C0.107255 0.651697 0.222984 0.423521 0.40679 0.257634C0.590595 0.0917472 0.829406 -5.33578e-05 1.077 2.32673e-08H5.539C5.79056 -3.15185e-05 6.0329 0.0947515 6.21768 0.265451C6.40247 0.43615 6.51613 0.670224 6.536 0.921C6.66222 2.52779 7.12708 4.08968 7.9 5.504C8.01746 5.71856 8.05221 5.96874 7.99767 6.2072C7.94312 6.44565 7.80306 6.65584 7.604 6.798L6.366 7.682ZM3.844 7.025L5.744 5.668C5.20478 4.50409 4.83535 3.26884 4.647 2H2.01C2.004 2.166 2.001 2.333 2.001 2.5C2 9.956 8.044 16 15.5 16C15.667 16 15.834 15.997 16 15.99V13.353C14.7312 13.1646 13.4959 12.7952 12.332 12.256L10.975 14.156C10.4287 13.9437 9.89801 13.6931 9.387 13.406L9.329 13.373C7.36758 12.2567 5.74328 10.6324 4.627 8.671L4.594 8.613C4.30691 8.10199 4.05628 7.57134 3.844 7.025Z" fill="white"/>
                                            </svg>
                                        </button>
{{--                                        <a href="{{route('announcement-unlogged-user',['status'=>'active','id'=>$products->id])}}" class="recent_announcements_items_child_message_btn open_users_chat">--}}
{{--                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                                <path d="M5.29101 18.824L1.12865e-05 20L1.17601 14.709C0.401543 13.2604 -0.00246185 11.6426 1.12865e-05 10C1.12865e-05 4.477 4.47701 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20C8.35737 20.0025 6.73963 19.5985 5.29101 18.824V18.824ZM5.58101 16.711L6.23401 17.061C7.39256 17.6801 8.6864 18.0027 10 18C11.5823 18 13.129 17.5308 14.4446 16.6518C15.7602 15.7727 16.7855 14.5233 17.391 13.0615C17.9965 11.5997 18.155 9.99113 17.8463 8.43928C17.5376 6.88743 16.7757 5.46197 15.6569 4.34315C14.538 3.22433 13.1126 2.4624 11.5607 2.15372C10.0089 1.84504 8.40035 2.00346 6.93854 2.60896C5.47674 3.21447 4.22731 4.23984 3.34825 5.55544C2.4692 6.87103 2.00001 8.41775 2.00001 10C2.00001 11.334 2.32501 12.618 2.94001 13.766L3.28901 14.419L2.63401 17.366L5.58101 16.711V16.711Z" fill="white"/>--}}
{{--                                            </svg>--}}
{{--                                        </a>--}}
                                        @if(auth()->check())
                                            <a href="{{route('announcement-unlogged-user',['status'=>'active','id'=>$products->id])}}" class="recent_announcements_items_child_message_btn open_users_chat">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.29101 18.824L1.12865e-05 20L1.17601 14.709C0.401543 13.2604 -0.00246185 11.6426 1.12865e-05 10C1.12865e-05 4.477 4.47701 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20C8.35737 20.0025 6.73963 19.5985 5.29101 18.824V18.824ZM5.58101 16.711L6.23401 17.061C7.39256 17.6801 8.6864 18.0027 10 18C11.5823 18 13.129 17.5308 14.4446 16.6518C15.7602 15.7727 16.7855 14.5233 17.391 13.0615C17.9965 11.5997 18.155 9.99113 17.8463 8.43928C17.5376 6.88743 16.7757 5.46197 15.6569 4.34315C14.538 3.22433 13.1126 2.4624 11.5607 2.15372C10.0089 1.84504 8.40035 2.00346 6.93854 2.60896C5.47674 3.21447 4.22731 4.23984 3.34825 5.55544C2.4692 6.87103 2.00001 8.41775 2.00001 10C2.00001 11.334 2.32501 12.618 2.94001 13.766L3.28901 14.419L2.63401 17.366L5.58101 16.711V16.711Z" fill="white"/>
                                                </svg>
                                            </a>
                                        @else
                                            <a href="{{route('login')}}" class="recent_announcements_items_child_message_btn open_users_chat">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.29101 18.824L1.12865e-05 20L1.17601 14.709C0.401543 13.2604 -0.00246185 11.6426 1.12865e-05 10C1.12865e-05 4.477 4.47701 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20C8.35737 20.0025 6.73963 19.5985 5.29101 18.824V18.824ZM5.58101 16.711L6.23401 17.061C7.39256 17.6801 8.6864 18.0027 10 18C11.5823 18 13.129 17.5308 14.4446 16.6518C15.7602 15.7727 16.7855 14.5233 17.391 13.0615C17.9965 11.5997 18.155 9.99113 17.8463 8.43928C17.5376 6.88743 16.7757 5.46197 15.6569 4.34315C14.538 3.22433 13.1126 2.4624 11.5607 2.15372C10.0089 1.84504 8.40035 2.00346 6.93854 2.60896C5.47674 3.21447 4.22731 4.23984 3.34825 5.55544C2.4692 6.87103 2.00001 8.41775 2.00001 10C2.00001 11.334 2.32501 12.618 2.94001 13.766L3.28901 14.419L2.63401 17.366L5.58101 16.711V16.711Z" fill="white"/>
                                                </svg>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            @if(isset($product))
                {{$product->links()}}
            @endif
        </section>
    </main>
    @include('includes_file.footer')
</div>
@endsection

