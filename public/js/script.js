$(".password_visibility").on('click', function () {
    if ($("#passwordInp").hasClass('showPass')) {
        $(".show_icon").addClass("active_show_icon")
        $(".hide_icon").removeClass("active_show_icon")
        $("#passwordInp").removeClass('showPass')
        $('#passwordInp').attr('type', 'password')
    } else {
        $(".hide_icon").addClass("active_show_icon")
        $(".show_icon").removeClass("active_show_icon")
        $("#passwordInp").addClass('showPass')
        $('#passwordInp').attr('type', 'text')
    }
})

$(document).on("click", ".active_inactive_ads_second_item_child_edit_link_delete_btn", function () {

    var thisis = $(this);

    $.ajax({
        url: `https://bowy.ru/products/${$(this).data('id')}`,
        // url: `/products/${$(this).data('id')}`,
        type: 'GET',
        cache: false,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.success) {
                thisis.parent().parent().parent().hide();
            }
        },
        error: function (err) {

        }
    })
})
$(document).on("click", ".badge", function () {
    var thisis = $(this);

    $.ajax({
        url: `https://bowy.ru/admin/${$(this).data('id')}`,
        // url: `/public/admin/${$(this).data('id')}`,
        type: 'GET',
        cache: false,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.success) {
            }
        },
        error: function (err) {
        }
    })
})

$(document).on("click", ".add_category_data", function () {
    var datainfo = $(this).data("info");
    var category_id = $(this).data("id");
    $(this).parent().parent().find(".hidden_category_data").val(category_id);
    $(this).parent().parent().find(".find_transport_form_select_title").html(datainfo);
    $(".find_transport_form_select_hidden_wrapper").removeClass("open");
})

$(document).on("click", ".add_body_type", function () {
    var datainfo = $(this).data("info");

    $(this).parent().parent().find(".hidden_category_data").val(datainfo);
    $(this).parent().parent().find(".find_transport_form_select_title").html(datainfo);
    $(".find_transport_form_select_hidden_wrapper").removeClass("open");
})

$(document).on("click", ".add_region_data", function () {
    var datainfo = $(this).data("info");
    var category_id = $(this).data("id");
    $(this).parent().parent().find(".find_transport_form_select_title").html(datainfo);
    $(".find_transport_form_select_hidden_wrapper").removeClass("open");
    $(this).parent().parent().find(".hidden_category_data").val(category_id);
    var token = $('meta[name="csrf-token"]').attr('content');
    var region_data_val = $('#region_input').val();

    $.ajax({
        url: "https://bowy.ru/getCityByRegionId",
        // url: "/getCityByRegionId",
        type: 'post',
        cache: false,
        data: {'_token': token, 'region_data': region_data_val},
        success: function (response) {
            $('#divCity').html('');
            response.city_data.forEach(function (val) {
                $('#divCity').append('<p class="find_transport_form_select_hidden_info add_region_data" data-id=' + val.id + ' data-info=' + val.name + '>' + val.name + '</p>')
            })
        },
        error: function (err) {
        }
    })
})

$(document).on("click", ".find_transport_form_btn", function () {

    var thisis = $(this);
    var category_data = thisis.parent().children().find(".check_search_category");
    var category_data_val = category_data.val();

    var valid = true;

    if (category_data_val.length < 1) {
        valid = false;
        category_data.parent().css("border", "1px solid red");
    }

    if (!valid) {
        return false;
    }

    thisis.parent().submit();

})

$(document).on("click", ".find_transport_form_select_title_wrapper", function () {
    var thisis = $(this);
    if (thisis.parent().find(".find_transport_form_select_hidden_wrapper").hasClass("open")) {

        thisis.parent().find(".find_transport_form_select_hidden_wrapper").removeClass("open");

    } else {

        $(".find_transport_form_select_hidden_wrapper").removeClass("open");
        $(this).parent().find(".find_transport_form_select_hidden_wrapper").addClass("open");
    }
});
$(document).on("click", ".find_transport_form_select_title_wrappers", function () {
    var thisis = $(this);
    if (thisis.parent().find(".find_transport_form_select_hidden_wrapper").hasClass("open")) {

        thisis.parent().find(".find_transport_form_select_hidden_wrapper").removeClass("open");

    } else {

        $(".find_transport_form_select_hidden_wrapper").removeClass("open");
        $(this).parent().find(".find_transport_form_select_hidden_wrapper").addClass("open");
    }
});


// function getCityBySelect(region_id) {
//     return new Promise((resolve, reject) => {
//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//         });
//         $.ajax({
//             url: "https://bowy.ru/getCityByRegionId",
//             // url: "/getCityByRegionId",
//             type: 'post',
//             cache: false,
//             data: {'region_data': region_id},
//             success: function (response) {
//                 resolve(response)
//             },
//             error: function (err) {
//                 reject(err)
//             }
//         })
//     })
// }

$("#regionSelect").on("change", function () {
    var region_id = $(this).val();
    var token = $('meta[name="csrf-token"]').attr('content');


    $.ajax({
        url: "https://bowy.ru/getCityByRegionId",
        // url: "/getCityByRegionId",
        type: 'post',
        cache: false,
        data: {'_token': token, 'region_data': region_id},
        success: function (response) {
            $('#citySelect').html('');
            $('.show_city_data').css('display', 'block');
            response.city_data.forEach(function (val) {
                $('#citySelect').append('<option value=' + val.id + '>' + val.name + '</option>')
            })
        },
        error: function (err) {
        }
    })


})
// $("#regionSelect").on("mousemove", function () {
//     alert("success")
// })
$(document).on("click", ".add_city_data", function () {
    var datainfo = $(this).data("info");
    var category_id = $(this).data("id");
    $(this).parent().parent().find(".hidden_category_data").val(category_id);
    $(this).parent().parent().find(".find_transport_form_select_title").html(datainfo);
    $(".find_transport_form_select_hidden_wrapper").removeClass("open");

})
$(document).on("click", ".add_category_data", function () {
    var datainfo = $(this).data("info");
    var category_id = $(this).data("id");
    $(this).parent().parent().find(".hidden_category_data").val(category_id);
    $(this).parent().parent().find(".find_transport_form_select_title").html(datainfo);
    $(".find_transport_form_select_hidden_wrapper").removeClass("open");

})
$(document).on("click", ".add_cars_models_data", function () {
    var datainfo = $(this).data("info");

    $(this).parent().parent().find(".hidden_category_data").val(datainfo);
    $(this).parent().parent().find(".find_transport_form_select_title").html(datainfo);
    $(".find_transport_form_select_hidden_wrapper").removeClass("open");

})
$(document).on("click", ".add_rudder_data", function () {
    var datainfo = $(this).data("info");
    var category_id = $(this).data("id");
    $(this).parent().parent().find(".hidden_category_data").val(category_id);
    $(this).parent().parent().find(".find_transport_form_select_title").html(datainfo);
    $(".find_transport_form_select_hidden_wrapper").removeClass("open");

})
$(document).on("click", ".add_transmission_data", function () {
    var datainfo = $(this).data("info");
    var category_id = $(this).data("id");
    $(this).parent().parent().find(".hidden_category_data").val(category_id);
    $(this).parent().parent().find(".find_transport_form_select_title").html(datainfo);
    $(".find_transport_form_select_hidden_wrapper").removeClass("open");

})

