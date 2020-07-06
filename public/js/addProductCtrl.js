$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$("#checkNmodel").click(function (e) {
    e.preventDefault();
    let modelnumber = $("#modelNumber").val();

    if(modelnumber == "") return
    $.ajax({
        type: 'POST',
        url: env_url+'/product/postModelNumber',
        data: { modelnumber: modelnumber },
        success: function (data) {
            if(data.product){
                //model exists
                $('#image').prop('disabled', true);
                $('#shortDesc').attr('value', data.product.shortDesc).prop('disabled', true);
                $('#longDesc').val(data.product.longDesc).prop('disabled', true);
                $('#price').attr('value', data.product.price).prop('disabled', true);
                $('#categories').val(data.product.category_name).prop('disabled', true);
                $('#sizes').prop('disabled', false);
                $('#distinctive_sign').prop('disabled', false);
            } else {
                //model doesn't exists
                $('#image').prop('disabled', false);
                $('#shortDesc').attr('value', "").prop('disabled', false);
                $('#longDesc').val("").prop('disabled', false);
                $('#price').attr('value', "").prop('disabled', false);
                $('#categories').val("").prop('disabled', false);
                $('#sizes').prop('disabled', false);
                $('#distinctive_sign').prop('disabled', false);
            }
        }
    });
});

$(document).ready(function() {
    $("#checkNmodel").trigger('click')
});