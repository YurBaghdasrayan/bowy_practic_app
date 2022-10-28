    @extends('layouts.app')
@section('title')
    <title>Главная</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection
@section('content')
@include('includes_file.header')
<div class="container">
    <input type="hidden" id="useSetInterval" value="">
    <input type="hidden" id="paramaters" value="">
    <input type="hidden" id="receiver_id" value="">
    <input type="hidden" id="product_id" value="">
    <input type="hidden" id="messages_count" value="0">

    <!-- Page header start -->
    <div class="page-title">
        <div class="row gutters">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12"> </div>
        </div>
    </div>
    <!-- Page header end -->

    <!-- Content wrapper start -->
    <div class="content-wrapper">
        <!-- Row start -->
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card m-0" style="border-radius: 15px">
                    <!-- Row start -->
                    <div class="row no-gutters">
                        <div  class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3">
                            <div style="border-right: 2px solid #c1c1c1 " class="users-container">
                                <div class="chat-search-box">
                                    <div class="input-group">
                                        <div class="input-group-btn">
                                        </div>
                                    </div>
                                </div>
                                    <ul class="users">
                                        @foreach($usersChat as $SuccsesChat)
                                            <li class="person" data-chat="person1" data-id="{{ $SuccsesChat['forusers']['id']}}" data-id2="{{ $SuccsesChat['products']['id'] }}">
                                                <div class="user">
                                                    <img style="width: 100%" src="{{asset('storage/uploads/'.$SuccsesChat['forusers']['image'])}}">
                                                </div>
                                                <p class="name-time">
                                                    <span class="name ">{{$SuccsesChat['products']['car_model']}} |</span>
                                                    <span class="name {{ Request::path() == 'person' ? 'active' : '' }}">{{$SuccsesChat['forusers']['name']}}</span>
                                                    <span class="time">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($SuccsesChat['created_at']))->diffForHumans() }}</span>
                                                </p>
                                            </li>
                                        @endforeach
                                </ul>
                            </div>
                        </div >
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-9 col-9">
                            <div class="chat-container">
                                <div class="chat-left" style="color: #D6F5E9" id="chat_Right"></div>
                                <div class="chat-container_for_messages" style="overflow-y:scroll;height: 450px;">
                                    <div class="chat-right" id="chat_left">
                                        <img class="chatImg" src="" >
                                    </div>
                                </div>
                                <a class="txt" href=""></a>
                                <div class="send_message_form">
                                    <div class="mmmmmm" style="display: flex">
                                        <form  class="chat_user_form"  style="display: none; display: none; !important;">
                                            <div style="display: flex; align-items: center; justify-content: space-between " class="form-group mt-3 mb-0">
                                                <div style="display: flex; align-items: center;">
                                                    <br>
                                                    <br>
                                                    <input accept="image/*" style="display: none" name="image[]" id="fileinput_form3" class="btn btn-outline-success" type="file" multiple hidden value="" >
                                                    <label style="width: 40px;border: 2px solid #34BE7C;border-radius: 10px; height:40px; background: #D6F5E9" for="fileinput_form3" class="custom-file-upload btn btn-outline-warning">
                                                        <p style="color: #34BE7C;">+</p>
                                                    </label>
                                                 </div>
                                                <div>
                                                    <img style="max-width: 40px; max-height: 40px; width: 100%; border-radius: 5px; margin-left: 5px; margin-right: 5px" id="image1"  src="" class="photo4">
                                                </div>
                                                <input type="hidden" name="product_id" id="product_id_input" value="${response.message[0].product_id}">
                                                <input type="hidden" name="receiver_id" id="receiver_id_input" value="${response.message[0].receiver_id}">
                                                <input type="hidden" name="sender_id" id="sender_id_input" value="${response.message[0].sender_id}">
                                                <div style="width:720px; max-width:100%;" class="chat_user_form_input_btn_wrapper">
                                                    <div class="chat_user_form_input_wrapper">
                                                        <input style="margin-right: 360px;" type="text" name="messages" placeholder="Напишите..." class="chat_user_form_input" >
                                                    </div>
                                                    <button type="submit" class="chat_user_form_btn">
                                                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.3277 6.57354L7.6977 1.75854C1.22895 -1.48146 -1.42605 1.17354 1.81395 7.64229L2.7927 9.59978C3.07395 10.1735 3.07395 10.8373 2.7927 11.411L1.81395 13.3573C-1.42605 19.826 1.2177 22.481 7.6977 19.241L17.3277 14.426C21.6477 12.266 21.6477 8.73354 17.3277 6.57354ZM13.694 11.3435H7.61895C7.1577 11.3435 6.7752 10.961 6.7752 10.4998C6.7752 10.0385 7.1577 9.65604 7.61895 9.65604H13.694C14.1552 9.65604 14.5377 10.0385 14.5377 10.4998C14.5377 10.961 14.1552 11.3435 13.694 11.3435Z" fill="url(#paint0_linear_741_40)"/><defs><linearGradient id="paint0_linear_741_40" x1="0.429687" y1="0.376282" x2="22.069" y2="2.13324" gradientUnits="userSpaceOnUse"><stop stop-color="#34BE7C"/><stop offset="1" stop-color="#2EB6A5"/></linearGradient></defs></svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row end -->
                </div>

            </div>
        </div>
        <!-- Row end -->
    </div>
    <!-- Content wrapper end -->
</div>
@endsection