$(document).on("click", ".set_city_data", function () {
    var datainfo = $(this).data("info");
    var category_id = $(this).data("id");
    $(this).parent().parent().find(".find_transport_form_select_title").html(datainfo);
    $(".find_transport_form_select_hidden_wrapper").removeClass("open");
    $(this).parent().parent().find(".hidden_category_data").val(category_id);
    var token = $('meta[name="csrf-token"]').attr('content');
    var region_data_val = $('#region_input').val();

    $.ajax({
        url: "https://bowy.ru/getCityByRegionId",
        // url: "/getCityByRegionId",
        type: 'post',
        cache: false,
        data: {'_token': token, 'region_data': region_data_val},
        success: function (response) {
            $('#divCity').html('');
            response.city_data.forEach(function (val) {
                $('#divCity').append('<p class="find_transport_form_select_hidden_info add_city_data" data-id=' + val.id + ' data-info=' + val.name + '>' + val.name + '</p>')
            })
        },
        error: function (err) {
        }
    })
})

$(document).on("click", ".sort_btn", function () {

    var data_id = $(this).data("id");
    $(".sort_btn").removeClass("active");
    $(this).addClass("active");

    $(".recent_announcements_item").removeClass("open");
    $("#" + data_id).addClass("open");
});


$(document).on("click", ".hamburger_menu", function () {
    $(".mobile_version").addClass("open");
    $("body").addClass("hidden_body");
    $(this).addClass("open");
});


$(document).on("click", ".mobile_version_close", function () {
    $(".mobile_version").removeClass("open");
    $("body").removeClass("hidden_body");
    $(".hamburger_menu").removeClass("open");
});


$(document).on("click", ".active_inactive_ads_second_item_sorts_btn", function () {

    var data_id = $(this).data("id");
    var active_id = $(this).data("active_id");
    $(".active_inactive_ads_second_item_sorts_bt" +
        "n").removeClass("active");
    $(this).addClass("active");


    $(".active_inactive_ads_second_items_wrapper").removeClass("open");
    $(".active_inactive_ads_second_items_wrapper").removeClass("no_active_open");
    $("#" + data_id).addClass("open");
    $("." + active_id).addClass("no_active_open");
});


$(document).on("click", ".inactive_type_btn", function () {
    $(".active_products_wrapper").css('display', 'none');
    $(".noactiv_products_wrapper").css('display', 'block');
    $(".active_type_btn").removeClass("active");
    $(".inactive_type_btn").addClass("active");
});


$(document).on("click", ".active_type_btn", function () {
    $(".noactiv_products_wrapper").css('display', 'none');
    $(".active_products_wrapper").css('display', 'block');
    $(".inactive_type_btn").removeClass("active");
    $(".active_type_btn").addClass("active");
});

$(document).on('change', '#fileinput_form2', function () {

    var value = $(this).val();
    var arr = value.split('\\');
    var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
    var span = $(this).closest(".registration_input_type_files_wrapper").find(".file_span");

    $(this).closest(".registration_input_type_files_wrapper").find(".file_span").html(arr[arr.length - 1]);

    if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {

        span.html("Невозможно загрузить формат");
        span.css({
            'color': '#F60000'
        });

        $('.hide-title').css({
            "display": "block"
        })

    } else {

        $(".registration_input-type_file_img_wrapper").fadeIn();
        readURL(this);
        span.css({
            "display": "none"
        });

    }

});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#registration_input-type_file_img').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}


$(document).on("click", ".registration_input-type_file_img_delete_btn", function () {
    $("#fileinput_form2").val("");
    $(this).closest(".registration_input-type_file_img_wrapper").fadeOut();
})


$(document).on("click", ".profile_settings_form_textarea_icon", function () {
    $(this).parent().find(".profile_settings_form_input_field").removeAttr("readonly");
    $(this).parent().find(".profile_settings_form_input_field").focus();
})


$(document).on("click", ".notification_delete_btn", function () {
    $(this).parent().parent().hide();
})


const swiper = new Swiper('#announcement_first_swiper', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
    slidesPerView: 1,


    // Navigation arrows
    navigation: {
        nextEl: '.announcement_next_btn',
        prevEl: '.announcement_prev_btn',
    },


});


$(document).on("click", ".open_users_chat", function () {
    $(".chat_popup").toggleClass("open");
    $("body").toggleClass("hidden_body");
})


$(document).on("click", ".announcement_edit_btn2", function () {
    // var value = $(this).parent().(".announcement_second_item_title").val();
    let val = $(this).parent().find('.announcement_second_item_title').data('info');
    $(this).parent().parent().find(".announcement_second_item_title_edit_btn_wrapper").hide();
    $(this).parent().parent().find(".announcement_second_item_input_icon_wrapper").addClass("open").find('.announcement_second_item_input_field').val(val);
})


$(document).on("click", ".check_mark_icon", function () {
    var val2 = $(this).parent().find(".announcement_second_item_input_field").val();
    $(".announcement_second_item_title_edit_btn_wrapper").show();
    $(this).parent().parent().find(".announcement_second_item_title").html(val2);
    $(this).parent().parent().find(".announcement_second_item_input_icon_wrapper").removeClass("open");
    $(this).closest(".announcement_second_item_title_edit_btn_input_wrapper").find(".announcement_second_item_title").data('info', val2);
})

$(document).on("click", ".announcement_edit_btn3", function () {

    $(".show_regions_data").show();
})


$(document).on("click", ".check_mark_icon", function () {

    let val2 = $(this).closest(".announcement_second_item_title_edit_btn_input_wrapper").find(".announcement_second_item_input_field2").val();
    $(this).closest(".announcement_second_item_title_edit_btn_input_wrapper").find('.announcement_second_item_car_info_details_text').show();
    $(this).closest(".announcement_second_item_title_edit_btn_input_wrapper").find('.announcement_second_item_car_info_details_text').html(val2);
    $(this).closest(".announcement_second_item_title_edit_btn_input_wrapper").find('.announcement_second_item_input_icon_wrapper').removeClass("open");
    $(this).closest(".announcement_second_item_title_edit_btn_input_wrapper").find('.announcement_second_item_car_info_details_text').data('info', val2);
})


