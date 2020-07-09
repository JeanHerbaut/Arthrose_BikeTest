$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$("#Layer_1").click(function (e) {
    e.preventDefault();
    let productId = $("#Layer_1").data('id');
    $('#Layer_1 path').toggleClass('filled');

    $.ajax({
        type: 'POST',
        url: env_url+'/product/toggleFavorite',
        data: { productId: productId },
        success: function (data) {
            if(data.isFavorite){
                $(".cls-1").addClass('filled')
            } else {
                $(".cls-1").removeClass('filled')
            }
        }
    }); 
});