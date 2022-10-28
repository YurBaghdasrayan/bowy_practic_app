@if(auth()->check())
<div class="announcement_first_item">
    <div class="active_inactive_ads_user_img_name_info">
        <div class="active_inactive_ads_user_img">
            <img src="{{asset('storage/uploads/'.auth()->user()->image)}}" alt="">
        </div>
        <div class="active_inactive_ads_user_info">
            @if(is_null(auth()->user()->name))
                <p class="active_inactive_ads_user_name"></p>
            @else
                <p class="active_inactive_ads_user_name">{{auth()->user()->name}}</p>
            @endif

            @if(is_null(auth()->user()->surname))
                <p class="active_inactive_ads_user_name"></p>
            @else
                <p class="active_inactive_ads_user_name">{{auth()->user()->surname}}</p>
            @endif

{{--            <p class="active_inactive_ads_user_name">{{auth()->user()->surname}}</p>--}}
            <p class="active_inactive_ads_user_city_name">{{auth()->user()->city}}</p>
        </div>
    </div>
    <div class="active_inactive_ads_first_item_chat_favourites_links_wrapper">
        <a href="{{route('chat.for.users')}}" class="active_inactive_ads_chat_link open_users_chat">
            <div class="active_inactive_ads_chat_link_icon1">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.07568 16.3533L0.666513 17.3333L1.64651 12.9242C1.00112 11.717 0.664452 10.3689 0.666513 9C0.666513 4.3975 4.39735 0.666667 8.99985 0.666667C13.6023 0.666667 17.3332 4.3975 17.3332 9C17.3332 13.6025 13.6023 17.3333 8.99985 17.3333C7.63098 17.3354 6.28286 16.9987 5.07568 16.3533Z" fill="#00A3FF"/>
                </svg>
            </div>
{{--            <div class="active_inactive_ads_chat_link_icon2">--}}
{{--                <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                    <circle cx="4" cy="4" r="4" fill="#FF5B37"/>--}}
{{--                </svg>--}}
{{--            </div>--}}
        </a>
        <a href="{{route('favourites')}}" class="active_inactive_ads_favourites_link active {{ Request::path() == 'favourites' ? 'active' : '' }}">
            <div class="active_inactive_ads_favourites_link_icon1">
                <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 16.7383L4.53475 20.3573L5.9785 13.09L0.538086 8.05933L7.89617 7.18667L11 0.458333L14.1038 7.18667L21.4619 8.05933L16.0215 13.09L17.4653 20.3573L11 16.7383Z" fill="#FFD708"/>
                </svg>
            </div>
        </a>
        <a href="" class="active_inactive_ads_first_link">
            <div class="active_inactive_ads_first_icon1">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16.4998 0.5C16.7209 0.5 16.9328 0.587797 17.0891 0.744078C17.2454 0.900358 17.3332 1.11232 17.3332 1.33333V7.16667H15.6665V2.16667H2.33317V13.8333H7.33317V15.5H1.49984C1.27882 15.5 1.06686 15.4122 0.910582 15.2559C0.754301 15.0996 0.666504 14.8877 0.666504 14.6667V1.33333C0.666504 1.11232 0.754301 0.900358 0.910582 0.744078C1.06686 0.587797 1.27882 0.5 1.49984 0.5H16.4998ZM16.4998 8.83333C16.7209 8.83333 16.9328 8.92113 17.0891 9.07741C17.2454 9.23369 17.3332 9.44565 17.3332 9.66667V14.6667C17.3332 14.8877 17.2454 15.0996 17.0891 15.2559C16.9328 15.4122 16.7209 15.5 16.4998 15.5H9.83317C9.61216 15.5 9.4002 15.4122 9.24392 15.2559C9.08764 15.0996 8.99984 14.8877 8.99984 14.6667V9.66667C8.99984 9.44565 9.08764 9.23369 9.24392 9.07741C9.4002 8.92113 9.61216 8.83333 9.83317 8.83333H16.4998ZM15.6665 10.5H10.6665V13.8333H15.6665V10.5ZM8.58317 3.83333L6.88067 5.53583L8.75567 7.41083L7.57734 8.58917L5.70234 6.71417L3.99984 8.41667V3.83333H8.58317Z" fill="#FF5B37"/>
                </svg>
            </div>
        </a>
    </div>
    <div class="active_inactive_ads_first_item_links_wrapper">
        <a href="{{route('profile-active-ads')}}" class="active_inactive_ads_first_item_link {{ Request::path() == 'profile/active-ads' ? 'active' : '' }}">Мои объявления</a>
        <a href="{{route('profile-settings')}}" class="active_inactive_ads_first_item_link {{ Request::path() == 'profile/settings' ? 'active' : '' }}">Настройки профиля</a>
        <a href="{{route('notification')}}" class="active_inactive_ads_first_item_link notification_link {{ Request::path() == 'notification' ? 'active' : '' }}">Оповещения
{{--            <div class="notification_icon">--}}
{{--                <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                    <circle cx="4" cy="4" r="4" fill="#FF5B37"/>--}}
{{--                </svg>--}}
{{--            </div>--}}
        </a>
        <a href="{{route('paid-services')}}" class="active_inactive_ads_first_item_link {{ Request::path() == 'profile/services' ? 'active' : '' }}" >Платные услги</a>
    </div>
{{--    @include('includes_file.chat')--}}
</div>
@else
@endif
