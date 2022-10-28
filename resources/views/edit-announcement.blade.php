@extends('layouts.app')
@section('title')
    <title>Главная</title>
@endsection
@section('content')
    @include('includes_file.header')
    <div class="bowy_mian_wrapper" id="logged_user_announcement_page">
        <main>
            <section class="announcement">
                <div class="announcement_wrapper">
                    <div class="announcement_items_wrapper">
                        @include('includes_file.user')
                        <div class="announcement_second_item">
                            <p class="announcement_second_item_title1">Объявление</p>
                            <div class="announcement_second_item_titles_links_btns_wrapper">
                                <div class="announcement_second_item_titles_wrapper">
                                    <div class="announcement_second_item_title_edit_btn_input_wrapper">
                                        <div class="announcement_second_item_title_edit_btn_wrapper">
                                            <p class="announcement_second_item_title" data-info="Аренда авто без залога">Аренда авто без залога</p>
                                            <div class="announcement_edit_btn2">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12.728 6.686L11.314 5.272L2 14.586V16H3.414L12.728 6.686ZM14.142 5.272L15.556 3.858L14.142 2.444L12.728 3.858L14.142 5.272ZM4.242 18H0V13.757L13.435 0.322C13.6225 0.134528 13.8768 0.029213 14.142 0.029213C14.4072 0.029213 14.6615 0.134528 14.849 0.322L17.678 3.151C17.8655 3.33853 17.9708 3.59284 17.9708 3.858C17.9708 4.12316 17.8655 4.37747 17.678 4.565L4.243 18H4.242Z" fill="black"/>
                                                </svg>

                                            </div>
                                        </div>
                                        <div class="announcement_second_item_input_icon_wrapper">
                                            <div class="announcement_second_item_input_field_wrapper">
                                                <input type="text" class="announcement_second_item_input_field" placeholder=" Напишите... ">
                                            </div>
                                            <i class="material-icons check_mark_icon">check mark</i>

                                        </div>
                                    </div>

                                    <div class="announcement_second_item_title_edit_btn_input_wrapper">
                                        <div class="announcement_second_item_title_edit_btn_wrapper">
                                            <p class="announcement_second_item_title" data-info="1 290 ₽">1 290 ₽</p>
                                            <div class="announcement_edit_btn2">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12.728 6.686L11.314 5.272L2 14.586V16H3.414L12.728 6.686ZM14.142 5.272L15.556 3.858L14.142 2.444L12.728 3.858L14.142 5.272ZM4.242 18H0V13.757L13.435 0.322C13.6225 0.134528 13.8768 0.029213 14.142 0.029213C14.4072 0.029213 14.6615 0.134528 14.849 0.322L17.678 3.151C17.8655 3.33853 17.9708 3.59284 17.9708 3.858C17.9708 4.12316 17.8655 4.37747 17.678 4.565L4.243 18H4.242Z" fill="black"/>
                                                </svg>

                                            </div>
                                        </div>
                                        <div class="announcement_second_item_input_icon_wrapper">
                                            <div class="announcement_second_item_input_field_wrapper">
                                                <input type="text" class="announcement_second_item_input_field" placeholder=" Напишите... ">
                                            </div>
                                            <i class="material-icons check_mark_icon">check mark</i>

                                        </div>
                                    </div>

                                </div>
                                <div class="announcement_second_item_links_btns_wrapper">
                                    <button class="announcement_second_item_edit_btn">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.728 6.686L11.314 5.272L2 14.586V16H3.414L12.728 6.686ZM14.142 5.272L15.556 3.858L14.142 2.444L12.728 3.858L14.142 5.272ZM4.242 18H0V13.757L13.435 0.322C13.6225 0.134528 13.8768 0.029213 14.142 0.029213C14.4072 0.029213 14.6615 0.134528 14.849 0.322L17.678 3.151C17.8655 3.33853 17.9708 3.59284 17.9708 3.858C17.9708 4.12316 17.8655 4.37747 17.678 4.565L4.243 18H4.242Z" fill="white"/>
                                        </svg>

                                    </button>
                                    <a href="" class="announcement_second_item_link1">
                                        <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.49189 7.065L3.77789 18H18.2219L19.5079 7.065L15.4979 9.738L10.9999 3.441L6.50189 9.738L2.49189 7.065ZM1.80089 4.2L5.99989 7L10.1859 1.14C10.2784 1.01037 10.4005 0.904704 10.5421 0.831801C10.6837 0.758898 10.8406 0.720863 10.9999 0.720863C11.1591 0.720863 11.3161 0.758898 11.4577 0.831801C11.5993 0.904704 11.7214 1.01037 11.8139 1.14L15.9999 7L20.1999 4.2C20.3588 4.09424 20.5447 4.0362 20.7356 4.03273C20.9265 4.02926 21.1144 4.08051 21.2771 4.18042C21.4398 4.28033 21.5705 4.42472 21.6537 4.59653C21.737 4.76835 21.7693 4.9604 21.7469 5.15L20.1039 19.117C20.0752 19.3603 19.9583 19.5845 19.7753 19.7473C19.5922 19.91 19.3558 20 19.1109 20H2.88889C2.64395 20 2.40755 19.91 2.22451 19.7473C2.04148 19.5845 1.92454 19.3603 1.89589 19.117L0.252885 5.149C0.230685 4.95948 0.263171 4.76757 0.346506 4.59592C0.429842 4.42426 0.560548 4.28003 0.723196 4.18026C0.885845 4.08048 1.07364 4.02932 1.26442 4.03282C1.45521 4.03632 1.641 4.09433 1.79989 4.2H1.80089ZM10.9999 14C10.4695 14 9.96074 13.7893 9.58567 13.4142C9.2106 13.0391 8.99989 12.5304 8.99989 12C8.99989 11.4696 9.2106 10.9609 9.58567 10.5858C9.96074 10.2107 10.4695 10 10.9999 10C11.5303 10 12.039 10.2107 12.4141 10.5858C12.7892 10.9609 12.9999 11.4696 12.9999 12C12.9999 12.5304 12.7892 13.0391 12.4141 13.4142C12.039 13.7893 11.5303 14 10.9999 14Z" fill="white"/>
                                        </svg>

                                    </a>
                                    <button class="announcement_second_item_delete_btn">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15 4H20V6H18V19C18 19.2652 17.8946 19.5196 17.7071 19.7071C17.5196 19.8946 17.2652 20 17 20H3C2.73478 20 2.48043 19.8946 2.29289 19.7071C2.10536 19.5196 2 19.2652 2 19V6H0V4H5V1C5 0.734784 5.10536 0.48043 5.29289 0.292893C5.48043 0.105357 5.73478 0 6 0H14C14.2652 0 14.5196 0.105357 14.7071 0.292893C14.8946 0.48043 15 0.734784 15 1V4ZM16 6H4V18H16V6ZM7 9H9V15H7V9ZM11 9H13V15H11V9ZM7 2V4H13V2H7Z" fill="white"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="slider_btns_main_wrapper">
                                <div class="swiper" id="announcement_first_swiper">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="swiper_slide_img">
                                                <img src="../images/car_img.png" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="swiper_slide_img">
                                                <img src="../images/car_img.png" alt="">
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="swiper_slide_img">
                                                <img src="../images/car_img.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slider_btns_wrapper">
                                    <div class="swiper-button-prev announcement_prev_btn"></div>
                                    <div class="swiper-button-next announcement_next_btn"></div>
                                </div>
                            </div>
                            <div class="announcement_second_item_view_date_info_box">
                                <div class="announcement_second_item_view_date_info">
                                    <p class="announcement_second_item_view_date_info_title">Дата подачи:</p>
                                    <p class="announcement_second_item_view_date_info_text">21.02.2021</p>
                                </div>
                                <div class="announcement_second_item_view_date_info">
                                    <p class="announcement_second_item_view_date_info_title">Просмотры:</p>
                                    <p class="announcement_second_item_view_date_info_text">102</p>
                                </div>
                                <div class="announcement_second_item_view_date_info">
                                    <p class="announcement_second_item_view_date_info_title">Звонки:</p>
                                    <p class="announcement_second_item_view_date_info_text">12</p>
                                </div>
                            </div>
                            <div class="announcement_second_item_car_info_details_wrapper">
                                <div class="announcement_second_item_car_info_details">
                                    <div class="announcement_second_item_title_edit_btn_input_wrapper">
                                        <div class="announcement_second_item_title_edit_btn_wrapper">
                                            <p class="announcement_second_item_car_info_details_title">Адрес</p>
                                            <div class="announcement_edit_btn3">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12.728 6.686L11.314 5.272L2 14.586V16H3.414L12.728 6.686ZM14.142 5.272L15.556 3.858L14.142 2.444L12.728 3.858L14.142 5.272ZM4.242 18H0V13.757L13.435 0.322C13.6225 0.134528 13.8768 0.029213 14.142 0.029213C14.4072 0.029213 14.6615 0.134528 14.849 0.322L17.678 3.151C17.8655 3.33853 17.9708 3.59284 17.9708 3.858C17.9708 4.12316 17.8655 4.37747 17.678 4.565L4.243 18H4.242Z" fill="black"/>
                                                </svg>

                                            </div>
                                        </div>
                                        <div class="announcement_second_item_input_icon_wrapper">
                                            <div class="announcement_second_item_input_field_wrapper">
                                                <input type="text" class="announcement_second_item_input_field2" placeholder=" Напишите... ">
                                            </div>
                                            <i class="material-icons check_mark_icon">check mark</i>

                                        </div>
                                        <p class="announcement_second_item_car_info_details_text" data-info="Лиговский проспект 11">Лиговский проспект 11</p>
                                    </div>



                                </div>
                                <div class="announcement_second_item_car_info_details">
                                    <div class="announcement_second_item_title_edit_btn_input_wrapper">
                                        <div class="announcement_second_item_title_edit_btn_wrapper">
                                            <p class="announcement_second_item_car_info_details_title">Описание</p>
                                            <div class="announcement_edit_btn3">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12.728 6.686L11.314 5.272L2 14.586V16H3.414L12.728 6.686ZM14.142 5.272L15.556 3.858L14.142 2.444L12.728 3.858L14.142 5.272ZM4.242 18H0V13.757L13.435 0.322C13.6225 0.134528 13.8768 0.029213 14.142 0.029213C14.4072 0.029213 14.6615 0.134528 14.849 0.322L17.678 3.151C17.8655 3.33853 17.9708 3.59284 17.9708 3.858C17.9708 4.12316 17.8655 4.37747 17.678 4.565L4.243 18H4.242Z" fill="black"/>
                                                </svg>

                                            </div>
                                        </div>
                                        <div class="announcement_second_item_input_icon_wrapper">
                                            <div class="announcement_second_item_input_field_wrapper">
                                                <input type="text" class="announcement_second_item_input_field2" placeholder=" Напишите... ">
                                            </div>
                                            <i class="material-icons check_mark_icon">check mark</i>

                                        </div>
                                        <p class="announcement_second_item_car_info_details_text" data-info="Идейные соображения высшего порядка">Идейные соображения высшего порядка, а также укрепление и развитие структуры играет важную роль в формировании модели развития.</p>
                                    </div>



                                </div>
                            </div>
                            <div class="announcement_second_item_specifications_wrapper">
                                <div class="announcement_second_item_specifications_main_title_edit_btn_wrapper">
                                    <p class="announcement_second_item_specifications_main_title">Характеристики</p>
                                    <div class="announcement_edit_btn4">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.728 6.686L11.314 5.272L2 14.586V16H3.414L12.728 6.686ZM14.142 5.272L15.556 3.858L14.142 2.444L12.728 3.858L14.142 5.272ZM4.242 18H0V13.757L13.435 0.322C13.6225 0.134528 13.8768 0.029213 14.142 0.029213C14.4072 0.029213 14.6615 0.134528 14.849 0.322L17.678 3.151C17.8655 3.33853 17.9708 3.59284 17.9708 3.858C17.9708 4.12316 17.8655 4.37747 17.678 4.565L4.243 18H4.242Z" fill="black"></path>
                                        </svg>

                                    </div>
                                </div>

                                <div class="announcement_second_item_specifications">
                                    <p class="announcement_second_item_specifications_title">Марка автомобиля:</p>
                                    <div class="announcement_second_item_specifications_input_icon_wrapper">
                                        <div class="announcement_second_item_specifications_input_field_wrapper">
                                            <input type="text" class="announcement_second_item_specification_input_field2" placeholder=" Напишите... ">
                                        </div>
                                        <i class="material-icons check_mark_icon">check mark</i>
                                    </div>
                                    <p class="announcement_second_item_specifications_info">Vollkswagen</p>
                                </div>
                                <div class="announcement_second_item_specifications">
                                    <p class="announcement_second_item_specifications_title">Тип кузова:</p>
                                    <div class="announcement_second_item_specifications_input_icon_wrapper">
                                        <div class="announcement_second_item_specifications_input_field_wrapper">
                                            <input type="text" class="announcement_second_item_specification_input_field2" placeholder=" Напишите... ">
                                        </div>
                                        <i class="material-icons check_mark_icon">check mark</i>
                                    </div>
                                    <p class="announcement_second_item_specifications_info">Седан</p>
                                </div>
                                <div class="announcement_second_item_specifications">
                                    <p class="announcement_second_item_specifications_title">Год выпуска:</p>
                                    <div class="announcement_second_item_specifications_input_icon_wrapper">
                                        <div class="announcement_second_item_specifications_input_field_wrapper">
                                            <input type="text" class="announcement_second_item_specification_input_field2" placeholder=" Напишите... ">
                                        </div>
                                        <i class="material-icons check_mark_icon">check mark</i>
                                    </div>
                                    <p class="announcement_second_item_specifications_info">2021</p>
                                </div>
                                <div class="announcement_second_item_specifications">
                                    <p class="announcement_second_item_specifications_title">Коробка передач:</p>
                                    <div class="announcement_second_item_specifications_input_icon_wrapper">
                                        <div class="announcement_second_item_specifications_input_field_wrapper">
                                            <input type="text" class="announcement_second_item_specification_input_field2" placeholder=" Напишите... ">
                                        </div>
                                        <i class="material-icons check_mark_icon">check mark</i>
                                    </div>
                                    <p class="announcement_second_item_specifications_info">Автоматическая</p>
                                </div>
                                <div class="announcement_second_item_specifications">
                                    <p class="announcement_second_item_specifications_title">Руль:</p>
                                    <div class="announcement_second_item_specifications_input_icon_wrapper">
                                        <div class="announcement_second_item_specifications_input_field_wrapper">
                                            <input type="text" class="announcement_second_item_specification_input_field2" placeholder=" Напишите... ">
                                        </div>
                                        <i class="material-icons check_mark_icon">check mark</i>
                                    </div>
                                    <p class="announcement_second_item_specifications_info">Левый</p>
                                </div>
                            </div>
                            <div class="similar_ads_wrapper">
                                <p class="similar_ads_title">Похожие объявления</p>
                                <div class="similar_ads_items_wrapper">
                                    <div class="similar_ads_item_child">
                                        <a href="" class="similar_ads_item_child_link">
                                            <div class="similar_ads_item_child_link_img1">
                                                <img src="../images/recent_announcements_item_child_link_img1.png" alt="">
                                            </div>
                                            <div class="similar_ads_item_child_link_favourite_img">
                                                <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10.001 1.52898C12.35 -0.58002 15.98 -0.51002 18.243 1.75698C20.505 4.02498 20.583 7.63698 18.479 9.99298L9.99901 18.485L1.52101 9.99298C-0.582994 7.63698 -0.503994 4.01898 1.75701 1.75698C4.02201 -0.50702 7.64501 -0.58302 10.001 1.52898ZM16.827 3.16998C15.327 1.66798 12.907 1.60698 11.337 3.01698L10.002 4.21498L8.66601 3.01798C7.09101 1.60598 4.67601 1.66798 3.17201 3.17198C1.68201 4.66198 1.60701 7.04698 2.98001 8.62298L10 15.654L17.02 8.62398C18.394 7.04698 18.319 4.66498 16.827 3.16998Z" fill="white"/>
                                                </svg>

                                            </div>

                                        </a>
                                        <div class="similar_ads_item_child_info_box">
                                            <h1 class="similar_ads_item_child_title">Аренда авто без залога</h1>
                                            <h1 class="similar_ads_item_child_price">1 290 ₽ </h1>
                                            <p class="similar_ads_item_child_info1">Лиговский проспект 11</p>
                                            <p class="similar_ads_item_child_info2">Идейные соображения высшего порядка, а также укрепление и развитие структуры играет важную роль в формировании модели развития.</p>
                                            <div class="similar_ads_items_child_call_message_btns_wrapper">
                                                <a href="tel:" class="similar_ads_items_child_call_btn">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M6.366 7.682C7.30434 9.33048 8.66952 10.6957 10.318 11.634L11.202 10.396C11.3442 10.1969 11.5543 10.0569 11.7928 10.0023C12.0313 9.94779 12.2814 9.98254 12.496 10.1C13.9103 10.8729 15.4722 11.3378 17.079 11.464C17.3298 11.4839 17.5638 11.5975 17.7345 11.7823C17.9052 11.9671 18 12.2094 18 12.461V16.923C18.0001 17.1706 17.9083 17.4094 17.7424 17.5932C17.5765 17.777 17.3483 17.8927 17.102 17.918C16.572 17.973 16.038 18 15.5 18C6.94 18 0 11.06 0 2.5C0 1.962 0.027 1.428 0.082 0.898C0.107255 0.651697 0.222984 0.423521 0.40679 0.257634C0.590595 0.0917472 0.829406 -5.33578e-05 1.077 2.32673e-08H5.539C5.79056 -3.15185e-05 6.0329 0.0947515 6.21768 0.265451C6.40247 0.43615 6.51613 0.670224 6.536 0.921C6.66222 2.52779 7.12708 4.08968 7.9 5.504C8.01746 5.71856 8.05221 5.96874 7.99767 6.2072C7.94312 6.44565 7.80306 6.65584 7.604 6.798L6.366 7.682ZM3.844 7.025L5.744 5.668C5.20478 4.50409 4.83535 3.26884 4.647 2H2.01C2.004 2.166 2.001 2.333 2.001 2.5C2 9.956 8.044 16 15.5 16C15.667 16 15.834 15.997 16 15.99V13.353C14.7312 13.1646 13.4959 12.7952 12.332 12.256L10.975 14.156C10.4287 13.9437 9.89801 13.6931 9.387 13.406L9.329 13.373C7.36758 12.2567 5.74328 10.6324 4.627 8.671L4.594 8.613C4.30691 8.10199 4.05628 7.57134 3.844 7.025Z" fill="white"/>
                                                    </svg>

                                                </a>
                                                <a href="mailto:" class="similar_ads_items_child_message_btn">
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M5.29101 18.824L1.12865e-05 20L1.17601 14.709C0.401543 13.2604 -0.00246185 11.6426 1.12865e-05 10C1.12865e-05 4.477 4.47701 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20C8.35737 20.0025 6.73963 19.5985 5.29101 18.824V18.824ZM5.58101 16.711L6.23401 17.061C7.39256 17.6801 8.6864 18.0027 10 18C11.5823 18 13.129 17.5308 14.4446 16.6518C15.7602 15.7727 16.7855 14.5233 17.391 13.0615C17.9965 11.5997 18.155 9.99113 17.8463 8.43928C17.5376 6.88743 16.7757 5.46197 15.6569 4.34315C14.538 3.22433 13.1126 2.4624 11.5607 2.15372C10.0089 1.84504 8.40035 2.00346 6.93854 2.60896C5.47674 3.21447 4.22731 4.23984 3.34825 5.55544C2.4692 6.87103 2.00001 8.41775 2.00001 10C2.00001 11.334 2.32501 12.618 2.94001 13.766L3.28901 14.419L2.63401 17.366L5.58101 16.711V16.711Z" fill="white"/>
                                                    </svg>

                                                </a>
                                                </di
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="similar_ads_item_child">
                                    <a href="" class="similar_ads_item_child_link">
                                        <div class="similar_ads_item_child_link_img1">
                                            <img src="../images/recent_announcements_item_child_link_img1.png" alt="">
                                        </div>
                                        <div class="similar_ads_item_child_link_favourite_img">
                                            <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.001 1.52898C12.35 -0.58002 15.98 -0.51002 18.243 1.75698C20.505 4.02498 20.583 7.63698 18.479 9.99298L9.99901 18.485L1.52101 9.99298C-0.582994 7.63698 -0.503994 4.01898 1.75701 1.75698C4.02201 -0.50702 7.64501 -0.58302 10.001 1.52898ZM16.827 3.16998C15.327 1.66798 12.907 1.60698 11.337 3.01698L10.002 4.21498L8.66601 3.01798C7.09101 1.60598 4.67601 1.66798 3.17201 3.17198C1.68201 4.66198 1.60701 7.04698 2.98001 8.62298L10 15.654L17.02 8.62398C18.394 7.04698 18.319 4.66498 16.827 3.16998Z" fill="white"/>
                                            </svg>

                                        </div>

                                    </a>
                                    <div class="similar_ads_item_child_info_box">
                                        <h1 class="similar_ads_item_child_title">Аренда авто без залога</h1>
                                        <h1 class="similar_ads_item_child_price">1 290 ₽ </h1>
                                        <p class="similar_ads_item_child_info1">Лиговский проспект 11</p>
                                        <p class="similar_ads_item_child_info2">Идейные соображения высшего порядка, а также укрепление и развитие структуры играет важную роль в формировании модели развития.</p>
                                        <div class="similar_ads_items_child_call_message_btns_wrapper">
                                            <a href="tel:" class="similar_ads_items_child_call_btn">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6.366 7.682C7.30434 9.33048 8.66952 10.6957 10.318 11.634L11.202 10.396C11.3442 10.1969 11.5543 10.0569 11.7928 10.0023C12.0313 9.94779 12.2814 9.98254 12.496 10.1C13.9103 10.8729 15.4722 11.3378 17.079 11.464C17.3298 11.4839 17.5638 11.5975 17.7345 11.7823C17.9052 11.9671 18 12.2094 18 12.461V16.923C18.0001 17.1706 17.9083 17.4094 17.7424 17.5932C17.5765 17.777 17.3483 17.8927 17.102 17.918C16.572 17.973 16.038 18 15.5 18C6.94 18 0 11.06 0 2.5C0 1.962 0.027 1.428 0.082 0.898C0.107255 0.651697 0.222984 0.423521 0.40679 0.257634C0.590595 0.0917472 0.829406 -5.33578e-05 1.077 2.32673e-08H5.539C5.79056 -3.15185e-05 6.0329 0.0947515 6.21768 0.265451C6.40247 0.43615 6.51613 0.670224 6.536 0.921C6.66222 2.52779 7.12708 4.08968 7.9 5.504C8.01746 5.71856 8.05221 5.96874 7.99767 6.2072C7.94312 6.44565 7.80306 6.65584 7.604 6.798L6.366 7.682ZM3.844 7.025L5.744 5.668C5.20478 4.50409 4.83535 3.26884 4.647 2H2.01C2.004 2.166 2.001 2.333 2.001 2.5C2 9.956 8.044 16 15.5 16C15.667 16 15.834 15.997 16 15.99V13.353C14.7312 13.1646 13.4959 12.7952 12.332 12.256L10.975 14.156C10.4287 13.9437 9.89801 13.6931 9.387 13.406L9.329 13.373C7.36758 12.2567 5.74328 10.6324 4.627 8.671L4.594 8.613C4.30691 8.10199 4.05628 7.57134 3.844 7.025Z" fill="white"/>
                                                </svg>

                                            </a>
                                            <a href="mailto:" class="similar_ads_items_child_message_btn">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.29101 18.824L1.12865e-05 20L1.17601 14.709C0.401543 13.2604 -0.00246185 11.6426 1.12865e-05 10C1.12865e-05 4.477 4.47701 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20C8.35737 20.0025 6.73963 19.5985 5.29101 18.824V18.824ZM5.58101 16.711L6.23401 17.061C7.39256 17.6801 8.6864 18.0027 10 18C11.5823 18 13.129 17.5308 14.4446 16.6518C15.7602 15.7727 16.7855 14.5233 17.391 13.0615C17.9965 11.5997 18.155 9.99113 17.8463 8.43928C17.5376 6.88743 16.7757 5.46197 15.6569 4.34315C14.538 3.22433 13.1126 2.4624 11.5607 2.15372C10.0089 1.84504 8.40035 2.00346 6.93854 2.60896C5.47674 3.21447 4.22731 4.23984 3.34825 5.55544C2.4692 6.87103 2.00001 8.41775 2.00001 10C2.00001 11.334 2.32501 12.618 2.94001 13.766L3.28901 14.419L2.63401 17.366L5.58101 16.711V16.711Z" fill="white"/>
                                                </svg>

                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="similar_ads_item_child">
                                    <a href="" class="similar_ads_item_child_link">
                                        <div class="similar_ads_item_child_link_img1">
                                            <img src="../images/recent_announcements_item_child_link_img1.png" alt="">
                                        </div>
                                        <div class="similar_ads_item_child_link_favourite_img">
                                            <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.001 1.52898C12.35 -0.58002 15.98 -0.51002 18.243 1.75698C20.505 4.02498 20.583 7.63698 18.479 9.99298L9.99901 18.485L1.52101 9.99298C-0.582994 7.63698 -0.503994 4.01898 1.75701 1.75698C4.02201 -0.50702 7.64501 -0.58302 10.001 1.52898ZM16.827 3.16998C15.327 1.66798 12.907 1.60698 11.337 3.01698L10.002 4.21498L8.66601 3.01798C7.09101 1.60598 4.67601 1.66798 3.17201 3.17198C1.68201 4.66198 1.60701 7.04698 2.98001 8.62298L10 15.654L17.02 8.62398C18.394 7.04698 18.319 4.66498 16.827 3.16998Z" fill="white"/>
                                            </svg>

                                        </div>

                                    </a>
                                    <div class="similar_ads_item_child_info_box">
                                        <h1 class="similar_ads_item_child_title">Аренда авто без залога</h1>
                                        <h1 class="similar_ads_item_child_price">1 290 ₽ </h1>
                                        <p class="similar_ads_item_child_info1">Лиговский проспект 11</p>
                                        <p class="similar_ads_item_child_info2">Идейные соображения высшего порядка, а также укрепление и развитие структуры играет важную роль в формировании модели развития.</p>
                                        <div class="similar_ads_items_child_call_message_btns_wrapper">
                                            <a href="tel:" class="similar_ads_items_child_call_btn">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6.366 7.682C7.30434 9.33048 8.66952 10.6957 10.318 11.634L11.202 10.396C11.3442 10.1969 11.5543 10.0569 11.7928 10.0023C12.0313 9.94779 12.2814 9.98254 12.496 10.1C13.9103 10.8729 15.4722 11.3378 17.079 11.464C17.3298 11.4839 17.5638 11.5975 17.7345 11.7823C17.9052 11.9671 18 12.2094 18 12.461V16.923C18.0001 17.1706 17.9083 17.4094 17.7424 17.5932C17.5765 17.777 17.3483 17.8927 17.102 17.918C16.572 17.973 16.038 18 15.5 18C6.94 18 0 11.06 0 2.5C0 1.962 0.027 1.428 0.082 0.898C0.107255 0.651697 0.222984 0.423521 0.40679 0.257634C0.590595 0.0917472 0.829406 -5.33578e-05 1.077 2.32673e-08H5.539C5.79056 -3.15185e-05 6.0329 0.0947515 6.21768 0.265451C6.40247 0.43615 6.51613 0.670224 6.536 0.921C6.66222 2.52779 7.12708 4.08968 7.9 5.504C8.01746 5.71856 8.05221 5.96874 7.99767 6.2072C7.94312 6.44565 7.80306 6.65584 7.604 6.798L6.366 7.682ZM3.844 7.025L5.744 5.668C5.20478 4.50409 4.83535 3.26884 4.647 2H2.01C2.004 2.166 2.001 2.333 2.001 2.5C2 9.956 8.044 16 15.5 16C15.667 16 15.834 15.997 16 15.99V13.353C14.7312 13.1646 13.4959 12.7952 12.332 12.256L10.975 14.156C10.4287 13.9437 9.89801 13.6931 9.387 13.406L9.329 13.373C7.36758 12.2567 5.74328 10.6324 4.627 8.671L4.594 8.613C4.30691 8.10199 4.05628 7.57134 3.844 7.025Z" fill="white"/>
                                                </svg>

                                            </a>
                                            <a href="mailto:" class="similar_ads_items_child_message_btn">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.29101 18.824L1.12865e-05 20L1.17601 14.709C0.401543 13.2604 -0.00246185 11.6426 1.12865e-05 10C1.12865e-05 4.477 4.47701 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20C8.35737 20.0025 6.73963 19.5985 5.29101 18.824V18.824ZM5.58101 16.711L6.23401 17.061C7.39256 17.6801 8.6864 18.0027 10 18C11.5823 18 13.129 17.5308 14.4446 16.6518C15.7602 15.7727 16.7855 14.5233 17.391 13.0615C17.9965 11.5997 18.155 9.99113 17.8463 8.43928C17.5376 6.88743 16.7757 5.46197 15.6569 4.34315C14.538 3.22433 13.1126 2.4624 11.5607 2.15372C10.0089 1.84504 8.40035 2.00346 6.93854 2.60896C5.47674 3.21447 4.22731 4.23984 3.34825 5.55544C2.4692 6.87103 2.00001 8.41775 2.00001 10C2.00001 11.334 2.32501 12.618 2.94001 13.766L3.28901 14.419L2.63401 17.366L5.58101 16.711V16.711Z" fill="white"/>
                                                </svg>

                                            </a>
                                            </di
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
    </div>
    </div>
    </section>
    </main>
    @include('includes_file.footer')
    </div>
@endsection
