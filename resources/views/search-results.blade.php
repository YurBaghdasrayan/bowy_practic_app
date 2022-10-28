@extends('layouts.app')
@section('title')
    <title>Главная</title>
@endsection
{{--@dd($products)--}}
@section('content')
    <div class="bowy_mian_wrapper">
        @include('includes_file.header')
        <main>
            <section class="top">
                <div class="top_wrapper">
                    <h1 class="top_title"> <span>BOWY</span>  аренда всех видов транспорта</h1>
                    <p class="top_info">Более 2000 актуальных объявлений! </p>
                </div>
            </section>
            <section class="types_of_transport">
            </section>
            <section class="cars_on_the_map">
            </section>
            <section class="recent_announcements">
                <div class="recent_announcements_wrapper">
                    <div class="recent_announcements_title_sort_btns_wrapper">
                        @if(isset($products))
                        @if($products->count() <= 0)
                            <h1 style="margin: 0 auto; color: #20c997;">поиски результата 0 </h1>
                        @else
                            <h1 class="recent_announcements_title">Результаты поиска {{$products->count()}}</h1>
                        @endif
                            @endif
                    </div>

                    <div class="recent_announcements_items_wrapper">
                        <div class="recent_announcements_items_wrapper">
                            <div class="recent_announcements_item open" id="open_div1">
                                <div class="recent_announcements_item_parent1">
                                    @if(isset($products))
                                    @foreach($products as $product)
                                        <div class="recent_announcements_item_child" >
                                            <a href="{{route('announcement-unlogged-user',['status'=>'active','id'=>$product->id])}}">
                                                <div class="recent_announcements_item_child_link_img1">
                                                @if(!$product->image->isEmpty())
                                                            @foreach($product->image as $image_data)
                                                               <img src="{{asset('storage/uploads/' . $image_data->image)}}" alt="">
                                                               @break
                                                            @endforeach
                                                        @else    
                                                        <img src="{{asset('storage/uploads/photo.jpg')}}" alt="">
                                                        @endif
                                                </div>
                                            </a>
                                            @if(isset(auth()->user()->id))
                                                @if($product->user_id != Auth::user()->id)
                                                @if(App\Models\Favourites::where(['user_id' => auth()->user()->id,'product_id' => $product->id])->get()->count() < 1)
                                                    <div class="recent_announcements_item_child_link_favourite_img add-favorite"  data-id="{{ $product->id }}">
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
                                                    <div class="recent_announcements_item_child_link_exist_favourite_post remove-favourites " data-id="{{$product->id}}">
                                                        <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10.001 1.52898C12.35 -0.58002 15.98 -0.51002 18.243 1.75698C20.505 4.02498 20.583 7.63698 18.479 9.99298L9.99901 18.485L1.52101 9.99298C-0.582994 7.63698 -0.503994 4.01898 1.75701 1.75698C4.02201 -0.50702 7.64501 -0.58302 10.001 1.52898Z" fill="white"></path>
                                                        </svg>
                                                    </div>
                                                @endif
                                            @endif
                                            @endif
                                            <div class="recent_announcements_item_child_info_box">
                                                <h1 class="recent_announcements_item_child_title">{{$product->headline}}</h1>
                                                <h1 class="recent_announcements_item_child_price">{{$product->price  . " " . "₽"}} </h1>
                                                <p class="recent_announcements_item_child_info1">{{$product->address}}</p>
                                                <p class="recent_announcements_item_child_info2">{{$product->description}} </p>
                                                <div class="recent_announcements_items_child_call_message_btns_wrapper">
                                                    <a class="recent_announcements_items_child_call_btn call user-number" data-id="{{$product->id}}">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.366 7.682C7.30434 9.33048 8.66952 10.6957 10.318 11.634L11.202 10.396C11.3442 10.1969 11.5543 10.0569 11.7928 10.0023C12.0313 9.94779 12.2814 9.98254 12.496 10.1C13.9103 10.8729 15.4722 11.3378 17.079 11.464C17.3298 11.4839 17.5638 11.5975 17.7345 11.7823C17.9052 11.9671 18 12.2094 18 12.461V16.923C18.0001 17.1706 17.9083 17.4094 17.7424 17.5932C17.5765 17.777 17.3483 17.8927 17.102 17.918C16.572 17.973 16.038 18 15.5 18C6.94 18 0 11.06 0 2.5C0 1.962 0.027 1.428 0.082 0.898C0.107255 0.651697 0.222984 0.423521 0.40679 0.257634C0.590595 0.0917472 0.829406 -5.33578e-05 1.077 2.32673e-08H5.539C5.79056 -3.15185e-05 6.0329 0.0947515 6.21768 0.265451C6.40247 0.43615 6.51613 0.670224 6.536 0.921C6.66222 2.52779 7.12708 4.08968 7.9 5.504C8.01746 5.71856 8.05221 5.96874 7.99767 6.2072C7.94312 6.44565 7.80306 6.65584 7.604 6.798L6.366 7.682ZM3.844 7.025L5.744 5.668C5.20478 4.50409 4.83535 3.26884 4.647 2H2.01C2.004 2.166 2.001 2.333 2.001 2.5C2 9.956 8.044 16 15.5 16C15.667 16 15.834 15.997 16 15.99V13.353C14.7312 13.1646 13.4959 12.7952 12.332 12.256L10.975 14.156C10.4287 13.9437 9.89801 13.6931 9.387 13.406L9.329 13.373C7.36758 12.2567 5.74328 10.6324 4.627 8.671L4.594 8.613C4.30691 8.10199 4.05628 7.57134 3.844 7.025Z" fill="white"/>
                                            </svg>
                                        </a>
                                        @if(auth()->check())
                                        <a href="{{route('announcement-unlogged-user',['status'=>'active','id'=>$product->id])}}" class="recent_announcements_items_child_message_btn open_users_chat">
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
                                        @endif
                            </div>
                        </div>
{{--                            @dd($products)--}}
                            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                @if(isset($products))
                    {!! $products->render() !!}
                @endif
                </section>
            </main>
        @include('includes_file.footer')
    </div>
@endsection

