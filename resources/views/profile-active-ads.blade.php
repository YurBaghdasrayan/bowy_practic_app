@extends('layouts.app')

@section('content')
<div class="bowy_mian_wrapper" id="active_inactive_ads_page">
    @include('includes_file.header')
    <main>
        <section class="active_inactive_ads">
            <div class="active_inactive_ads_wrapper">
                <div class="active_inactive_ads_items_wrapper">
                    @include('includes_file.user')
                    <div class="active_inactive_ads_second_item">
                        <div class="active_inactive_ads_second_item_types_sorts_btns_wrapper">
                            <div class="active_inactive_ads_second_item_types_btns">
                                <button class="active_inactive_ads_second_item_types_btn active active_type_btn" data-id="open_div3" data-active_id="open_div5">Активные</button>
                                <button class="active_inactive_ads_second_item_types_btn inactive_type_btn" data-id="open_div4" data-active_id="open_div6">Неактивные</button>
                            </div>
                            <div class="active_inactive_ads_second_item_sorts_btns">
                                <button class="active_inactive_ads_second_item_sorts_btn active" data-id="open_div3" data-active_id="open_div5">
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
                                <button class="active_inactive_ads_second_item_sorts_btn" data-id="open_div4" data-active_id="open_div6">
                                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 0H18V2H0V0ZM0 7H18V9H0V7ZM0 14H18V16H0V14Z" fill="#B7B7B7"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                       <div class="active_products_wrapper">
                           <div class="active_inactive_ads_second_items_wrapper open" id="open_div3">
                               <div class="active_inactive_ads_second_item_parent">
                                   @foreach($products as $product)
                                       <div class="active_inactive_ads_second_item_child">
                                               <div class="active_inactive_ads_second_item_child_link_img1">
                                                   <a>
                                                       <div style="height:250px" class="recent_announcements_item_child_link_img1">
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
                                               </div>
                                               <p class="inactive_title">Неактивно </p>
                                           </a>

                                           <div class="active_inactive_ads_second_item_child_info_box">
                                               <h1 class="active_inactive_ads_second_item_child_title">{{$product->headline}}</h1>
                                               <h1 class="active_inactive_ads_second_item_child_price">{{$product->price . " " . "₽"}}</h1>
                                               <p class="active_inactive_ads_second_item_child_info1">{{$product->address}}</p>
                                               <p class="active_inactive_ads_second_item_child_info2">{{$product->description}}</p>
{{--                                               @dd($product->id)--}}
                                               <div class="active_inactive_ads_second_item_child_edit_link_delete_btns_wrapper">
                                                   <a title="редактировать" href="{{route('announcement',['status'=>'active','id'=>$product->id])}}" class="active_inactive_ads_second_item_child_edit_link">
                                                       <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                           <path d="M12.728 6.68599L11.314 5.27199L2 14.586V16H3.414L12.728 6.68599ZM14.142 5.27199L15.556 3.85799L14.142 2.44399L12.728 3.85799L14.142 5.27199ZM4.242 18H0V13.757L13.435 0.321992C13.6225 0.134521 13.8768 0.0292053 14.142 0.0292053C14.4072 0.0292053 14.6615 0.134521 14.849 0.321992L17.678 3.15099C17.8655 3.33852 17.9708 3.59283 17.9708 3.85799C17.9708 4.12316 17.8655 4.37746 17.678 4.56499L4.243 18H4.242Z" fill="white"/>
                                                       </svg>
                                                   </a>
                                                   <a title="показать" href="{{route('announcement-unlogged-user',['status'=>'active','id'=>$product->id])}}" class="active_inactive_ads_second_item_child_link2">
                                                       <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                           <path d="M2.49189 7.06499L3.77789 18H18.2219L19.5079 7.06499L15.4979 9.73799L10.9999 3.44099L6.50189 9.73799L2.49189 7.06499ZM1.80089 4.19999L5.99989 6.99999L10.1859 1.13999C10.2784 1.01036 10.4005 0.904696 10.5421 0.831793C10.6837 0.75889 10.8406 0.720856 10.9999 0.720856C11.1591 0.720856 11.3161 0.75889 11.4577 0.831793C11.5993 0.904696 11.7214 1.01036 11.8139 1.13999L15.9999 6.99999L20.1999 4.19999C20.3588 4.09424 20.5447 4.0362 20.7356 4.03273C20.9265 4.02926 21.1144 4.0805 21.2771 4.18041C21.4398 4.28032 21.5705 4.42471 21.6537 4.59653C21.737 4.76834 21.7693 4.96039 21.7469 5.14999L20.1039 19.117C20.0752 19.3602 19.9583 19.5845 19.7753 19.7473C19.5922 19.91 19.3558 20 19.1109 20H2.88889C2.64395 20 2.40755 19.91 2.22451 19.7473C2.04148 19.5845 1.92454 19.3602 1.89589 19.117L0.252885 5.14899C0.230685 4.95947 0.263171 4.76756 0.346506 4.59591C0.429842 4.42425 0.560548 4.28003 0.723196 4.18025C0.885845 4.08048 1.07364 4.02932 1.26442 4.03281C1.45521 4.03631 1.641 4.09432 1.79989 4.19999H1.80089ZM10.9999 14C10.4695 14 9.96074 13.7893 9.58567 13.4142C9.2106 13.0391 8.99989 12.5304 8.99989 12C8.99989 11.4696 9.2106 10.9608 9.58567 10.5858C9.96074 10.2107 10.4695 9.99999 10.9999 9.99999C11.5303 9.99999 12.039 10.2107 12.4141 10.5858C12.7892 10.9608 12.9999 11.4696 12.9999 12C12.9999 12.5304 12.7892 13.0391 12.4141 13.4142C12.039 13.7893 11.5303 14 10.9999 14Z" fill="white"/>
                                                       </svg>
                                                   </a>
                                                   <button title="удалить" class="active_inactive_ads_second_item_child_edit_link_delete_btn" data-id="{{ $product->id }}">
                                                       <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                           <path d="M15 4H20V6H18V19C18 19.2652 17.8946 19.5196 17.7071 19.7071C17.5196 19.8946 17.2652 20 17 20H3C2.73478 20 2.48043 19.8946 2.29289 19.7071C2.10536 19.5196 2 19.2652 2 19V6H0V4H5V1C5 0.734784 5.10536 0.48043 5.29289 0.292893C5.48043 0.105357 5.73478 0 6 0H14C14.2652 0 14.5196 0.105357 14.7071 0.292893C14.8946 0.48043 15 0.734784 15 1V4ZM16 6H4V18H16V6ZM7 9H9V15H7V9ZM11 9H13V15H11V9ZM7 2V4H13V2H7Z" fill="white"/>
                                                       </svg>
                                                   </button>
                                               </div>
                                           </div>
                                       </div>
                                   @endforeach
                               </div>
                           </div>
                           <div class="active_inactive_ads_second_items_wrapper" id="open_div4">
                               <div class="active_inactive_ads_second_item_parent">
                                   @foreach($products as $product)
                                       <div class="active_inactive_ads_second_item_child">
                                           <a href="{{route('announcement-unlogged-user',['status'=>'active','id'=>$product->id])}}" class="active_inactive_ads_second_item_child_link">
                                               <div style="height: 250px" class="active_inactive_ads_second_item_child_link_img1">
                                               @if(!$product->image->isEmpty())
                                                            @foreach($product->image as $image_data)
                                                               <img src="{{asset('storage/uploads/' . $image_data->image)}}" alt="">
                                                               @break
                                                            @endforeach
                                                        @else    
                                                        <img src="{{asset('storage/uploads/photo.jpg')}}" alt="">
                                                        @endif                                               </div>
                                               <p class="inactive_title">Неактивно </p>
                                           </a>
                                           <div class="active_inactive_ads_second_item_child_info_box">
                                               <h1 class="active_inactive_ads_second_item_child_title">{{$product->headline}}</h1>
                                               <h1 class="active_inactive_ads_second_item_child_price">{{$product->price}} ₽</h1>
                                               <p class="active_inactive_ads_second_item_child_info1">{{$product->address}}</p>
                                               <p class="active_inactive_ads_second_item_child_info2">{{$product->description}}</p>
                                               <div class="active_inactive_ads_second_item_child_edit_link_delete_btns_wrapper">
                                                   <a title="редактировать" href="/announcement/activ/{{$product->id}}" class="active_inactive_ads_second_item_child_edit_link">
                                                       <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                           <path d="M12.728 6.68599L11.314 5.27199L2 14.586V16H3.414L12.728 6.68599ZM14.142 5.27199L15.556 3.85799L14.142 2.44399L12.728 3.85799L14.142 5.27199ZM4.242 18H0V13.757L13.435 0.321992C13.6225 0.134521 13.8768 0.0292053 14.142 0.0292053C14.4072 0.0292053 14.6615 0.134521 14.849 0.321992L17.678 3.15099C17.8655 3.33852 17.9708 3.59283 17.9708 3.85799C17.9708 4.12316 17.8655 4.37746 17.678 4.56499L4.243 18H4.242Z" fill="white"/>
                                                       </svg>
                                                   </a>
                                                   <a title="показать" href="{{route('announcement-unlogged-user',['status'=>'active','id'=>$product->id])}}" class="active_inactive_ads_second_item_child_link2">
                                                       <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                           <path d="M2.49189 7.06499L3.77789 18H18.2219L19.5079 7.06499L15.4979 9.73799L10.9999 3.44099L6.50189 9.73799L2.49189 7.06499ZM1.80089 4.19999L5.99989 6.99999L10.1859 1.13999C10.2784 1.01036 10.4005 0.904696 10.5421 0.831793C10.6837 0.75889 10.8406 0.720856 10.9999 0.720856C11.1591 0.720856 11.3161 0.75889 11.4577 0.831793C11.5993 0.904696 11.7214 1.01036 11.8139 1.13999L15.9999 6.99999L20.1999 4.19999C20.3588 4.09424 20.5447 4.0362 20.7356 4.03273C20.9265 4.02926 21.1144 4.0805 21.2771 4.18041C21.4398 4.28032 21.5705 4.42471 21.6537 4.59653C21.737 4.76834 21.7693 4.96039 21.7469 5.14999L20.1039 19.117C20.0752 19.3602 19.9583 19.5845 19.7753 19.7473C19.5922 19.91 19.3558 20 19.1109 20H2.88889C2.64395 20 2.40755 19.91 2.22451 19.7473C2.04148 19.5845 1.92454 19.3602 1.89589 19.117L0.252885 5.14899C0.230685 4.95947 0.263171 4.76756 0.346506 4.59591C0.429842 4.42425 0.560548 4.28003 0.723196 4.18025C0.885845 4.08048 1.07364 4.02932 1.26442 4.03281C1.45521 4.03631 1.641 4.09432 1.79989 4.19999H1.80089ZM10.9999 14C10.4695 14 9.96074 13.7893 9.58567 13.4142C9.2106 13.0391 8.99989 12.5304 8.99989 12C8.99989 11.4696 9.2106 10.9608 9.58567 10.5858C9.96074 10.2107 10.4695 9.99999 10.9999 9.99999C11.5303 9.99999 12.039 10.2107 12.4141 10.5858C12.7892 10.9608 12.9999 11.4696 12.9999 12C12.9999 12.5304 12.7892 13.0391 12.4141 13.4142C12.039 13.7893 11.5303 14 10.9999 14Z" fill="white"/>
                                                       </svg>
                                                   </a>
                                                   <button title="удалить" class="active_inactive_ads_second_item_child_edit_link_delete_btn" data-id="{{ $product->id }}">
                                                       <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                           <path d="M15 4H20V6H18V19C18 19.2652 17.8946 19.5196 17.7071 19.7071C17.5196 19.8946 17.2652 20 17 20H3C2.73478 20 2.48043 19.8946 2.29289 19.7071C2.10536 19.5196 2 19.2652 2 19V6H0V4H5V1C5 0.734784 5.10536 0.48043 5.29289 0.292893C5.48043 0.105357 5.73478 0 6 0H14C14.2652 0 14.5196 0.105357 14.7071 0.292893C14.8946 0.48043 15 0.734784 15 1V4ZM16 6H4V18H16V6ZM7 9H9V15H7V9ZM11 9H13V15H11V9ZM7 2V4H13V2H7Z" fill="white"/>
                                                       </svg>
                                                   </button>
                                               </div>
                                           </div>
                                       </div>
                                   @endforeach
                               </div>
                           </div>
                       </div>
                       <div class="noactiv_products_wrapper">
                           <div class="active_inactive_ads_second_items_wrapper no_active_open open_div5" id="open_div3">
                               <div class="active_inactive_ads_second_item_parent">
                                   @foreach($no_ative_products as $product)
                                       <div class="active_inactive_ads_second_item_child">
                                           <a href="" class="active_inactive_ads_second_item_child_link inactive">
                                               <div style="height: 250px" class="active_inactive_ads_second_item_child_link_img1">
                                                   @foreach($product->image as $image_data)
                                                       <img src="{{asset('storage/uploads/' . $image_data->image)}}" alt="">
                                                       @break
                                                   @endforeach                                               </div>
                                               <p class="inactive_title">Неактивно</p>
                                           </a>
                                           <div class="active_inactive_ads_second_item_child_info_box">
                                               <h1 class="active_inactive_ads_second_item_child_title">{{$product->headline}}</h1>
                                               <h1 class="active_inactive_ads_second_item_child_price">{{$product->price}} ₽</h1>
                                               <p class="active_inactive_ads_second_item_child_info1">{{$product->address}}</p>
                                               <p class="active_inactive_ads_second_item_child_info2">{{$product->description}}</p>
                                               <div class="active_inactive_ads_second_item_child_edit_link_delete_btns_wrapper">
{{--                                                   <a href="/announcement/noactiv/{{$product->id}}" class="active_inactive_ads_second_item_child_edit_link">--}}
{{--                                                       <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                                           <path d="M12.728 6.68599L11.314 5.27199L2 14.586V16H3.414L12.728 6.68599ZM14.142 5.27199L15.556 3.85799L14.142 2.44399L12.728 3.85799L14.142 5.27199ZM4.242 18H0V13.757L13.435 0.321992C13.6225 0.134521 13.8768 0.0292053 14.142 0.0292053C14.4072 0.0292053 14.6615 0.134521 14.849 0.321992L17.678 3.15099C17.8655 3.33852 17.9708 3.59283 17.9708 3.85799C17.9708 4.12316 17.8655 4.37746 17.678 4.56499L4.243 18H4.242Z" fill="white"/>--}}
{{--                                                       </svg>--}}
{{--                                                   </a>--}}
{{--                                                   <a href="{{route('announcement-unlogged-user',['status'=>'inactive','id'=>$product->id])}}" class="active_inactive_ads_second_item_child_link2">--}}
{{--                                                       <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                                           <path d="M2.49189 7.06499L3.77789 18H18.2219L19.5079 7.06499L15.4979 9.73799L10.9999 3.44099L6.50189 9.73799L2.49189 7.06499ZM1.80089 4.19999L5.99989 6.99999L10.1859 1.13999C10.2784 1.01036 10.4005 0.904696 10.5421 0.831793C10.6837 0.75889 10.8406 0.720856 10.9999 0.720856C11.1591 0.720856 11.3161 0.75889 11.4577 0.831793C11.5993 0.904696 11.7214 1.01036 11.8139 1.13999L15.9999 6.99999L20.1999 4.19999C20.3588 4.09424 20.5447 4.0362 20.7356 4.03273C20.9265 4.02926 21.1144 4.0805 21.2771 4.18041C21.4398 4.28032 21.5705 4.42471 21.6537 4.59653C21.737 4.76834 21.7693 4.96039 21.7469 5.14999L20.1039 19.117C20.0752 19.3602 19.9583 19.5845 19.7753 19.7473C19.5922 19.91 19.3558 20 19.1109 20H2.88889C2.64395 20 2.40755 19.91 2.22451 19.7473C2.04148 19.5845 1.92454 19.3602 1.89589 19.117L0.252885 5.14899C0.230685 4.95947 0.263171 4.76756 0.346506 4.59591C0.429842 4.42425 0.560548 4.28003 0.723196 4.18025C0.885845 4.08048 1.07364 4.02932 1.26442 4.03281C1.45521 4.03631 1.641 4.09432 1.79989 4.19999H1.80089ZM10.9999 14C10.4695 14 9.96074 13.7893 9.58567 13.4142C9.2106 13.0391 8.99989 12.5304 8.99989 12C8.99989 11.4696 9.2106 10.9608 9.58567 10.5858C9.96074 10.2107 10.4695 9.99999 10.9999 9.99999C11.5303 9.99999 12.039 10.2107 12.4141 10.5858C12.7892 10.9608 12.9999 11.4696 12.9999 12C12.9999 12.5304 12.7892 13.0391 12.4141 13.4142C12.039 13.7893 11.5303 14 10.9999 14Z" fill="white"/>--}}
{{--                                                       </svg>--}}
{{--                                                   </a>--}}
{{--                                                   <button class="active_inactive_ads_second_item_child_edit_link_delete_btn" data-id="{{ $product->id }}">--}}
{{--                                                       <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                                           <path d="M15 4H20V6H18V19C18 19.2652 17.8946 19.5196 17.7071 19.7071C17.5196 19.8946 17.2652 20 17 20H3C2.73478 20 2.48043 19.8946 2.29289 19.7071C2.10536 19.5196 2 19.2652 2 19V6H0V4H5V1C5 0.734784 5.10536 0.48043 5.29289 0.292893C5.48043 0.105357 5.73478 0 6 0H14C14.2652 0 14.5196 0.105357 14.7071 0.292893C14.8946 0.48043 15 0.734784 15 1V4ZM16 6H4V18H16V6ZM7 9H9V15H7V9ZM11 9H13V15H11V9ZM7 2V4H13V2H7Z" fill="white"/>--}}
{{--                                                       </svg>--}}
{{--                                                   </button>--}}
                                               </div>
                                           </div>
                                       </div>
                                   @endforeach
                               </div>
                           </div>
                           <div class="active_inactive_ads_second_items_wrapper open_div6" id="open_div4">
                               <div class="active_inactive_ads_second_item_parent">
                                   @foreach($no_ative_products as $product)
                                       <div class="active_inactive_ads_second_item_child">
                                           <a href="{{route('announcement-unlogged-user',['status'=>'active','id'=>$product->id])}}" class="active_inactive_ads_second_item_child_link inactive">
                                               <div style="height: 250px" class="active_inactive_ads_second_item_child_link_img1">
                                                   @foreach($product->image as $image_data)
                                                       <img src="{{asset('storage/uploads/' . $image_data->image)}}" alt="">
                                                       @break
                                                   @endforeach                                               </div>
                                               <p class="inactive_title">Неактивно</p>
                                           </a>
                                           <div class="active_inactive_ads_second_item_child_info_box">
                                               <h1 class="active_inactive_ads_second_item_child_title">{{$product->headline}}</h1>
                                               <h1 class="active_inactive_ads_second_item_child_price">{{$product->price . "₽"}} </h1>
                                               <p class="active_inactive_ads_second_item_child_info1">{{$product->address}}</p>
                                               <p class="active_inactive_ads_second_item_child_info2">{{$product->description}}</p>
                                               <div class="active_inactive_ads_second_item_child_edit_link_delete_btns_wrapper">
                                                   <a href="{{route('announcement-unlogged-user',['status'=>'active','id'=>$product->id])}}" class="active_inactive_ads_second_item_child_edit_link">
                                                       <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                           <path d="M12.728 6.68599L11.314 5.27199L2 14.586V16H3.414L12.728 6.68599ZM14.142 5.27199L15.556 3.85799L14.142 2.44399L12.728 3.85799L14.142 5.27199ZM4.242 18H0V13.757L13.435 0.321992C13.6225 0.134521 13.8768 0.0292053 14.142 0.0292053C14.4072 0.0292053 14.6615 0.134521 14.849 0.321992L17.678 3.15099C17.8655 3.33852 17.9708 3.59283 17.9708 3.85799C17.9708 4.12316 17.8655 4.37746 17.678 4.56499L4.243 18H4.242Z" fill="white"/>
                                                       </svg>
                                                   </a>
                                                   <a href="" class="active_inactive_ads_second_item_child_link2">
                                                       <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                           <path d="M2.49189 7.06499L3.77789 18H18.2219L19.5079 7.06499L15.4979 9.73799L10.9999 3.44099L6.50189 9.73799L2.49189 7.06499ZM1.80089 4.19999L5.99989 6.99999L10.1859 1.13999C10.2784 1.01036 10.4005 0.904696 10.5421 0.831793C10.6837 0.75889 10.8406 0.720856 10.9999 0.720856C11.1591 0.720856 11.3161 0.75889 11.4577 0.831793C11.5993 0.904696 11.7214 1.01036 11.8139 1.13999L15.9999 6.99999L20.1999 4.19999C20.3588 4.09424 20.5447 4.0362 20.7356 4.03273C20.9265 4.02926 21.1144 4.0805 21.2771 4.18041C21.4398 4.28032 21.5705 4.42471 21.6537 4.59653C21.737 4.76834 21.7693 4.96039 21.7469 5.14999L20.1039 19.117C20.0752 19.3602 19.9583 19.5845 19.7753 19.7473C19.5922 19.91 19.3558 20 19.1109 20H2.88889C2.64395 20 2.40755 19.91 2.22451 19.7473C2.04148 19.5845 1.92454 19.3602 1.89589 19.117L0.252885 5.14899C0.230685 4.95947 0.263171 4.76756 0.346506 4.59591C0.429842 4.42425 0.560548 4.28003 0.723196 4.18025C0.885845 4.08048 1.07364 4.02932 1.26442 4.03281C1.45521 4.03631 1.641 4.09432 1.79989 4.19999H1.80089ZM10.9999 14C10.4695 14 9.96074 13.7893 9.58567 13.4142C9.2106 13.0391 8.99989 12.5304 8.99989 12C8.99989 11.4696 9.2106 10.9608 9.58567 10.5858C9.96074 10.2107 10.4695 9.99999 10.9999 9.99999C11.5303 9.99999 12.039 10.2107 12.4141 10.5858C12.7892 10.9608 12.9999 11.4696 12.9999 12C12.9999 12.5304 12.7892 13.0391 12.4141 13.4142C12.039 13.7893 11.5303 14 10.9999 14Z" fill="white"/>
                                                       </svg>
                                                   </a>
                                                   <button class="active_inactive_ads_second_item_child_edit_link_delete_btn" data-id="{{ $product->id }}">
                                                       <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                           <path d="M15 4H20V6H18V19C18 19.2652 17.8946 19.5196 17.7071 19.7071C17.5196 19.8946 17.2652 20 17 20H3C2.73478 20 2.48043 19.8946 2.29289 19.7071C2.10536 19.5196 2 19.2652 2 19V6H0V4H5V1C5 0.734784 5.10536 0.48043 5.29289 0.292893C5.48043 0.105357 5.73478 0 6 0H14C14.2652 0 14.5196 0.105357 14.7071 0.292893C14.8946 0.48043 15 0.734784 15 1V4ZM16 6H4V18H16V6ZM7 9H9V15H7V9ZM11 9H13V15H11V9ZM7 2V4H13V2H7Z" fill="white"/>
                                                       </svg>

                                                   </button>
                                               </div>
                                           </div>
                                       </div>
                                       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                                       @if(isset($products))
                                           {{$products->links()}}
                                       @endif
                                   @endforeach
                               </div>
                           </div>
                       </div>
                    </div>
                </div>
            </div>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            @if(isset($products))
                {{$products->links()}}
            @endif
        </section>
    </main>
@include('includes_file.footer')
</div>
@endsection
