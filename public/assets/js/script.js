$(document).on("click", ".delete-users-btn", function () {

    var thisis = $(this);

    $.ajax({
        url: `/admin/users-destroy/${$(this).data('id')}`,
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
            console.log(err)
        }
    })
})
$(document).on("click", ".delete-products-btn", function () {

    var thisis = $(this);

    $.ajax({
        url: `/admin/products-destroy/${$(this).data('id')}`,
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
            console.log(err)
        }
    })
})
$(document).on("submit", ".admin-update-users", function (event) {
    event.preventDefault();

    var token = $('meta[name="csrf-token"]').attr('content');

    var ClientName = $('input[name="name"]', this);
    var ClientName_val = ClientName.val();

    var Email = $('input[name="Email"]', this);
    var Email_val = Email.val();

    var Surname = $('input[name="Surname"]', this)
    var Surname_val = Surname.val();

    var Number = $('input[name="Number"]', this)
    var Number_val = Number.val();

    var City = $('input[name="City"]', this);
    var City_val = City.val();

    var user_id = $('input[name="user_id"]', this).val();

    let formData = new FormData();

    formData.append('ClientName', ClientName_val);
    formData.append('Email', Email_val);
    formData.append('Surname', Surname_val);
    formData.append('Number', Number_val);
    formData.append('City', City_val);
    formData.append('user_id', user_id);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: "http://bowy.ru/admin/update-users",
        type: 'POST',
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        success: function (data) {
            location.reload();
            if (data.success) {
                console.log(data)
            }
        },
        error: function (error) {
            console.log(error);
        }
    });
})
$(document).on("submit", ".admin-update-products", function (event) {
    event.preventDefault();

    var token = $('meta[name="csrf-token"]').attr('content');

    var headline = $('input[name="headline"]', this);
    var headline_val = headline.val();

    var price = $('input[name="price"]', this);
    var price_val = price.val();

    var city = $('input[name="city"]', this)
    var city_val = city.val();

    var region = $('input[name="region"]', this)
    var region_val = region.val();

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

    var address = $('input[name="address"]', this);
    var address_val = address.val();

    var status = $('input[name="status"]', this);
    var status_val = status.val();

    var product_id = $('input[name="product_id"]', this).val();

    let formData = new FormData();

    formData.append('headline', headline_val);
    formData.append('price', price_val);
    formData.append('city', city_val);
    formData.append('region', region_val);
    formData.append('car_model', car_model_val);
    formData.append('description', description_val);
    formData.append('body_type', body_type_val);
    formData.append('rudder', rudder_val);
    formData.append('year_of_issue', year_of_issue_val);
    formData.append('transmission', transmission_val);
    formData.append('product_id', product_id);
    formData.append('address', address_val);
    formData.append('status', status_val);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    $.ajax({
        url: "http://bowy.ru/admin/update-products",
        type: 'POST',
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        success: function (data) {
            location.reload();
            // if (data.success) {
            //     console.log(data)
            // }
        },
        error: function (error) {
            console.log(error);
        }
    })
});