$(document).on("click", ".announcement_edit_btn4", function () {

    $(".body_car").show();
    $(".car_model").show();
    $(".year_of_issue").show();
    $(".transmission").show();
    $(".rudder").show();

})

$(document).on("click", ".check_mark_icon", function () {
    let val5 = $(this).closest(".announcement_second_item_specifications_wrapper").find(".announcement_second_item_specification_input_field2").val();
    $(this).closest(".announcement_second_item_specifications_wrapper").find('.announcement_second_item_specifications_info').show();
    $(this).closest(".announcement_second_item_specifications_wrapper").find('.announcement_second_item_specifications_info').html(val5);
    $(this).closest(".announcement_second_item_specifications_wrapper").find('.announcement_second_item_specifications_input_icon_wrapper').removeClass("open");
    $(this).closest(".announcement_second_item_specifications_wrapper").find('.announcement_second_item_specifications_info').data('info', val5);
})

$("#buton").click(function () {
    $("#fn").show();
    $("#ln").show();
});

$(document).on("submit", ".place_an_ad_form", function (event) {
    event.preventDefault();

    var token = $('meta[name="csrf-token"]').attr('content');

    var headline = $('input[name="headline"]', this);
    var headline_val = headline.val();

    var city = $('input[name="city"]', this);
    var city_val = city.val();

    var region = $('input[name="region"]', this);
    var region_val = region.val();

    var price = $('input[name="price"]', this);
    var price_val = price.val();

    var address = $('input[name="address"]', this)
    var address_val = address.val();

    var car_model = $('input[name="car_model"]', this);
    var car_model_val = car_model.val();

    var description = $('input[name="description"]', this);
    var description_val = description.val();

    var body_type = $('input[name="body_type"]', this);
    var body_type_val = body_type.val();

    var rudder = $('input[name="rudder"]', this);
    var rudder_val = rudder.val();

    var year_of_issue = $('input[name="year_of_issue"]', this);
    var year_of_issue_val = year_of_issue.val();

    var transmission = $('input[name="transmission"]', this);
    var transmission_val = transmission.val();

    let TotalFiles = $('#fileinput_form2')[0].files.length;
    let files = $('#fileinput_form2')[0];
    var category_id = $('input[name="category_id"]', this).val();

    var valid = true;

    let formData = new FormData();

    formData.append('headline', headline_val);
    formData.append('price', price_val);
    formData.append('city', city_val);
    formData.append('region', region_val);
    formData.append('car_model', car_model_val);
    formData.append('description', description_val);
    formData.append('body_type', body_type_val);
    formData.append('rudder', rudder_val);
    formData.append('year_of_issue', (year_of_issue_val));
    formData.append('transmission', transmission_val);
    formData.append('category_id', category_id);
    // formData.append('image', image[0].files[0]);

    for (let i = 0; i < TotalFiles; i++) {
        formData.append('files' + i, files.files[i]);
    }
    formData.append('address', address_val);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "https://bowy.ru/profile/create-products",
        // url: "/profile/create-products",
        type: 'POST',
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        success: function (data) {
            if (data.success) {
                window.location.href = 'active-ads'
            }
        },
        error: function (error) {
            $('.alert-danger-headline').css('display', 'none');
            $('.alert-danger-price').css('display', 'none');
            $('.alert-danger-region').css('display', 'none');
            $('.alert-danger-city').css('display', 'none');
            $('.alert-danger-car_model').css('display', 'none');
            $('.alert-danger-description').css('display', 'none');
            $('.alert-danger-body_type').css('display', 'none');
            $('.alert-danger-rudder').css('display', 'none');
            $('.alert-danger-year_of_issue').css('display', 'none');
            $('.alert-danger-address').css('display', 'none');
            $('.alert-danger-transmission').css('display', 'none');
            $('.alert-danger-category_id').css('display', 'none');
            $('.alert-danger-files0').css('display', 'none');

            $('#regionError').css('display', 'block');

            if (error.responseJSON.errors.headline) {
                $('.alert-danger-headline').css('display', 'block');
                $('.alert-danger-headline').text(error.responseJSON.errors.headline[0]);
            }
            if (error.responseJSON.errors.price) {
                $('.alert-danger-price').css('display', 'block');
                $('.alert-danger-price').text(error.responseJSON.errors.price[0]);
            }
            if (error.responseJSON.errors.region) {
                $('.alert-danger-region').css('display', 'block');
                $('.alert-danger-region').text(error.responseJSON.errors.region[0]);
            }
            if (error.responseJSON.errors.city) {
                $('.alert-danger-city').css('display', 'block');
                $('.alert-danger-city').text(error.responseJSON.errors.city[0]);
            }
            if (error.responseJSON.errors.address) {
                $('.alert-danger-address').css('display', 'block');
                $('.alert-danger-address').text(error.responseJSON.errors.address[0]);
            }
            if (error.responseJSON.errors.car_model) {
                $('.alert-danger-car_model').css('display', 'block');
                $('.alert-danger-car_model').text(error.responseJSON.errors.car_model[0]);
            }
            if (error.responseJSON.errors.description) {
                $('.alert-danger-description').css('display', 'block');
                $('.alert-danger-description').text(error.responseJSON.errors.description[0]);
            }
            if (error.responseJSON.errors.body_type) {
                $('.alert-danger-body_type').css('display', 'block');
                $('.alert-danger-body_type').text(error.responseJSON.errors.body_type[0]);
            }
            if (error.responseJSON.errors.rudder) {
                $('.alert-danger-rudder').css('display', 'block');
                $('.alert-danger-rudder').text(error.responseJSON.errors.rudder[0]);
            }
            if (error.responseJSON.errors.year_of_issue) {
                $('.alert-danger-year_of_issue').css('display', 'block');
                $('.alert-danger-year_of_issue').text(error.responseJSON.errors.year_of_issue[0]);
            }
            if (error.responseJSON.errors.transmission) {
                $('.alert-danger-transmission').css('display', 'block');
                $('.alert-danger-transmission').text(error.responseJSON.errors.transmission[0]);
            }
            if (error.responseJSON.errors.category_id) {
                $('.alert-danger-category_id').css('display', 'block');
                $('.alert-danger-category_id').text(error.responseJSON.errors.category_id[0]);
            }
            if (error.responseJSON.errors.files0) {
                $('.alert-danger-files0').css('display', 'block');
                $('.alert-danger-files0').text(error.responseJSON.errors.files0[0]);
            }
        }
    });

})

