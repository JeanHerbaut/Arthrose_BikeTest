$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(".wrapper-velos").on('click', '.heart', function (e) {
    e.preventDefault();
    let productId = $(e.currentTarget).data('id');
    $(e.currentTarget).find('svg > path').toggleClass('filled')

    $.ajax({
        type: 'POST',
        url: env_url+'/product/toggleFavorite',
        data: { productId: productId },
        success: function (data) {
            if(data.isFavorite){
                $(e.currentTarget).find('svg > path').addClass('filled')
            } else {
                $(e.currentTarget).find('svg > path').removeClass('filled')
            }
        }
    }); 
});