@extends('layouts.app')
@section('title')
    <title>Главная</title>
@endsection
@section('content')
    @include('includes_file.header')
    <div class="bowy_mian_wrapper" id="notification_page">
        <main>
            <section class="notification">
                <div class="notification_wrapper">
                    <div class="notification_items_wrapper">
                        @include('includes_file.user')
                        <div class="notification_item_second_item">
                            <div class="notification_item_child">
                                <p class="notification_item_child_title">Новое сообщение!</p>
                                <div class="notification_item_child_btns_wrapper">
                                    <button class="notification_mark_as_read_btn">Отметить прочитанным</button>
                                    <button class="notification_delete_btn">Удалить</button>
                                </div>
                            </div>
                            <div class="notification_item_child">
                                <p class="notification_item_child_title">Новое сообщение!</p>
                                <div class="notification_item_child_btns_wrapper">
                                    <button class="notification_mark_as_read_btn">Отметить прочитанным</button>
                                    <button class="notification_delete_btn">Удалить</button>
                                </div>
                            </div>
                            <div class="notification_item_child">
                                <p class="notification_item_child_title">Новое сообщение!</p>
                                <div class="notification_item_child_btns_wrapper">
                                    <button class="notification_mark_as_read_btn">Отметить прочитанным</button>
                                    <button class="notification_delete_btn">Удалить</button>
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