$(document).on("click", ".add-favorite", function () {
    var thisis = $(this);
    var product_id = thisis.data('id');
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: "https://bowy.ru/profile/favourites",
        // url: "/profile/favourites",
        type: 'post',
        cache: false,
        data: {'_token': token, 'product_id': product_id},
        success: function (response) {
            thisis.css("display", "none");
            thisis.parent().children(".recent_announcements_item_child_link_exist_favourite_img").css("display", "block");

        },
        error: function (err) {
        }
    })
})
$(document).on("click", ".remove-favourite", function () {

    var thisis = $(this);
    var product_id = thisis.data('id');
    $.ajax({
        url: `https://bowy.ru/profile/favourites-destroy/${product_id}`,
        // url: `profile/favourites-destroy/${product_id}`,
        type: 'get',
        processData: false,
        contentType: false,
        success: function (response) {
            $('#' + product_id).css("display", "none");
            thisis.css("display", "none");
            $(".delete_favorite_show").css("display", "block")
        },
        error: function (err) {
        }
    })
})
$(document).on("submit", ".update_place_an_ad", function (event) {
    event.preventDefault();

    var token = $('meta[name="csrf-token"]').attr('content');

    var headline = $('input[name="headline"]', this);
    var headline_val = headline.val();

    var price = $('input[name="price"]', this);
    var price_val = price.val();

    var city = $('select[name="city"]', this)
    var city_val = city.val;

    var region = $('select[name="region"]', this)
    var region_val = region.val;

    var car_model = $('select[name="car_model"]', this);
    var car_model_val = car_model.val();

    var description = $('input[name="description"]', this);
    var description_val = description.val();

    var body_type = $('select[name="body_type"]', this);
    var body_type_val = body_type.val();

    var rudder = $('select[name="rudder"]', this);
    var rudder_val = rudder.val();

    var year_of_issue = $('select[name="year_of_issue"]', this);
    var year_of_issue_val = year_of_issue.val();

    var transmission = $('select[name="transmission"]', this);
    var transmission_val = transmission.val();

    let product_id = $('input[name="product_id"]', this);
    let product_id_val = product_id.val();

    let address = $('input[name="address"]', this);
    let address_val = address.val();

    let TotalFiles = $('#fileinput_form2')[0].files.length;
    let files = $('#fileinput_form2')[0];
    // var category_id = $('input[name="category_id"]', this).val();

    let formData = new FormData();

    formData.append('headline', headline_val);
    formData.append('price', price_val);
    formData.append('car_model', car_model_val);
    formData.append('description', description_val);
    formData.append('body_type', body_type_val);
    formData.append('rudder', rudder_val);
    formData.append('year_of_issue', year_of_issue_val);
    formData.append('transmission', transmission_val);
    formData.append('product_id', product_id_val);
    formData.append('_token', token);
    formData.append('address', address_val);

    for (let i = 0; i < TotalFiles; i++) {
        formData.append('files' + i, files.files[i]);
    }


    $.ajax({
        url: "https://bowy.ru/announcement_update",
        // url: "/announcement_update",
        type: 'POST',
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        success: function (data) {
            // $('.alert-success-status').css('display', 'none');
            if (data.success) {
                $('.alert-success-status').css('display', 'block');
                setTimeout(function () {
                    $('.alert-success-status').css('display', 'none');
                }, 3000)
            }
            $('.alert-success-status').text(data.responseJSON.success([0]));
        },
        error: function (error) {
            $('.alert-danger-headline').css('display', 'none');
            $('.alert-danger-price').css('display', 'none');
            $('.alert-danger-region').css('display', 'none');
            $('.alert-danger-city').css('display', 'none');
            $('.alert-danger-car_model').css('display', 'none');
            $('.alert-danger-description').css('display', 'none');
            $('.alert-danger-body_type').css('display', 'none');
            $('.alert-danger-rudder').css('display', 'none');
            $('.alert-danger-year_of_issue').css('display', 'none');
            $('.alert-danger-year_of_issue').css('display', 'none');

            if (error.responseJSON.errors.headline) {
                $('.alert-danger-headline').css('display', 'block');
                $('.alert-danger-headline').text(error.responseJSON.errors.headline[0]);
            }
            if (error.responseJSON.errors.price) {
                $('.alert-danger-price').css('display', 'block');
                $('.alert-danger-price').text(error.responseJSON.errors.price[0]);
            }
            if (error.responseJSON.errors.region) {
                $('.alert-danger-region').css('display', 'block');
                $('.alert-danger-region').text(error.responseJSON.errors.region[0]);
            }
            if (error.responseJSON.errors.city) {
                $('.alert-danger-city').css('display', 'block');
                $('.alert-danger-city').text(error.responseJSON.errors.city[0]);
            }
            if (error.responseJSON.errors.car_model) {
                $('.alert-danger-car_model').css('display', 'block');
                $('.alert-danger-car_model').text(error.responseJSON.errors.car_model[0]);
            }
            if (error.responseJSON.errors.description) {
                $('.alert-danger-description').css('display', 'block');
                $('.alert-danger-description').text(error.responseJSON.errors.description[0]);
            }
            if (error.responseJSON.errors.body_type) {
                $('.alert-danger-body_type').css('display', 'block');
                $('.alert-danger-body_type').text(error.responseJSON.errors.body_type[0]);
            }
            if (error.responseJSON.errors.transmission) {
                $('.alert-danger-transmission').css('display', 'block');
                $('.alert-danger-transmission').text(error.responseJSON.errors.transmission[0]);
            }
            if (error.responseJSON.errors.rudder) {
                $('.alert-danger-rudder').css('display', 'block');
                $('.alert-danger-rudder').text(error.responseJSON.errors.rudder[0]);
            }
            if (error.responseJSON.errors.year_of_issue) {
                $('.alert-danger-year_of_issue').css('display', 'block');
                $('.alert-danger-year_of_issue').text(error.responseJSON.errors.year_of_issue[0]);
            }
        }
    });
})
$(document).on("click", ".announcement_second_item_delete_btn", function () {

    var thisis = $(this);

    $.ajax({
        url: `https://bowy.ru/products/${$(this).data('id')}`,
        // url: `/products/${$(this).data('id')}`,
        type: 'GET',
        cache: false,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.success) {
                thisis.parent().parent().parent().hide();
            }
        },
        error: function (err) {

        }
    })
})

$(document).on("click", ".remove-favourites", function () {

    var thisis = $(this);
    var product_id = thisis.data('id');
    $.ajax({
        url: `https://bowy.ru/profile/favourites-delete/${product_id}`,
        // url: `/favourites-delete/${product_id}`,
        type: 'GET',
        processData: false,
        contentType: false,
        success: function (response) {
            $(`#${product_id}`).css("display", "none");
            thisis.css("display", "none");
            $(".delete_favorite_show").css("display", "block");
        },
        error: function (err) {
        }
    })
})

