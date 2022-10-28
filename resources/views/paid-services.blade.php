@extends('layouts.app')
@section('title')
    <title>Главная</title>
@endsection
@section('content')
    @include('includes_file.header')
    <main>
        <section class="paid_services">
            <div class="paid_services_wrapper">
                <div class="paid_services_items_wrapper">
                    @include('includes_file.user')
                    <div class="paid_services_second_item">
                        <p class="paid_services_second_item_title">Платные услуги</p>
                        <a href="" class="paid_services_second_item_link paid_services_second_item_link1">
                            <div class="paid_services_second_item_link_info_box">
                                <p class="paid_services_second_item_link_info1">Премиум</p>
                                <p class="paid_services_second_item_link_info2">В 10 раз больше просмотров!</p>
                                <p class="paid_services_second_item_link_info3">Премиум статус - Ваше объявление показывается вверху списка над обычными объявлениями и выделено цветом. Это значительно увеличивает просмотры объявления, скорость продажи и кол-во продаж. Срок действия услуги в днях: 7</p>
                            </div>
                            <div class="paid_services_second_item_link_img">
                                <img src="../images/paid_link_img1.png" alt=>
                            </div>
                        </a>
                        <a href="" class="paid_services_second_item_link paid_services_second_item_link2">
                            <div class="paid_services_second_item_link_info_box">
                                <p class="paid_services_second_item_link_info1">Выделить цветом</p>
                                <p class="paid_services_second_item_link_info2">В 5 раз больше просмотров!</p>
                                <p class="paid_services_second_item_link_info3">Эта опция привлекает внимание к Вашему объявлению. Ваше объявление будет выделено цветом, это увеличит кол-во его просмотров, скорость продажи и кол-во продаж.</p>
                            </div>
                            <div class="paid_services_second_item_link_img">
                                <img src="../images/paid_link_img2.png" alt=>
                            </div>
                        </a>
                        <a href="" class="paid_services_second_item_link paid_services_second_item_link3">
                            <div class="paid_services_second_item_link_info_box">
                                <p class="paid_services_second_item_link_info1">Поднятие объявления</p>
                                <p class="paid_services_second_item_link_info2">В 3 раза больше просмотров!</p>
                                <p class="paid_services_second_item_link_info3">Эта опция поднимает Ваше объявление вверх списка.</p>
                            </div>
                            <div class="paid_services_second_item_link_img">
                                <img src="../images/paid_link_img3.png" alt=>
                            </div>
                        </a>

                        <p class="paid_services_second_item_info">Чтобы применить платную услугу, перейдите на страницу своего объявления.</p>
                        <a href="" class="all_my_ads_link">Все мои объявления</a>
                    </div>

                </div>
            </div>
        </section>
    </main>
    @include('includes_file.footer')
@endsection
