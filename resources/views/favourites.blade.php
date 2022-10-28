@extends('layouts.app')
@section('title')
    <title>Главная</title>
@endsection
@section('content')

    @include('includes_file.header')
<div class="bowy_mian_wrapper" id="favourites_page">
    <main>
        <section class="favourites">
            <div class="favourites_wrapper">
                <div class="favourites_items_wrapper">
                    @include('includes_file.user')
                    <div class="favourites_item_second_item">
                        @foreach($products as $product)
                        <div class="favourites_item_child" id="{{ $product->id }}" >
                            <a href="{{route('announcement-unlogged-user',['status'=>'active','id'=>$product->id])}}" class="favourites_item_child_link">
                                    <div style="height: 250px" class="favourites_child_link_img1" >
                                    @if(!$product->image->isEmpty())
                                            @foreach($product->image as $image_data)
                                            <img src="{{asset('storage/uploads/' . $product->image[0]->image)}}" alt="">
                                        @break
                                            @endforeach
                                        @else    
                                            <img src="{{asset('storage/uploads/photo.jpg')}}" alt="">
                                        @endif
                                    </div>
                            </a>
                            <div class="favourites_child_link_icon remove-favourite " data-id="{{$product->id}}">
                                <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.001 1.52898C12.35 -0.58002 15.98 -0.51002 18.243 1.75698C20.505 4.02498 20.583 7.63698 18.479 9.99298L9.99901 18.485L1.52101 9.99298C-0.582994 7.63698 -0.503994 4.01898 1.75701 1.75698C4.02201 -0.50702 7.64501 -0.58302 10.001 1.52898Z" fill="white"/>
                                </svg>
                            </div>

                            <div class="favourites_item_child_info_box">
                                <h1 class="favourites_item_child_title">{{$product->headline}}</h1>
                                <h1 class="favourites_item_child_price">{{$product->price}} </h1>
                                <p class="favourites_child_info1">{{$product->address}}</p>
                                <p class="favourites_item_child_info2">{{$product->description}} </p>
                            </div>
                        </div>
                        @endforeach
{{--                        <div class="favourites_item_child">--}}
{{--                            <a href="" class="favourites_item_child_link">--}}
{{--                                <div class="favourites_child_link_img1">--}}
{{--                                    <img src="../images/recent_announcements_item_child_link_img1.png" alt="">--}}
{{--                                </div>--}}`
{{--                                <div class="favourites_child_link_icon">--}}
{{--                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                        <path d="M10.001 1.52898C12.35 -0.58002 15.98 -0.51002 18.243 1.75698C20.505 4.02498 20.583 7.63698 18.479 9.99298L9.99901 18.485L1.52101 9.99298C-0.582994 7.63698 -0.503994 4.01898 1.75701 1.75698C4.02201 -0.50702 7.64501 -0.58302 10.001 1.52898Z" fill="white"/>--}}
{{--                                    </svg>--}}

{{--                                </div>--}}

{{--                            </a>--}}
{{--                            <div class="favourites_item_child_info_box">--}}
{{--                                <h1 class="favourites_item_child_title">Аренда авто без залога</h1>--}}
{{--                                <h1 class="favourites_item_child_price">1 290 ₽ </h1>--}}
{{--                                <p class="favourites_child_info1">Лиговский проспект 11</p>--}}
{{--                                <p class="favourites_item_child_info2">Идейные соображения высшего порядка, а также укрепление и развитие структуры играет важную роль в формировании модели развития.</p>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="favourites_item_child">--}}
{{--                            <a href="" class="favourites_item_child_link">--}}
{{--                                <div class="favourites_child_link_img1">--}}
{{--                                    <img src="../images/recent_announcements_item_child_link_img1.png" alt="">--}}
{{--                                </div>--}}

{{--                                <div class="favourites_child_link_icon">--}}
{{--                                    <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                        <path d="M10.001 1.52898C12.35 -0.58002 15.98 -0.51002 18.243 1.75698C20.505 4.02498 20.583 7.63698 18.479 9.99298L9.99901 18.485L1.52101 9.99298C-0.582994 7.63698 -0.503994 4.01898 1.75701 1.75698C4.02201 -0.50702 7.64501 -0.58302 10.001 1.52898Z" fill="white"/>--}}
{{--                                    </svg>--}}

{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <div class="favourites_item_child_info_box">--}}
{{--                                <h1 class="favourites_item_child_title">Аренда авто без залога</h1>--}}
{{--                                <h1 class="favourites_item_child_price">1 290 ₽ </h1>--}}
{{--                                <p class="favourites_child_info1">Лиговский проспект 11</p>--}}
{{--                                <p class="favourites_item_child_info2">Идейные соображения высшего порядка, а также укрепление и развитие структуры играет важную роль в формировании модели развития.</p>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        </section>
    </main>
@include('includes_file.footer')
</div>
@endsection