$(".call").on("click", function (event) {

    event.preventDefault();

    var thisis = $(this);
    var product_id = thisis.data('id');

    $.ajax({
        url: `https://bowy.ru/announcement-unlogged/${product_id}`,
        // url: `/announcement-unlogged/${product_id}`,
        type: 'GET',
        processData: false,
        contentType: false,
        success: function (response) {
            $('.calss_count_data').text(response.callsCount);
            location.href = "tel:" + response.phone_number;
        },
        error: function (err) {
        }
    })
})

$(document).on("click", ".image-destroy", function () {

    var thisis = $(this);
    var files_id = thisis.data('id');
    $.ajax({
        url: `https://bowy.ru/image-destroy/${files_id}`,
        type: 'get',
        processData: false,
        contentType: false,
        success: function (response) {
            $('#' + files_id).css("display", "none");
            thisis.css("display", "none");
        },
        error: function (err) {
        }
    })
})

$(document).on("submit", ".admin-update-products", function (event) {
    event.preventDefault();

    var token = $('meta[name="csrf-token"]').attr('content');

    var headline = $('input[name="headline"]', this);
    var headline_val = headline.val();

    var price = $('input[name="price"]', this);
    var price_val = price.val();

    var city = $('select[name="city"]', this)
    var city_val = city.val;

    var region = $('select[name="region"]', this)
    var region_val = region.val;

    var car_model = $('select[name="car_model"]', this);
    var car_model_val = car_model.val();

    var description = $('input[name="description"]', this);
    var description_val = description.val();

    var body_type = $('select[name="body_type"]', this);
    var body_type_val = body_type.val();

    var rudder = $('select[name="rudder"]', this);
    var rudder_val = rudder.val();

    var year_of_issue = $('select[name="year_of_issue"]', this);
    var year_of_issue_val = year_of_issue.val();

    var transmission = $('select[name="transmission"]', this);
    var transmission_val = transmission.val();

    let product_id = $('input[name="product_id"]', this);
    let product_id_val = product_id.val();

    let address = $('input[name="address"]', this);
    let address_val = address.val();

    // var category_id = $('input[name="category_id"]', this).val();

    let formData = new FormData();

    formData.append('headline', headline_val);
    formData.append('price', price_val);
    formData.append('car_model', car_model_val);
    formData.append('description', description_val);
    formData.append('body_type', body_type_val);
    formData.append('rudder', rudder_val);
    formData.append('year_of_issue', year_of_issue_val);
    formData.append('transmission', transmission_val);
    formData.append('product_id', product_id_val);
    formData.append('_token', token);
    formData.append('address', address_val);


    $.ajax({
        url: "https://bowy.ru/admin/update-product",
        type: 'POST',
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        success: function (data) {
            // $('.alert-success-status').css('display', 'none');
            if (data.success) {
                $('.alert-success-status').css('display', 'block');
                setTimeout(function () {
                    $('.alert-success-status').css('display', 'none');
                }, 3000)
            }
            $('.alert-success-status').text(data.responseJSON.success([0]));
        },
        error: function (error) {
            $('.alert-danger-headline').css('display', 'none');
            $('.alert-danger-price').css('display', 'none');
            $('.alert-danger-region').css('display', 'none');
            $('.alert-danger-city').css('display', 'none');
            $('.alert-danger-car_model').css('display', 'none');
            $('.alert-danger-description').css('display', 'none');
            $('.alert-danger-body_type').css('display', 'none');
            $('.alert-danger-rudder').css('display', 'none');
            $('.alert-danger-year_of_issue').css('display', 'none');
            $('.alert-danger-year_of_issue').css('display', 'none');

            if (error.responseJSON.errors.headline) {
                $('.alert-danger-headline').css('display', 'block');
                $('.alert-danger-headline').text(error.responseJSON.errors.headline[0]);
            }
            if (error.responseJSON.errors.price) {
                $('.alert-danger-price').css('display', 'block');
                $('.alert-danger-price').text(error.responseJSON.errors.price[0]);
            }
            if (error.responseJSON.errors.region) {
                $('.alert-danger-region').css('display', 'block');
                $('.alert-danger-region').text(error.responseJSON.errors.region[0]);
            }
            if (error.responseJSON.errors.city) {
                $('.alert-danger-city').css('display', 'block');
                $('.alert-danger-city').text(error.responseJSON.errors.city[0]);
            }
            if (error.responseJSON.errors.car_model) {
                $('.alert-danger-car_model').css('display', 'block');
                $('.alert-danger-car_model').text(error.responseJSON.errors.car_model[0]);
            }
            if (error.responseJSON.errors.description) {
                $('.alert-danger-description').css('display', 'block');
                $('.alert-danger-description').text(error.responseJSON.errors.description[0]);
            }
            if (error.responseJSON.errors.body_type) {
                $('.alert-danger-body_type').css('display', 'block');
                $('.alert-danger-body_type').text(error.responseJSON.errors.body_type[0]);
            }
            if (error.responseJSON.errors.transmission) {
                $('.alert-danger-transmission').css('display', 'block');
                $('.alert-danger-transmission').text(error.responseJSON.errors.transmission[0]);
            }
            if (error.responseJSON.errors.rudder) {
                $('.alert-danger-rudder').css('display', 'block');
                $('.alert-danger-rudder').text(error.responseJSON.errors.rudder[0]);
            }
            if (error.responseJSON.errors.year_of_issue) {
                $('.alert-danger-year_of_issue').css('display', 'block');
                $('.alert-danger-year_of_issue').text(error.responseJSON.errors.year_of_issue[0]);
            }
        }
    });
})

$('#active_inactive_ads_page').click(function(event) {
    if (!$(event.target).closest('open').length && !$(event.target).is('open')) {
       $(".find_transport_form_select_hidden_wrapper").removeClass('open');
    }
 });


  $(document).on("submit", ".chat_user_form", function (event) {
    event.preventDefault();

    var token = $('meta[name="csrf-token"]').attr('content');

    var messages = $('input[name="messages"]', this);
    var messages_val = messages.val();

    var sender_id = $('input[name="sender_id"]', this);
    var sender_id_val = sender_id.val();

    var product_id = $('input[name="product_id"]', this);
    var product_id_val = product_id.val();

    var receiver_id = $('input[name="receiver_id"]', this);
    var receiver_id_val = receiver_id.val();

    let TotalFiles = $('#fileinput_form3')[0].files.length;
    let files = $('#fileinput_form3')[0];

    let main_div = $('.chat_user_messages_wrapper');
    let main_divs = $('.chat-container_for_messages');

    let formData = new FormData();

    formData.append('messages', messages_val);


    formData.append('receiver_id', receiver_id_val);
    formData.append('sender_id', sender_id_val);
    formData.append('product_id', product_id_val);
    formData.append('_token', token);


    for (let i = 0; i < TotalFiles; i++) {
        formData.append('files' + i, files.files[i]);
    }


    $.ajax({
        url: "https://bowy.ru/chat",
        type: 'POST',
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        success: function (data) {
            if(data.data.message.file != null){

                let file = data.data.message.file

                // let fileCut = file.slice(length-3)
                let fileType = file.split('.')
                let fileCut = fileType[fileType.length - 1]
                if(fileCut != "png" && fileCut != "svg" && fileCut != "jpg" && fileCut != "jpeg"){
                    main_divs.append(`
                            <div class="chat-left" id="chat_Right">
                            <a href="https://bowy.ru/public/storage/uploads/${data.data.message.file}"  download>
                            <svg width="150" height="150" viewBox="0 0 150 150" fill="none" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink">
                            <rect width="150" height="150" fill="url(#pattern0)"/>
                            <defs>
                            <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0_448_4754" transform="scale(0.00195312)"/>
                            </pattern>
                            <image id="image0_448_4754" width="512" height="512" xlink:href="data:image/png;base64,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"/>
                            </defs>
                            </svg>
                                </a>
                                    <img class="user_img" id="userIMg" src="https://bowy.ru/public/storage/uploads/${data.data.sender.image}"/>
                            </div>
                            <script>

                            $(".img_src" ).click(function() {
                                let img_get_src =  $(this).children('img').attr('src');
                                $(".modal_image").attr("src",img_get_src);
                                $(".modal_href").attr("href", img_get_src);

                              })

                            </script>

                            `

                );
                }else {
                    main_divs.append(`
                            <div class="chat-left" id="chat_Right">

                            <button style="border:none;" type="button" class="img_src" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <img class="chat-text-img" id="messageImg" src="https://bowy.ru/public/storage/uploads/${data.data.message.file}"/>
                            </button>
                                <img class="user_img" id="userIMg" src="https://bowy.ru/public/storage/uploads/${data.data.sender.image}"/>
                            </div>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content" style="background: none;border:none">
                                <div class="modal-header" style="border: none;">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <img style="width:100%" class="modal_image"  src=""/>
                                <a style="text-decoration" class="modal_href" href=""  download><svg xmlns="https://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="48px" height="48px" baseProfile="basic">
                                        <path fill="#6be3a2" d="M39.707,14.293l-10-10C29.52,4.105,29.266,4,29,4H13c-2.757,0-5,2.243-5,5v30c0,2.757,2.243,5,5,5h22	c2.757,0,5-2.243,5-5V15C40,14.735,39.895,14.48,39.707,14.293z"/><path fill="#324561" d="M40,16h-7c-2.757,0-5-2.243-5-5V4c0-0.552,0.447-1,1-1s1,0.448,1,1v7c0,1.654,1.346,3,3,3h7
                                    	c0.553,0,1,0.448,1,1S40.553,16,40,16z"/></svg> скачать изображение
                                    </a>
                                </div>

                                </div>
                            </div>
                            </div>
                            <script>

                            $(".img_src" ).click(function() {

                                let img_get_src =  $(this).children('img').attr('src');
                                $(".modal_image").attr("src",img_get_src);
                                $(".modal_href").attr("href", img_get_src);


                              })

                            </script>

                            `

                );

                }
            }
            if(data.data.message.messages){

                $('.chat_user_form_input').val('');
                main_divs.append(`
                            <div class="chat-left" id="chat_Right">
                                <div style="    max-width: 60%;
                                background-image: linear-gradient(94.67deg, #34BE7C 0%, #2EB6A5 100%);
                                border-radius: 12px 12px 0px 12px;
                                padding: 10px 15px;
                                font-family: Circe, sans-serif;
                                font-style: normal;
                                font-weight: bold;
                                font-size: 16px;
                                line-height: 24px;
                                color: #FFFFFF;
                                word-break: break-word;"  class="chat-text">${data.data.message.messages }</div>

                                <img class="user_img" id="userIMg" src="https://bowy.ru/public/storage/uploads/${data.data.sender.image}"/>
                            </div>`
                );

              $('.chat_user_form_input').val('');
              main_div.append('<div class="chat_user_sent_message_wrapper"><p class="chat_user_sent_message">'+ data.data.message.messages +'</p></div>');

            }
            if(data.data.message.file){
                let file = data.data.message.file
                let fileCut = file.slice(length-3)
                if(fileCut !== "png" && fileCut !== "svg" && fileCut !== "jpg" && fileCut !== "jpeg"){
                    $('.chat_user_form_input').val('');
                    main_div.append(`
                                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                                        <div class="chat_user_sent_message_wrapper">
                                        <a style="width: 60px;height: 60px" href="https://bowy.ru/public/storage/uploads/${data.data.message.file}" >
                                                <svg width="60" height="60" viewBox="0 0 150 150" fill="none" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink">
                                                <rect width="150" height="150" fill="url(#pattern0)"/>
                                                <defs>
                                                <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                <use xlink:href="#image0_448_4754" transform="scale(0.00195312)"/>
                                                </pattern>
                                                <image id="image0_448_4754" width="512" height="512" xlink:href="data:image/png;base64,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"/>
                                                </defs>
                                                </svg>
                                        </a>
                                        </div>
                                        <script>
                                        </script>
                                        `);

                }else{
                    main_div.append(`

                            <div class="chat_user_sent_message_wrapper">
                            <img style="height: 60px;width: 60px" class="chat-text-img" id="messageImg" src="https://bowy.ru/public/storage/uploads/${data.data.message.file}"/>
                            </button>
                        </div>
                            </div>
                            </div>
                        `);
                }
              }
        },
        error: function (error) {
        },

    })

})

$(document).on("submit", ".chat_users_form", function (event) {
    event.preventDefault();

    var token = $('meta[name="csrf-token"]').attr('content');

    var messages = $('input[name="messages"]', this);
    var messages_val = messages.val();


    var product_id = $('input[name="product_id"]', this);
    var product_id_val = product_id.val();

    var receiver_id = $('input[name="receiver_id"]', this);
    var receiver_id_val = receiver_id.val();

    let TotalFiles = $('#fileinput_form3')[0].files.length;
    let files = $('#fileinput_form3')[0];

    let main_div = $('.chat_user_messages_wrapper');

    let formData = new FormData();

    formData.append('messages', messages_val);
    formData.append('receiver_id', receiver_id_val);
    formData.append('product_id', product_id_val);

    formData.append('_token', token);



    for (let i = 0; i < TotalFiles; i++) {
        formData.append('files' + i, files.files[i]);
    }

    $.ajax({
        url: "https://bowy.ru/chatfortwousers",
        type: 'POST',
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        success: function (data) {

            if(data.data.message.messages){
              $('.form-control').val('');
              main_div.append('<div class="chat_user_sent_message_wrapper"><p class="chat_user_sent_message">'+ data.data.message.messages +'</p></div>');

            }
            if(data.data.message.file){
                $('.form-control').val('');
                main_div.append('<div class="chat-text"><img src="https://bowy.ru/public/storage/uploads/'+data.data.message.file +'" class="chatImg"/></div>');
              }
        },
        error: function (error) {

        },
    })
})

$(".user").on("click", function get_message () {

    var thisis = $(this);
    var receiver_id = thisis.data('id');
    var product_id = thisis.data('id2');

    var paramaters =  product_id  + '/' +  receiver_id;
});

function getMessages(product_id, receiver_id) {
    // event.preventDefault();
    $('.chat_user_form').css('display','block')
    var thisis = $(this);
    var paramaters =  product_id  + '/' +  receiver_id;

    let main_div = $('.chat-container_for_messages');
    main_div.html('')

    $('#messages_count').val("0")
    let useSetInterval = $('#useSetInterval').val();
    $('#paramaters').val(paramaters);
    $('#receiver_id').val(receiver_id);
    $('#product_id').val(product_id);

    $.ajax({
        url: `https://bowy.ru/chatfortwousers/${paramaters}`,
        type: 'GET',
        processData: false,
        contentType: false,
        success: function (response) {

            if(response){
                $('#messages_count').val(response.message.length)
                response.message.forEach((val) =>
                {

                    if(receiver_id == val.receiver_id){
                        if(val.file != null){


                            let file = val.file
                            let fileCut = file.slice(length-3)
                            // let image_url = 'https://bowy.ru/public/storage/uploads/'
                            if(fileCut !== "png" && fileCut !== "svg" && fileCut !== "jpg" && fileCut !== "jpeg"){

                                main_div.append(`

                                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                                        <div class="chat-left" id="chat_Right">
                                        <a href="https://bowy.ru/public/storage/uploads/${val.file}"  download>
                                                <svg width="150" height="150" viewBox="0 0 150 150" fill="none" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink">
                                                <rect width="150" height="150" fill="url(#pattern0)"/>
                                                <defs>
                                                <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                <use xlink:href="#image0_448_4754" transform="scale(0.00195312)"/>
                                                </pattern>
                                                <image id="image0_448_4754" width="512" height="512" xlink:href="data:image/png;base64,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"/>
                                                </defs>
                                                </svg>
                                        </a>
                                                <img class="user_img" id="userIMg" src="https://bowy.ru/public/storage/uploads/${val.user.image}"/>
                                        </div>
                                        <script>


                                        </script>
                                        `
                                );
                            }else{
                                main_div.append(`
                            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

                            <div class="chat-left" id="chat_Right">
                            <button style="border:none;" class="img_src" type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <img class="chat-text-img" id="messageImg" src="https://bowy.ru/public/storage/uploads/${val.file}"/>
                            </button>
                            <img class="user_img" id="userIMg" src="https://bowy.ru/public/storage/uploads/${val.user.image}"/>
                        </div>


                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content" style="background: none;border:none">
                                <div class="modal-header" style="border: none;">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                <img style="width:100%" class="modal_image"  src=""/>
                                    <a style="text-decoration:none" class="modal_href" href=""  download><svg xmlns="https://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="48px" height="48px" baseProfile="basic">
                                        <path fill="#6be3a2" d="M39.707,14.293l-10-10C29.52,4.105,29.266,4,29,4H13c-2.757,0-5,2.243-5,5v30c0,2.757,2.243,5,5,5h22	c2.757,0,5-2.243,5-5V15C40,14.735,39.895,14.48,39.707,14.293z"/><path fill="#324561" d="M40,16h-7c-2.757,0-5-2.243-5-5V4c0-0.552,0.447-1,1-1s1,0.448,1,1v7c0,1.654,1.346,3,3,3h7
                                    	c0.553,0,1,0.448,1,1S40.553,16,40,16z"/></svg> скачать изображение
                                    </a>
                                </div>

                                </div>
                            </div>
                            </div>
                            <script>

                            $(".img_src").click(function() {

                                $(".modal_image").attr("src", " ");
                                let img_get_src =  $(this).children('img').attr('src');
                                $(".modal_image").attr("src",img_get_src);

                                $(".modal_href").attr("href", img_get_src);
                              })



                            </script>
                        `);
                            }

                        }
                        if(val.file == "svg"){
                            main_div.append(`
                            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                            <a href="https://bowy.ru/public/storage/uploads/${val.file}"  download><svg xmlns="https://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="48px" height="48px" baseProfile="basic"><path fill="#6be3a2" d="M39.707,14.293l-10-10C29.52,4.105,29.266,4,29,4H13c-2.757,0-5,2.243-5,5v30c0,2.757,2.243,5,5,5h22	c2.757,0,5-2.243,5-5V15C40,14.735,39.895,14.48,39.707,14.293z"/><path fill="#324561" d="M40,16h-7c-2.757,0-5-2.243-5-5V4c0-0.552,0.447-1,1-1s1,0.448,1,1v7c0,1.654,1.346,3,3,3h7	c0.553,0,1,0.448,1,1S40.553,16,40,16z"/></svg></a>
                            <div class="chat-left" id="chat_Right">
                            <button type="button" style="border:none;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <img class="chat-text-img" id="messageImg" src="https://bowy.ru/public/storage/uploads/${val.file}"/>
                            </button>
                            <img class="user_img" id="userIMg" src="https://bowy.ru/public/storage/uploads/${val.user.image}"/>
                        </div>

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content" style="background: none;border:none">
                              <div class="modal-header" style="border: none;">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                ...
                              </div>

                            </div>
                          </div>
                        </div>`);
                        }
                        if(val.file == "txt"){
                            main_div.append(`
                                            <a href="https://bowy.ru/public/storage/uploads/${val.file}"  download>
                                                <svg width="150" height="150" viewBox="0 0 150 150" fill="none" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink">
                                                <rect width="150" height="150" fill="url(#pattern0)"/>
                                                <defs>
                                                <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                <use xlink:href="#image0_448_4754" transform="scale(0.00195312)"/>
                                                </pattern>
                                                <image id="image0_448_4754" width="512" height="512" xlink:href="data:image/png;base64,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"/>
                                                </defs>
                                                </svg>
                                            </a>                            <img class="user_img" id="userIMg" src="https://bowy.ru/public/storage/uploads/${val.user.image}"/>
                        </div>

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content" style="background: none;border:none">
                            <div class="modal-header" style="border: none;">
                              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              ...
                            </div>

                          </div>
                        </div>
                      </div>

                        `);
                        }
                        if(val.messages != null){
                            main_div.append(`
                            <div class="chat-left" id="chat_Right">
                                <div style="    max-width: 60%;
                                background-image: linear-gradient(94.67deg, #34BE7C 0%, #2EB6A5 100%);
                                border-radius: 12px 12px 0px 12px;
                                padding: 10px 15px;
                                font-family: Circe, sans-serif;
                                font-style: normal;
                                font-weight: bold;
                                font-size: 16px;
                                line-height: 24px;
                                color: #FFFFFF;
                                word-break: break-word;"  class="chat-text">${val.messages }</div>

                                <img class="user_img" id="userIMg" src="https://bowy.ru/public/storage/uploads/${val.user.image}"/>
                            </div>`
                            );
                        }
                    }
                    if(receiver_id == val.sender_id){ {


                        if(val.file != null){

                            let file = val.file

                            let fileCut = file.slice(length-3)
                            if(fileCut != "png" && fileCut != "svg" && fileCut != "jpg" && fileCut != "jpeg"){
                                main_div.append(`
                                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                                <div class="chat-right" id="chat_LeftOrigin">

                                <img class="user_img" id="userIMg" src="https://bowy.ru/public/storage/uploads/${val.user.image}"/>

                                <a href="https://bowy.ru/public/storage/uploads/${val.file}"  download>
                                <svg width="150" height="150" viewBox="0 0 150 150" fill="none" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink">
                                <rect width="150" height="150" fill="url(#pattern0)"/>
                                <defs>
                                <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                <use xlink:href="#image0_448_4754" transform="scale(0.00195312)"/>
                                </pattern>
                                <image id="image0_448_4754" width="512" height="512" xlink:href="data:image/png;base64,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"/>
                                </defs>
                                </svg>
                                </a>


                                </div>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="background: none;border:none">
                                    <div class="modal-header" style="border: none;">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <img style="width:100%" class="modal_image"  src=""/>
                                    <a style="text-decoration:none" class="modal_href" href=""  download><svg xmlns="https://www.w3.org/2000/svg"  viewBox="0 0 48               48" width="48px" height="48px" baseProfile="basic">
                                    <path fill="#6be3a2" d="M39.707,14.293l-10-10C29.52,4.105,29.266,4,29,4H13c-2.757,0-5,2.243-5,5v30c0,2.757,2.243,5,5,5h22	c2.757,0,5-2.243,5-5V15C40,14.735,39.895,14.48,39.707,14.293z"/><path fill="#324561" d="M40,16h-7c-2.757,0-5-2.243-5-5V4c0-0.552,0.447-1,1-1s1,0.448,1,1v7c0,1.654,1.346,3,3,3h7
                                    c0.553,0,1,0.448,1,1S40.553,16,40,16z"/></svg> скачать изображение bbbaa
                                </a>

                                    </div>

                                    </div>
                                </div>
                                </div>
                                <script>


                                  $(".img_src" ).click(function() {
                                    let img_get_src =  $(this).children('img').attr('src');
                                    $(".modal_image").attr("src",img_get_src);
                                    $(".modal_href").attr("href", img_get_src);
                                  })

                                </script>

                                `

                                );
                            }else{
                                main_div.append(`
                                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                                <div class="chat-right" id="chat_LeftOrigin">

                                <img class="user_img" id="userIMg" src="https://bowy.ru/public/storage/uploads/${val.user.image}"/>
                                <button type="button" style="border:none;" class="img_src" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <img class="chat-text-img" id="messageImg" src="https://bowy.ru/public/storage/uploads/${val.file}"/>
                                </button>

                                </div>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="background: none;border:none">
                                    <div class="modal-header" style="border: none;">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <img style="width:100%" class="modal_image"  src=""/>
                                    <a style="text-decoration:none" class="modal_href" href=""  download><svg xmlns="https://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="48px" height="48px" baseProfile="basic">
                                        <path fill="#6be3a2" d="M39.707,14.293l-10-10C29.52,4.105,29.266,4,29,4H13c-2.757,0-5,2.243-5,5v30c0,2.757,2.243,5,5,5h22	c2.757,0,5-2.243,5-5V15C40,14.735,39.895,14.48,39.707,14.293z"/><path fill="#324561" d="M40,16h-7c-2.757,0-5-2.243-5-5V4c0-0.552,0.447-1,1-1s1,0.448,1,1v7c0,1.654,1.346,3,3,3h7
                                    	c0.553,0,1,0.448,1,1S40.553,16,40,16z"/></svg> скачать изображение
                                    </a>
                                    </div>

                                    </div>
                                </div>
                                </div>
                                <script>



                                  $(".img_src").click(function() {

                                    let img_get_src =  $(this).children('img').attr('src');
                                    $(".modal_image").attr("src",img_get_src);
                                    $(".modal_href").attr("href", img_get_src);
                                  })

                                </script>
                                `
                                );

                            }


                        }

                        if(val.messages != null){
                            main_div.append(`
                            <div class="chat-right" id="chat_LeftOrigin">
                            <img class="user_img" id="userIMg" src="https://bowy.ru/public/storage/uploads/${val.user.image}"/>

                                <div class="chat-text"> ${val.messages } </div>
                            </div>   `
                            );
                        }
                    }
                    }
                })

            }
            $('#product_id_input').val(response.message[0].product_id);
            $('#receiver_id_input').val(response.message[0].receiver_id);
            $('#sender_id_input').val(response.message[0].sender_id);

            // $('.chat-container_for_messages').animate({
            //         scrollTop: $('.chat-container_for_messages')[0].scrollHeight}
            //     ,1);
        },

        error: function (err) {
            // alert(5);
        }

    })
}

function photo4Url(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.photo4 ').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$("#fileinput_form3").on("change", function () {
    photo4Url(this);
    $('.photo4').css('display','block')
});

$(".chat_user_form_btn").on("click", function () {
    $('.photo4').css('display','none')
    setTimeout(function(){
      $('#fileinput_form3').val([]);
    },
    );
});

$(".chat_user_form_btn").on("click", function () {
    $('.photo4').css('display','none')
    setTimeout(function(){
      $('#fileinput_form3').val([]);
    },
    );
});




$(".person").on("click", function () {

    let receiver_id = $(this).data('id');
    let product_id = $(this).data('id2');
    getMessages(product_id, receiver_id)
    // setInterval( function() {
    //     getMessages(product_id, receiver_id)
    // }, 20000 )

})
// $(".name" ).click(function() {
//     category_data.parent().css("border", "1px solid red");
// })


let personChange = document.querySelectorAll('.person')
personChange.forEach((item) => {
    item.onclick = () => {
        personChange.forEach((ite) => {
            ite.children[1].style.color = 'black'
        })
        item.children[1].style.color = '#34BE7C'
    }
})


// 'product_id': product_id



